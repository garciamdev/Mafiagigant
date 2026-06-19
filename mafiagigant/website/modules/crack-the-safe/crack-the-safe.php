<?php
/**
 * Knacke den Tresor – rate einen 3-stelligen Code (000-999).
 * 3 richtige Stellen = 400x, 2 = 10x, 1 = 1x (Einsatz zurück), 0 = verloren.
 */
if (!isset($_SESSION['suid']) || $_SESSION['suid'] == '') {
    header("Location: " . BASE_URL . "login/");
    exit();
}

$cts_min = 100;
$cts_max = 200000;
$cts_code = null;    // tatsächlicher Code (für View)
$cts_pick = null;
$cash = (int) $userdata[0]['cash'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['crack'])) {

    $amount = isset($_POST['amount']) ? (int) $_POST['amount'] : 0;
    $d1 = isset($_POST['d1']) ? (int) $_POST['d1'] : -1;
    $d2 = isset($_POST['d2']) ? (int) $_POST['d2'] : -1;
    $d3 = isset($_POST['d3']) ? (int) $_POST['d3'] : -1;
    $cts_pick = [$d1, $d2, $d3];

    if ($d1 < 0 || $d1 > 9 || $d2 < 0 || $d2 > 9 || $d3 < 0 || $d3 > 9) {
        $errors[] = "Bitte gib drei Ziffern (je 0–9) ein.";
    } elseif ($amount < $cts_min) {
        $errors[] = "Mindesteinsatz ist € " . number($cts_min) . ".";
    } elseif ($amount > $cts_max) {
        $errors[] = "Höchsteinsatz ist € " . number($cts_max) . ".";
    } elseif ($amount > $cash) {
        $errors[] = "Du hast nicht genug Bargeld für diesen Einsatz.";
    } else {
        $cts_code = [rand(0, 9), rand(0, 9), rand(0, 9)];
        $hits = 0;
        for ($i = 0; $i < 3; $i++) {
            if ($cts_pick[$i] === $cts_code[$i]) { $hits++; }
        }

        $mult = [0 => 0, 1 => 1, 2 => 10, 3 => 400][$hits];
        $newcash = $cash - $amount;
        $payout = $amount * $mult;
        $newcash += $payout;

        $codestr = implode('-', $cts_code);
        if ($hits === 3) {
            $success[] = "TRESOR GEKNACKT! Code <b>" . $codestr . "</b> – du gewinnst € "
                . number($payout - $amount) . "! 💰🎉";
        } elseif ($hits === 2) {
            $success[] = "Zwei Stellen richtig (Code war <b>" . $codestr . "</b>) – Gewinn € "
                . number($payout - $amount) . "!";
        } elseif ($hits === 1) {
            $success[] = "Eine Stelle richtig (Code war <b>" . $codestr . "</b>) – Einsatz zurück.";
        } else {
            $errors[] = "Daneben! Code war <b>" . $codestr . "</b>. Du verlierst € " . number($amount) . ". 💀";
        }

        $db->where(['id' => $userdata[0]['id']])->update('users', ['cash' => $newcash]);
        $userdata[0]['cash'] = $newcash;
        $cash = $newcash;
    }
}
