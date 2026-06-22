<?php
/**
 * Organisiertes Verbrechen – großer Solo-Coup.
 * Braucht Angriffskraft & Kugeln, hohes Risiko (Gefängnis), lange Abklingzeit.
 */
if (!isset($_SESSION['suid']) || $_SESSION['suid'] == '') {
    header("Location: " . BASE_URL . "login/");
    exit();
}

$oc_req_power = 50;     // Mindest-Angriffskraft
$oc_cost_bullets = 50;  // Kugeln pro Coup
$oc_cooldown = 1800;    // 30 Minuten
$oc_jailtime = 900;     // 15 Minuten Gefängnis bei Festnahme

$att_power = (int) $userdata[0]['att_power'];
$bullets   = (int) $userdata[0]['bullets'];

$q = "SELECT * FROM timers where activity = 'organizedcrime' and username = '" . $db->escape($userdata[0]['username']) . "'";
$timer = $db->query($q)->fetch();
$now = date("Y-m-d H:i:s");
$wait = 0;
if (isset($timer[0]['time']) && $timer[0]['time'] >= $now) {
    $wait = datetotime($timer[0]['time']) - time();
    $errors[] = "Dein Team plant noch. Warte noch <font id=\"count_timer\"></font>, bevor du wieder zuschlägst!";
}

// Erfolgschance abhängig von der Angriffskraft.
$oc_chance = min(85, 40 + (int) floor($att_power / 20));

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['commit']) && empty($errors)) {

    if ($att_power < $oc_req_power) {
        $errors[] = "Du brauchst mindestens " . number($oc_req_power) . " Angriffskraft für einen organisierten Coup.";
    } elseif ($bullets < $oc_cost_bullets) {
        $errors[] = "Du brauchst mindestens " . number($oc_cost_bullets) . " Kugeln.";
    } else {
        $new_bullets = $bullets - $oc_cost_bullets;

        if (rand(1, 100) <= $oc_chance) {
            // Erfolg!
            $money   = rand(50000, 150000);
            $loot    = rand(20, 60);
            $xpgain  = rand(50, 150);
            $db->where(['id' => $userdata[0]['id']])->update('users', [
                'cash'    => ($userdata[0]['cash'] + $money),
                'bullets' => ($new_bullets + $loot),
                'xp'      => ($userdata[0]['xp'] + $xpgain),
            ]);
            $userdata[0]['cash']    += $money;
            $userdata[0]['bullets']  = $new_bullets + $loot;
            $userdata[0]['xp']      += $xpgain;
            $bullets = $userdata[0]['bullets'];
            $success[] = "Coup gelungen! 💰 Beute: € " . number($money) . ", "
                . number($loot) . " Kugeln und " . number($xpgain) . " XP.";
        } else {
            // Fehlschlag – evtl. Gefängnis.
            $db->where(['id' => $userdata[0]['id']])->update('users', ['bullets' => $new_bullets]);
            $userdata[0]['bullets'] = $new_bullets;
            $bullets = $new_bullets;
            if (rand(1, 100) <= 50) {
                jail($userdata[0]['username'], $oc_jailtime);
                $errors[] = "Der Coup ist aufgeflogen – die Polizei schnappt dich! Du wanderst ins Gefängnis. 🚔";
            } else {
                $errors[] = "Der Coup ist gescheitert. Ihr konntet gerade noch entkommen. 💨";
            }
        }

        // Abklingzeit setzen.
        $next = timetodate(time() + $oc_cooldown);
        if (isset($timer[0]['time'])) {
            $db->where(['activity' => 'organizedcrime', 'username' => $userdata[0]['username']])
               ->update('timers', ['time' => $next]);
        } else {
            $db->insert('timers', ['activity' => 'organizedcrime', 'username' => $userdata[0]['username'], 'time' => $next]);
        }
    }
}
