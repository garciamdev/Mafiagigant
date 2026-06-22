<div class="content_block">
  <div class="content_inner">
    <h1>Gericht</h1>

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
      .co-wrap { font-family:"Segoe UI",Arial,sans-serif; color:#e9e9ee; text-align:center; }
      .co-ico { font-size:56px; margin:8px 0; }
      .co-cash { font-size:14px; color:#9a9aa6; margin-bottom:12px; } .co-cash b { color:#e0b34c; }
      .co-card { background:#26262b; border:1px solid #34343b; border-radius:10px; padding:18px; max-width:420px; margin:0 auto; }
      .co-cost { font-size:20px; color:#e0b34c; font-weight:800; margin:6px 0; }
      .co-btn { border:none; border-radius:10px; cursor:pointer; padding:12px 30px; margin-top:10px;
        font-size:15px; font-weight:700; color:#fff; background:#c0392b; }
      .co-btn:hover { background:#d6492f; }
    </style>

    <div class="co-wrap">
      <div class="co-cash">Dein Bargeld: <b>&euro; <?= number($cash) ?></b></div>

      <?php if ($court_left > 0):
        $h = floor($court_left / 3600); $m = floor(($court_left % 3600) / 60); $s = $court_left % 60;
      ?>
        <div class="co-ico">⚖️🔒</div>
        <div class="co-card">
          <p>Du sitzt im Gefängnis. Restzeit:
            <b><?= sprintf('%02d:%02d:%02d', $h, $m, $s) ?></b></p>
          <p>Gegen Kaution kommst du sofort frei:</p>
          <div class="co-cost">€ <?= number($court_cost) ?></div>
          <form method="post" action="">
            <input type="hidden" name="bail" value="1">
            <button class="co-btn" type="submit">⚖️ Kaution zahlen &amp; freikommen</button>
          </form>
          <p style="font-size:12px;color:#9a9aa6;margin-top:10px;">10.000 € je angefangene Minute Resthaft.</p>
        </div>
      <?php else: ?>
        <div class="co-ico">⚖️</div>
        <div class="co-card">
          <p>Du bist auf freiem Fuß – kein laufendes Verfahren. 👍</p>
          <p style="font-size:13px;color:#9a9aa6;">Falls du bei einem Verbrechen erwischt wirst und ins Gefängnis kommst,
            kannst du dich hier gegen Kaution freikaufen.</p>
        </div>
      <?php endif; ?>
    </div>
  </div>
</div>
