<?php
/**
 * Präsident – der Spieler mit der höchsten Gesamtstärke ist automatisch Präsident.
 * Zeigt den amtierenden Präsidenten + die Top-10-Machtrangliste (nur Anzeige).
 */
if (!isset($_SESSION['suid']) || $_SESSION['suid'] == '') {
    header("Location: " . BASE_URL . "login/");
    exit();
}

$pres_top = [];
$pq = $db->query("SELECT username, att_power, deff_power, `rank`
                    FROM users
                   WHERE authority != 'admin'
                   ORDER BY (att_power + deff_power) DESC, id ASC
                   LIMIT 10");
$pf = $db->fetch($pq);
foreach (($pf ? $pf : []) as $row) { $pres_top[] = $row; }

$president = isset($pres_top[0]) ? $pres_top[0] : null;
