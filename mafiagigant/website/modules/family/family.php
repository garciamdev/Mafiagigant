<?php
/**
 * Family-/Clan-System (self-contained, non-destruktiv).
 * Tabelle `family` + Spalte users.family (Migration: core/migrations/family.sql).
 * Funktionen: Übersicht, gründen, beitreten, verlassen/auflösen, Family-Bank.
 */
if (!isset($_SESSION['suid']) || $_SESSION['suid'] == '') {
    header("Location: " . BASE_URL . "login/");
    exit();
}

$fam_create_cost = 500000;

// Voraussetzungen prüfen (Tabelle + Spalte).
$fam_ready = false;
$tcheck = $db->query("SHOW TABLES LIKE 'family'")->fetch();
if ($db->affected_rows > 0) {
    $colcheck = $db->query("SHOW COLUMNS FROM users LIKE 'family'")->fetch();
    if ($db->affected_rows > 0) { $fam_ready = true; }
}

$fam_section = ($var === 'new') ? 'new' : 'overview';
$myfam_id = $fam_ready ? (int) ($userdata[0]['family'] ?? 0) : 0;
$cash = (int) $userdata[0]['cash'];

$myfam = null;            // eigene Family
$fam_members = [];        // Mitglieder der eigenen Family
$fam_power = 0;
$fam_list = [];           // alle Families (Übersicht)

function fam_load($db, $id) {
    $q = $db->query("SELECT * FROM family where id = '" . (int) $id . "' ")->fetch();
    return ($db->affected_rows == 1) ? $q[0] : null;
}

if ($fam_ready) {

    // ---------- Aktionen ----------
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Family gründen
        if (isset($_POST['create'])) {
            $name = trim(strip_tags($_POST['familyname'] ?? ''));
            if ($myfam_id > 0) {
                $errors[] = "Du bist bereits in einer Familie.";
            } elseif (mb_strlen($name) < 3 || mb_strlen($name) > 30) {
                $errors[] = "Der Familienname muss 3–30 Zeichen lang sein.";
            } elseif (!preg_match('/^[A-Za-z0-9 ._-]+$/', $name)) {
                $errors[] = "Der Familienname enthält ungültige Zeichen.";
            } elseif ($cash < $fam_create_cost) {
                $errors[] = "Eine Familie zu gründen kostet € " . number($fam_create_cost) . ".";
            } else {
                $ex = $db->query("SELECT id FROM family where familyname = '" . $db->escape($name) . "' ")->fetch();
                if ($db->affected_rows > 0) {
                    $errors[] = "Diesen Familiennamen gibt es bereits.";
                } else {
                    $fid = (int) $db->insert('family', ['familyname' => $name, 'owner' => $userdata[0]['username']]);
                    $db->where(['id' => $userdata[0]['id']])->update('users', [
                        'family' => $fid, 'cash' => ($cash - $fam_create_cost),
                    ]);
                    $userdata[0]['family'] = $fid;
                    $userdata[0]['cash']   = $cash - $fam_create_cost;
                    $myfam_id = $fid; $cash = $userdata[0]['cash'];
                    $success[] = "Familie „" . htmlspecialchars($name) . "“ gegründet! 👪";
                }
            }
        }

        // Beitreten
        if (isset($_POST['join'])) {
            $fid = (int) $_POST['family_id'];
            if ($myfam_id > 0) {
                $errors[] = "Du bist bereits in einer Familie.";
            } elseif (fam_load($db, $fid) === null) {
                $errors[] = "Diese Familie existiert nicht.";
            } else {
                $db->where(['id' => $userdata[0]['id']])->update('users', ['family' => $fid]);
                $userdata[0]['family'] = $fid; $myfam_id = $fid;
                $success[] = "Du bist der Familie beigetreten! 🤝";
            }
        }

        // Verlassen / Auflösen
        if (isset($_POST['leave']) && $myfam_id > 0) {
            $fam = fam_load($db, $myfam_id);
            if ($fam && strcasecmp($fam['owner'], $userdata[0]['username']) === 0) {
                // Boss löst die Familie auf -> alle Mitglieder raus.
                $db->where(['family' => $myfam_id])->update('users', ['family' => 0]);
                $db->query("DELETE FROM family where id = '" . (int) $myfam_id . "' ")->execute();
                $success[] = "Du hast die Familie aufgelöst.";
            } else {
                $db->where(['id' => $userdata[0]['id']])->update('users', ['family' => 0]);
                $success[] = "Du hast die Familie verlassen.";
            }
            $userdata[0]['family'] = 0; $myfam_id = 0;
        }

        // Family-Bank: Einzahlen
        if (isset($_POST['deposit']) && $myfam_id > 0) {
            $amount = (int) ($_POST['amount'] ?? 0);
            $fam = fam_load($db, $myfam_id);
            if ($amount < 1) {
                $errors[] = "Bitte einen gültigen Betrag eingeben.";
            } elseif ($amount > $cash) {
                $errors[] = "Du hast nicht genug Bargeld.";
            } elseif ($fam) {
                $db->where(['id' => $userdata[0]['id']])->update('users', ['cash' => ($cash - $amount)]);
                $db->where(['id' => $myfam_id])->update('family', ['money' => ((int) $fam['money'] + $amount)]);
                $userdata[0]['cash'] = $cash - $amount; $cash = $userdata[0]['cash'];
                $success[] = "€ " . number($amount) . " in die Family-Bank eingezahlt. 🏦";
            }
        }

        // Family-Bank: Auszahlen (nur Boss)
        if (isset($_POST['withdraw']) && $myfam_id > 0) {
            $amount = (int) ($_POST['amount'] ?? 0);
            $fam = fam_load($db, $myfam_id);
            if (!$fam || strcasecmp($fam['owner'], $userdata[0]['username']) !== 0) {
                $errors[] = "Nur der Boss kann Geld aus der Family-Bank nehmen.";
            } elseif ($amount < 1) {
                $errors[] = "Bitte einen gültigen Betrag eingeben.";
            } elseif ($amount > (int) $fam['money']) {
                $errors[] = "So viel ist nicht in der Family-Bank.";
            } else {
                $db->where(['id' => $myfam_id])->update('family', ['money' => ((int) $fam['money'] - $amount)]);
                $db->where(['id' => $userdata[0]['id']])->update('users', ['cash' => ($cash + $amount)]);
                $userdata[0]['cash'] = $cash + $amount; $cash = $userdata[0]['cash'];
                $success[] = "€ " . number($amount) . " aus der Family-Bank entnommen. 💰";
            }
        }
    }

    // ---------- Daten für die View ----------
    if ($myfam_id > 0) {
        $myfam = fam_load($db, $myfam_id);
        if ($myfam) {
            $mq = $db->query("SELECT username, att_power, deff_power, `rank` FROM users where family = '" . (int) $myfam_id . "' ORDER BY (att_power + deff_power) DESC");
            $mf = $db->fetch($mq);
            foreach (($mf ? $mf : []) as $row) {
                $fam_members[] = $row;
                $fam_power += (int) $row['att_power'] + (int) $row['deff_power'];
            }
        } else {
            $myfam_id = 0; // Family wurde aufgelöst
        }
    }

    if ($myfam_id === 0) {
        $lq = $db->query("SELECT * FROM family ORDER BY familyname ASC");
        $lf = $db->fetch($lq);
        foreach (($lf ? $lf : []) as $f) {
            $pq = $db->query("SELECT SUM(att_power + deff_power) AS power, COUNT(id) AS members FROM users where family = '" . (int) $f['id'] . "' ")->fetch();
            $f['power']   = isset($pq[0]['power']) ? (int) $pq[0]['power'] : 0;
            $f['members'] = isset($pq[0]['members']) ? (int) $pq[0]['members'] : 0;
            $fam_list[] = $f;
        }
    }
}
