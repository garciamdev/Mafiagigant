<?php
/**
 * Missionen – Meilenstein-Aufträge, einmalig einlösbar.
 * Erfordert die Tabelle missions_claimed (siehe core/migrations/missions.sql).
 */
if (!isset($_SESSION['suid']) || $_SESSION['suid'] == '') {
    header("Location: " . BASE_URL . "login/");
    exit();
}

// Mission-Definitionen: Feld/Schwelle + Belohnung.
$mission_list = [
    1 => ['title' => 'Erste Schüsse',     'field' => 'att_power', 'need' => 50,      'cash' => 50000,   'bullets' => 50,  'xp' => 100,  'desc' => 'Erreiche 50 Angriffskraft.'],
    2 => ['title' => 'Scharfschütze',     'field' => 'att_power', 'need' => 200,     'cash' => 200000,  'bullets' => 100, 'xp' => 300,  'desc' => 'Erreiche 200 Angriffskraft.'],
    3 => ['title' => 'Erfahrener Gangster','field' => 'xp',       'need' => 1000,    'cash' => 100000,  'bullets' => 0,   'xp' => 0,    'desc' => 'Sammle 1.000 XP.'],
    4 => ['title' => 'Millionär',         'field' => 'cash',      'need' => 1000000, 'cash' => 0,       'bullets' => 100, 'xp' => 500,  'desc' => 'Besitze € 1.000.000 Bargeld.'],
    5 => ['title' => 'Aufgestiegen',      'field' => 'rank',      'need' => 5,       'cash' => 500000,  'bullets' => 200, 'xp' => 1000, 'desc' => 'Erreiche Rang 5.'],
];

// Tabelle vorhanden?
$missions_ready = false;
$mcheck = $db->query("SHOW TABLES LIKE 'missions_claimed'")->fetch();
if ($db->affected_rows > 0) { $missions_ready = true; }

$claimed = [];
if ($missions_ready) {
    $cq = $db->query("SELECT mission_id FROM missions_claimed where username = '" . $db->escape($userdata[0]['username']) . "'");
    $cf = $db->fetch($cq);
    foreach (($cf ? $cf : []) as $row) { $claimed[(int) $row['mission_id']] = true; }
}

if ($missions_ready && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['claim'])) {
    $mid = (int) $_POST['claim'];
    if (!isset($mission_list[$mid])) {
        $errors[] = "Unbekannte Mission.";
    } elseif (isset($claimed[$mid])) {
        $errors[] = "Diese Mission hast du bereits eingelöst.";
    } else {
        $m = $mission_list[$mid];
        if ((int) $userdata[0][$m['field']] < $m['need']) {
            $errors[] = "Du erfüllst die Voraussetzung für „" . $m['title'] . "“ noch nicht.";
        } else {
            $db->insert('missions_claimed', ['username' => $userdata[0]['username'], 'mission_id' => $mid]);
            $db->where(['id' => $userdata[0]['id']])->update('users', [
                'cash'    => ($userdata[0]['cash'] + $m['cash']),
                'bullets' => ($userdata[0]['bullets'] + $m['bullets']),
                'xp'      => ($userdata[0]['xp'] + $m['xp']),
            ]);
            $userdata[0]['cash']    += $m['cash'];
            $userdata[0]['bullets'] += $m['bullets'];
            $userdata[0]['xp']      += $m['xp'];
            $claimed[$mid] = true;

            $parts = [];
            if ($m['cash'] > 0)    { $parts[] = "€ " . number($m['cash']); }
            if ($m['bullets'] > 0) { $parts[] = number($m['bullets']) . " Kugeln"; }
            if ($m['xp'] > 0)      { $parts[] = number($m['xp']) . " XP"; }
            $success[] = "Mission „" . $m['title'] . "“ abgeschlossen! Belohnung: " . implode(', ', $parts) . ". 🎉";
        }
    }
}
