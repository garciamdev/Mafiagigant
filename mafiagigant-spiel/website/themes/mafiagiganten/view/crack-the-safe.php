<div class="content_block">
  <div class="content_inner">
    <h1>Knacke den Tresor</h1>

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
      .cts-wrap { font-family:"Segoe UI",Arial,sans-serif; color:#e9e9ee; }
      .cts-cash { margin:10px 0 16px; font-size:15px; } .cts-cash b { color:#e0b34c; }
      .cts-dials { display:flex; gap:10px; margin:12px 0; }
      .cts-dials input { width:64px; height:64px; text-align:center; font-size:28px; font-weight:700;
        background:#1c1c1f; border:2px solid #e0b34c; border-radius:10px; color:#e0b34c; }
      .cts-field { margin-bottom:14px; }
      .cts-field label { display:block; font-size:13px; color:#9a9aa6; margin-bottom:4px; }
      .cts-field input.amt { background:#1c1c1f; border:1px solid #34343b; border-radius:8px;
        color:#e9e9ee; padding:9px 12px; font-size:14px; width:200px; }
      .cts-btn { border:none; border-radius:10px; cursor:pointer; padding:13px 34px;
        font-size:15px; font-weight:700; color:#fff; background:#c0392b; }
      .cts-btn:hover { background:#d6492f; }
      .cts-pay { margin-top:14px; font-size:12px; color:#9a9aa6; }
    </style>

    <div class="cts-wrap">
      <div class="cts-cash">Dein Bargeld: <b>&euro; <?= number($cash) ?></b></div>

      <form method="post" action="">
        <label style="display:block; font-size:13px; color:#9a9aa6; margin-bottom:4px;">Dein Code (3 Ziffern):</label>
        <div class="cts-dials">
          <?php $p = $cts_pick ?? [0,0,0]; ?>
          <input type="number" name="d1" min="0" max="9" value="<?= (int)($p[0] ?? 0) ?>" required>
          <input type="number" name="d2" min="0" max="9" value="<?= (int)($p[1] ?? 0) ?>" required>
          <input type="number" name="d3" min="0" max="9" value="<?= (int)($p[2] ?? 0) ?>" required>
        </div>
        <div class="cts-field">
          <label for="cts-amount">Einsatz (&euro; <?= number($cts_min) ?> &ndash; <?= number($cts_max) ?>)</label>
          <input class="amt" type="number" id="cts-amount" name="amount" min="<?= $cts_min ?>"
                 max="<?= $cts_max ?>" step="100"
                 value="<?= isset($_POST['amount']) ? (int)$_POST['amount'] : $cts_min ?>" required>
        </div>
        <button class="cts-btn" type="submit" name="crack" value="1">🔓 Tresor knacken</button>
        <div class="cts-pay">3 richtig = 400&times; &nbsp;·&nbsp; 2 richtig = 10&times; &nbsp;·&nbsp; 1 richtig = Einsatz zurück</div>
      </form>
    </div>
  </div>
</div>
