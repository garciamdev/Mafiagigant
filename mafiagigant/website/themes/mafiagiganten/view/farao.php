<div class="content_block">
  <div class="content_inner">
    <h1>Der Pharao</h1>

    <?php if (!empty($errors)) { foreach ($errors as $error) { ?>
      <table class="info_bad"><tbody><tr>
        <td width="5%" align="center"><img src="/themes/img/info_bad.png"></td>
        <td width="95%"><?= $error ?></td>
      </tr></tbody></table>
    <?php } } ?>
    <?php if (!empty($success)) { foreach ($success as $succes) { ?>
      <table class="info_good"><tbody><tr>
        <td width="5%" align="center"><img src="/themes/img/info_good.png"></td>
        <td width="95%"><?= $succes ?></td>
      </tr></tbody></table>
    <?php } } ?>

    <style>
      .fa-wrap { font-family:"Segoe UI",Arial,sans-serif; color:#e9e9ee; }
      .fa-boss { text-align:center; font-size:72px; margin:6px 0 10px; }
      .fa-stats { display:flex; gap:18px; margin-bottom:14px; font-size:15px; } .fa-stats b { color:#e0b34c; }
      .fa-card { background:#2a2118; border:1px solid #5c4a2a; border-radius:10px; padding:14px; margin-bottom:14px; }
      .fa-card div { margin:4px 0; font-size:14px; }
      .fa-btn { border:none; border-radius:10px; cursor:pointer; padding:13px 34px;
        font-size:15px; font-weight:700; color:#1c1c1f; background:#e0b34c; }
      .fa-btn:hover { filter:brightness(1.08); }
    </style>

    <div class="fa-wrap">
      <div class="fa-boss">🤴</div>
      <div class="fa-stats">
        <span>Angriffskraft: <b><?= number($att_power) ?></b></span>
        <span>Kugeln: <b><?= number($bullets) ?></b></span>
      </div>

      <div class="fa-card">
        <div>👑 Der Pharao ist der gefürchtetste Boss der Stadt.</div>
        <div>🎯 Erfolgschance: <b style="color:#e0b34c"><?= $fa_chance ?>%</b> (steigt mit Angriffskraft)</div>
        <div>🔫 Einsatz: <b><?= number($fa_cost_bullets) ?> Kugeln</b> · Mindest-Angriffskraft: <?= number($fa_req_power) ?></div>
        <div>💰 Beute: <b>€ 500.000 – 1.500.000</b> + Ausbruchspunkte + viel XP</div>
        <div>⏳ Abklingzeit: 1 Stunde</div>
      </div>

      <form method="post" action="">
        <input type="hidden" name="fight" value="1">
        <button class="fa-btn" type="submit" <?= $wait > 0 ? 'disabled style="opacity:.5;cursor:not-allowed"' : '' ?>>⚔️ Den Pharao angreifen</button>
      </form>
    </div>
  </div>
</div>
