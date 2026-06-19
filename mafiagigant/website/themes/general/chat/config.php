<?php
// Datenbank-Verbindung fuer den Chat.
// Hinweis: utf8mb4 ist zwingend noetig, damit Umlaute UND Emojis korrekt
// gespeichert und ausgegeben werden.
$db_host = 'localhost';
$db_user = 'mafiagigan-crime';
$db_pass = 'h1Fit9H-r2kV-sU2YmfR9-En78gWre-2Vkal-2j';
$db_name = 'mafiagigan-crime';

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$conn) {
    http_response_code(500);
    die('Connection failed');
}

// Wichtig: Charset auf utf8mb4 setzen (Umlaute + Emojis).
mysqli_set_charset($conn, 'utf8mb4');
