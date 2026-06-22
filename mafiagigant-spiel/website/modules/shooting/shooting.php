<?php
/**
 * Schießtraining – verbrauche Kugeln, steigere deine Angriffskraft (att_power).
 * Cooldown über die timers-Tabelle.
 */
if (!isset($_SESSION['suid']) || $_SESSION['suid'] == '') {
    header("Location: " . BASE_URL . "login/");
    exit();
}

$sh_cost = 10;       // Kugeln pro Training
$sh_cooldown = 300;  // 5 Minuten

$bullets   = (int) $userdata[0]['bullets'];
$att_power = (int) $userdata[0]['att_power'];
$sh_gain = null;

// Laufender Cooldown?
$q = "SELECT * FROM timers where activity = 'shooting' and username = '" . $db->escape($userdata[0]['username']) . "'";
$timer = $db->query($q)->fetch();
$now = date("Y-m-d H:i:s");
$wait = 0;
if (isset($timer[0]['time']) && $timer[0]['time'] >= $now) {
    $wait = datetotime($timer[0]['time']) - time();
    $count_timer = '<font id="count_timer"></font>';
    $errors[] = "Du musst noch " . $count_timer . " warten, bevor du wieder trainieren kannst!";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['shoot']) && empty($errors)) {

    if ($bullets < $sh_cost) {
        $errors[] = "Du brauchst mindestens " . number($sh_cost) . " Kugeln zum Trainieren.";
    } else {
        // Treffer simulieren: 5 Schuss, Genauigkeit zufällig.
        $hits = rand(2, 5);
        $sh_gain = $hits * rand(2, 4);   // att_power-Zuwachs

        $new_bullets = $bullets - $sh_cost;
        $new_att = $att_power + $sh_gain;

        $db->where(['id' => $userdata[0]['id']])
           ->update('users', ['bullets' => $new_bullets, 'att_power' => $new_att]);
        $userdata[0]['bullets']   = $new_bullets;
        $userdata[0]['att_power'] = $new_att;
        $bullets = $new_bullets;
        $att_power = $new_att;

        // Cooldown setzen.
        $next = timetodate(time() + $sh_cooldown);
        if (isset($timer[0]['time'])) {
            $db->where(['activity' => 'shooting', 'username' => $userdata[0]['username']])
               ->update('timers', ['time' => $next]);
        } else {
            $db->insert('timers', ['activity' => 'shooting', 'username' => $userdata[0]['username'], 'time' => $next]);
        }

        $success[] = $hits . " von 5 Treffern! Deine Angriffskraft steigt um <b>" . number($sh_gain) . "</b>. 🎯";
    }
}
