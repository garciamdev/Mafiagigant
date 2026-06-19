<div class="content_block">
  <div class="content_inner">
    <h1>Spenden</h1>

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
      .dn-wrap { font-family:"Segoe UI",Arial,sans-serif; color:#e9e9ee; }
      .dn-cash { margin:10px 0 16px; font-size:15px; } .dn-cash b { color:#e0b34c; }
      .dn-field { margin-bottom:14px; }
      .dn-field label { display:block; font-size:13px; color:#9a9aa6; margin-bottom:4px; }
      .dn-field input { background:#1c1c1f; border:1px solid #34343b; border-radius:8px;
        color:#e9e9ee; padding:10px 12px; font-size:14px; width:240px; }
      .dn-btn { border:none; border-radius:10px; cursor:pointer; padding:12px 30px;
        font-size:15px; font-weight:700; color:#fff; background:#c0392b; }
      .dn-btn:hover { background:#d6492f; }
    </style>

    <div class="dn-wrap">
      <div class="dn-cash">Dein Bargeld: <b>&euro; <?= number($cash) ?></b></div>
      <form method="post" action="">
        <div class="dn-field">
          <label for="dn-target">Empfänger (Spielername)</label>
          <input type="text" id="dn-target" name="target" maxlength="80"
                 value="<?= htmlspecialchars(isset($_POST['target']) ? $_POST['target'] : '') ?>" required>
        </div>
        <div class="dn-field">
          <label for="dn-amount">Betrag (&euro;)</label>
          <input type="number" id="dn-amount" name="amount" min="1" step="1"
                 value="<?= isset($_POST['amount']) ? (int)$_POST['amount'] : 1000 ?>" required>
        </div>
        <input type="hidden" name="donate" value="1">
        <button class="dn-btn" type="submit">💸 Geld senden</button>
      </form>
    </div>
  </div>
</div>
