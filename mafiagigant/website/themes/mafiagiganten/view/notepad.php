<div class="content_block">
  <div class="content_inner">
    <h1>Notizblock</h1>

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

    <?php if (empty($notepad_ready)): ?>
      <table class="info_bad"><tbody><tr>
        <td width="5%" align="center"><img src="/themes/img/info_bad.png"></td>
        <td width="95%">Der Notizblock ist noch nicht aktiviert. Bitte einmal
          <b>core/migrations/notepad.sql</b> in der Datenbank ausführen.</td>
      </tr></tbody></table>
    <?php endif; ?>

    <style>
      .np-wrap { font-family:"Segoe UI",Arial,sans-serif; color:#e9e9ee; }
      .np-wrap textarea { width:100%; box-sizing:border-box; min-height:280px; resize:vertical;
        background:#1c1c1f; border:1px solid #34343b; border-radius:10px;
        color:#e9e9ee; padding:12px; font-size:14px; line-height:1.5; }
      .np-btn { margin-top:10px; border:none; border-radius:8px; cursor:pointer; padding:11px 26px;
        font-size:14px; font-weight:700; color:#fff; background:#c0392b; }
      .np-btn:hover { background:#d6492f; } .np-btn[disabled] { opacity:.5; cursor:not-allowed; }
    </style>

    <div class="np-wrap">
      <p style="color:#9a9aa6; font-size:13px;">Nur für dich sichtbar. Notiere dir Pläne, Ziele oder Feinde. 📝</p>
      <form method="post" action="">
        <textarea name="note" maxlength="5000" placeholder="Deine Notizen …"><?= htmlspecialchars($notepad_text) ?></textarea>
        <input type="hidden" name="save_note" value="1">
        <br>
        <button class="np-btn" type="submit" <?= empty($notepad_ready) ? 'disabled' : '' ?>>💾 Speichern</button>
      </form>
    </div>
  </div>
</div>
