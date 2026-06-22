<div class="content_block">
  <div class="content_inner">
    <h1>Credit-Lotterie</h1>

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
      .cl-wrap { font-family:"Segoe UI",Arial,sans-serif; color:#e9e9ee; }
      .cl-cred { margin:10px 0 16px; font-size:15px; } .cl-cred b { color:#e0b34c; }
      .cl-card { width:150px; height:84px; margin:8px 0 16px; border-radius:12px;
        background:linear-gradient(135deg,#3a2f1a,#26262b); border:2px solid #e0b34c;
        display:flex; align-items:center; justify-content:center; font-size:28px; font-weight:700; color:#e0b34c; }
      .cl-field { margin-bottom:14px; }
      .cl-field label { display:block; font-size:13px; color:#9a9aa6; margin-bottom:4px; }
      .cl-field input { background:#1c1c1f; border:1px solid #34343b; border-radius:8px;
        color:#e9e9ee; padding:10px 12px; font-size:14px; width:200px; }
      .cl-btn { border:none; border-radius:10px; cursor:pointer; padding:12px 30px;
        font-size:15px; font-weight:700; color:#fff; background:#c0392b; }
      .cl-btn:hover { background:#d6492f; }
    </style>

    <div class="cl-wrap">
      <div class="cl-cred">Deine Credits: <b><?= number($credits) ?></b></div>
      <div class="cl-card"><?= $cl_result !== null ? ($cl_result === 0 ? '✖' : $cl_result . '×') : '★' ?></div>
      <p style="color:#9a9aa6; font-size:13px;">Setze Credits und decke deinen Multiplikator auf: 0×, 1×, 2×, 5×, 20×, 100×.</p>
      <form method="post" action="">
        <div class="cl-field">
          <label for="cl-amount">Einsatz (<?= number($cl_min) ?>&ndash;<?= number($cl_max) ?> Credits)</label>
          <input type="number" id="cl-amount" name="amount" min="<?= $cl_min ?>" max="<?= $cl_max ?>"
                 value="<?= isset($_POST['amount']) ? (int)$_POST['amount'] : 1 ?>" required>
        </div>
        <input type="hidden" name="play" value="1">
        <button class="cl-btn" type="submit">🎟️ Ziehen</button>
      </form>
    </div>
  </div>
</div>
