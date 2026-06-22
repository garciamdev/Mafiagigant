<?php
/**
 * Russisches Roulette – Risiko/Belohnung.
 * Trommel mit 6 Kammern, du wählst die Anzahl Kugeln (1-5).
 * Überlebst du, zahlt es ~5% unter fairer Quote (Hausvorteil). Sonst verlierst du den Einsatz.
 */
if (!isset($_SESSION['suid']) || $_SESSION['suid'] == '') {
    header("Location: " . BASE_URL . "login/");
    exit();
}

$rr_min = 100;
$rr_max = 300000;
$rr_outcome = null;   // 'survive' | 'dead' (für View)
$rr_bullets = null;
$cash = (int) $userdata[0]['cash'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pull'])) {

    $amount  = isset($_POST['amount'])  ? (int) $_POST['amount']  : 0;
    $bullets = isset($_POST['bullets']) ? (int) $_POST['bullets'] : 0;

    if ($bullets < 1 || $bullets > 5) {
        $errors[] = "Wähle zwischen 1 und 5 Kugeln.";
    } elseif ($amount < $rr_min) {
        $errors[] = "Mindesteinsatz ist € " . number($rr_min) . ".";
    } elseif ($amount > $rr_max) {
        $errors[] = "Höchsteinsatz ist € " . number($rr_max) . ".";
    } elseif ($amount > $cash) {
        $errors[] = "Du hast nicht genug Bargeld für diesen Einsatz.";
    } else {
        // Trommel drehen: 6 Kammern, $bullets davon geladen.
        $chamber = rand(1, 6);
        $survived = ($chamber > $bullets); // Kammern 1..bullets sind tödlich

        $newcash = $cash - $amount;
        if ($survived) {
            $rr_outcome = 'survive';
            $mult = 0.95 * (6 / (6 - $bullets));        // ~5% Hausvorteil
            $payout = (int) round($amount * $mult);
            $newcash += $payout;
            $success[] = "*klick* – die Kammer war leer! Du überlebst und gewinnst € "
                . number($payout - $amount) . " (" . round($mult, 2) . "×). 😮‍💨";
        } else {
            $rr_outcome = 'dead';
            $errors[] = "*BANG* – erwischt! Du verlierst € " . number($amount) . ". 💀";
        }

        $db->where(['id' => $userdata[0]['id']])->update('users', ['cash' => $newcash]);
        $userdata[0]['cash'] = $newcash;
        $cash = $newcash;
    }
}
