<?php
/**
 * Gruppenüberfall – heuere eine Crew an (1-5 Komplizen).
 * Mehr Komplizen = höhere Kosten, aber höhere Erfolgschance und Beute.
 */
if (!isset($_SESSION['suid']) || $_SESSION['suid'] == '') {
    header("Location: " . BASE_URL . "login/");
    exit();
}

$gr_hire_cost   = 20000;  // € pro Komplize
$gr_hire_bullets = 10;    // Kugeln pro Komplize
$gr_cooldown    = 1200;   // 20 Minuten
$gr_jailtime    = 600;    // 10 Minuten

$cash      = (int) $userdata[0]['cash'];
$bullets   = (int) $userdata[0]['bullets'];
$att_power = (int) $userdata[0]['att_power'];

$q = "SELECT * FROM timers where activity = 'grouprobbery' and username = '" . $db->escape($userdata[0]['username']) . "'";
$timer = $db->query($q)->fetch();
$now = date("Y-m-d H:i:s");
$wait = 0;
if (isset($timer[0]['time']) && $timer[0]['time'] >= $now) {
    $wait = datetotime($timer[0]['time']) - time();
    $errors[] = "Deine Crew braucht eine Pause. Warte noch <font id=\"count_timer\"></font>!";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['rob']) && empty($errors)) {

    $crew = isset($_POST['crew']) ? (int) $_POST['crew'] : 0;

    if ($crew < 1 || $crew > 5) {
        $errors[] = "Wähle zwischen 1 und 5 Komplizen.";
    } else {
        $cost_money = $crew * $gr_hire_cost;
        $cost_bull  = $crew * $gr_hire_bullets;

        if ($cash < $cost_money) {
            $errors[] = "Du brauchst € " . number($cost_money) . ", um " . $crew . " Komplizen anzuheuern.";
        } elseif ($bullets < $cost_bull) {
            $errors[] = "Du brauchst " . number($cost_bull) . " Kugeln für deine Crew.";
        } else {
            // Kosten bezahlen.
            $cash -= $cost_money;
            $bullets -= $cost_bull;

            $chance = min(90, 35 + $crew * 8 + (int) floor($att_power / 30));

            if (rand(1, 100) <= $chance) {
                $loot = 0;
                for ($i = 0; $i < $crew; $i++) { $loot += rand(30000, 80000); }
                $xpgain = rand(40, 120);
                $cash += $loot;
                $db->where(['id' => $userdata[0]['id']])->update('users', [
                    'cash'    => $cash,
                    'bullets' => $bullets,
                    'xp'      => ($userdata[0]['xp'] + $xpgain),
                ]);
                $userdata[0]['cash']    = $cash;
                $userdata[0]['bullets'] = $bullets;
                $userdata[0]['xp']     += $xpgain;
                $success[] = "Überfall geglückt! 💰 Beute (nach Crew-Kosten): € "
                    . number($loot - $cost_money) . " netto und " . number($xpgain) . " XP.";
            } else {
                $db->where(['id' => $userdata[0]['id']])->update('users', [
                    'cash' => $cash, 'bullets' => $bullets,
                ]);
                $userdata[0]['cash']    = $cash;
                $userdata[0]['bullets'] = $bullets;
                if (rand(1, 100) <= 40) {
                    jail($userdata[0]['username'], $gr_jailtime);
                    $errors[] = "Der Überfall ging schief – die Crew wird geschnappt, du landest im Gefängnis! 🚔";
                } else {
                    $errors[] = "Der Überfall ist gescheitert. Die Crew-Kosten sind futsch. 💨";
                }
            }

            $next = timetodate(time() + $gr_cooldown);
            if (isset($timer[0]['time'])) {
                $db->where(['activity' => 'grouprobbery', 'username' => $userdata[0]['username']])
                   ->update('timers', ['time' => $next]);
            } else {
                $db->insert('timers', ['activity' => 'grouprobbery', 'username' => $userdata[0]['username'], 'time' => $next]);
            }
        }
    }
}
