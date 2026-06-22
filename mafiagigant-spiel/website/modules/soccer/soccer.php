<?php
/**
 * Sportwetten (Fußball) – wette auf Heimsieg / Unentschieden / Auswärtssieg.
 */
if (!isset($_SESSION['suid']) || $_SESSION['suid'] == '') {
    header("Location: " . BASE_URL . "login/");
    exit();
}

// Ausgang => Quote.
$so_odds = ['home' => 2.1, 'draw' => 3.3, 'away' => 3.4];
$so_labels = ['home' => 'Heimsieg', 'draw' => 'Unentschieden', 'away' => 'Auswärtssieg'];

$so_min = 100;
$so_max = 500000;
$so_result = null;   // tatsächlicher Ausgang (für View)
$so_pick = null;
$cash = (int) $userdata[0]['cash'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['bettype'])) {

    $amount = isset($_POST['amount']) ? (int) $_POST['amount'] : 0;
    $so_pick = $_POST['bettype'];

    if (!array_key_exists($so_pick, $so_odds)) {
        $errors[] = "Bitte wähle einen Tipp.";
    } elseif ($amount < $so_min) {
        $errors[] = "Mindesteinsatz ist € " . number($so_min) . ".";
    } elseif ($amount > $so_max) {
        $errors[] = "Höchsteinsatz ist € " . number($so_max) . ".";
    } elseif ($amount > $cash) {
        $errors[] = "Du hast nicht genug Bargeld für diesen Einsatz.";
    } else {
        // Ausgang gewichtet nach impliziter Wahrscheinlichkeit (1/Quote).
        $weights = [];
        $total = 0;
        foreach ($so_odds as $k => $odds) {
            $w = (int) round(10000 / $odds);
            $weights[$k] = $w;
            $total += $w;
        }
        $r = rand(1, $total);
        $acc = 0;
        foreach ($weights as $k => $w) {
            $acc += $w;
            if ($r <= $acc) { $so_result = $k; break; }
        }

        // Zufälliges Ergebnis passend zum Ausgang erzeugen (Optik).
        $hg = rand(0, 4); $ag = rand(0, 4);
        if ($so_result === 'home' && $hg <= $ag) { $hg = $ag + 1; }
        if ($so_result === 'away' && $ag <= $hg) { $ag = $hg + 1; }
        if ($so_result === 'draw') { $ag = $hg; }
        $so_score = $hg . ':' . $ag;

        $newcash = $cash - $amount;
        if ($so_result === $so_pick) {
            $payout = (int) round($amount * $so_odds[$so_pick]);
            $newcash += $payout;
            $success[] = "Endstand <b>" . $so_score . "</b> (" . $so_labels[$so_result] . "). Du gewinnst € "
                . number($payout - $amount) . "! ⚽🎉";
        } else {
            $errors[] = "Endstand <b>" . $so_score . "</b> (" . $so_labels[$so_result] . "). Tipp daneben – € "
                . number($amount) . " weg. 💀";
        }

        $db->where(['id' => $userdata[0]['id']])->update('users', ['cash' => $newcash]);
        $userdata[0]['cash'] = $newcash;
        $cash = $newcash;
    }
}
