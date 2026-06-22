<?php
/**
 * Spenden – sende Bargeld an einen anderen Spieler.
 */
if (!isset($_SESSION['suid']) || $_SESSION['suid'] == '') {
    header("Location: " . BASE_URL . "login/");
    exit();
}

$do_min = 1;
$cash = (int) $userdata[0]['cash'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['donate'])) {

    $target = isset($_POST['target']) ? trim($_POST['target']) : '';
    $amount = isset($_POST['amount']) ? (int) $_POST['amount'] : 0;

    if ($target === '') {
        $errors[] = "Bitte gib einen Empfänger an.";
    } elseif (strcasecmp($target, $userdata[0]['username']) === 0) {
        $errors[] = "Du kannst dir nicht selbst Geld senden.";
    } elseif ($amount < $do_min) {
        $errors[] = "Der Betrag muss mindestens € " . number($do_min) . " sein.";
    } elseif ($amount > $cash) {
        $errors[] = "Du hast nicht genug Bargeld.";
    } else {
        $tq = $db->query("SELECT * FROM users where username = '" . $db->escape($target) . "' ");
        $tf = $db->fetch($tq);
        if ($db->affected_rows != 1) {
            $errors[] = "Spieler „" . htmlspecialchars($target) . "“ wurde nicht gefunden.";
        } else {
            // Überweisung.
            $db->where(['id' => $userdata[0]['id']])->update('users', ['cash' => ($cash - $amount)]);
            $db->where(['id' => $tf[0]['id']])->update('users', ['cash' => ((int) $tf[0]['cash'] + $amount)]);
            $userdata[0]['cash'] = $cash - $amount;
            $cash = $userdata[0]['cash'];
            $success[] = "Du hast € " . number($amount) . " an „" . htmlspecialchars($target) . "“ gesendet. 💸";
            addlog($userdata[0]['username'], 'money', 'Du hast € ' . number($amount) . ' an „' . $tf[0]['username'] . '" gesendet.');
            addlog($tf[0]['username'], 'money', 'Du hast € ' . number($amount) . ' von „' . $userdata[0]['username'] . '" erhalten.');
        }
    }
}
