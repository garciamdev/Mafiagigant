<?php
/**
 * Gericht – Kaution: kaufe dich aus dem Gefängnis frei.
 * Kosten skalieren mit der verbleibenden Haftzeit (10.000 € je angefangene Minute).
 */
if (!isset($_SESSION['suid']) || $_SESSION['suid'] == '') {
    header("Location: " . BASE_URL . "login/");
    exit();
}

$me   = $userdata[0]['username'];
$cash = (int) $userdata[0]['cash'];
$now  = date("Y-m-d H:i:s");

$court_left = 0;
$jt = $db->query("SELECT * FROM timers WHERE activity = 'jail' AND username = '" . $db->escape($me) . "' LIMIT 1")->fetch();
if ($db->affected_rows == 1 && $jt[0]['time'] > $now) {
    $court_left = datetotime($jt[0]['time']) - time();
}

$court_cost = $court_left > 0 ? (int) ceil($court_left / 60) * 10000 : 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['bail'])) {
    if ($court_left <= 0) {
        $errors[] = "Du bist gar nicht im Gefängnis.";
    } elseif ($cash < $court_cost) {
        $errors[] = "Du brauchst € " . number($court_cost) . " für die Kaution.";
    } else {
        // Geld abziehen + Haft beenden
        $db->where(['id' => $userdata[0]['id']])->update('users', ['cash' => ($cash - $court_cost)]);
        $db->query("DELETE FROM timers WHERE activity = 'jail' AND username = '" . $db->escape($me) . "'")->execute();
        $userdata[0]['cash'] = $cash - $court_cost;
        $cash = $userdata[0]['cash'];
        if (function_exists('addlog')) {
            addlog($me, 'info', 'Du hast dich für € ' . number($court_cost) . ' aus dem Gefängnis freigekauft.');
        }
        $success[] = "Kaution bezahlt – du bist frei! ⚖️";
        $court_left = 0;
        $court_cost = 0;
    }
}
