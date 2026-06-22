<div class="content_block">
  <div class="content_inner">
    <h1>Zahlenraten</h1>

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
      .gtn-wrap { font-family:"Segoe UI",Arial,sans-serif; color:#e9e9ee; }
      .gtn-cash { margin:10px 0 16px; font-size:15px; } .gtn-cash b { color:#e0b34c; }
      .gtn-field { margin-bottom:14px; }
      .gtn-field label { display:block; font-size:13px; color:#9a9aa6; margin-bottom:4px; }
      .gtn-field input { background:#1c1c1f; border:1px solid #34343b; border-radius:8px;
        color:#e9e9ee; padding:9px 12px; font-size:14px; width:200px; }
      .gtn-nums { display:flex; flex-wrap:wrap; gap:8px; margin:10px 0; }
      .gtn-num { width:52px; height:52px; border:none; border-radius:8px; cursor:pointer;
        font-size:18px; font-weight:700; color:#fff; background:#34343b; }
      .gtn-num:hover { background:#1e8e3e; }
    </style>

    <div class="gtn-wrap">
      <div class="gtn-cash">Dein Bargeld: <b>&euro; <?= number($cash) ?></b></div>
      <p style="color:#9a9aa6; font-size:13px;">Rate eine Zahl von 1 bis 10. Exakter Treffer zahlt <b>8&times;</b>.</p>

      <form method="post" action="">
        <div class="gtn-field">
          <label for="gtn-amount">Einsatz (&euro; <?= number($gtn_min) ?> &ndash; <?= number($gtn_max) ?>)</label>
          <input type="number" id="gtn-amount" name="amount" min="<?= $gtn_min ?>" max="<?= $gtn_max ?>"
                 step="100" value="<?= isset($_POST['amount']) ? (int)$_POST['amount'] : $gtn_min ?>" required>
        </div>
        <label style="display:block; font-size:13px; color:#9a9aa6; margin-bottom:4px;">Deine Zahl:</label>
        <div class="gtn-nums">
          <?php for ($n = 1; $n <= 10; $n++): ?>
            <button class="gtn-num" type="submit" name="pick" value="<?= $n ?>"
                    formmethod="post"><?= $n ?></button>
          <?php endfor; ?>
        </div>
        <input type="hidden" name="guess" value="1">
      </form>
    </div>
  </div>
</div>
