<div class="content_block">
  <div class="content_inner">
    <h1>Credits kaufen</h1>

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
      .cc-wrap { font-family:"Segoe UI",Arial,sans-serif; color:#e9e9ee; }
      .cc-stats { display:flex; gap:18px; margin:10px 0 16px; font-size:15px; } .cc-stats b { color:#e0b34c; }
      .cc-field { margin-bottom:14px; }
      .cc-field label { display:block; font-size:13px; color:#9a9aa6; margin-bottom:4px; }
      .cc-field input { background:#1c1c1f; border:1px solid #34343b; border-radius:8px;
        color:#e9e9ee; padding:10px 12px; font-size:14px; width:200px; }
      .cc-btn { border:none; border-radius:10px; cursor:pointer; padding:12px 30px;
        font-size:15px; font-weight:700; color:#fff; background:#c0392b; }
      .cc-btn:hover { background:#d6492f; }
    </style>

    <div class="cc-wrap">
      <div class="cc-stats">
        <span>Bargeld: <b>&euro; <?= number($cash) ?></b></span>
        <span>Credits: <b><?= number($credits) ?></b></span>
      </div>
      <p style="color:#9a9aa6; font-size:13px;">Wechselkurs: <b>1 Credit = &euro; <?= number($cc_rate) ?></b></p>
      <form method="post" action="">
        <div class="cc-field">
          <label for="cc-amount">Anzahl Credits</label>
          <input type="number" id="cc-amount" name="amount" min="1" step="1"
                 value="<?= isset($_POST['amount']) ? (int)$_POST['amount'] : 1 ?>" required>
        </div>
        <input type="hidden" name="buy" value="1">
        <button class="cc-btn" type="submit">💳 Credits kaufen</button>
      </form>
    </div>
  </div>
</div>
