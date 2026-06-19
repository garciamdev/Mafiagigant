<?php
/**
 * Credits kaufen – tausche Bargeld gegen Credits.
 */
if (!isset($_SESSION['suid']) || $_SESSION['suid'] == '') {
    header("Location: " . BASE_URL . "login/");
    exit();
}

$cc_rate = 100000; // € pro 1 Credit
$cash    = (int) $userdata[0]['cash'];
$credits = (int) $userdata[0]['credits'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['buy'])) {
    $amount = isset($_POST['amount']) ? (int) $_POST['amount'] : 0;
    $cost = $amount * $cc_rate;

    if ($amount < 1) {
        $errors[] = "Bitte gib an, wie viele Credits du kaufen möchtest.";
    } elseif ($cost > $cash) {
        $errors[] = "Du brauchst € " . number($cost) . " für " . number($amount) . " Credits.";
    } else {
        $db->where(['id' => $userdata[0]['id']])->update('users', [
            'cash'    => ($cash - $cost),
            'credits' => ($credits + $amount),
        ]);
        $userdata[0]['cash']    = $cash - $cost;
        $userdata[0]['credits'] = $credits + $amount;
        $cash = $userdata[0]['cash'];
        $credits = $userdata[0]['credits'];
        $success[] = "Du hast " . number($amount) . " Credits für € " . number($cost) . " gekauft. ✅";
    }
}
