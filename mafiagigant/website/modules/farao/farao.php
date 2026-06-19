<?php
/**
 * "Der Pharao" – Boss-Kampf gegen einen mächtigen NPC.
 * Hohe Anforderungen, großer Lohn, lange Abklingzeit.
 */
if (!isset($_SESSION['suid']) || $_SESSION['suid'] == '') {
    header("Location: " . BASE_URL . "login/");
    exit();
}

$fa_req_power   = 200;    // Mindest-Angriffskraft
$fa_cost_bullets = 100;   // Kugeln pro Versuch
$fa_cooldown    = 3600;   // 1 Stunde

$att_power = (int) $userdata[0]['att_power'];
$bullets   = (int) $userdata[0]['bullets'];

$q = "SELECT * FROM timers where activity = 'farao' and username = '" . $db->escape($userdata[0]['username']) . "'";
$timer = $db->query($q)->fetch();
$now = date("Y-m-d H:i:s");
$wait = 0;
if (isset($timer[0]['time']) && $timer[0]['time'] >= $now) {
    $wait = datetotime($timer[0]['time']) - time();
    $errors[] = "Der Pharao hat sich zurückgezogen. Warte noch <font id=\"count_timer\"></font>!";
}

// Erfolgschance: stark abhängig von der Angriffskraft.
$fa_chance = min(80, 20 + (int) floor($att_power / 20));

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['fight']) && empty($errors)) {

    if ($att_power < $fa_req_power) {
        $errors[] = "Du bist noch zu schwach. Mindestens " . number($fa_req_power) . " Angriffskraft nötig.";
    } elseif ($bullets < $fa_cost_bullets) {
        $errors[] = "Du brauchst mindestens " . number($fa_cost_bullets) . " Kugeln für diesen Kampf.";
    } else {
        $new_bullets = $bullets - $fa_cost_bullets;

        if (rand(1, 100) <= $fa_chance) {
            $money  = rand(500000, 1500000);
            $bp     = rand(1, 3);
            $xpgain = rand(500, 1500);
            $db->where(['id' => $userdata[0]['id']])->update('users', [
                'cash'           => ($userdata[0]['cash'] + $money),
                'bullets'        => $new_bullets,
                'xp'             => ($userdata[0]['xp'] + $xpgain),
                'breakoutpoints' => ($userdata[0]['breakoutpoints'] + $bp),
            ]);
            $userdata[0]['cash']           += $money;
            $userdata[0]['bullets']         = $new_bullets;
            $userdata[0]['xp']             += $xpgain;
            $userdata[0]['breakoutpoints'] += $bp;
            $bullets = $new_bullets;
            $success[] = "Du hast den Pharao besiegt! 👑 Beute: € " . number($money) . ", "
                . $bp . " Ausbruchspunkte und " . number($xpgain) . " XP.";
        } else {
            $db->where(['id' => $userdata[0]['id']])->update('users', ['bullets' => $new_bullets]);
            $userdata[0]['bullets'] = $new_bullets;
            $bullets = $new_bullets;
            $errors[] = "Der Pharao war zu stark – du musst dich zurückziehen. 💨";
        }

        $next = timetodate(time() + $fa_cooldown);
        if (isset($timer[0]['time'])) {
            $db->where(['activity' => 'farao', 'username' => $userdata[0]['username']])
               ->update('timers', ['time' => $next]);
        } else {
            $db->insert('timers', ['activity' => 'farao', 'username' => $userdata[0]['username'], 'time' => $next]);
        }
    }
}
