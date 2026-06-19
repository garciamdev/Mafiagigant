<div class="content_block">
  <div class="content_inner">
    <h1>Russisches Roulette</h1>

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
      .rr-wrap { font-family:"Segoe UI",Arial,sans-serif; color:#e9e9ee; }
      .rr-cash { margin:10px 0 16px; font-size:15px; } .rr-cash b { color:#e0b34c; }
      .rr-revolver { text-align:center; font-size:56px; margin:8px 0 14px; }
      .rr-field { margin-bottom:14px; }
      .rr-field label { display:block; font-size:13px; color:#9a9aa6; margin-bottom:4px; }
      .rr-field input, .rr-field select { background:#1c1c1f; border:1px solid #34343b;
        border-radius:8px; color:#e9e9ee; padding:9px 12px; font-size:14px; width:212px; }
      .rr-btn { border:none; border-radius:10px; cursor:pointer; padding:13px 34px;
        font-size:15px; font-weight:700; color:#fff; background:#c0392b; }
      .rr-btn:hover { background:#d6492f; }
    </style>

    <div class="rr-wrap">
      <div class="rr-revolver">
        <?= $rr_outcome === 'dead' ? '💥' : ($rr_outcome === 'survive' ? '😮‍💨' : '🔫') ?>
      </div>
      <div class="rr-cash">Dein Bargeld: <b>&euro; <?= number($cash) ?></b></div>
      <p style="color:#9a9aa6; font-size:13px;">
        Mehr Kugeln = höheres Risiko, aber höhere Auszahlung. Auszahlung bei 1/2/3/4/5 Kugeln:
        ca. 1,14× / 1,42× / 1,90× / 2,85× / 5,70×.
      </p>

      <form method="post" action="">
        <div class="rr-field">
          <label for="rr-amount">Einsatz (&euro; <?= number($rr_min) ?> &ndash; <?= number($rr_max) ?>)</label>
          <input type="number" id="rr-amount" name="amount" min="<?= $rr_min ?>" max="<?= $rr_max ?>"
                 step="100" value="<?= isset($_POST['amount']) ? (int)$_POST['amount'] : $rr_min ?>" required>
        </div>
        <div class="rr-field">
          <label for="rr-bullets">Anzahl Kugeln (1&ndash;5)</label>
          <select id="rr-bullets" name="bullets">
            <?php for ($b = 1; $b <= 5; $b++): ?>
              <option value="<?= $b ?>" <?= (isset($_POST['bullets']) && (int)$_POST['bullets'] === $b) ? 'selected' : '' ?>>
                <?= $b ?> Kugel<?= $b > 1 ? 'n' : '' ?>
              </option>
            <?php endfor; ?>
          </select>
        </div>
        <button class="rr-btn" type="submit" name="pull" value="1">🔫 Abdrücken</button>
      </form>
    </div>
  </div>
</div>
