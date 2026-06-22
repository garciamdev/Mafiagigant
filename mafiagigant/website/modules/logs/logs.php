<?php
/**
 * Protokolle (Logs) – zeigt die letzten Ereignisse des Spielers.
 * Tabelle: logs (Migration: core/migrations/logs.sql)
 */
if (!isset($_SESSION['suid']) || $_SESSION['suid'] == '') {
    header("Location: " . BASE_URL . "login/");
    exit();
}

$me = $userdata[0]['username'];

$logs_ready = false;
$db->query("SHOW TABLES LIKE 'logs'")->fetch();
if ($db->affected_rows > 0) { $logs_ready = true; }

$log_entries = [];

if ($logs_ready) {

    // Protokoll leeren
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['clearlogs'])) {
        $db->query("DELETE FROM logs WHERE username = '" . $db->escape($me) . "'")->execute();
        $success[] = "Protokoll geleert.";
    }

    $q = $db->query("SELECT * FROM logs WHERE username = '" . $db->escape($me) . "' ORDER BY created_at DESC, id DESC LIMIT 100");
    $f = $db->fetch($q);
    foreach (($f ? $f : []) as $row) {
        $log_entries[] = $row;
    }
}
