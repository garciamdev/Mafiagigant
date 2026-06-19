<?php
/**
 * Speichert eine neue Chat-Nachricht.
 * Modernisiert: Prepared Statements, utf8mb4, Laengen-/Leer-Pruefung,
 * einfacher Flood-Schutz pro Session.
 */
session_start();
header('Content-Type: application/json; charset=utf-8');

if (!isset($_SESSION['suid']) || $_SESSION['suid'] === '') {
    http_response_code(403);
    echo json_encode(['ok' => false, 'error' => 'auth']);
    exit;
}

require_once __DIR__ . '/config.php';

$message = isset($_POST['message']) ? trim($_POST['message']) : '';

// Mehrfach-Whitespace/Zeilenumbrueche zu einem Leerzeichen.
$message = preg_replace('/\s+/u', ' ', $message);

if ($message === '') {
    echo json_encode(['ok' => false, 'error' => 'empty']);
    exit;
}
if (mb_strlen($message) > 200) {
    $message = mb_substr($message, 0, 200);
}

// Einfacher Flood-Schutz: max. 1 Nachricht pro 2 Sekunden.
$now = time();
if (isset($_SESSION['chat_last']) && ($now - $_SESSION['chat_last']) < 2) {
    echo json_encode(['ok' => false, 'error' => 'flood']);
    exit;
}
$_SESSION['chat_last'] = $now;

// Benutzernamen sicher anhand der Session-ID ermitteln.
$suid = (int) $_SESSION['suid'];
$stmt = mysqli_prepare($conn, 'SELECT username FROM users WHERE id = ? LIMIT 1');
mysqli_stmt_bind_param($stmt, 'i', $suid);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($res);
mysqli_stmt_close($stmt);

if (!$user) {
    http_response_code(403);
    echo json_encode(['ok' => false, 'error' => 'auth']);
    exit;
}

$username = $user['username'];

$stmt = mysqli_prepare($conn, 'INSERT INTO shoutouts (username, message) VALUES (?, ?)');
mysqli_stmt_bind_param($stmt, 'ss', $username, $message);
$ok = mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
mysqli_close($conn);

echo json_encode(['ok' => (bool) $ok]);
