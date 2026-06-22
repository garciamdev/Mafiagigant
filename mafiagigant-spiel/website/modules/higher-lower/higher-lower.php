<?php
/**
 * Höher / Tiefer – Pot-Leiter mit dynamischen, fairen Quoten.
 * Einsatz starten, dann raten ob die nächste Zahl (1-100) höher oder tiefer ist.
 * Richtig -> Pot wächst nach echter Wahrscheinlichkeit (~5% Hausvorteil).
 * Falsch -> Pot verloren. Jederzeit auszahlen lassen.
 */
if (!isset($_SESSION['suid']) || $_SESSION['suid'] == '') {
    header("Location: " . BASE_URL . "login/");
    exit();
}

$hl_min = 100;
$hl_max = 500000;
$cash = (int) $userdata[0]['cash'];
$action = $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) ? $_POST['action'] : '';

$hl = isset($_SESSION['hl']) ? $_SESSION['hl'] : null;

// ---- Start ----
if ($action === 'start') {
    if ($hl !== null && !empty($hl['active'])) {
        $errors[] = "Es läuft bereits eine Runde.";
    } else {
        $amount = isset($_POST['amount']) ? (int) $_POST['amount'] : 0;
        if ($amount < $hl_min) {
            $errors[] = "Mindesteinsatz ist € " . number($hl_min) . ".";
        } elseif ($amount > $hl_max) {
            $errors[] = "Höchsteinsatz ist € " . number($hl_max) . ".";
        } elseif ($amount > $cash) {
            $errors[] = "Du hast nicht genug Bargeld für diesen Einsatz.";
        } else {
            $cash -= $amount;
            $db->where(['id' => $userdata[0]['id']])->update('users', ['cash' => $cash]);
            $userdata[0]['cash'] = $cash;
            $hl = ['current' => rand(1, 100), 'pot' => $amount, 'active' => true, 'msg' => ''];
            $_SESSION['hl'] = $hl;
        }
    }
}

// ---- Raten ----
if (($action === 'higher' || $action === 'lower') && $hl !== null && !empty($hl['active'])) {
    $current = $hl['current'];
    $next = rand(1, 100);

    // Faire Wahrscheinlichkeit für den Tipp.
    if ($action === 'higher') {
        $prob = (100 - $current) / 100;   // P(next > current)
        $won  = ($next > $current);
    } else {
        $prob = ($current - 1) / 100;     // P(next < current)
        $won  = ($next < $current);
    }

    if ($won && $prob > 0) {
        $mult = 0.95 / $prob;             // ~5% Hausvorteil
        $hl['pot'] = (int) round($hl['pot'] * $mult);
        $hl['current'] = $next;
        $hl['msg'] = "Die nächste Zahl war <b>" . $next . "</b> – richtig! Pot: € " . number($hl['pot']) . " 🔥";
        $_SESSION['hl'] = $hl;
        $success[] = $hl['msg'];
    } else {
        $hl['active'] = false;
        $hl['msg'] = "Die nächste Zahl war <b>" . $next . "</b> – daneben! Pot von € "
            . number($hl['pot']) . " verloren. 💀";
        $_SESSION['hl'] = $hl;
        $errors[] = $hl['msg'];
    }
}

// ---- Auszahlen ----
if ($action === 'cashout' && $hl !== null && !empty($hl['active'])) {
    $cash += $hl['pot'];
    $db->where(['id' => $userdata[0]['id']])->update('users', ['cash' => $cash]);
    $userdata[0]['cash'] = $cash;
    $success[] = "Ausgezahlt: € " . number($hl['pot']) . " gutgeschrieben! 🎉";
    $hl['active'] = false;
    $hl['msg'] = '';
    $_SESSION['hl'] = $hl;
}

$hl_state = isset($_SESSION['hl']) ? $_SESSION['hl'] : null;
