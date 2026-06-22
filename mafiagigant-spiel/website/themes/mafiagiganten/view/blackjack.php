<div class="content_block">
  <div class="content_inner">
    <h1>Blackjack</h1>

    <?php if (!empty($errors)) { foreach ($errors as $error) { ?>
      <table class="info_bad"><tbody><tr>
        <td width="5%" align="center"><img src="/themes/img/info_bad.png"></td>
        <td width="95%"><?= $error ?></td>
      </tr></tbody></table>
    <?php } } ?>

    <style>
      .bj-wrap { font-family:"Segoe UI",Arial,sans-serif; color:#e9e9ee; }
      .bj-cash { margin:10px 0 14px; font-size:15px; } .bj-cash b { color:#e0b34c; }
      .bj-area { background:#16351f; border:1px solid #2c5e3a; border-radius:12px; padding:14px; margin-bottom:14px; }
      .bj-row { margin-bottom:12px; }
      .bj-row h3 { margin:0 0 6px; font-size:14px; color:#cfe9d6; font-weight:600; }
      .bj-cards { display:flex; gap:8px; flex-wrap:wrap; }
      .bj-card { width:46px; height:64px; background:#fff; border-radius:6px; color:#222;
        display:flex; align-items:center; justify-content:center; font-size:18px; font-weight:700;
        box-shadow:0 2px 6px rgba(0,0,0,.4); }
      .bj-card.red { color:#c0392b; }
      .bj-card.back { background:repeating-linear-gradient(45deg,#34343b,#34343b 6px,#26262b 6px,#26262b 12px);
        color:transparent; }
      .bj-val { font-size:13px; color:#9a9aa6; margin-top:4px; }
      .bj-msg { padding:10px 12px; border-radius:8px; background:#26262b; border:1px solid #34343b;
        margin-bottom:14px; font-size:14px; }
      .bj-field label { display:block; font-size:13px; color:#9a9aa6; margin-bottom:4px; }
      .bj-field input { background:#1c1c1f; border:1px solid #34343b; border-radius:8px;
        color:#e9e9ee; padding:9px 12px; font-size:14px; width:200px; }
      .bj-btn { border:none; border-radius:8px; cursor:pointer; padding:11px 26px; margin-right:8px;
        font-size:14px; font-weight:700; color:#fff; }
      .bj-hit { background:#1e8e3e; } .bj-stand { background:#c0392b; } .bj-deal { background:#c0392b; }
      .bj-btn:hover { filter:brightness(1.12); }
    </style>

    <?php
      function bj_render_card($c) {
          $red = in_array($c['s'], ['♥','♦']);
          echo '<div class="bj-card' . ($red ? ' red' : '') . '">' . $c['r'] . $c['s'] . '</div>';
      }
    ?>

    <div class="bj-wrap">
      <div class="bj-cash">Dein Bargeld: <b>&euro; <?= number($cash) ?></b></div>

      <?php if ($bj_state !== null): ?>
        <div class="bj-area">
          <div class="bj-row">
            <h3>Dealer</h3>
            <div class="bj-cards">
              <?php
                foreach ($bj_state['dealer'] as $i => $c) {
                    if ($i === 1 && empty($bj_state['done'])) {
                        echo '<div class="bj-card back">?</div>';
                    } else {
                        bj_render_card($c);
                    }
                }
              ?>
            </div>
            <?php if (!empty($bj_state['done'])): ?>
              <div class="bj-val">Wert: <?= bj_value($bj_state['dealer']) ?></div>
            <?php endif; ?>
          </div>

          <div class="bj-row">
            <h3>Du</h3>
            <div class="bj-cards">
              <?php foreach ($bj_state['player'] as $c) { bj_render_card($c); } ?>
            </div>
            <div class="bj-val">Wert: <?= bj_value($bj_state['player']) ?></div>
          </div>
        </div>

        <?php if (!empty($bj_state['msg'])): ?>
          <div class="bj-msg"><?= $bj_state['msg'] ?></div>
        <?php endif; ?>
      <?php endif; ?>

      <?php if ($bj_state !== null && empty($bj_state['done'])): ?>
        <form method="post" action="" style="display:inline">
          <input type="hidden" name="action" value="hit">
          <button class="bj-btn bj-hit" type="submit">Karte (Hit)</button>
        </form>
        <form method="post" action="" style="display:inline">
          <input type="hidden" name="action" value="stand">
          <button class="bj-btn bj-stand" type="submit">Halten (Stand)</button>
        </form>
      <?php else: ?>
        <form method="post" action="">
          <div class="bj-field" style="margin-bottom:12px;">
            <label for="bj-amount">Einsatz (&euro; <?= number($bj_min) ?> &ndash; <?= number($bj_max) ?>)</label>
            <input type="number" id="bj-amount" name="amount" min="<?= $bj_min ?>" max="<?= $bj_max ?>"
                   step="100" value="<?= isset($_POST['amount']) ? (int)$_POST['amount'] : $bj_min ?>" required>
          </div>
          <input type="hidden" name="action" value="deal">
          <button class="bj-btn bj-deal" type="submit">🃏 Neue Hand</button>
        </form>
      <?php endif; ?>
    </div>
  </div>
</div>
