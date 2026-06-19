<div class="content_block">
  <div class="content_inner">
    <h1>Nachrichten</h1>

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

    <?php if (empty($mail_ready)): ?>
      <table class="info_bad"><tbody><tr>
        <td width="5%" align="center"><img src="/themes/img/info_bad.png"></td>
        <td width="95%">Das Nachrichtensystem ist noch nicht aktiviert. Bitte einmal
          <b>core/migrations/messages.sql</b> in der Datenbank ausführen.</td>
      </tr></tbody></table>
    <?php else: ?>

    <style>
      .ma-wrap { font-family:"Segoe UI",Arial,sans-serif; color:#e9e9ee; }
      .ma-tabs { display:flex; gap:8px; margin-bottom:14px; }
      .ma-tab { padding:9px 16px; border-radius:8px; text-decoration:none; font-size:14px; font-weight:600;
        background:#26262b; color:#e9e9ee; border:1px solid #34343b; }
      .ma-tab.active { background:#c0392b; border-color:#c0392b; }
      .ma-msg { display:flex; justify-content:space-between; align-items:center; gap:10px;
        background:#26262b; border:1px solid #34343b; border-radius:8px; padding:10px 12px; margin-bottom:7px; }
      .ma-msg.unread { border-left:3px solid #e0b34c; }
      .ma-msg a.subj { color:#e9e9ee; text-decoration:none; font-weight:600; font-size:14px; }
      .ma-msg .meta { font-size:12px; color:#9a9aa6; }
      .ma-del { color:#c0392b; text-decoration:none; font-weight:700; font-size:16px; }
      .ma-field { margin-bottom:12px; }
      .ma-field label { display:block; font-size:13px; color:#9a9aa6; margin-bottom:4px; }
      .ma-field input, .ma-field textarea { width:100%; max-width:480px; box-sizing:border-box;
        background:#1c1c1f; border:1px solid #34343b; border-radius:8px; color:#e9e9ee; padding:9px 12px; font-size:14px; }
      .ma-field textarea { max-width:100%; min-height:140px; resize:vertical; }
      .ma-btn { border:none; border-radius:8px; cursor:pointer; padding:11px 26px; font-size:14px; font-weight:700; color:#fff; background:#c0392b; }
      .ma-btn:hover { background:#d6492f; }
      .ma-open { background:#26262b; border:1px solid #34343b; border-radius:10px; padding:16px; margin-bottom:14px; }
      .ma-open .h { font-size:16px; color:#e0b34c; font-weight:700; margin-bottom:4px; }
      .ma-open .meta { font-size:12px; color:#9a9aa6; margin-bottom:12px; }
      .ma-open .body { font-size:14px; line-height:1.5; white-space:pre-wrap; }
    </style>

    <div class="ma-wrap">
      <div class="ma-tabs">
        <a class="ma-tab <?= $mail_section === 'inbox' ? 'active' : '' ?>" href="<?= BASE_URL ?>mail/inbox">
          📥 Posteingang<?= $mail_unread > 0 ? ' (' . $mail_unread . ')' : '' ?>
        </a>
        <a class="ma-tab <?= $mail_section === 'compose' ? 'active' : '' ?>" href="<?= BASE_URL ?>mail/compose">
          ✉️ Neue Nachricht
        </a>
      </div>

      <?php if ($mail_open !== null): ?>
        <div class="ma-open">
          <div class="h"><?= htmlspecialchars($mail_open['subject']) ?></div>
          <div class="meta">Von <b><?= htmlspecialchars($mail_open['from_user']) ?></b> · <?= htmlspecialchars($mail_open['created_at']) ?></div>
          <div class="body"><?= nl2br(htmlspecialchars($mail_open['body'])) ?></div>
          <p style="margin-top:14px;">
            <a class="ma-tab" href="<?= BASE_URL ?>mail/compose?to=<?= urlencode($mail_open['from_user']) ?>">↩️ Antworten</a>
          </p>
        </div>
      <?php endif; ?>

      <?php if ($mail_section === 'compose'): ?>
        <form method="post" action="<?= BASE_URL ?>mail/compose">
          <div class="ma-field">
            <label for="ma-to">Empfänger</label>
            <input type="text" id="ma-to" name="to" maxlength="80"
                   value="<?= htmlspecialchars($mail_to_prefill) ?>" required>
          </div>
          <div class="ma-field">
            <label for="ma-subject">Betreff</label>
            <input type="text" id="ma-subject" name="subject" maxlength="150">
          </div>
          <div class="ma-field">
            <label for="ma-body">Nachricht</label>
            <textarea id="ma-body" name="body" maxlength="5000" required></textarea>
          </div>
          <input type="hidden" name="send" value="1">
          <button class="ma-btn" type="submit">✉️ Senden</button>
        </form>
      <?php else: ?>
        <?php if (empty($mail_list)): ?>
          <p style="color:#9a9aa6; font-size:14px;">Dein Posteingang ist leer. 📭</p>
        <?php else: ?>
          <?php foreach ($mail_list as $m): ?>
            <div class="ma-msg <?= (int) $m['is_read'] === 0 ? 'unread' : '' ?>">
              <div>
                <a class="subj" href="<?= BASE_URL ?>mail/inbox?read=<?= (int) $m['id'] ?>">
                  <?= (int) $m['is_read'] === 0 ? '🔵 ' : '' ?><?= htmlspecialchars($m['subject']) ?>
                </a>
                <div class="meta">von <?= htmlspecialchars($m['from_user']) ?> · <?= htmlspecialchars($m['created_at']) ?></div>
              </div>
              <a class="ma-del" href="<?= BASE_URL ?>mail/inbox?del=<?= (int) $m['id'] ?>" title="Löschen">🗑️</a>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      <?php endif; ?>
    </div>

    <?php endif; ?>
  </div>
</div>
