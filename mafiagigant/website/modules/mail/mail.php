<?php
/**
 * Nachrichtensystem (interne Mail). Tabelle: messages (Migration messages.sql).
 * Routen: mail/inbox (Posteingang), mail/compose (Neue Nachricht),
 *         ?read=ID (lesen), ?del=ID (löschen).
 */
if (!isset($_SESSION['suid']) || $_SESSION['suid'] == '') {
    header("Location: " . BASE_URL . "login/");
    exit();
}

$me = $userdata[0]['username'];

// Tabelle vorhanden?
$mail_ready = false;
$mc = $db->query("SHOW TABLES LIKE 'messages'")->fetch();
if ($db->affected_rows > 0) { $mail_ready = true; }

$mail_section = ($var === 'compose') ? 'compose' : 'inbox';
$mail_open = null;          // einzelne geöffnete Nachricht
$mail_list = [];
$mail_unread = 0;
$mail_to_prefill = isset($_GET['to']) ? $_GET['to'] : '';

if ($mail_ready) {

    // --- Senden ---
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['send'])) {
        $to      = isset($_POST['to']) ? trim($_POST['to']) : '';
        $subject = isset($_POST['subject']) ? trim($_POST['subject']) : '';
        $body    = isset($_POST['body']) ? trim($_POST['body']) : '';
        if ($subject === '') { $subject = '(kein Betreff)'; }

        if ($to === '') {
            $errors[] = "Bitte gib einen Empfänger an.";
            $mail_section = 'compose';
        } elseif ($body === '') {
            $errors[] = "Die Nachricht darf nicht leer sein.";
            $mail_section = 'compose';
        } else {
            $tq = $db->query("SELECT username FROM users where username = '" . $db->escape($to) . "' ");
            $tf = $db->fetch($tq);
            if ($db->affected_rows != 1) {
                $errors[] = "Spieler „" . htmlspecialchars($to) . "“ wurde nicht gefunden.";
                $mail_section = 'compose';
            } else {
                $db->insert('messages', [
                    'from_user' => $me,
                    'to_user'   => $tf[0]['username'],
                    'subject'   => mb_substr($subject, 0, 150),
                    'body'      => mb_substr($body, 0, 5000),
                ]);
                $success[] = "Nachricht an „" . htmlspecialchars($tf[0]['username']) . "“ gesendet. ✉️";
                $mail_section = 'inbox';
            }
        }
    }

    // --- Löschen ---
    if (isset($_GET['del'])) {
        $did = (int) $_GET['del'];
        $db->where(['id' => $did, 'to_user' => $me])->update('messages', ['deleted_by_to' => 1]);
        $success[] = "Nachricht gelöscht.";
    }

    // --- Lesen ---
    if (isset($_GET['read'])) {
        $rid = (int) $_GET['read'];
        $db->where(['id' => $rid, 'to_user' => $me])->update('messages', ['is_read' => 1]);
        $oq = $db->query("SELECT * FROM messages where id = '" . (int) $rid . "' and to_user = '" . $db->escape($me) . "' and deleted_by_to = 0 ");
        $of = $db->fetch($oq);
        if ($db->affected_rows == 1) { $mail_open = $of[0]; }
    }

    // --- Posteingang laden ---
    $lq = $db->query("SELECT * FROM messages where to_user = '" . $db->escape($me) . "' and deleted_by_to = 0 ORDER BY created_at DESC, id DESC");
    $lf = $db->fetch($lq);
    foreach (($lf ? $lf : []) as $row) {
        $mail_list[] = $row;
        if ((int) $row['is_read'] === 0) { $mail_unread++; }
    }
}
