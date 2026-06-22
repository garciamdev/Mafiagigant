<?php
/**
 * Notizblock – persönliche Notizen pro Spieler (Spalte users.notepad).
 * Migration: core/migrations/notepad.sql
 */
if (!isset($_SESSION['suid']) || $_SESSION['suid'] == '') {
    header("Location: " . BASE_URL . "login/");
    exit();
}

// Spalte vorhanden?
$notepad_ready = false;
$col = $db->query("SHOW COLUMNS FROM users LIKE 'notepad'")->fetch();
if ($db->affected_rows > 0) { $notepad_ready = true; }

$notepad_text = $notepad_ready ? ($userdata[0]['notepad'] ?? '') : '';

if ($notepad_ready && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save_note'])) {
    $note = isset($_POST['note']) ? trim($_POST['note']) : '';
    if (mb_strlen($note) > 5000) { $note = mb_substr($note, 0, 5000); }
    $db->where(['id' => $userdata[0]['id']])->update('users', ['notepad' => $note]);
    $userdata[0]['notepad'] = $note;
    $notepad_text = $note;
    $success[] = "Notizen gespeichert. ✅";
}
