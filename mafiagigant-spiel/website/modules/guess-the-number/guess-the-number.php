<?php
/**
 * Zahlenraten – rate eine Zahl von 1-10. Exakter Treffer zahlt 8x.
 */
if (!isset($_SESSION['suid']) || $_SESSION['suid'] == '') {
    header("Location: " . BASE_URL . "login/");
    exit();
}

$gtn_min = 100;
$gtn_max = 500000;
$gtn_drawn = null;   // gezogene Zahl (für View)
$gtn_pick  = null;
$cash = (int) $userdata[0]['cash'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['guess'])) {

    $amount = isset($_POST['amount']) ? (int) $_POST['amount'] : 0;
    $gtn_pick = isset($_POST['pick']) ? (int) $_POST['pick'] : 0;

    if ($gtn_pick < 1 || $gtn_pick > 10) {
        $errors[] = "Bitte wähle eine Zahl zwischen 1 und 10.";
    } elseif ($amount < $gtn_min) {
        $errors[] = "Mindesteinsatz ist € " . number($gtn_min) . ".";
    } elseif ($amount > $gtn_max) {
        $errors[] = "Höchsteinsatz ist € " . number($gtn_max) . ".";
    } elseif ($amount > $cash) {
        $errors[] = "Du hast nicht genug Bargeld für diesen Einsatz.";
    } else {
        $gtn_drawn = rand(1, 10);
        $newcash = $cash - $amount;
        if ($gtn_drawn === $gtn_pick) {
            $payout = $amount * 8;
            $newcash += $payout;
            $success[] = "Die Zahl war <b>" . $gtn_drawn . "</b> – Volltreffer! Du gewinnst € "
                . number($payout - $amount) . "! 🎉";
        } else {
            $errors[] = "Die Zahl war <b>" . $gtn_drawn . "</b>. Du verlierst € " . number($amount) . ". 💀";
        }
        $db->where(['id' => $userdata[0]['id']])->update('users', ['cash' => $newcash]);
        $userdata[0]['cash'] = $newcash;
        $cash = $newcash;
    }
}
