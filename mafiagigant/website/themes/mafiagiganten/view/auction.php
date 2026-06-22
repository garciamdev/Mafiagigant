<div class="content_block">
  <div class="content_inner">
    <h1>Auktionshaus</h1>

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

    <?php if (empty($auction_ready)): ?>
      <table class="info_bad"><tbody><tr>
        <td width="5%" align="center"><img src="/themes/img/info_bad.png"></td>
        <td width="95%">Das Auktionshaus ist noch nicht aktiviert. Bitte einmal
          <b>core/migrations/auctions.sql</b> in der Datenbank ausführen.</td>
      </tr></tbody></table>
    <?php else: ?>

    <style>
      .au-wrap { font-family:"Segoe UI",Arial,sans-serif; color:#e9e9ee; }
      .au-cash { margin:8px 0 16px; font-size:15px; } .au-cash b { color:#e0b34c; }
      .au-card { background:#26262b; border:1px solid #34343b; border-radius:10px; padding:12px; margin-bottom:10px;
        display:flex; gap:14px; align-items:center; }
      .au-img { flex:0 0 96px; width:96px; height:64px; background:#1c1c1f; border-radius:6px;
        display:flex; align-items:center; justify-content:center; overflow:hidden; }
      .au-img img { max-width:96px; max-height:64px; }
      .au-info { flex:1; min-width:0; }
      .au-name { font-size:15px; font-weight:700; color:#e0b34c; }
      .au-meta { font-size:12px; color:#9a9aa6; margin-top:2px; }
      .au-bid { flex:0 0 auto; text-align:right; }
      .au-bid .cur { font-size:14px; } .au-bid .cur b { color:#2ecc71; }
      .au-bidform { margin-top:6px; display:flex; gap:6px; }
      .au-bidform input { width:120px; background:#1c1c1f; border:1px solid #34343b; border-radius:6px;
        color:#e9e9ee; padding:7px 9px; font-size:13px; }
      .au-btn { border:none; border-radius:6px; cursor:pointer; padding:7px 14px; font-weight:700; color:#fff; background:#c0392b; font-size:13px; }
      .au-btn:hover { background:#d6492f; }
      .au-sep { margin:22px 0 12px; font-size:17px; color:#e0b34c; border-top:1px solid #34343b; padding-top:16px; }
      .au-field { margin-bottom:10px; }
      .au-field label { display:block; font-size:13px; color:#9a9aa6; margin-bottom:4px; }
      .au-field select, .au-field input { background:#1c1c1f; border:1px solid #34343b; border-radius:8px;
        color:#e9e9ee; padding:8px 10px; font-size:14px; min-width:240px; }
    </style>

    <div class="au-wrap">
      <div class="au-cash">Dein Bargeld: <b>&euro; <?= number($auction_cash) ?></b></div>

      <!-- ===== Laufende Auktionen ===== -->
      <?php if (empty($auction_list)): ?>
        <p style="color:#9a9aa6; font-size:14px;">Aktuell laufen keine Auktionen. Sei der Erste und versteigere ein Auto! 🔨</p>
      <?php else: ?>
        <?php foreach ($auction_list as $a):
          $left = strtotime($a['ends_at']) - time();
          if ($left < 0) { $left = 0; }
          $h = floor($left / 3600); $m = floor(($left % 3600) / 60);
          $min_next = max((int) $a['min_bid'], (int) $a['current_bid'] + 1);
        ?>
          <div class="au-card">
            <div class="au-img"><?php if (!empty($a['car_img'])): ?><img src="<?= htmlspecialchars($a['car_img']) ?>" alt=""><?php else: ?>🚗<?php endif; ?></div>
            <div class="au-info">
              <div class="au-name">🚗 <?= htmlspecialchars($a['car_name']) ?></div>
              <div class="au-meta">Verkäufer: <?= htmlspecialchars($a['seller']) ?> &middot; endet in <?= $h ?>h <?= $m ?>m</div>
              <div class="au-meta">Mindestgebot: € <?= number($a['min_bid']) ?></div>
            </div>
            <div class="au-bid">
              <div class="cur">
                <?php if ($a['current_bidder'] !== ''): ?>
                  Höchstgebot: <b>€ <?= number($a['current_bid']) ?></b><br>
                  <span style="font-size:11px;color:#9a9aa6;">von <?= htmlspecialchars($a['current_bidder']) ?></span>
                <?php else: ?>
                  <span style="color:#9a9aa6;">Noch keine Gebote</span>
                <?php endif; ?>
              </div>
              <?php if ($a['seller'] !== $userdata[0]['username'] && $a['current_bidder'] !== $userdata[0]['username']): ?>
                <form class="au-bidform" method="post" action="">
                  <input type="hidden" name="auction_id" value="<?= (int) $a['id'] ?>">
                  <input type="number" name="bid_amount" min="<?= $min_next ?>" step="1" value="<?= $min_next ?>" required>
                  <button class="au-btn" type="submit" name="bid" value="1">Bieten</button>
                </form>
              <?php elseif ($a['current_bidder'] === $userdata[0]['username']): ?>
                <div style="font-size:12px;color:#2ecc71;margin-top:4px;">✓ Du bist Höchstbietender</div>
              <?php else: ?>
                <div style="font-size:12px;color:#9a9aa6;margin-top:4px;">Deine Auktion</div>
              <?php endif; ?>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>

      <!-- ===== Eigenes Auto versteigern ===== -->
      <div class="au-sep">Eigenes Auto versteigern</div>
      <?php if (empty($auction_mycars)): ?>
        <p style="color:#9a9aa6; font-size:14px;">Du hast keine Autos in der Garage, die du versteigern könntest.</p>
      <?php else: ?>
        <form method="post" action="">
          <div class="au-field">
            <label for="au-car">Auto auswählen</label>
            <select id="au-car" name="garage_id">
              <?php foreach ($auction_mycars as $car): ?>
                <option value="<?= (int) $car['id'] ?>">
                  <?= htmlspecialchars($car['name'] ?: 'Auto') ?> (Wert ca. € <?= number($car['newprice']) ?>, Schaden <?= (int) $car['demage'] ?>%)
                </option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="au-field">
            <label for="au-min">Mindestgebot (&euro;)</label>
            <input type="number" id="au-min" name="min_bid" min="1" step="1" value="10000" required>
          </div>
          <div class="au-field">
            <label for="au-hours">Laufzeit</label>
            <select id="au-hours" name="hours">
              <option value="6">6 Stunden</option>
              <option value="12" selected>12 Stunden</option>
              <option value="24">24 Stunden</option>
            </select>
          </div>
          <button class="au-btn" type="submit" name="create" value="1">🔨 Versteigern</button>
        </form>
        <p style="color:#9a9aa6; font-size:12px; margin-top:8px;">
          Hinweis: Während der Auktion ist das Auto „in Verwahrung" und nicht in deiner Garage nutzbar.
          Bei Verkauf bekommst du das Geld, sonst das Auto zurück.
        </p>
      <?php endif; ?>
    </div>

    <?php endif; ?>
  </div>
</div>
