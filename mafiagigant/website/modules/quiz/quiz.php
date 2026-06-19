<?php
/**
 * Tägliches Quiz – eine Frage pro Tag, richtige Antwort bringt Bargeld.
 * Cooldown (24h) über die timers-Tabelle.
 */
if (!isset($_SESSION['suid']) || $_SESSION['suid'] == '') {
    header("Location: " . BASE_URL . "login/");
    exit();
}

$quiz_reward = 50000;
$quiz_cooldown = 86400; // 24 Stunden

$quiz_questions = [
    ['q' => 'Auf welcher Insel begann die Geschichte der Mafia?',
     'a' => ['Sardinien', 'Sizilien', 'Korsika', 'Kreta'], 'c' => 1],
    ['q' => 'Welche Währung sammelst du in diesem Spiel?',
     'a' => ['Dollar', 'Pfund', 'Euro', 'Yen'], 'c' => 2],
    ['q' => 'Was brauchst du für einen Angriff auf einen Spieler?',
     'a' => ['Kugeln', 'Drogen', 'Autos', 'Credits'], 'c' => 0],
    ['q' => 'Wohin kommst du, wenn ein Verbrechen misslingt?',
     'a' => ['Krankenhaus', 'Flughafen', 'Gefängnis', 'Bank'], 'c' => 2],
    ['q' => 'Was passiert, wenn deine Gesundheit zu tief fällt?',
     'a' => ['Du gehst ins Krankenhaus', 'Du gewinnst Credits', 'Nichts', 'Du steigst im Rang'], 'c' => 0],
    ['q' => 'Welches Casino-Spiel zahlt bei einer einzelnen Zahl 36×?',
     'a' => ['Blackjack', 'Roulette', 'Slots', 'Poker'], 'c' => 1],
    ['q' => 'Wo verwahrst du dein Geld am sichersten?',
     'a' => ['In der Tasche', 'In der Bank', 'Im Auto', 'Im Shop'], 'c' => 1],
];

// Cooldown prüfen.
$q = "SELECT * FROM timers where activity = 'quiz' and username = '" . $db->escape($userdata[0]['username']) . "'";
$timer = $db->query($q)->fetch();
$now = date("Y-m-d H:i:s");
$quiz_wait = 0;
if (isset($timer[0]['time']) && $timer[0]['time'] >= $now) {
    $quiz_wait = datetotime($timer[0]['time']) - time();
}

$quiz_done = false;

if ($quiz_wait <= 0) {

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['answer']) && isset($_SESSION['quiz_q'])) {
        $qi = (int) $_SESSION['quiz_q'];
        $ans = (int) $_POST['answer'];
        if (isset($quiz_questions[$qi])) {
            if ($ans === $quiz_questions[$qi]['c']) {
                $db->where(['id' => $userdata[0]['id']])->update('users', ['cash' => ($userdata[0]['cash'] + $quiz_reward)]);
                $userdata[0]['cash'] += $quiz_reward;
                $success[] = "Richtig! 🎉 Du erhältst € " . number($quiz_reward) . ". Komm morgen wieder!";
            } else {
                $correct = $quiz_questions[$qi]['a'][$quiz_questions[$qi]['c']];
                $errors[] = "Leider falsch. Richtig wäre: <b>" . htmlspecialchars($correct) . "</b>. Versuch es morgen erneut!";
            }
            // Cooldown setzen (egal ob richtig oder falsch: 1x pro Tag).
            $next = timetodate(time() + $quiz_cooldown);
            if (isset($timer[0]['time'])) {
                $db->where(['activity' => 'quiz', 'username' => $userdata[0]['username']])->update('timers', ['time' => $next]);
            } else {
                $db->insert('timers', ['activity' => 'quiz', 'username' => $userdata[0]['username'], 'time' => $next]);
            }
            unset($_SESSION['quiz_q']);
            $quiz_done = true;
            $quiz_wait = $quiz_cooldown;
        }
    } else {
        // Neue Frage auswählen (und in Session halten bis beantwortet).
        if (!isset($_SESSION['quiz_q'])) {
            $_SESSION['quiz_q'] = array_rand($quiz_questions);
        }
    }
}

$quiz_current = isset($_SESSION['quiz_q']) ? $quiz_questions[$_SESSION['quiz_q']] : null;
