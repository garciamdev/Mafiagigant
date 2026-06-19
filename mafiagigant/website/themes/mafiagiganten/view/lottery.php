<div class="content_block">
  <div class="content_inner">
    <h1>Lotterie</h1>

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
      .lo-wrap { font-family:"Segoe UI",Arial,sans-serif; color:#e9e9ee; }
      .lo-cash { margin:10px 0 16px; font-size:15px; } .lo-cash b { color:#e0b34c; }
      .lo-balls { display:flex; gap:8px; margin:10px 0 14px; }
      .lo-ball { width:48px; height:48px; border-radius:50%; background:#1e8e3e; color:#fff;
        display:flex; align-items:center; justify-content:center; font-size:20px; font-weight:700;
        border:2px solid #e0b34c; }
      .lo-field { margin-bottom:14px; }
      .lo-field label { display:block; font-size:13px; color:#9a9aa6; margin-bottom:4px; }
      .lo-nums { display:flex; gap:8px; }
      .lo-nums input { width:60px; height:54px; text-align:center; font-size:22px; font-weight:700;
        background:#1c1c1f; border:2px solid #34343b; border-radius:8px; color:#e0b34c; }
      .lo-amt { background:#1c1c1f; border:1px solid #34343b; border-radius:8px;
        color:#e9e9ee; padding:9px 12px; font-size:14px; width:200px; }
      .lo-btn { border:none; border-radius:10px; cursor:pointer; padding:13px 34px;
        font-size:15px; font-weight:700; color:#fff; background:#c0392b; }
      .lo-btn:hover { background:#d6492f; }
      .lo-pay { margin-top:14px; font-size:12px; color:#9a9aa6; }
    </style>

    <div class="lo-wrap">
      <div class="lo-cash">Dein Bargeld: <b>&euro; <?= number($cash) ?></b></div>

      <?php if ($lo_drawn !== null): ?>
        <div>Ziehung:</div>
        <div class="lo-balls">
          <?php foreach ($lo_drawn as $d): ?><div class="lo-ball"><?= $d ?></div><?php endforeach; ?>
        </div>
      <?php endif; ?>

      <form method="post" action="">
        <label style="display:block; font-size:13px; color:#9a9aa6; margin-bottom:4px;">Deine 4 Zahlen (1&ndash;25, verschieden):</label>
        <div class="lo-nums" style="margin-bottom:14px;">
          <?php $lp = $lo_pick ?? [1,2,3,4]; for ($i = 0; $i < 4; $i++): ?>
            <input type="number" name="n<?= $i+1 ?>" min="1" max="25"
                   value="<?= (int)($lp[$i] ?? ($i+1)) ?>" required>
          <?php endfor; ?>
        </div>
        <div class="lo-field">
          <label for="lo-amount">Einsatz (&euro; <?= number($lo_min) ?> &ndash; <?= number($lo_max) ?>)</label>
          <input class="lo-amt" type="number" id="lo-amount" name="amount" min="<?= $lo_min ?>"
                 max="<?= $lo_max ?>" step="100"
                 value="<?= isset($_POST['amount']) ? (int)$_POST['amount'] : $lo_min ?>" required>
        </div>
        <button class="lo-btn" type="submit" name="play" value="1">🎫 Ziehung starten</button>
        <div class="lo-pay">4 Treffer = 1000× &nbsp;·&nbsp; 3 = 30× &nbsp;·&nbsp; 2 = 2×</div>
      </form>
    </div>
  </div>
</div>
