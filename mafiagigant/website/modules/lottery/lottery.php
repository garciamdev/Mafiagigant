<?php
/**
 * Lotterie – wähle 4 Zahlen aus 1-25, Sofortziehung von 4 Zahlen.
 * 4 Treffer = 1000x, 3 = 30x, 2 = 2x, sonst verloren.
 */
if (!isset($_SESSION['suid']) || $_SESSION['suid'] == '') {
    header("Location: " . BASE_URL . "login/");
    exit();
}

$lo_min = 100;
$lo_max = 100000;
$lo_drawn = null;   // gezogene Zahlen (für View)
$lo_pick = null;
$lo_payouts = [0 => 0, 1 => 0, 2 => 2, 3 => 30, 4 => 1000];
$cash = (int) $userdata[0]['cash'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['play'])) {

    $amount = isset($_POST['amount']) ? (int) $_POST['amount'] : 0;
    $picks = [];
    for ($i = 1; $i <= 4; $i++) {
        $picks[] = isset($_POST['n' . $i]) ? (int) $_POST['n' . $i] : 0;
    }
    $lo_pick = $picks;

    $valid = true;
    foreach ($picks as $p) { if ($p < 1 || $p > 25) { $valid = false; } }
    if (count(array_unique($picks)) !== 4) { $valid = false; }

    if (!$valid) {
        $errors[] = "Bitte wähle 4 verschiedene Zahlen zwischen 1 und 25.";
    } elseif ($amount < $lo_min) {
        $errors[] = "Mindesteinsatz ist € " . number($lo_min) . ".";
    } elseif ($amount > $lo_max) {
        $errors[] = "Höchsteinsatz ist € " . number($lo_max) . ".";
    } elseif ($amount > $cash) {
        $errors[] = "Du hast nicht genug Bargeld für diesen Einsatz.";
    } else {
        // 4 eindeutige Zahlen ziehen.
        $pool = range(1, 25);
        shuffle($pool);
        $lo_drawn = array_slice($pool, 0, 4);
        sort($lo_drawn);

        $hits = count(array_intersect($picks, $lo_drawn));
        $mult = $lo_payouts[$hits];
        $newcash = $cash - $amount;
        $payout = $amount * $mult;
        $newcash += $payout;

        $drawnstr = implode(' · ', $lo_drawn);
        if ($mult > 0) {
            $success[] = "Ziehung: <b>" . $drawnstr . "</b> &ndash; " . $hits . " Treffer! Gewinn € "
                . number($payout - $amount) . " (" . $mult . "×)! 🎉";
        } else {
            $errors[] = "Ziehung: <b>" . $drawnstr . "</b> &ndash; nur " . $hits
                . " Treffer. Du verlierst € " . number($amount) . ". 💀";
        }

        $db->where(['id' => $userdata[0]['id']])->update('users', ['cash' => $newcash]);
        $userdata[0]['cash'] = $newcash;
        $cash = $newcash;
    }
}
