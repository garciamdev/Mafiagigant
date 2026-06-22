<div class="content_block">
  <div class="content_inner">
    <h1>Protokolle</h1>

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

    <?php if (empty($logs_ready)): ?>
      <table class="info_bad"><tbody><tr>
        <td width="5%" align="center"><img src="/themes/img/info_bad.png"></td>
        <td width="95%">Die Protokolle sind noch nicht aktiviert. Bitte einmal
          <b>core/migrations/logs.sql</b> in der Datenbank ausführen.</td>
      </tr></tbody></table>
    <?php else: ?>

    <style>
      .lg-wrap { font-family:"Segoe UI",Arial,sans-serif; color:#e9e9ee; }
      .lg-row { display:flex; gap:10px; align-items:flex-start;
        background:#26262b; border:1px solid #34343b; border-radius:8px; padding:9px 12px; margin-bottom:6px; }
      .lg-ico { flex:0 0 24px; font-size:18px; text-align:center; }
      .lg-body { flex:1; min-width:0; }
      .lg-msg { font-size:14px; line-height:1.4; }
      .lg-time { font-size:11px; color:#9a9aa6; margin-top:2px; }
      .lg-row.attacked, .lg-row.attack { border-left:3px solid #c0392b; }
      .lg-row.defended { border-left:3px solid #2ecc71; }
      .lg-row.money { border-left:3px solid #e0b34c; }
      .lg-clear { margin-top:12px; border:none; border-radius:8px; cursor:pointer; padding:9px 18px;
        font-size:13px; font-weight:700; color:#fff; background:#34343b; }
      .lg-clear:hover { background:#c0392b; }
    </style>

    <?php
      $icons = ['attack' => '🔫', 'attacked' => '💀', 'defended' => '🛡️', 'money' => '💸', 'info' => 'ℹ️'];
    ?>
    <div class="lg-wrap">
      <p style="color:#9a9aa6; font-size:13px;">Deine letzten Ereignisse (max. 100). Wer dich angegriffen hat, siehst du hier.</p>

      <?php if (empty($log_entries)): ?>
        <p style="color:#9a9aa6; font-size:14px;">Noch keine Einträge. 📭</p>
      <?php else: ?>
        <?php foreach ($log_entries as $log):
          $type = $log['type'];
          $ico = isset($icons[$type]) ? $icons[$type] : 'ℹ️';
        ?>
          <div class="lg-row <?= htmlspecialchars($type) ?>">
            <div class="lg-ico"><?= $ico ?></div>
            <div class="lg-body">
              <div class="lg-msg"><?= htmlspecialchars($log['message']) ?></div>
              <div class="lg-time"><?= htmlspecialchars($log['created_at']) ?></div>
            </div>
          </div>
        <?php endforeach; ?>

        <form method="post" action="" onsubmit="return confirm('Wirklich alle Protokoll-Einträge löschen?');">
          <input type="hidden" name="clearlogs" value="1">
          <button class="lg-clear" type="submit">🗑️ Protokoll leeren</button>
        </form>
      <?php endif; ?>
    </div>

    <?php endif; ?>
  </div>
</div>
