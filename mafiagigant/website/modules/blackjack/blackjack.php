<?php
/**
 * Blackjack gegen den Dealer. Spielstand in der Session.
 * Aktionen: deal (neue Hand mit Einsatz), hit, stand.
 * Auszahlung: Gewinn 2x, Blackjack 2.5x (3:2), Push = Einsatz zurück.
 */
if (!isset($_SESSION['suid']) || $_SESSION['suid'] == '') {
    header("Location: " . BASE_URL . "login/");
    exit();
}

$bj_min = 100;
$bj_max = 1000000;

function bj_new_deck()
{
    $ranks = ['2','3','4','5','6','7','8','9','10','J','Q','K','A'];
    $suits = ['♠','♥','♦','♣'];
    $deck = [];
    foreach ($suits as $s) {
        foreach ($ranks as $r) {
            $deck[] = ['r' => $r, 's' => $s];
        }
    }
    shuffle($deck);
    return $deck;
}

function bj_value($hand)
{
    $total = 0; $aces = 0;
    foreach ($hand as $c) {
        if ($c['r'] === 'A') { $aces++; $total += 11; }
        elseif (in_array($c['r'], ['K','Q','J'])) { $total += 10; }
        else { $total += (int) $c['r']; }
    }
    while ($total > 21 && $aces > 0) { $total -= 10; $aces--; }
    return $total;
}

$cash = (int) $userdata[0]['cash'];
$bj = isset($_SESSION['bj']) ? $_SESSION['bj'] : null;

$action = $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) ? $_POST['action'] : '';

// ---- Neue Hand austeilen ----
if ($action === 'deal') {
    if ($bj !== null && empty($bj['done'])) {
        $errors[] = "Beende erst die laufende Hand.";
    } else {
        $amount = isset($_POST['amount']) ? (int) $_POST['amount'] : 0;
        if ($amount < $bj_min) {
            $errors[] = "Mindesteinsatz ist € " . number($bj_min) . ".";
        } elseif ($amount > $bj_max) {
            $errors[] = "Höchsteinsatz ist € " . number($bj_max) . ".";
        } elseif ($amount > $cash) {
            $errors[] = "Du hast nicht genug Bargeld für diesen Einsatz.";
        } else {
            // Einsatz sofort abbuchen.
            $cash -= $amount;
            $db->where(['id' => $userdata[0]['id']])->update('users', ['cash' => $cash]);
            $userdata[0]['cash'] = $cash;

            $deck = bj_new_deck();
            $player = [array_pop($deck), array_pop($deck)];
            $dealer = [array_pop($deck), array_pop($deck)];

            $bj = ['deck' => $deck, 'player' => $player, 'dealer' => $dealer,
                   'bet' => $amount, 'done' => false, 'msg' => '', 'win' => 0];

            // Sofort-Blackjack prüfen.
            if (bj_value($player) === 21) {
                $payout = (int) round($amount * 2.5);
                $cash += $payout;
                $db->where(['id' => $userdata[0]['id']])->update('users', ['cash' => $cash]);
                $userdata[0]['cash'] = $cash;
                $bj['done'] = true;
                $bj['win'] = $payout - $amount;
                $bj['msg'] = "Blackjack! Du gewinnst € " . number($payout - $amount) . "! 🎉";
            }
            $_SESSION['bj'] = $bj;
        }
    }
}

// ---- Karte ziehen ----
if ($action === 'hit' && $bj !== null && empty($bj['done'])) {
    $bj['player'][] = array_pop($bj['deck']);
    if (bj_value($bj['player']) > 21) {
        $bj['done'] = true;
        $bj['win'] = -$bj['bet'];
        $bj['msg'] = "Überkauft (" . bj_value($bj['player']) . ")! Du verlierst € " . number($bj['bet']) . ". 💀";
    }
    $_SESSION['bj'] = $bj;
}

// ---- Halten: Dealer spielt ----
if ($action === 'stand' && $bj !== null && empty($bj['done'])) {
    while (bj_value($bj['dealer']) < 17) {
        $bj['dealer'][] = array_pop($bj['deck']);
    }
    $pv = bj_value($bj['player']);
    $dv = bj_value($bj['dealer']);

    if ($dv > 21 || $pv > $dv) {
        $payout = $bj['bet'] * 2;
        $cash += $payout;
        $bj['win'] = $payout - $bj['bet'];
        $bj['msg'] = ($dv > 21 ? "Dealer überkauft (" . $dv . ")! " : "Du gewinnst (" . $pv . " gegen " . $dv . ")! ")
            . "Gewinn € " . number($bj['win']) . "! 🎉";
        $db->where(['id' => $userdata[0]['id']])->update('users', ['cash' => $cash]);
        $userdata[0]['cash'] = $cash;
    } elseif ($pv === $dv) {
        $cash += $bj['bet']; // Push: Einsatz zurück
        $bj['win'] = 0;
        $bj['msg'] = "Unentschieden (" . $pv . "). Einsatz zurück.";
        $db->where(['id' => $userdata[0]['id']])->update('users', ['cash' => $cash]);
        $userdata[0]['cash'] = $cash;
    } else {
        $bj['win'] = -$bj['bet'];
        $bj['msg'] = "Dealer gewinnt (" . $dv . " gegen " . $pv . "). Du verlierst € " . number($bj['bet']) . ". 💀";
    }
    $bj['done'] = true;
    $_SESSION['bj'] = $bj;
}

// Daten für die View.
$bj_state = isset($_SESSION['bj']) ? $_SESSION['bj'] : null;
