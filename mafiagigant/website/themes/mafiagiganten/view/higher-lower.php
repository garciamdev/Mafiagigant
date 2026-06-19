<div class="content_block">
  <div class="content_inner">
    <h1>Höher / Tiefer</h1>

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
      .hl-wrap { font-family:"Segoe UI",Arial,sans-serif; color:#e9e9ee; }
      .hl-cash { margin:10px 0 14px; font-size:15px; } .hl-cash b { color:#e0b34c; }
      .hl-num { width:96px; height:96px; margin:6px 0 12px; border-radius:16px;
        background:#1c1c1f; border:3px solid #e0b34c; color:#e0b34c;
        display:flex; align-items:center; justify-content:center; font-size:44px; font-weight:800; }
      .hl-pot { font-size:16px; margin-bottom:12px; } .hl-pot b { color:#2ecc71; }
      .hl-btns { display:flex; gap:10px; margin-bottom:10px; }
      .hl-btn { border:none; border-radius:10px; cursor:pointer; padding:13px 22px;
        font-size:14px; font-weight:700; color:#fff; }
      .hl-up { background:#1e8e3e; } .hl-down { background:#c0392b; } .hl-cash-btn { background:#e0b34c; color:#1c1c1f; }
      .hl-btn:hover { filter:brightness(1.12); }
      .hl-field label { display:block; font-size:13px; color:#9a9aa6; margin-bottom:4px; }
      .hl-field input { background:#1c1c1f; border:1px solid #34343b; border-radius:8px;
        color:#e9e9ee; padding:9px 12px; font-size:14px; width:200px; }
    </style>

    <div class="hl-wrap">
      <div class="hl-cash">Dein Bargeld: <b>&euro; <?= number($cash) ?></b></div>

      <?php if ($hl_state !== null && !empty($hl_state['active'])): ?>
        <div>Aktuelle Zahl:</div>
        <div class="hl-num"><?= (int) $hl_state['current'] ?></div>
        <div class="hl-pot">Pot: <b>&euro; <?= number($hl_state['pot']) ?></b></div>
        <p style="color:#9a9aa6; font-size:13px;">Ist die nächste Zahl (1&ndash;100) höher oder tiefer?</p>
        <div class="hl-btns">
          <form method="post" action="" style="display:inline"><input type="hidden" name="action" value="higher"><button class="hl-btn hl-up" type="submit">⬆️ Höher</button></form>
          <form method="post" action="" style="display:inline"><input type="hidden" name="action" value="lower"><button class="hl-btn hl-down" type="submit">⬇️ Tiefer</button></form>
          <form method="post" action="" style="display:inline"><input type="hidden" name="action" value="cashout"><button class="hl-btn hl-cash-btn" type="submit">💰 Auszahlen</button></form>
        </div>
      <?php else: ?>
        <form method="post" action="">
          <div class="hl-field" style="margin-bottom:12px;">
            <label for="hl-amount">Einsatz (&euro; <?= number($hl_min) ?> &ndash; <?= number($hl_max) ?>)</label>
            <input type="number" id="hl-amount" name="amount" min="<?= $hl_min ?>" max="<?= $hl_max ?>"
                   step="100" value="<?= isset($_POST['amount']) ? (int)$_POST['amount'] : $hl_min ?>" required>
          </div>
          <input type="hidden" name="action" value="start">
          <button class="hl-btn hl-up" type="submit">▶️ Runde starten</button>
        </form>
      <?php endif; ?>
    </div>
  </div>
</div>
