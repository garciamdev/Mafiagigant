<div class="content_block">
  <div class="content_inner">
    <h1>Familie</h1>

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

    <?php if (empty($fam_ready)): ?>
      <table class="info_bad"><tbody><tr>
        <td width="5%" align="center"><img src="/themes/img/info_bad.png"></td>
        <td width="95%">Das Family-System ist noch nicht aktiviert. Bitte einmal
          <b>core/migrations/family.sql</b> in der Datenbank ausführen.</td>
      </tr></tbody></table>
    <?php else: ?>

    <style>
      .fm-wrap { font-family:"Segoe UI",Arial,sans-serif; color:#e9e9ee; }
      .fm-card { background:#26262b; border:1px solid #34343b; border-radius:10px; padding:16px; margin-bottom:14px; }
      .fm-card h2 { margin:0 0 10px; font-size:16px; color:#e0b34c; }
      .fm-row { display:flex; justify-content:space-between; align-items:center;
        border-bottom:1px solid #2a2a30; padding:7px 0; font-size:14px; }
      .fm-row:last-child { border-bottom:none; }
      .fm-row a { color:#e0b34c; text-decoration:none; }
      .fm-stat { display:flex; gap:20px; margin-bottom:12px; font-size:15px; } .fm-stat b { color:#e0b34c; }
      .fm-field { display:inline-flex; gap:8px; align-items:center; margin:6px 12px 6px 0; }
      .fm-field input { background:#1c1c1f; border:1px solid #34343b; border-radius:8px;
        color:#e9e9ee; padding:8px 10px; font-size:14px; width:150px; }
      .fm-btn { border:none; border-radius:8px; cursor:pointer; padding:9px 18px;
        font-size:14px; font-weight:700; color:#fff; background:#c0392b; }
      .fm-btn:hover { background:#d6492f; }
      .fm-btn.green { background:#1e8e3e; }
    </style>

    <div class="fm-wrap">

      <?php if ($myfam !== null): /* ===== MITGLIED EINER FAMILIE ===== */
        $is_boss = strcasecmp($myfam['owner'], $userdata[0]['username']) === 0; ?>

        <div class="fm-card">
          <h2>👪 <?= htmlspecialchars($myfam['familyname']) ?></h2>
          <div class="fm-stat">
            <span>Boss: <b><?= htmlspecialchars($myfam['owner']) ?></b></span>
            <span>Mitglieder: <b><?= count($fam_members) ?></b></span>
            <span>Gesamtstärke: <b><?= number($fam_power) ?></b></span>
          </div>
        </div>

        <div class="fm-card">
          <h2>🏦 Family-Bank: € <?= number((int) $myfam['money']) ?></h2>
          <form method="post" action="" style="display:inline">
            <span class="fm-field"><input type="number" name="amount" min="1" placeholder="Betrag"></span>
            <button class="fm-btn green" type="submit" name="deposit" value="1">Einzahlen</button>
          </form>
          <?php if ($is_boss): ?>
            <form method="post" action="" style="display:inline">
              <span class="fm-field"><input type="number" name="amount" min="1" placeholder="Betrag"></span>
              <button class="fm-btn" type="submit" name="withdraw" value="1">Auszahlen (Boss)</button>
            </form>
          <?php endif; ?>
        </div>

        <div class="fm-card">
          <h2>Mitglieder</h2>
          <?php foreach ($fam_members as $m): ?>
            <div class="fm-row">
              <span><a href="member/<?= urlencode($m['username']) ?>"><?= htmlspecialchars($m['username']) ?></a>
                <?= strcasecmp($m['username'], $myfam['owner']) === 0 ? ' 👑' : '' ?></span>
              <span style="color:#9a9aa6;">Stärke <?= number((int) $m['att_power'] + (int) $m['deff_power']) ?></span>
            </div>
          <?php endforeach; ?>
        </div>

        <form method="post" action="" onsubmit="return confirm('<?= $is_boss ? 'Familie wirklich auflösen?' : 'Familie wirklich verlassen?' ?>');">
          <button class="fm-btn" type="submit" name="leave" value="1">
            <?= $is_boss ? '❌ Familie auflösen' : '🚪 Familie verlassen' ?>
          </button>
        </form>

      <?php elseif ($fam_section === 'new'): /* ===== GRÜNDEN ===== */ ?>

        <div class="fm-card">
          <h2>Neue Familie gründen</h2>
          <p style="color:#9a9aa6; font-size:13px;">Kosten: € <?= number($fam_create_cost) ?> (von deinem Bargeld).</p>
          <form method="post" action="<?= BASE_URL ?>family/new">
            <div class="fm-field">
              <input type="text" name="familyname" maxlength="30" placeholder="Familienname" style="width:220px" required>
            </div>
            <input type="hidden" name="create" value="1">
            <button class="fm-btn green" type="submit">👪 Gründen</button>
            <a class="fm-btn" style="text-decoration:none" href="<?= BASE_URL ?>family/">Zurück</a>
          </form>
        </div>

      <?php else: /* ===== ÜBERSICHT (ohne Familie) ===== */ ?>

        <div class="fm-card" style="display:flex; justify-content:space-between; align-items:center;">
          <span style="font-size:14px; color:#9a9aa6;">Du bist in keiner Familie. Tritt einer bei oder gründe deine eigene.</span>
          <a class="fm-btn green" style="text-decoration:none" href="<?= BASE_URL ?>family/new">+ Familie gründen</a>
        </div>

        <div class="fm-card">
          <h2>Alle Familien</h2>
          <?php if (empty($fam_list)): ?>
            <p style="color:#9a9aa6; font-size:14px;">Noch keine Familien gegründet. Sei der Erste! 👪</p>
          <?php else: ?>
            <?php foreach ($fam_list as $f): ?>
              <div class="fm-row">
                <span><b><?= htmlspecialchars($f['familyname']) ?></b>
                  <span style="color:#9a9aa6;"> · Boss <?= htmlspecialchars($f['owner']) ?></span></span>
                <span style="display:flex; gap:14px; align-items:center;">
                  <span style="color:#9a9aa6;"><?= (int) $f['members'] ?> 👤 · <?= number((int) $f['power']) ?> 💪</span>
                  <form method="post" action="">
                    <input type="hidden" name="family_id" value="<?= (int) $f['id'] ?>">
                    <button class="fm-btn green" type="submit" name="join" value="1">Beitreten</button>
                  </form>
                </span>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>

      <?php endif; ?>
    </div>
    <?php endif; ?>
  </div>
</div>
