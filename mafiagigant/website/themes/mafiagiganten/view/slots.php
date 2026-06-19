<div class="content_block">
  <div class="content_inner">
    <h1>Spielautomat</h1>

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
      .sl-wrap { font-family:"Segoe UI",Arial,sans-serif; color:#e9e9ee; }
      .sl-reels {
        display:flex; gap:12px; justify-content:center; margin:16px 0;
      }
      .sl-reel {
        width:84px; height:84px; border-radius:12px;
        background:#1c1c1f; border:3px solid #e0b34c;
        display:flex; align-items:center; justify-content:center;
        font-size:44px; line-height:1;
      }
      .sl-cash { text-align:center; margin-bottom:14px; font-size:15px; }
      .sl-cash b { color:#e0b34c; }
      .sl-field { text-align:center; margin-bottom:14px; }
      .sl-field label { display:block; font-size:13px; color:#9a9aa6; margin-bottom:4px; }
      .sl-field input {
        background:#1c1c1f; border:1px solid #34343b; border-radius:8px;
        color:#e9e9ee; padding:9px 12px; font-size:14px; width:200px; text-align:center;
      }
      .sl-spin {
        display:block; margin:0 auto; cursor:pointer; border:none; border-radius:10px;
        padding:14px 40px; font-size:16px; font-weight:700; color:#fff; background:#c0392b;
      }
      .sl-spin:hover { background:#d6492f; }
      .sl-pay { margin-top:18px; font-size:13px; color:#9a9aa6; }
      .sl-pay table { width:100%; border-collapse:collapse; }
      .sl-pay td { padding:4px 8px; border-bottom:1px solid #2a2a30; }
    </style>

    <div class="sl-wrap">
      <div class="sl-reels">
        <?php
          $show = $slots_reels !== null
                ? [$slots_symbols[$slots_reels[0]]['emoji'], $slots_symbols[$slots_reels[1]]['emoji'], $slots_symbols[$slots_reels[2]]['emoji']]
                : ['🍒', '🔔', '💎'];
          foreach ($show as $emoji) {
              echo '<div class="sl-reel">' . $emoji . '</div>';
          }
        ?>
      </div>

      <div class="sl-cash">Dein Bargeld: <b>&euro; <?= number($cash) ?></b></div>

      <form method="post" action="">
        <div class="sl-field">
          <label for="sl-amount">Einsatz (&euro; <?= number($slots_min) ?> &ndash; <?= number($slots_max) ?>)</label>
          <input type="number" id="sl-amount" name="amount" min="<?= $slots_min ?>"
                 max="<?= $slots_max ?>" step="100"
                 value="<?= isset($_POST['amount']) ? (int)$_POST['amount'] : $slots_min ?>" required>
        </div>
        <button class="sl-spin" type="submit" name="spin" value="1">🎰 Drehen</button>
      </form>

      <div class="sl-pay">
        <table>
          <tr><td>💎 💎 💎</td><td align="right">50×</td></tr>
          <tr><td>7️⃣ 7️⃣ 7️⃣</td><td align="right">25×</td></tr>
          <tr><td>⭐ ⭐ ⭐</td><td align="right">15×</td></tr>
          <tr><td>🔔 🔔 🔔</td><td align="right">10×</td></tr>
          <tr><td>🍋 🍋 🍋</td><td align="right">5×</td></tr>
          <tr><td>🍒 🍒 🍒</td><td align="right">3×</td></tr>
          <tr><td>🍒 🍒 (zwei Kirschen)</td><td align="right">2×</td></tr>
        </table>
      </div>
    </div>
  </div>
</div>
