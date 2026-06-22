<div class="content_block">
  <div class="content_inner">
    <h1>Crew</h1>

    <style>
      .cr-wrap { font-family:"Segoe UI",Arial,sans-serif; color:#e9e9ee; }
      .cr-wrap p { font-size:14px; color:#cfd0d6; }
      .cr-item { display:flex; align-items:center; gap:12px;
        background:#26262b; border:1px solid #34343b; border-radius:10px; padding:12px 14px; margin-bottom:8px; }
      .cr-ava { width:40px; height:40px; border-radius:50%; background:#4E00FF; color:#fff;
        display:flex; align-items:center; justify-content:center; font-size:18px; font-weight:700; text-transform:uppercase; }
      .cr-info .name { font-weight:700; font-size:15px; }
      .cr-info .name a { color:#e0b34c; text-decoration:none; }
      .cr-info .role { font-size:12px; color:#9a9aa6; }
    </style>

    <div class="cr-wrap">
      <p>Diese Personen verwalten und betreuen das Spiel. Bei Problemen kannst du dich an ein Crew-Mitglied wenden.</p>

      <?php if (empty($crew_members)): ?>
        <p style="color:#9a9aa6;">Aktuell sind keine Crew-Mitglieder eingetragen.</p>
      <?php else: ?>
        <?php foreach ($crew_members as $m): ?>
          <div class="cr-item">
            <div class="cr-ava"><?= htmlspecialchars(mb_substr($m['username'], 0, 1)) ?></div>
            <div class="cr-info">
              <div class="name"><a href="member/<?= urlencode($m['username']) ?>"><?= htmlspecialchars($m['username']) ?></a></div>
              <div class="role">👑 Crew &middot; Rang <?= (int) $m['rank'] ?></div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
</div>
