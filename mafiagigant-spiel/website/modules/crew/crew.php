<?php
/**
 * Crew – Übersicht des Spiel-Teams (Accounts mit authority = 'admin').
 */
if (!isset($_SESSION['suid']) || $_SESSION['suid'] == '') {
    header("Location: " . BASE_URL . "login/");
    exit();
}

$crew_members = [];
$cq = $db->query("SELECT username, gender, `rank` FROM users WHERE authority = 'admin' ORDER BY username ASC");
$cf = $db->fetch($cq);
foreach (($cf ? $cf : []) as $row) {
    $crew_members[] = $row;
}
