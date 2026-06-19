<div class="content_block">
  <div class="content_inner">
    <h1>Sportwetten</h1>

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
      .so-wrap { font-family:"Segoe UI",Arial,sans-serif; color:#e9e9ee; }
      .so-cash { margin:10px 0 16px; font-size:15px; } .so-cash b { color:#e0b34c; }
      .so-match { text-align:center; font-size:16px; margin:6px 0 14px; color:#e9e9ee; }
      .so-field { margin-bottom:14px; }
      .so-field label { display:block; font-size:13px; color:#9a9aa6; margin-bottom:4px; }
      .so-field input { background:#1c1c1f; border:1px solid #34343b; border-radius:8px;
        color:#e9e9ee; padding:9px 12px; font-size:14px; width:200px; }
      .so-grid { display:flex; gap:8px; }
      .so-bet { flex:1; border:none; border-radius:8px; cursor:pointer; padding:14px 8px;
        font-weight:600; color:#fff; background:#34343b; font-size:14px; }
      .so-bet:hover { background:#1e8e3e; }
      .so-bet .o { display:block; color:#e0b34c; font-size:13px; margin-top:3px; }
    </style>

    <div class="so-wrap">
      <div class="so-cash">Dein Bargeld: <b>&euro; <?= number($cash) ?></b></div>
      <div class="so-match">⚽ <b>Gigant FC</b> &nbsp;vs&nbsp; <b>Cosa Nostra United</b></div>

      <form method="post" action="">
        <div class="so-field">
          <label for="so-amount">Einsatz (&euro; <?= number($so_min) ?> &ndash; <?= number($so_max) ?>)</label>
          <input type="number" id="so-amount" name="amount" min="<?= $so_min ?>" max="<?= $so_max ?>"
                 step="100" value="<?= isset($_POST['amount']) ? (int)$_POST['amount'] : $so_min ?>" required>
        </div>
        <div class="so-grid">
          <button class="so-bet" type="submit" name="bettype" value="home">Heimsieg <span class="o"><?= $so_odds['home'] ?>×</span></button>
          <button class="so-bet" type="submit" name="bettype" value="draw">Unentsch. <span class="o"><?= $so_odds['draw'] ?>×</span></button>
          <button class="so-bet" type="submit" name="bettype" value="away">Auswärts <span class="o"><?= $so_odds['away'] ?>×</span></button>
        </div>
      </form>
    </div>
  </div>
</div>
