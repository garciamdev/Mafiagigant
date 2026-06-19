<div class="content_block">
  <div class="content_inner">
    <h1>Missionen</h1>

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

    <?php if (empty($missions_ready)): ?>
      <table class="info_bad"><tbody><tr>
        <td width="5%" align="center"><img src="/themes/img/info_bad.png"></td>
        <td width="95%">Die Missionen sind noch nicht aktiviert. Bitte einmal
          <b>core/migrations/missions.sql</b> in der Datenbank ausführen.</td>
      </tr></tbody></table>
    <?php endif; ?>

    <style>
      .ms-wrap { font-family:"Segoe UI",Arial,sans-serif; color:#e9e9ee; }
      .ms-item { background:#26262b; border:1px solid #34343b; border-radius:10px; padding:14px; margin-bottom:10px;
        display:flex; justify-content:space-between; align-items:center; gap:12px; }
      .ms-item.ms-done { border-color:#2c5e3a; background:#16351f; }
      .ms-info h3 { margin:0 0 4px; font-size:15px; color:#e0b34c; }
      .ms-info p { margin:0; font-size:13px; color:#cfd0d6; }
      .ms-info .rew { font-size:12px; color:#9a9aa6; margin-top:4px; }
      .ms-btn { border:none; border-radius:8px; cursor:pointer; padding:10px 18px;
        font-size:13px; font-weight:700; color:#fff; background:#c0392b; white-space:nowrap; }
      .ms-btn:hover { background:#d6492f; }
      .ms-btn[disabled] { opacity:.5; cursor:not-allowed; }
      .ms-tag { font-size:13px; font-weight:700; color:#2ecc71; white-space:nowrap; }
    </style>

    <div class="ms-wrap">
      <?php foreach ($mission_list as $mid => $m):
        $cur = (int) $userdata[0][$m['field']];
        $met = $cur >= $m['need'];
        $done = isset($claimed[$mid]);
        $rew = [];
        if ($m['cash'] > 0)    { $rew[] = '€ ' . number($m['cash']); }
        if ($m['bullets'] > 0) { $rew[] = number($m['bullets']) . ' Kugeln'; }
        if ($m['xp'] > 0)      { $rew[] = number($m['xp']) . ' XP'; }
      ?>
        <div class="ms-item <?= $done ? 'ms-done' : '' ?>">
          <div class="ms-info">
            <h3>🎯 <?= htmlspecialchars($m['title']) ?></h3>
            <p><?= htmlspecialchars($m['desc']) ?> (aktuell: <?= number($cur) ?> / <?= number($m['need']) ?>)</p>
            <div class="rew">Belohnung: <?= implode(', ', $rew) ?></div>
          </div>
          <div>
            <?php if ($done): ?>
              <span class="ms-tag">✓ Erledigt</span>
            <?php else: ?>
              <form method="post" action="">
                <input type="hidden" name="claim" value="<?= $mid ?>">
                <button class="ms-btn" type="submit" <?= (!$met || empty($missions_ready)) ? 'disabled' : '' ?>>
                  <?= $met ? 'Einlösen' : 'Offen' ?>
                </button>
              </form>
            <?php endif; ?>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
