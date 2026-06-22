<div class="content_block">
  <div class="content_inner">
    <h1>Rubbellose</h1>

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
      .sc-wrap { font-family:"Segoe UI",Arial,sans-serif; color:#e9e9ee; }
      .sc-cash { margin:10px 0 16px; font-size:15px; } .sc-cash b { color:#e0b34c; }
      .sc-card { width:160px; height:90px; margin:8px 0 16px; border-radius:12px;
        background:linear-gradient(135deg,#3a3a42,#26262b); border:2px solid #e0b34c;
        display:flex; align-items:center; justify-content:center; font-size:30px; font-weight:700;
        color:#e0b34c; }
      .sc-field { margin-bottom:14px; }
      .sc-field label { display:block; font-size:13px; color:#9a9aa6; margin-bottom:4px; }
      .sc-field input { background:#1c1c1f; border:1px solid #34343b; border-radius:8px;
        color:#e9e9ee; padding:9px 12px; font-size:14px; width:200px; }
      .sc-btn { border:none; border-radius:10px; cursor:pointer; padding:13px 34px;
        font-size:15px; font-weight:700; color:#fff; background:#c0392b; }
      .sc-btn:hover { background:#d6492f; }
    </style>

    <div class="sc-wrap">
      <div class="sc-cash">Dein Bargeld: <b>&euro; <?= number($cash) ?></b></div>

      <?php if ($sc_result !== null): ?>
        <div class="sc-card"><?= $sc_result === 0 ? '✖' : $sc_result . '×' ?></div>
      <?php else: ?>
        <div class="sc-card">?&nbsp;?&nbsp;?</div>
      <?php endif; ?>

      <p style="color:#9a9aa6; font-size:13px;">Kaufe ein Los und decke deinen Multiplikator auf. Möglich: 0×, 1×, 2×, 5×, 20×, 100×.</p>

      <form method="post" action="">
        <div class="sc-field">
          <label for="sc-amount">Lospreis / Einsatz (&euro; <?= number($sc_min) ?> &ndash; <?= number($sc_max) ?>)</label>
          <input type="number" id="sc-amount" name="amount" min="<?= $sc_min ?>" max="<?= $sc_max ?>"
                 step="100" value="<?= isset($_POST['amount']) ? (int)$_POST['amount'] : $sc_min ?>" required>
        </div>
        <button class="sc-btn" type="submit" name="scratch" value="1">🎟️ Los freirubbeln</button>
      </form>
    </div>
  </div>
</div>
