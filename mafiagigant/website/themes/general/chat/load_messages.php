<?php
/**
 * Laedt die letzten Chat-Nachrichten als JSON.
 * Modernisiert: sicher (XSS-frei), utf8mb4, sauberes JSON statt HTML-Klumpen.
 */
session_start();
header('Content-Type: application/json; charset=utf-8');

if (!isset($_SESSION['suid']) || $_SESSION['suid'] === '') {
    echo json_encode([]);
    exit;
}

require_once __DIR__ . '/config.php';

// Limit (8 = Mini-Chat, 35 = grosser Chat). Sicher begrenzen.
$limit = isset($_GET['limit']) ? (int) $_GET['limit'] : 8;
if ($limit < 1)  { $limit = 8;  }
if ($limit > 50) { $limit = 50; }

$messages = [];

$stmt = mysqli_prepare(
    $conn,
    'SELECT username, message, created_at
       FROM shoutouts
      ORDER BY created_at DESC, id DESC
      LIMIT ?'
);
mysqli_stmt_bind_param($stmt, 'i', $limit);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

while ($row = mysqli_fetch_assoc($result)) {
    $messages[] = [
        'username' => $row['username'],
        'message'  => $row['message'],
        'time'     => date('H:i', strtotime($row['created_at'])),
        'date'     => date('d.m.Y', strtotime($row['created_at'])),
    ];
}

mysqli_stmt_close($stmt);
mysqli_close($conn);

// Aelteste zuerst, damit der Verlauf von oben nach unten lesbar ist.
$messages = array_reverse($messages);

echo json_encode($messages, JSON_UNESCAPED_UNICODE);
