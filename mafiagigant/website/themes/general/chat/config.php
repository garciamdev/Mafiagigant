<?php
// Chat-DB-Verbindung – nutzt die ZENTRALE Konfiguration (config/db.config.php),
// damit sie lokal (Laragon) UND auf dem Live-/Test-Server funktioniert.
require_once __DIR__ . '/../../../config/db.config.php';

// Zeitzone setzen (sonst zeigt der Chat die UTC-Serverzeit, z.B. -2 Std).
date_default_timezone_set('Europe/Berlin');

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (!$conn) {
    http_response_code(500);
    die('Connection failed');
}

// Charset auf utf8mb4 (Umlaute + Emojis).
mysqli_set_charset($conn, 'utf8mb4');

// MySQL-Sitzung auf die gleiche Zeitzone wie PHP stellen (DST-sicher),
// damit Zeitstempel (created_at) korrekt angezeigt werden.
mysqli_query($conn, "SET time_zone = '" . date('P') . "'");
