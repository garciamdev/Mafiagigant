<div class="content_block">
  <div class="content_inner">
    <h1>Präsident</h1>

    <style>
      .pr-wrap { font-family:"Segoe UI",Arial,sans-serif; color:#e9e9ee; }
      .pr-hero { text-align:center; background:linear-gradient(135deg,#2a2118,#26262b); border:1px solid #5c4a2a;
        border-radius:12px; padding:20px; margin-bottom:16px; }
      .pr-crown { font-size:48px; }
      .pr-name { font-size:24px; font-weight:800; color:#e0b34c; margin:6px 0 2px; }
      .pr-sub { font-size:13px; color:#9a9aa6; }
      .pr-row { display:flex; align-items:center; gap:10px;
        background:#26262b; border:1px solid #34343b; border-radius:8px; padding:9px 12px; margin-bottom:6px; }
      .pr-row.me { border-color:#e0b34c; }
      .pr-pos { flex:0 0 28px; font-weight:700; color:#9a9aa6; text-align:center; }
      .pr-u { flex:1; } .pr-u a { color:#e0b34c; text-decoration:none; }
      .pr-str { color:#9a9aa6; font-size:13px; }
    </style>

    <div class="pr-wrap">
      <?php if ($president === null): ?>
        <p style="color:#9a9aa6;">Noch kein Präsident – es gibt noch keine Spieler mit Stärke.</p>
      <?php else: ?>
        <div class="pr-hero">
          <div class="pr-crown">👑</div>
          <div class="pr-name"><?= htmlspecialchars($president['username']) ?></div>
          <div class="pr-sub">amtierender Präsident &middot; Gesamtstärke
            <?= number((int) $president['att_power'] + (int) $president['deff_power']) ?></div>
        </div>

        <h2 style="font-size:16px;color:#e0b34c;">Machtrangliste – Top 10</h2>
        <?php foreach ($pres_top as $i => $u):
          $me = ($u['username'] === $userdata[0]['username']);
        ?>
          <div class="pr-row <?= $me ? 'me' : '' ?>">
            <div class="pr-pos"><?= $i === 0 ? '👑' : '#' . ($i + 1) ?></div>
            <div class="pr-u"><a href="member/<?= urlencode($u['username']) ?>"><?= htmlspecialchars($u['username']) ?></a></div>
            <div class="pr-str">💪 <?= number((int) $u['att_power'] + (int) $u['deff_power']) ?></div>
          </div>
        <?php endforeach; ?>

        <p style="color:#9a9aa6; font-size:12px; margin-top:12px;">
          Wer die höchste Gesamtstärke (Angriff + Verteidigung) hat, wird automatisch Präsident.
          Trainiere im Schießtraining, Boxclub und der Sporthalle, um aufzusteigen!
        </p>
      <?php endif; ?>
    </div>
  </div>
</div>
