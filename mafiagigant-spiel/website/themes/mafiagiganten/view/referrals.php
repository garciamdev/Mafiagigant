<div class="content_block">
  <div class="content_inner">
    <h1>Empfehlungen</h1>

    <?php if (empty($ref_ready)): ?>
      <table class="info_bad"><tbody><tr>
        <td width="5%" align="center"><img src="/themes/img/info_bad.png"></td>
        <td width="95%">Die Empfehlungen sind noch nicht aktiviert. Bitte einmal
          <b>core/migrations/referrals.sql</b> in der Datenbank ausführen.</td>
      </tr></tbody></table>
    <?php else: ?>

    <style>
      .rf-wrap { font-family:"Segoe UI",Arial,sans-serif; color:#e9e9ee; }
      .rf-card { background:#26262b; border:1px solid #34343b; border-radius:10px; padding:16px; margin-bottom:14px; }
      .rf-card h2 { margin:0 0 8px; font-size:16px; color:#e0b34c; }
      .rf-link { display:flex; gap:8px; }
      .rf-link input { flex:1; background:#1c1c1f; border:1px solid #34343b; border-radius:8px;
        color:#e9e9ee; padding:9px 12px; font-size:13px; }
      .rf-btn { border:none; border-radius:8px; cursor:pointer; padding:9px 16px; font-weight:700; color:#fff; background:#c0392b; }
      .rf-btn:hover { background:#d6492f; }
      .rf-row { display:flex; justify-content:space-between; border-bottom:1px solid #2a2a30; padding:7px 0; font-size:14px; }
      .rf-row:last-child { border-bottom:none; }
      .rf-row a { color:#e0b34c; text-decoration:none; }
      .rf-big { font-size:28px; font-weight:800; color:#2ecc71; }
    </style>

    <div class="rf-wrap">
      <div class="rf-card">
        <h2>🔗 Dein Einladungslink</h2>
        <p style="color:#9a9aa6; font-size:13px;">Teile diesen Link. Wer sich darüber registriert, zählt als deine Empfehlung – du erhältst <b>5 Credits</b> pro geworbenem Spieler.</p>
        <div class="rf-link">
          <input type="text" id="rf-link" value="<?= htmlspecialchars($ref_link) ?>" readonly onclick="this.select();">
          <button class="rf-btn" type="button" onclick="var i=document.getElementById('rf-link');i.select();document.execCommand('copy');this.textContent='Kopiert!';">Kopieren</button>
        </div>
      </div>

      <div class="rf-card">
        <h2>👥 Deine geworbenen Spieler</h2>
        <div class="rf-big"><?= count($ref_list) ?></div>
        <?php if (empty($ref_list)): ?>
          <p style="color:#9a9aa6; font-size:14px;">Noch niemand geworben. Teile deinen Link! 🤝</p>
        <?php else: ?>
          <?php foreach ($ref_list as $r): ?>
            <div class="rf-row">
              <span><a href="member/<?= urlencode($r['username']) ?>"><?= htmlspecialchars($r['username']) ?></a></span>
              <span style="color:#9a9aa6;">Rang <?= (int) $r['rank'] ?></span>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>

    <?php endif; ?>
  </div>
</div>
