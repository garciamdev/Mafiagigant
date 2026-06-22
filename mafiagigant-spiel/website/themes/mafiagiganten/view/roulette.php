<div class="content_block">
  <div class="content_inner">
    <h1>Roulette</h1>

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
      .rl-wrap { font-family:"Segoe UI",Arial,sans-serif; color:#e9e9ee; }
      .rl-cash { margin:10px 0 16px; font-size:15px; }
      .rl-cash b { color:#e0b34c; }
      <?php if ($roulette_number !== null): ?>
      .rl-ball {
        display:inline-flex; align-items:center; justify-content:center;
        width:64px; height:64px; border-radius:50%; font-size:26px; font-weight:700;
        color:#fff; margin:6px 0 14px;
        background:<?= $roulette_wincolor === 'red' ? '#c0392b' : ($roulette_wincolor === 'black' ? '#222' : '#1e8e3e'); ?>;
        border:3px solid #e0b34c;
      }
      <?php endif; ?>
      .rl-field { margin-bottom:14px; }
      .rl-field label { display:block; font-size:13px; color:#9a9aa6; margin-bottom:4px; }
      .rl-field input {
        background:#1c1c1f; border:1px solid #34343b; border-radius:8px;
        color:#e9e9ee; padding:9px 12px; font-size:14px; width:200px;
      }
      .rl-grid { display:flex; flex-wrap:wrap; gap:8px; margin-bottom:10px; }
      .rl-bet {
        flex:1 1 30%; min-width:120px; cursor:pointer;
        border:none; border-radius:8px; padding:12px 8px; font-size:14px;
        font-weight:600; color:#fff; background:#34343b;
      }
      .rl-bet:hover { filter:brightness(1.15); }
      .rl-bet.red   { background:#c0392b; }
      .rl-bet.black { background:#222; border:1px solid #444; }
      .rl-bet.num   { background:#1e8e3e; }
      .rl-hint { font-size:12px; color:#9a9aa6; margin-top:10px; }
    </style>

    <div class="rl-wrap">
      <?php if ($roulette_number !== null): ?>
        <div style="text-align:center;">
          <div class="rl-ball"><?= $roulette_number ?></div>
        </div>
      <?php endif; ?>

      <div class="rl-cash">Dein Bargeld: <b>&euro; <?= number($cash) ?></b></div>

      <form method="post" action="">
        <div class="rl-field">
          <label for="rl-amount">Einsatz (&euro; <?= number($roulette_min) ?> &ndash; <?= number($roulette_max) ?>)</label>
          <input type="number" id="rl-amount" name="amount" min="<?= $roulette_min ?>"
                 max="<?= $roulette_max ?>" step="100" value="<?= isset($_POST['amount']) ? (int)$_POST['amount'] : $roulette_min ?>" required>
        </div>

        <div class="rl-grid">
          <button class="rl-bet red"   type="submit" name="bettype" value="red">Rot (2&times;)</button>
          <button class="rl-bet black" type="submit" name="bettype" value="black">Schwarz (2&times;)</button>
        </div>
        <div class="rl-grid">
          <button class="rl-bet" type="submit" name="bettype" value="even">Gerade (2&times;)</button>
          <button class="rl-bet" type="submit" name="bettype" value="odd">Ungerade (2&times;)</button>
        </div>
        <div class="rl-grid">
          <button class="rl-bet" type="submit" name="bettype" value="low">1&ndash;18 (2&times;)</button>
          <button class="rl-bet" type="submit" name="bettype" value="high">19&ndash;36 (2&times;)</button>
        </div>
        <div class="rl-grid">
          <button class="rl-bet" type="submit" name="bettype" value="dozen1">1&ndash;12 (3&times;)</button>
          <button class="rl-bet" type="submit" name="bettype" value="dozen2">13&ndash;24 (3&times;)</button>
          <button class="rl-bet" type="submit" name="bettype" value="dozen3">25&ndash;36 (3&times;)</button>
        </div>

        <div class="rl-field" style="margin-top:14px;">
          <label for="rl-number">Einzelne Zahl (0&ndash;36) &ndash; Auszahlung 36&times;</label>
          <input type="number" id="rl-number" name="number" min="0" max="36"
                 value="<?= isset($_POST['number']) ? (int)$_POST['number'] : 0 ?>">
        </div>
        <div class="rl-grid">
          <button class="rl-bet num" type="submit" name="bettype" value="number">Auf Zahl setzen</button>
        </div>

        <div class="rl-hint">
          Europäisches Roulette (eine Null). Bei <b>0</b> verlieren alle einfachen Chancen.
        </div>
      </form>
    </div>
  </div>
</div>
