<div class="content_block">
  <div class="content_inner">
    <h1>Schießtraining</h1>

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
      .tr-wrap { font-family:"Segoe UI",Arial,sans-serif; color:#e9e9ee; }
      .tr-stats { display:flex; gap:18px; margin:10px 0 16px; font-size:15px; }
      .tr-stats b { color:#e0b34c; }
      .tr-target { text-align:center; font-size:64px; margin:10px 0; }
      .tr-btn { border:none; border-radius:10px; cursor:pointer; padding:13px 34px;
        font-size:15px; font-weight:700; color:#fff; background:#c0392b; }
      .tr-btn:hover { background:#d6492f; }
      .tr-hint { margin-top:12px; font-size:13px; color:#9a9aa6; }
    </style>

    <div class="tr-wrap">
      <div class="tr-stats">
        <span>Angriffskraft: <b><?= number($att_power) ?></b></span>
        <span>Kugeln: <b><?= number($bullets) ?></b></span>
      </div>
      <div class="tr-target">🎯</div>
      <p style="color:#9a9aa6; font-size:13px;">
        Jedes Training kostet <b><?= number($sh_cost) ?> Kugeln</b> und steigert deine Angriffskraft.
      </p>
      <form method="post" action="">
        <input type="hidden" name="shoot" value="1">
        <button class="tr-btn" type="submit" <?= $wait > 0 ? 'disabled style="opacity:.5;cursor:not-allowed"' : '' ?>>🔫 Trainieren</button>
      </form>
      <div class="tr-hint">Abklingzeit: 5 Minuten zwischen den Einheiten.</div>
    </div>
  </div>
</div>
