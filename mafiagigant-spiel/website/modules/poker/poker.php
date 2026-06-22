<?php
/**
 * Video-Poker (Jacks or Better). Spielstand in der Session.
 * Ablauf: deal (5 Karten) -> halten wählen -> draw (tauschen + Auswertung).
 * Auszahlungen (gesamt x Einsatz): Paar Buben+ 2, 2 Paare 3, Drilling 4,
 * Straße 5, Flush 7, Full House 10, Vierling 26, Straight Flush 51, Royal 251.
 */
if (!isset($_SESSION['suid']) || $_SESSION['suid'] == '') {
    header("Location: " . BASE_URL . "login/");
    exit();
}

$vp_min = 100;
$vp_max = 500000;

function vp_deck()
{
    $ranks = ['2','3','4','5','6','7','8','9','10','J','Q','K','A'];
    $suits = ['♠','♥','♦','♣'];
    $deck = [];
    foreach ($suits as $s) { foreach ($ranks as $r) { $deck[] = ['r' => $r, 's' => $s]; } }
    shuffle($deck);
    return $deck;
}

function vp_eval($hand)
{
    $order = ['2'=>2,'3'=>3,'4'=>4,'5'=>5,'6'=>6,'7'=>7,'8'=>8,'9'=>9,'10'=>10,'J'=>11,'Q'=>12,'K'=>13,'A'=>14];
    $vals = []; $suits = []; $counts = [];
    foreach ($hand as $c) {
        $v = $order[$c['r']];
        $vals[] = $v; $suits[] = $c['s'];
        $counts[$v] = ($counts[$v] ?? 0) + 1;
    }
    $flush = count(array_unique($suits)) === 1;
    $unique = array_values(array_unique($vals)); sort($unique);
    $straight = false; $high = 0;
    if (count($unique) === 5) {
        if ($unique[4] - $unique[0] === 4) { $straight = true; $high = $unique[4]; }
        if ($unique === [2,3,4,5,14]) { $straight = true; $high = 5; } // A-2-3-4-5
    }
    $cv = array_values($counts); rsort($cv);

    if ($flush && $straight && $high === 14) { return ['Royal Flush', 251]; }
    if ($flush && $straight)                 { return ['Straight Flush', 51]; }
    if ($cv[0] === 4)                        { return ['Vierling', 26]; }
    if ($cv[0] === 3 && ($cv[1] ?? 0) === 2) { return ['Full House', 10]; }
    if ($flush)                              { return ['Flush', 7]; }
    if ($straight)                           { return ['Straße', 5]; }
    if ($cv[0] === 3)                        { return ['Drilling', 4]; }
    if ($cv[0] === 2 && ($cv[1] ?? 0) === 2) { return ['Zwei Paare', 3]; }
    if ($cv[0] === 2) {
        foreach ($counts as $v => $cnt) { if ($cnt === 2 && $v >= 11) { return ['Paar Buben+', 2]; } }
    }
    return ['Keine Kombination', 0];
}

$cash = (int) $userdata[0]['cash'];
$action = $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) ? $_POST['action'] : '';

if ($action === 'deal') {
    $amount = isset($_POST['amount']) ? (int) $_POST['amount'] : 0;
    if ($amount < $vp_min) {
        $errors[] = "Mindesteinsatz ist € " . number($vp_min) . ".";
    } elseif ($amount > $vp_max) {
        $errors[] = "Höchsteinsatz ist € " . number($vp_max) . ".";
    } elseif ($amount > $cash) {
        $errors[] = "Du hast nicht genug Bargeld für diesen Einsatz.";
    } else {
        $cash -= $amount;
        $db->where(['id' => $userdata[0]['id']])->update('users', ['cash' => $cash]);
        $userdata[0]['cash'] = $cash;

        $deck = vp_deck();
        $hand = [array_pop($deck), array_pop($deck), array_pop($deck), array_pop($deck), array_pop($deck)];
        $_SESSION['vp'] = ['deck' => $deck, 'hand' => $hand, 'bet' => $amount, 'phase' => 'draw', 'msg' => ''];
    }
}

if ($action === 'draw' && isset($_SESSION['vp']) && $_SESSION['vp']['phase'] === 'draw') {
    $vp = $_SESSION['vp'];
    $holds = isset($_POST['hold']) && is_array($_POST['hold']) ? array_map('intval', $_POST['hold']) : [];
    for ($i = 0; $i < 5; $i++) {
        if (!in_array($i, $holds, true)) {
            $vp['hand'][$i] = array_pop($vp['deck']);
        }
    }
    list($name, $mult) = vp_eval($vp['hand']);
    $vp['phase'] = 'done';
    $vp['result'] = $name;

    if ($mult > 0) {
        $payout = $vp['bet'] * $mult;
        $cash += $payout;
        $db->where(['id' => $userdata[0]['id']])->update('users', ['cash' => $cash]);
        $userdata[0]['cash'] = $cash;
        $vp['msg'] = "<b>" . $name . "</b> – du gewinnst € " . number($payout - $vp['bet']) . " (" . $mult . "×)! 🎉";
    } else {
        $vp['msg'] = "<b>" . $name . "</b>. Du verlierst € " . number($vp['bet']) . ". 💀";
    }
    $_SESSION['vp'] = $vp;
}

$vp_state = isset($_SESSION['vp']) ? $_SESSION['vp'] : null;
