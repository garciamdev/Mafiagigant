<?php
/**
 * Credit-Lotterie – Einsatz in Credits, gewichteter Multiplikator (Hausvorteil).
 */
if (!isset($_SESSION['suid']) || $_SESSION['suid'] == '') {
    header("Location: " . BASE_URL . "login/");
    exit();
}

// Multiplikator (inkl. Einsatz) => Gewicht. EV ~0.94.
$cl_prizes = [0 => 700, 1 => 150, 2 => 90, 5 => 40, 20 => 10, 100 => 2];

$cl_min = 1;
$cl_max = 100;
$cl_result = null;
$credits = (int) $userdata[0]['credits'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['play'])) {

    $amount = isset($_POST['amount']) ? (int) $_POST['amount'] : 0;

    if ($amount < $cl_min) {
        $errors[] = "Mindesteinsatz ist " . number($cl_min) . " Credit.";
    } elseif ($amount > $cl_max) {
        $errors[] = "Höchsteinsatz ist " . number($cl_max) . " Credits.";
    } elseif ($amount > $credits) {
        $errors[] = "Du hast nicht genug Credits.";
    } else {
        $total = array_sum($cl_prizes);
        $r = rand(1, $total);
        $acc = 0;
        foreach ($cl_prizes as $mult => $w) {
            $acc += $w;
            if ($r <= $acc) { $cl_result = $mult; break; }
        }

        $new_credits = $credits - $amount + ($amount * $cl_result);

        if ($cl_result === 0) {
            $errors[] = "Niete! Du verlierst " . number($amount) . " Credits. 💀";
        } elseif ($cl_result === 1) {
            $success[] = "Einsatz zurück (" . number($amount) . " Credits).";
        } else {
            $success[] = "Gewinn! <b>" . $cl_result . "&times;</b> – du gewinnst "
                . number($amount * $cl_result - $amount) . " Credits! 🎉";
        }

        $db->where(['id' => $userdata[0]['id']])->update('users', ['credits' => $new_credits]);
        $userdata[0]['credits'] = $new_credits;
        $credits = $new_credits;
    }
}
