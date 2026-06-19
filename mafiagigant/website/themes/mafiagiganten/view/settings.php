<div class="content_block">
  <div class="content_inner">
    <h1>Einstellungen</h1>

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
      .se-wrap { font-family:"Segoe UI",Arial,sans-serif; color:#e9e9ee; }
      .se-card { background:#26262b; border:1px solid #34343b; border-radius:10px; padding:16px; margin-bottom:16px; }
      .se-card h2 { margin:0 0 12px; font-size:16px; color:#e0b34c; }
      .se-field { margin-bottom:12px; }
      .se-field label { display:block; font-size:13px; color:#9a9aa6; margin-bottom:4px; }
      .se-field input, .se-field select, .se-field textarea {
        width:100%; max-width:360px; box-sizing:border-box;
        background:#1c1c1f; border:1px solid #34343b; border-radius:8px;
        color:#e9e9ee; padding:9px 12px; font-size:14px; }
      .se-field textarea { max-width:100%; min-height:90px; resize:vertical; }
      .se-btn { border:none; border-radius:8px; cursor:pointer; padding:11px 26px;
        font-size:14px; font-weight:700; color:#fff; background:#c0392b; }
      .se-btn:hover { background:#d6492f; }
    </style>

    <div class="se-wrap">
      <div class="se-card">
        <h2>🔒 Passwort ändern</h2>
        <form method="post" action="">
          <div class="se-field">
            <label for="se-cur">Aktuelles Passwort</label>
            <input type="password" id="se-cur" name="current" required>
          </div>
          <div class="se-field">
            <label for="se-new">Neues Passwort (min. 6 Zeichen)</label>
            <input type="password" id="se-new" name="new" required>
          </div>
          <div class="se-field">
            <label for="se-rep">Neues Passwort wiederholen</label>
            <input type="password" id="se-rep" name="repeat" required>
          </div>
          <input type="hidden" name="change_password" value="1">
          <button class="se-btn" type="submit">Passwort speichern</button>
        </form>
      </div>

      <div class="se-card">
        <h2>👤 Profil &amp; Account</h2>
        <form method="post" action="">
          <div class="se-field">
            <label for="se-email">E-Mail-Adresse</label>
            <input type="email" id="se-email" name="email"
                   value="<?= htmlspecialchars($userdata[0]['email'] ?? '') ?>">
          </div>
          <div class="se-field">
            <label for="se-gender">Geschlecht</label>
            <select id="se-gender" name="gender">
              <option value="none"   <?= ($userdata[0]['gender'] ?? '') === 'none'   ? 'selected' : '' ?>>Keine Angabe</option>
              <option value="male"   <?= ($userdata[0]['gender'] ?? '') === 'male'   ? 'selected' : '' ?>>Männlich</option>
              <option value="female" <?= ($userdata[0]['gender'] ?? '') === 'female' ? 'selected' : '' ?>>Weiblich</option>
            </select>
          </div>
          <div class="se-field">
            <label for="se-profile">Profiltext / Über mich</label>
            <textarea id="se-profile" name="profile" maxlength="2000"><?= htmlspecialchars($userdata[0]['profile'] ?? '') ?></textarea>
          </div>
          <input type="hidden" name="change_profile" value="1">
          <button class="se-btn" type="submit">Profil speichern</button>
        </form>
      </div>
    </div>
  </div>
</div>
