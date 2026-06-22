<?php
// Chat-DB-Verbindung – nutzt die ZENTRALE Konfiguration (config/db.config.php),
// damit sie lokal (Laragon) UND auf dem Live-Server funktioniert und es keine
// doppelten/veralteten Zugangsdaten mehr gibt.
require_once __DIR__ . '/../../../config/db.config.php';

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (!$conn) {
    http_response_code(500);
    die('Connection failed');
}

// Charset auf utf8mb4 (Umlaute + Emojis).
mysqli_set_charset($conn, 'utf8mb4');
