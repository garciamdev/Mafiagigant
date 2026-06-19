<?php
/**
 * Angriff / Mord (PvP) – greife einen anderen Spieler an.
 * Vergleicht Angriffs- vs Verteidigungskraft (mit Zufall). Bei Erfolg landet
 * das Opfer im Krankenhaus und du erbeutest einen Teil seines Bargelds.
 */
if (!isset($_SESSION['suid']) || $_SESSION['suid'] == '') {
    header("Location: " . BASE_URL . "login/");
    exit();
}

$at_cost_bullets = 25;   // Kugeln pro Angriff
$at_cooldown     = 600;  // 10 Minuten
$at_hospital_hp  = 15;   // Lebenspunkte des Opfers nach erfolgreichem Angriff

$bullets   = (int) $userdata[0]['bullets'];
$att_power = (int) $userdata[0]['att_power'];
$at_target_name = isset($_GET['var']) && $_GET['var'] !== '' ? $_GET['var'] : '';

$q = "SELECT * FROM timers where activity = 'attack' and username = '" . $db->escape($userdata[0]['username']) . "'";
$timer = $db->query($q)->fetch();
$now = date("Y-m-d H:i:s");
$wait = 0;
if (isset($timer[0]['time']) && $timer[0]['time'] >= $now) {
    $wait = datetotime($timer[0]['time']) - time();
    $errors[] = "Du musst dich erst beruhigen. Warte noch <font id=\"count_timer\"></font>!";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['target']) && empty($errors)) {

    $target = trim($_POST['target']);
    $at_target_name = $target;

    if ($target === '') {
        $errors[] = "Bitte gib einen Spielernamen ein.";
    } elseif (strcasecmp($target, $userdata[0]['username']) === 0) {
        $errors[] = "Du kannst dich nicht selbst angreifen.";
    } elseif ($bullets < $at_cost_bullets) {
        $errors[] = "Du brauchst mindestens " . number($at_cost_bullets) . " Kugeln für einen Angriff.";
    } else {
        $tq = $db->query("SELECT * FROM users where username = '" . $db->escape($target) . "' ");
        $tf = $db->fetch($tq);

        if ($db->affected_rows != 1) {
            $errors[] = "Spieler „" . htmlspecialchars($target) . "“ wurde nicht gefunden.";
        } elseif ((int) $tf[0]['health'] <= 35) {
            $errors[] = "„" . htmlspecialchars($target) . "“ liegt bereits im Krankenhaus.";
        } else {
            // Kugeln verbrauchen.
            $new_bullets = $bullets - $at_cost_bullets;

            $atk = $att_power * (mt_rand(80, 120) / 100);
            $def = ((int) $tf[0]['deff_power']) * (mt_rand(80, 120) / 100) + ((int) $tf[0]['health']);

            if ($atk > $def) {
                // Erfolg: Opfer ins Krankenhaus, Bargeld erbeuten.
                $loot = (int) floor((int) $tf[0]['cash'] * (mt_rand(10, 25) / 100));
                $xpgain = rand(20, 60);

                $db->where(['id' => $tf[0]['id']])->update('users', [
                    'health' => $at_hospital_hp,
                    'cash'   => max(0, (int) $tf[0]['cash'] - $loot),
                ]);
                $db->where(['id' => $userdata[0]['id']])->update('users', [
                    'bullets' => $new_bullets,
                    'cash'    => ($userdata[0]['cash'] + $loot),
                    'xp'      => ($userdata[0]['xp'] + $xpgain),
                ]);
                $userdata[0]['bullets']  = $new_bullets;
                $userdata[0]['cash']    += $loot;
                $userdata[0]['xp']      += $xpgain;
                $bullets = $new_bullets;

                $success[] = "Angriff erfolgreich! 🔫 „" . htmlspecialchars($target)
                    . "“ liegt im Krankenhaus. Beute: € " . number($loot) . " und " . number($xpgain) . " XP.";
            } else {
                $db->where(['id' => $userdata[0]['id']])->update('users', ['bullets' => $new_bullets]);
                $userdata[0]['bullets'] = $new_bullets;
                $bullets = $new_bullets;
                $errors[] = "Der Angriff auf „" . htmlspecialchars($target) . "“ ist fehlgeschlagen – zu gut verteidigt! 💨";
            }

            // Cooldown.
            $next = timetodate(time() + $at_cooldown);
            if (isset($timer[0]['time'])) {
                $db->where(['activity' => 'attack', 'username' => $userdata[0]['username']])
                   ->update('timers', ['time' => $next]);
            } else {
                $db->insert('timers', ['activity' => 'attack', 'username' => $userdata[0]['username'], 'time' => $next]);
            }
        }
    }
}
