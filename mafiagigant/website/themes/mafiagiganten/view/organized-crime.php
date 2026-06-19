<div class="content_block">
  <div class="content_inner">
    <h1>Organisiertes Verbrechen</h1>

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
      .oc-wrap { font-family:"Segoe UI",Arial,sans-serif; color:#e9e9ee; }
      .oc-stats { display:flex; gap:18px; margin:10px 0 14px; font-size:15px; } .oc-stats b { color:#e0b34c; }
      .oc-card { background:#26262b; border:1px solid #34343b; border-radius:10px; padding:14px; margin-bottom:14px; }
      .oc-card div { margin:4px 0; font-size:14px; }
      .oc-btn { border:none; border-radius:10px; cursor:pointer; padding:13px 34px;
        font-size:15px; font-weight:700; color:#fff; background:#c0392b; }
      .oc-btn:hover { background:#d6492f; }
    </style>

    <div class="oc-wrap">
      <div class="oc-stats">
        <span>Angriffskraft: <b><?= number($att_power) ?></b></span>
        <span>Kugeln: <b><?= number($bullets) ?></b></span>
      </div>

      <div class="oc-card">
        <div>🎯 Erfolgschance: <b style="color:#e0b34c"><?= $oc_chance ?>%</b> (steigt mit Angriffskraft)</div>
        <div>🔫 Einsatz: <b><?= number($oc_cost_bullets) ?> Kugeln</b></div>
        <div>💰 Beute: <b>€ 50.000 – 150.000</b> + Kugeln + XP</div>
        <div>🚔 Risiko: bei Fehlschlag drohen 15 Min. Gefängnis</div>
        <div>⏳ Abklingzeit: 30 Minuten · Mindest-Angriffskraft: <?= number($oc_req_power) ?></div>
      </div>

      <form method="post" action="">
        <input type="hidden" name="commit" value="1">
        <button class="oc-btn" type="submit" <?= $wait > 0 ? 'disabled style="opacity:.5;cursor:not-allowed"' : '' ?>>💣 Coup durchführen</button>
      </form>
    </div>
  </div>
</div>
