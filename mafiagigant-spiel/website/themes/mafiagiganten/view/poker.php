<div class="content_block">
  <div class="content_inner">
    <h1>Video-Poker</h1>

    <?php if (!empty($errors)) { foreach ($errors as $error) { ?>
      <table class="info_bad"><tbody><tr>
        <td width="5%" align="center"><img src="/themes/img/info_bad.png"></td>
        <td width="95%"><?= $error ?></td>
      </tr></tbody></table>
    <?php } } ?>

    <style>
      .vp-wrap { font-family:"Segoe UI",Arial,sans-serif; color:#e9e9ee; }
      .vp-cash { margin:10px 0 14px; font-size:15px; } .vp-cash b { color:#e0b34c; }
      .vp-msg { padding:10px 12px; border-radius:8px; background:#26262b; border:1px solid #34343b;
        margin-bottom:14px; font-size:14px; }
      .vp-cards { display:flex; gap:10px; margin:8px 0 14px; }
      .vp-card-wrap { text-align:center; }
      .vp-card { width:56px; height:78px; background:#fff; border-radius:8px; color:#222;
        display:flex; align-items:center; justify-content:center; font-size:22px; font-weight:700;
        box-shadow:0 2px 6px rgba(0,0,0,.4); }
      .vp-card.red { color:#c0392b; }
      .vp-hold { margin-top:6px; font-size:12px; color:#9a9aa6; display:block; }
      .vp-hold input { transform:scale(1.3); margin-right:4px; }
      .vp-held { color:#2ecc71; font-weight:700; }
      .vp-field label { display:block; font-size:13px; color:#9a9aa6; margin-bottom:4px; }
      .vp-field input.amt { background:#1c1c1f; border:1px solid #34343b; border-radius:8px;
        color:#e9e9ee; padding:9px 12px; font-size:14px; width:200px; }
      .vp-btn { border:none; border-radius:8px; cursor:pointer; padding:11px 26px;
        font-size:14px; font-weight:700; color:#fff; background:#c0392b; }
      .vp-btn:hover { background:#d6492f; }
      .vp-pay { margin-top:16px; font-size:12px; color:#9a9aa6; }
      .vp-pay table { border-collapse:collapse; } .vp-pay td { padding:3px 10px 3px 0; }
    </style>

    <div class="vp-wrap">
      <div class="vp-cash">Dein Bargeld: <b>&euro; <?= number($cash) ?></b></div>

      <?php if ($vp_state !== null): ?>
        <?php if (!empty($vp_state['msg'])): ?>
          <div class="vp-msg"><?= $vp_state['msg'] ?></div>
        <?php endif; ?>

        <form method="post" action="">
          <div class="vp-cards">
            <?php foreach ($vp_state['hand'] as $i => $c):
              $red = in_array($c['s'], ['♥','♦']); ?>
              <div class="vp-card-wrap">
                <div class="vp-card<?= $red ? ' red' : '' ?>"><?= $c['r'] . $c['s'] ?></div>
                <?php if ($vp_state['phase'] === 'draw'): ?>
                  <label class="vp-hold"><input type="checkbox" name="hold[]" value="<?= $i ?>">halten</label>
                <?php endif; ?>
              </div>
            <?php endforeach; ?>
          </div>

          <?php if ($vp_state['phase'] === 'draw'): ?>
            <input type="hidden" name="action" value="draw">
            <button class="vp-btn" type="submit">🔄 Tauschen &amp; Auswerten</button>
          <?php endif; ?>
        </form>
      <?php endif; ?>

      <?php if ($vp_state === null || $vp_state['phase'] === 'done'): ?>
        <form method="post" action="" style="margin-top:12px;">
          <div class="vp-field" style="margin-bottom:12px;">
            <label for="vp-amount">Einsatz (&euro; <?= number($vp_min) ?> &ndash; <?= number($vp_max) ?>)</label>
            <input class="amt" type="number" id="vp-amount" name="amount" min="<?= $vp_min ?>"
                   max="<?= $vp_max ?>" step="100"
                   value="<?= isset($_POST['amount']) ? (int)$_POST['amount'] : $vp_min ?>" required>
          </div>
          <input type="hidden" name="action" value="deal">
          <button class="vp-btn" type="submit">🃏 Neue Hand</button>
        </form>
      <?php endif; ?>

      <div class="vp-pay">
        <table>
          <tr><td>Royal Flush</td><td>251×</td><td>&nbsp;&nbsp;Straße</td><td>5×</td></tr>
          <tr><td>Straight Flush</td><td>51×</td><td>&nbsp;&nbsp;Drilling</td><td>4×</td></tr>
          <tr><td>Vierling</td><td>26×</td><td>&nbsp;&nbsp;Zwei Paare</td><td>3×</td></tr>
          <tr><td>Full House</td><td>10×</td><td>&nbsp;&nbsp;Paar Buben+</td><td>2×</td></tr>
          <tr><td>Flush</td><td>7×</td><td></td><td></td></tr>
        </table>
      </div>
    </div>
  </div>
</div>
