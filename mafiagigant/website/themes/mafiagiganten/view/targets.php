<?php
// Persönliche Ziele – reine Fortschrittsanzeige anhand der Spieler-Stats.
$u = $userdata[0];
$goals = [
    ['icon' => '⚔️', 'label' => 'Angriffskraft 100',   'cur' => (int)$u['att_power'],      'target' => 100],
    ['icon' => '⚔️', 'label' => 'Angriffskraft 1.000', 'cur' => (int)$u['att_power'],      'target' => 1000],
    ['icon' => '🛡️', 'label' => 'Verteidigung 1.000',  'cur' => (int)$u['deff_power'],     'target' => 1000],
    ['icon' => '💰', 'label' => 'Vermögen € 1 Mio.',   'cur' => (int)$u['cash'],           'target' => 1000000],
    ['icon' => '💰', 'label' => 'Vermögen € 10 Mio.',  'cur' => (int)$u['cash'],           'target' => 10000000],
    ['icon' => '⭐', 'label' => '10.000 XP',           'cur' => (int)$u['xp'],             'target' => 10000],
    ['icon' => '🔫', 'label' => '1.000 Kugeln',        'cur' => (int)$u['bullets'],        'target' => 1000],
];
?>
<div class="content_block">
  <div class="content_inner">
    <h1>Persönliche Ziele</h1>

    <style>
      .pg-wrap { font-family:"Segoe UI",Arial,sans-serif; color:#e9e9ee; }
      .pg-item { background:#26262b; border:1px solid #34343b; border-radius:10px;
        padding:12px 14px; margin-bottom:10px; }
      .pg-top { display:flex; justify-content:space-between; align-items:center; margin-bottom:8px; font-size:14px; }
      .pg-top .done { color:#2ecc71; font-weight:700; }
      .pg-bar { height:10px; background:#1c1c1f; border-radius:6px; overflow:hidden; }
      .pg-fill { height:100%; background:linear-gradient(90deg,#c0392b,#e0b34c); }
      .pg-val { font-size:12px; color:#9a9aa6; margin-top:5px; }
    </style>

    <div class="pg-wrap">
      <p style="color:#9a9aa6; font-size:13px;">Erreiche diese Meilensteine, um in der Mafia aufzusteigen.</p>
      <?php foreach ($goals as $g):
        $pct = $g['target'] > 0 ? min(100, (int) floor($g['cur'] / $g['target'] * 100)) : 100;
        $done = $g['cur'] >= $g['target'];
      ?>
        <div class="pg-item">
          <div class="pg-top">
            <span><?= $g['icon'] ?> <?= htmlspecialchars($g['label']) ?></span>
            <span class="<?= $done ? 'done' : '' ?>"><?= $done ? '✓ Erreicht' : $pct . '%' ?></span>
          </div>
          <div class="pg-bar"><div class="pg-fill" style="width:<?= $pct ?>%"></div></div>
          <div class="pg-val"><?= number($g['cur']) ?> / <?= number($g['target']) ?></div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
