<?php
/**
 * Rubbellose – Einsatz kaufen, Multiplikator aufdecken (gewichtet, Hausvorteil).
 */
if (!isset($_SESSION['suid']) || $_SESSION['suid'] == '') {
    header("Location: " . BASE_URL . "login/");
    exit();
}

// Multiplikator (Auszahlung inkl. Einsatz) => Gewicht. EV ~0.94.
$sc_prizes = [0 => 700, 1 => 150, 2 => 90, 5 => 40, 20 => 10, 100 => 2];

$sc_min = 100;
$sc_max = 250000;
$sc_result = null;   // aufgedeckter Multiplikator (für View)
$cash = (int) $userdata[0]['cash'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['scratch'])) {

    $amount = isset($_POST['amount']) ? (int) $_POST['amount'] : 0;

    if ($amount < $sc_min) {
        $errors[] = "Mindesteinsatz ist € " . number($sc_min) . ".";
    } elseif ($amount > $sc_max) {
        $errors[] = "Höchsteinsatz ist € " . number($sc_max) . ".";
    } elseif ($amount > $cash) {
        $errors[] = "Du hast nicht genug Bargeld für ein Los in dieser Höhe.";
    } else {
        // Gewichtete Ziehung.
        $total = array_sum($sc_prizes);
        $r = rand(1, $total);
        $acc = 0;
        foreach ($sc_prizes as $mult => $w) {
            $acc += $w;
            if ($r <= $acc) { $sc_result = $mult; break; }
        }

        $newcash = $cash - $amount;
        $payout = $amount * $sc_result;
        $newcash += $payout;

        if ($sc_result === 0) {
            $errors[] = "Leider eine Niete. Du verlierst € " . number($amount) . ". 💀";
        } elseif ($sc_result === 1) {
            $success[] = "Du bekommst deinen Einsatz zurück (€ " . number($amount) . ").";
        } else {
            $success[] = "Gewinn! <b>" . $sc_result . "&times;</b> – du gewinnst € "
                . number($payout - $amount) . "! 🎉";
        }

        $db->where(['id' => $userdata[0]['id']])->update('users', ['cash' => $newcash]);
        $userdata[0]['cash'] = $newcash;
        $cash = $newcash;
    }
}
