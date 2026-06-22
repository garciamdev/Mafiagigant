<div class="content_block">
  <div class="content_inner">
    <h1>Angriff</h1>

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
      .ak-wrap { font-family:"Segoe UI",Arial,sans-serif; color:#e9e9ee; }
      .ak-stats { display:flex; gap:18px; margin:10px 0 14px; font-size:15px; } .ak-stats b { color:#e0b34c; }
      .ak-field { margin-bottom:14px; }
      .ak-field label { display:block; font-size:13px; color:#9a9aa6; margin-bottom:4px; }
      .ak-field input { background:#1c1c1f; border:1px solid #34343b; border-radius:8px;
        color:#e9e9ee; padding:10px 12px; font-size:14px; width:240px; }
      .ak-btn { border:none; border-radius:10px; cursor:pointer; padding:13px 34px;
        font-size:15px; font-weight:700; color:#fff; background:#c0392b; }
      .ak-btn:hover { background:#d6492f; }
      .ak-hint { margin-top:12px; font-size:12px; color:#9a9aa6; }
    </style>

    <div class="ak-wrap">
      <div class="ak-stats">
        <span>Angriffskraft: <b><?= number($att_power) ?></b></span>
        <span>Kugeln: <b><?= number($bullets) ?></b></span>
      </div>

      <form method="post" action="">
        <div class="ak-field">
          <label for="ak-target">Spielername des Ziels</label>
          <input type="text" id="ak-target" name="target" maxlength="80"
                 value="<?= htmlspecialchars($at_target_name ?? '') ?>"
                 placeholder="z.B. Donna13" required>
        </div>
        <button class="ak-btn" type="submit" <?= $wait > 0 ? 'disabled style="opacity:.5;cursor:not-allowed"' : '' ?>>🔫 Angreifen</button>
      </form>

      <div class="ak-hint">
        Kosten: <?= number($at_cost_bullets) ?> Kugeln · Abklingzeit: 10 Min.<br>
        Bei Erfolg landet das Ziel im Krankenhaus und du erbeutest einen Teil seines Bargelds.
      </div>
    </div>
  </div>
</div>
