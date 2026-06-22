<?php
/**
 * Auktionshaus – versteigere Autos aus deiner Garage.
 * Treuhand (Gebot reserviert Geld, Rückgabe bei Überbieten),
 * Auto-Verwahrung (Besitzer '@auction'), Lazy-Abwicklung beim Seitenaufruf.
 * Tabelle: auctions (Migration: core/migrations/auctions.sql)
 */
if (!isset($_SESSION['suid']) || $_SESSION['suid'] == '') {
    header("Location: " . BASE_URL . "login/");
    exit();
}

$me = $userdata[0]['username'];
$AUCTION_HOLD = '@auction'; // Sentinel-Besitzer für ausgelagerte Autos

$auction_ready = false;
$db->query("SHOW TABLES LIKE 'auctions'")->fetch();
if ($db->affected_rows > 0) { $auction_ready = true; }

$auction_durations = [6, 12, 24]; // Stunden
$now = date("Y-m-d H:i:s");

function auction_user_cash($db, $username) {
    $q = $db->query("SELECT id, cash FROM users WHERE username = '" . $db->escape($username) . "' LIMIT 1")->fetch();
    return ($db->affected_rows == 1) ? $q[0] : null;
}

if ($auction_ready) {

    // ---------- Lazy-Abwicklung abgelaufener Auktionen ----------
    $exp = $db->query("SELECT * FROM auctions WHERE status = 'open' AND ends_at <= '" . $now . "'");
    $ef = $db->fetch($exp);
    foreach (($ef ? $ef : []) as $a) {
        if ($a['current_bidder'] !== '') {
            // Gewinner bekommt das Auto, Verkäufer das Geld (Bieter hat schon gezahlt).
            $db->where(['id' => $a['garage_id']])->update('garage', ['username' => $a['current_bidder']]);
            $s = auction_user_cash($db, $a['seller']);
            if ($s) {
                $db->where(['id' => $s['id']])->update('users', ['cash' => ((int) $s['cash'] + (int) $a['current_bid'])]);
            }
        } else {
            // Keine Gebote -> Auto zurück an Verkäufer.
            $db->where(['id' => $a['garage_id']])->update('garage', ['username' => $a['seller']]);
        }
        $db->where(['id' => $a['id']])->update('auctions', ['status' => 'closed']);
    }

    // ---------- Auktion erstellen ----------
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create'])) {
        $garage_id = (int) ($_POST['garage_id'] ?? 0);
        $min_bid   = (int) ($_POST['min_bid'] ?? 0);
        $hours     = (int) ($_POST['hours'] ?? 0);

        $car = $db->query("SELECT * FROM garage WHERE id = '" . $garage_id . "' AND username = '" . $db->escape($me) . "' LIMIT 1")->fetch();

        if ($db->affected_rows != 1) {
            $errors[] = "Dieses Auto gehört dir nicht (oder ist bereits in einer Auktion).";
        } elseif ($min_bid < 1) {
            $errors[] = "Bitte ein gültiges Mindestgebot angeben.";
        } elseif (!in_array($hours, $auction_durations, true)) {
            $errors[] = "Ungültige Laufzeit.";
        } else {
            // Auto-Name aus cars holen
            $cn = $db->query("SELECT stealcars FROM cars WHERE id = '" . (int) $car[0]['car'] . "' LIMIT 1")->fetch();
            $car_name = ($db->affected_rows == 1 && !empty($cn[0]['stealcars'])) ? $cn[0]['stealcars'] : 'Auto';

            $ends_at = timetodate(time() + $hours * 3600);
            $db->insert('auctions', [
                'garage_id' => $garage_id,
                'seller'    => $me,
                'car_name'  => $car_name,
                'car_img'   => $car[0]['img'],
                'min_bid'   => $min_bid,
                'ends_at'   => $ends_at,
            ]);
            // Auto in Verwahrung nehmen (verschwindet aus der Garage des Verkäufers)
            $db->where(['id' => $garage_id])->update('garage', ['username' => $AUCTION_HOLD]);
            $success[] = "Auktion gestartet: „" . htmlspecialchars($car_name) . "“ läuft " . $hours . " Stunden. 🔨";
        }
    }

    // ---------- Gebot abgeben ----------
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['bid'])) {
        $aid = (int) ($_POST['auction_id'] ?? 0);
        $bid = (int) ($_POST['bid_amount'] ?? 0);
        $cash = (int) $userdata[0]['cash'];

        $a = $db->query("SELECT * FROM auctions WHERE id = '" . $aid . "' AND status = 'open' LIMIT 1")->fetch();

        if ($db->affected_rows != 1) {
            $errors[] = "Auktion nicht gefunden.";
        } elseif ($a[0]['ends_at'] <= $now) {
            $errors[] = "Diese Auktion ist bereits abgelaufen.";
        } elseif ($a[0]['seller'] === $me) {
            $errors[] = "Auf deine eigene Auktion kannst du nicht bieten.";
        } elseif ($a[0]['current_bidder'] === $me) {
            $errors[] = "Du bist bereits Höchstbietender.";
        } else {
            $min_next = max((int) $a[0]['min_bid'], (int) $a[0]['current_bid'] + 1);
            if ($bid < $min_next) {
                $errors[] = "Dein Gebot muss mindestens € " . number($min_next) . " betragen.";
            } elseif ($bid > $cash) {
                $errors[] = "Du hast nicht genug Bargeld für dieses Gebot.";
            } else {
                // Vorherigen Bieter auszahlen (Treuhand zurück)
                if ($a[0]['current_bidder'] !== '') {
                    $prev = auction_user_cash($db, $a[0]['current_bidder']);
                    if ($prev) {
                        $db->where(['id' => $prev['id']])->update('users', ['cash' => ((int) $prev['cash'] + (int) $a[0]['current_bid'])]);
                    }
                }
                // Eigenes Geld reservieren
                $db->where(['id' => $userdata[0]['id']])->update('users', ['cash' => ($cash - $bid)]);
                $userdata[0]['cash'] = $cash - $bid;
                // Auktion aktualisieren
                $db->where(['id' => $aid])->update('auctions', ['current_bid' => $bid, 'current_bidder' => $me]);
                $success[] = "Gebot über € " . number($bid) . " abgegeben! 🙌";
            }
        }
    }

    // ---------- Daten für die View ----------
    $auction_list = [];
    $lq = $db->query("SELECT * FROM auctions WHERE status = 'open' AND ends_at > '" . $now . "' ORDER BY ends_at ASC");
    $lf = $db->fetch($lq);
    foreach (($lf ? $lf : []) as $row) { $auction_list[] = $row; }

    // Eigene Garage-Autos (zum Versteigern)
    $auction_mycars = [];
    $gq = $db->query("SELECT g.id, g.img, g.demage, g.newprice, c.stealcars AS name
                        FROM garage g LEFT JOIN cars c ON c.id = g.car
                       WHERE g.username = '" . $db->escape($me) . "' ORDER BY g.id DESC");
    $gf = $db->fetch($gq);
    foreach (($gf ? $gf : []) as $row) { $auction_mycars[] = $row; }
}

$auction_cash = (int) $userdata[0]['cash'];
