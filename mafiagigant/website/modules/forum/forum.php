<?php
/**
 * Forum – Themen & Beiträge. Tabellen: forum_threads, forum_posts.
 * Routen: forum (Liste), forum/new (neues Thema), ?thread=ID (Thema lesen).
 */
if (!isset($_SESSION['suid']) || $_SESSION['suid'] == '') {
    header("Location: " . BASE_URL . "login/");
    exit();
}

$me = $userdata[0]['username'];

$forum_ready = false;
$fc = $db->query("SHOW TABLES LIKE 'forum_threads'")->fetch();
if ($db->affected_rows > 0) { $forum_ready = true; }

$forum_section = ($var === 'new') ? 'new' : 'list';
$forum_thread = null;     // geöffnetes Thema
$forum_posts  = [];
$forum_threads = [];

if ($forum_ready) {

    // --- Neues Thema erstellen ---
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['new_thread'])) {
        $title = isset($_POST['title']) ? trim($_POST['title']) : '';
        $body  = isset($_POST['body']) ? trim($_POST['body']) : '';
        if ($title === '' || $body === '') {
            $errors[] = "Bitte Titel und Text ausfüllen.";
            $forum_section = 'new';
        } else {
            $tid = (int) $db->insert('forum_threads', ['title' => mb_substr($title, 0, 150), 'author' => $me]);
            $db->insert('forum_posts', ['thread_id' => $tid, 'author' => $me, 'body' => mb_substr($body, 0, 5000)]);
            $success[] = "Thema erstellt. 💬";
            header("Location: " . BASE_URL . "forum/?thread=" . $tid);
            // Falls Header schon gesendet: normal weiter zur Liste.
            $forum_section = 'list';
        }
    }

    // --- Antwort posten ---
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reply'])) {
        $tid  = (int) $_POST['thread_id'];
        $body = isset($_POST['body']) ? trim($_POST['body']) : '';
        $tcheck = $db->query("SELECT id FROM forum_threads where id = '" . $tid . "' ")->fetch();
        if ($db->affected_rows != 1) {
            $errors[] = "Thema nicht gefunden.";
        } elseif ($body === '') {
            $errors[] = "Die Antwort darf nicht leer sein.";
        } else {
            $db->insert('forum_posts', ['thread_id' => $tid, 'author' => $me, 'body' => mb_substr($body, 0, 5000)]);
            $now = date("Y-m-d H:i:s");
            // replies hochzählen + last_post_at aktualisieren
            $cntq = $db->query("SELECT COUNT(*) AS c FROM forum_posts where thread_id = '" . $tid . "' ")->fetch();
            $cnt = isset($cntq[0]['c']) ? (int) $cntq[0]['c'] : 1;
            $db->where(['id' => $tid])->update('forum_threads', ['replies' => max(0, $cnt - 1), 'last_post_at' => $now]);
            $success[] = "Antwort gepostet. 💬";
        }
        $_GET['thread'] = $tid; // im Thema bleiben
    }

    // --- Einzelnes Thema anzeigen ---
    if (isset($_GET['thread'])) {
        $tid = (int) $_GET['thread'];
        $tq = $db->query("SELECT * FROM forum_threads where id = '" . $tid . "' ")->fetch();
        if ($db->affected_rows == 1) {
            $forum_thread = $tq[0];
            $pq = $db->query("SELECT * FROM forum_posts where thread_id = '" . $tid . "' ORDER BY created_at ASC, id ASC");
            $pf = $db->fetch($pq);
            foreach (($pf ? $pf : []) as $row) { $forum_posts[] = $row; }
        }
    }

    // --- Themenliste ---
    if ($forum_thread === null && $forum_section === 'list') {
        $lq = $db->query("SELECT * FROM forum_threads ORDER BY last_post_at DESC, id DESC");
        $lf = $db->fetch($lq);
        foreach (($lf ? $lf : []) as $row) { $forum_threads[] = $row; }
    }
}
