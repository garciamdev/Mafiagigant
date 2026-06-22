<?php
/**
 * Empfehlungen (Referrals) – Einladungslink + geworbene Spieler.
 * Nutzt users.referred_by (Migration: core/migrations/referrals.sql).
 */
if (!isset($_SESSION['suid']) || $_SESSION['suid'] == '') {
    header("Location: " . BASE_URL . "login/");
    exit();
}

$me = $userdata[0]['username'];

$ref_ready = false;
$db->query("SHOW COLUMNS FROM users LIKE 'referred_by'")->fetch();
if ($db->affected_rows > 0) { $ref_ready = true; }

$ref_list = [];
if ($ref_ready) {
    $q = $db->query("SELECT username, `rank` FROM users WHERE referred_by = '" . $db->escape($me) . "' ORDER BY id DESC");
    $f = $db->fetch($q);
    foreach (($f ? $f : []) as $r) { $ref_list[] = $r; }
}

$ref_link = BASE_URL . 'register?ref=' . rawurlencode($me);
