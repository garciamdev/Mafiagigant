<div class="content_block">
  <div class="content_inner">
    <h1>Pferderennen</h1>

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
      .hr-wrap { font-family:"Segoe UI",Arial,sans-serif; color:#e9e9ee; }
      .hr-cash { margin:10px 0 16px; font-size:15px; } .hr-cash b { color:#e0b34c; }
      .hr-field { margin-bottom:14px; }
      .hr-field label { display:block; font-size:13px; color:#9a9aa6; margin-bottom:4px; }
      .hr-field input { background:#1c1c1f; border:1px solid #34343b; border-radius:8px;
        color:#e9e9ee; padding:9px 12px; font-size:14px; width:200px; }
      .hr-horse { display:flex; align-items:center; justify-content:space-between; gap:10px;
        background:#26262b; border:1px solid #34343b; border-radius:8px; padding:8px 12px; margin-bottom:6px; }
      .hr-horse span { font-size:14px; }
      .hr-horse .odds { color:#e0b34c; font-weight:700; }
      .hr-bet { border:none; border-radius:6px; cursor:pointer; padding:7px 16px;
        font-weight:600; color:#fff; background:#c0392b; }
      .hr-bet:hover { background:#d6492f; }
    </style>

    <div class="hr-wrap">
      <div class="hr-cash">Dein Bargeld: <b>&euro; <?= number($cash) ?></b></div>

      <form method="post" action="">
        <div class="hr-field">
          <label for="hr-amount">Einsatz (&euro; <?= number($hr_min) ?> &ndash; <?= number($hr_max) ?>)</label>
          <input type="number" id="hr-amount" name="amount" min="<?= $hr_min ?>" max="<?= $hr_max ?>"
                 step="100" value="<?= isset($_POST['amount']) ? (int)$_POST['amount'] : $hr_min ?>" required>
        </div>
        <?php foreach ($hr_horses as $name => $odds): ?>
          <div class="hr-horse">
            <span>🏇 <?= htmlspecialchars($name) ?> <span class="odds"><?= $odds ?>×</span></span>
            <button class="hr-bet" type="submit" name="horse" value="<?= htmlspecialchars($name) ?>">Setzen</button>
          </div>
        <?php endforeach; ?>
        <input type="hidden" name="bet" value="1">
      </form>
    </div>
  </div>
</div>
