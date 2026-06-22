<div class="content_block">
  <div class="content_inner">
    <h1>Gruppenüberfall</h1>

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
      .gb-wrap { font-family:"Segoe UI",Arial,sans-serif; color:#e9e9ee; }
      .gb-stats { display:flex; gap:18px; margin:10px 0 14px; font-size:15px; } .gb-stats b { color:#e0b34c; }
      .gb-field { margin-bottom:14px; }
      .gb-field label { display:block; font-size:13px; color:#9a9aa6; margin-bottom:4px; }
      .gb-field select { background:#1c1c1f; border:1px solid #34343b; border-radius:8px;
        color:#e9e9ee; padding:10px 12px; font-size:14px; width:240px; }
      .gb-btn { border:none; border-radius:10px; cursor:pointer; padding:13px 34px;
        font-size:15px; font-weight:700; color:#fff; background:#c0392b; }
      .gb-btn:hover { background:#d6492f; }
      .gb-hint { margin-top:12px; font-size:12px; color:#9a9aa6; }
    </style>

    <div class="gb-wrap">
      <div class="gb-stats">
        <span>Bargeld: <b>&euro; <?= number($cash) ?></b></span>
        <span>Kugeln: <b><?= number($bullets) ?></b></span>
      </div>
      <p style="color:#9a9aa6; font-size:13px;">
        Heuere eine Crew an. Jeder Komplize kostet <b>&euro; <?= number($gr_hire_cost) ?></b>
        und <b><?= $gr_hire_bullets ?> Kugeln</b>. Mehr Komplizen = höhere Erfolgschance und Beute.
      </p>

      <form method="post" action="">
        <div class="gb-field">
          <label for="gb-crew">Anzahl Komplizen</label>
          <select id="gb-crew" name="crew">
            <?php for ($c = 1; $c <= 5; $c++): ?>
              <option value="<?= $c ?>"><?= $c ?> Komplize<?= $c > 1 ? 'n' : '' ?>
                (&euro; <?= number($c * $gr_hire_cost) ?> + <?= $c * $gr_hire_bullets ?> Kugeln)</option>
            <?php endfor; ?>
          </select>
        </div>
        <input type="hidden" name="rob" value="1">
        <button class="gb-btn" type="submit" <?= $wait > 0 ? 'disabled style="opacity:.5;cursor:not-allowed"' : '' ?>>💣 Überfall starten</button>
      </form>
      <div class="gb-hint">Abklingzeit: 20 Min. · Bei Fehlschlag drohen 10 Min. Gefängnis.</div>
    </div>
  </div>
</div>
