<div class="content_block">
  <div class="content_inner">
    <h1>Forum</h1>

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

    <?php if (empty($forum_ready)): ?>
      <table class="info_bad"><tbody><tr>
        <td width="5%" align="center"><img src="/themes/img/info_bad.png"></td>
        <td width="95%">Das Forum ist noch nicht aktiviert. Bitte einmal
          <b>core/migrations/forum.sql</b> in der Datenbank ausführen.</td>
      </tr></tbody></table>
    <?php else: ?>

    <style>
      .fo-wrap { font-family:"Segoe UI",Arial,sans-serif; color:#e9e9ee; }
      .fo-bar { display:flex; justify-content:space-between; align-items:center; margin-bottom:14px; }
      .fo-btn { border:none; border-radius:8px; cursor:pointer; padding:9px 16px; text-decoration:none;
        font-size:14px; font-weight:700; color:#fff; background:#c0392b; display:inline-block; }
      .fo-btn:hover { background:#d6492f; }
      .fo-thread { display:flex; justify-content:space-between; align-items:center;
        background:#26262b; border:1px solid #34343b; border-radius:8px; padding:11px 14px; margin-bottom:7px; }
      .fo-thread a { color:#e0b34c; text-decoration:none; font-weight:600; font-size:15px; }
      .fo-thread .meta { font-size:12px; color:#9a9aa6; }
      .fo-post { background:#26262b; border:1px solid #34343b; border-radius:10px; padding:12px 14px; margin-bottom:10px; }
      .fo-post .head { font-size:13px; color:#9a9aa6; margin-bottom:6px; }
      .fo-post .head b { color:#e0b34c; }
      .fo-post .body { font-size:14px; line-height:1.5; white-space:pre-wrap; }
      .fo-field { margin-bottom:12px; }
      .fo-field label { display:block; font-size:13px; color:#9a9aa6; margin-bottom:4px; }
      .fo-field input, .fo-field textarea { width:100%; max-width:560px; box-sizing:border-box;
        background:#1c1c1f; border:1px solid #34343b; border-radius:8px; color:#e9e9ee; padding:9px 12px; font-size:14px; }
      .fo-field textarea { max-width:100%; min-height:120px; resize:vertical; }
    </style>

    <div class="fo-wrap">

      <?php if ($forum_thread !== null): ?>
        <div class="fo-bar">
          <a class="fo-btn" href="<?= BASE_URL ?>forum/">&larr; Übersicht</a>
        </div>
        <h2 style="color:#e0b34c; font-size:18px;"><?= htmlspecialchars($forum_thread['title']) ?></h2>
        <?php foreach ($forum_posts as $p): ?>
          <div class="fo-post">
            <div class="head">👤 <b><?= htmlspecialchars($p['author']) ?></b> · <?= htmlspecialchars($p['created_at']) ?></div>
            <div class="body"><?= nl2br(htmlspecialchars($p['body'])) ?></div>
          </div>
        <?php endforeach; ?>

        <h3 style="color:#cfd0d6; font-size:15px; margin-top:18px;">Antworten</h3>
        <form method="post" action="<?= BASE_URL ?>forum/">
          <input type="hidden" name="thread_id" value="<?= (int) $forum_thread['id'] ?>">
          <div class="fo-field">
            <textarea name="body" maxlength="5000" required placeholder="Deine Antwort …"></textarea>
          </div>
          <input type="hidden" name="reply" value="1">
          <button class="fo-btn" type="submit">💬 Antworten</button>
        </form>

      <?php elseif ($forum_section === 'new'): ?>
        <div class="fo-bar">
          <a class="fo-btn" href="<?= BASE_URL ?>forum/">&larr; Übersicht</a>
        </div>
        <form method="post" action="<?= BASE_URL ?>forum/new">
          <div class="fo-field">
            <label for="fo-title">Titel</label>
            <input type="text" id="fo-title" name="title" maxlength="150" required>
          </div>
          <div class="fo-field">
            <label for="fo-body">Text</label>
            <textarea id="fo-body" name="body" maxlength="5000" required></textarea>
          </div>
          <input type="hidden" name="new_thread" value="1">
          <button class="fo-btn" type="submit">💬 Thema erstellen</button>
        </form>

      <?php else: ?>
        <div class="fo-bar">
          <span style="color:#9a9aa6; font-size:14px;">Diskutiere mit anderen Spielern.</span>
          <a class="fo-btn" href="<?= BASE_URL ?>forum/new">+ Neues Thema</a>
        </div>
        <?php if (empty($forum_threads)): ?>
          <p style="color:#9a9aa6; font-size:14px;">Noch keine Themen. Erstelle das erste! 💬</p>
        <?php else: ?>
          <?php foreach ($forum_threads as $t): ?>
            <div class="fo-thread">
              <div>
                <a href="<?= BASE_URL ?>forum/?thread=<?= (int) $t['id'] ?>"><?= htmlspecialchars($t['title']) ?></a>
                <div class="meta">von <?= htmlspecialchars($t['author']) ?> · <?= (int) $t['replies'] ?> Antworten</div>
              </div>
              <div class="meta"><?= htmlspecialchars($t['last_post_at']) ?></div>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      <?php endif; ?>

    </div>
    <?php endif; ?>
  </div>
</div>
