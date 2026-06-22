<?php
/**
 * Pferderennen – setze auf eines von 6 Pferden mit festen Quoten.
 * Sieger wird gewichtet nach (impliziter) Siegwahrscheinlichkeit gezogen.
 */
if (!isset($_SESSION['suid']) || $_SESSION['suid'] == '') {
    header("Location: " . BASE_URL . "login/");
    exit();
}

// name => Quote. Gewicht = 1000/Quote (Hausvorteil steckt im Overround).
$hr_horses = [
    'Blitz'       => 1.8,
    'Donner'      => 4.0,
    'Schatten'    => 6.0,
    'Wirbelwind'  => 10.0,
    'Glückspilz'  => 18.0,
    'Außenseiter' => 33.0,
];

$hr_min = 100;
$hr_max = 500000;
$hr_winner = null;   // Name des Siegerpferds (für View)
$hr_pick = null;
$cash = (int) $userdata[0]['cash'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['bet'])) {

    $amount = isset($_POST['amount']) ? (int) $_POST['amount'] : 0;
    $hr_pick = isset($_POST['horse']) ? $_POST['horse'] : '';

    if (!array_key_exists($hr_pick, $hr_horses)) {
        $errors[] = "Bitte wähle ein Pferd.";
    } elseif ($amount < $hr_min) {
        $errors[] = "Mindesteinsatz ist € " . number($hr_min) . ".";
    } elseif ($amount > $hr_max) {
        $errors[] = "Höchsteinsatz ist € " . number($hr_max) . ".";
    } elseif ($amount > $cash) {
        $errors[] = "Du hast nicht genug Bargeld für diesen Einsatz.";
    } else {
        // Gewichtete Ziehung des Siegers.
        $weights = [];
        $total = 0;
        foreach ($hr_horses as $name => $odds) {
            $w = (int) round(1000 / $odds);
            $weights[$name] = $w;
            $total += $w;
        }
        $r = rand(1, $total);
        $acc = 0;
        foreach ($weights as $name => $w) {
            $acc += $w;
            if ($r <= $acc) { $hr_winner = $name; break; }
        }

        $newcash = $cash - $amount;
        if ($hr_winner === $hr_pick) {
            $payout = (int) round($amount * $hr_horses[$hr_pick]);
            $newcash += $payout;
            $success[] = "🏇 <b>" . htmlspecialchars($hr_winner) . "</b> gewinnt das Rennen! Du gewinnst € "
                . number($payout - $amount) . " (" . $hr_horses[$hr_pick] . "×)! 🎉";
        } else {
            $errors[] = "🏇 <b>" . htmlspecialchars($hr_winner) . "</b> gewinnt. Dein Pferd verliert – € "
                . number($amount) . " weg. 💀";
        }

        $db->where(['id' => $userdata[0]['id']])->update('users', ['cash' => $newcash]);
        $userdata[0]['cash'] = $newcash;
        $cash = $newcash;
    }
}
