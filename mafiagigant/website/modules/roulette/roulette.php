<?php
/**
 * Roulette (europäisch, ein Null-Feld) – komplettes Casino-Modul.
 * Einsatz aus Cash. Standard-Auszahlungen.
 */

if (!isset($_SESSION['suid']) || $_SESSION['suid'] == '') {
    header("Location: " . BASE_URL . "login/");
    exit();
}

// Rote Zahlen beim europäischen Roulette.
$roulette_red = [1,3,5,7,9,12,14,16,18,19,21,23,25,27,30,32,34,36];

function roulette_color($n, $reds)
{
    if ($n === 0) { return 'green'; }
    return in_array($n, $reds) ? 'red' : 'black';
}

// Auszahlungs-Multiplikatoren (inkl. Einsatz). 2 = gerade Chance, 3 = Dutzend, 36 = volle Zahl.
$roulette_payouts = [
    'red'    => 2, 'black'  => 2,
    'even'   => 2, 'odd'    => 2,
    'low'    => 2, 'high'   => 2,
    'dozen1' => 3, 'dozen2' => 3, 'dozen3' => 3,
    'number' => 36,
];

// Ergebnis-Variablen für die View.
$roulette_number = null;
$roulette_wincolor = null;
$roulette_min = 100;
$roulette_max = 1000000;
$cash = (int) $userdata[0]['cash'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['bettype'])) {

    $bettype = $_POST['bettype'];
    $amount  = isset($_POST['amount']) ? (int) $_POST['amount'] : 0;
    $picknum = isset($_POST['number']) ? (int) $_POST['number'] : -1;

    if (!array_key_exists($bettype, $roulette_payouts)) {
        $errors[] = "Ungültige Wettart.";
    } elseif ($amount < $roulette_min) {
        $errors[] = "Mindesteinsatz ist € " . number($roulette_min) . ".";
    } elseif ($amount > $roulette_max) {
        $errors[] = "Höchsteinsatz ist € " . number($roulette_max) . ".";
    } elseif ($amount > $cash) {
        $errors[] = "Du hast nicht genug Bargeld für diesen Einsatz.";
    } elseif ($bettype === 'number' && ($picknum < 0 || $picknum > 36)) {
        $errors[] = "Bitte wähle eine Zahl zwischen 0 und 36.";
    } else {

        // Drehen!
        $roulette_number = rand(0, 36);
        $roulette_wincolor = roulette_color($roulette_number, $roulette_red);

        // Hat der Spieler gewonnen?
        $win = false;
        switch ($bettype) {
            case 'red':    $win = ($roulette_wincolor === 'red');   break;
            case 'black':  $win = ($roulette_wincolor === 'black'); break;
            case 'even':   $win = ($roulette_number !== 0 && $roulette_number % 2 === 0); break;
            case 'odd':    $win = ($roulette_number % 2 === 1); break;
            case 'low':    $win = ($roulette_number >= 1 && $roulette_number <= 18); break;
            case 'high':   $win = ($roulette_number >= 19 && $roulette_number <= 36); break;
            case 'dozen1': $win = ($roulette_number >= 1 && $roulette_number <= 12); break;
            case 'dozen2': $win = ($roulette_number >= 13 && $roulette_number <= 24); break;
            case 'dozen3': $win = ($roulette_number >= 25 && $roulette_number <= 36); break;
            case 'number': $win = ($roulette_number === $picknum); break;
        }

        // Geld verbuchen: erst Einsatz abziehen, bei Gewinn Auszahlung gutschreiben.
        $newcash = $cash - $amount;
        if ($win) {
            $payout = $amount * $roulette_payouts[$bettype];
            $newcash += $payout;
            $netto = $payout - $amount;
            $success[] = "Die Kugel landet auf <b>" . $roulette_number . "</b> (" .
                ($roulette_wincolor === 'red' ? 'Rot' : ($roulette_wincolor === 'black' ? 'Schwarz' : 'Grün')) .
                "). Du gewinnst € " . number($netto) . "! 🎉";
        } else {
            $errors[] = "Die Kugel landet auf <b>" . $roulette_number . "</b> (" .
                ($roulette_wincolor === 'red' ? 'Rot' : ($roulette_wincolor === 'black' ? 'Schwarz' : 'Grün')) .
                "). Du verlierst € " . number($amount) . ". 💀";
        }

        // In DB und im Speicher aktualisieren (damit Sidebar stimmt).
        $db->where(['id' => $userdata[0]['id']])->update('users', ['cash' => $newcash]);
        $userdata[0]['cash'] = $newcash;
        $cash = $newcash;
    }
}
