<?php
/**
 * Slots (Spielautomat) – komplettes Casino-Modul, 3 Walzen.
 * Einsatz aus Cash, Standard-Auszahlungen für 3 gleiche Symbole.
 */

if (!isset($_SESSION['suid']) || $_SESSION['suid'] == '') {
    header("Location: " . BASE_URL . "login/");
    exit();
}

// Symbole (gewichtet: seltene Symbole zahlen mehr).
$slots_symbols = [
    'cherry'  => ['emoji' => '🍒', 'weight' => 30, 'payout' => 3],
    'lemon'   => ['emoji' => '🍋', 'weight' => 25, 'payout' => 5],
    'bell'    => ['emoji' => '🔔', 'weight' => 18, 'payout' => 10],
    'star'    => ['emoji' => '⭐', 'weight' => 12, 'payout' => 15],
    'seven'   => ['emoji' => '7️⃣', 'weight' => 8,  'payout' => 25],
    'diamond' => ['emoji' => '💎', 'weight' => 4,  'payout' => 50],
];

function slots_spin($symbols)
{
    $total = 0;
    foreach ($symbols as $s) { $total += $s['weight']; }
    $r = rand(1, $total);
    $acc = 0;
    foreach ($symbols as $key => $s) {
        $acc += $s['weight'];
        if ($r <= $acc) { return $key; }
    }
    return array_key_first($symbols);
}

$slots_min = 100;
$slots_max = 500000;
$slots_reels = null;   // Ergebnis für die View
$cash = (int) $userdata[0]['cash'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['spin'])) {

    $amount = isset($_POST['amount']) ? (int) $_POST['amount'] : 0;

    if ($amount < $slots_min) {
        $errors[] = "Mindesteinsatz ist € " . number($slots_min) . ".";
    } elseif ($amount > $slots_max) {
        $errors[] = "Höchsteinsatz ist € " . number($slots_max) . ".";
    } elseif ($amount > $cash) {
        $errors[] = "Du hast nicht genug Bargeld für diesen Einsatz.";
    } else {

        $slots_reels = [slots_spin($slots_symbols), slots_spin($slots_symbols), slots_spin($slots_symbols)];
        $newcash = $cash - $amount;

        if ($slots_reels[0] === $slots_reels[1] && $slots_reels[1] === $slots_reels[2]) {
            // Drei Gleiche!
            $mult = $slots_symbols[$slots_reels[0]]['payout'];
            $payout = $amount * $mult;
            $newcash += $payout;
            $success[] = "JACKPOT-Reihe " . $slots_symbols[$slots_reels[0]]['emoji'] .
                "! Du gewinnst € " . number($payout - $amount) . " (" . $mult . "×)! 🎉";
        } elseif (in_array('cherry', $slots_reels) &&
                  count(array_keys($slots_reels, 'cherry')) >= 2) {
            // Zwei Kirschen = kleiner Trostpreis (2× Einsatz zurück).
            $payout = $amount * 2;
            $newcash += $payout;
            $success[] = "Zwei 🍒 – du bekommst € " . number($payout - $amount) . " extra!";
        } else {
            $errors[] = "Keine Gewinnkombination. Du verlierst € " . number($amount) . ". 💀";
        }

        $db->where(['id' => $userdata[0]['id']])->update('users', ['cash' => $newcash]);
        $userdata[0]['cash'] = $newcash;
        $cash = $newcash;
    }
}
