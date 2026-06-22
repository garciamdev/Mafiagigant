<?php
// Fallback-Seite fuer Menuepunkte, deren Modul noch nicht gebaut ist.
// Verhindert leere/kaputt wirkende Seiten.
$feature = isset($module) ? htmlspecialchars($module, ENT_QUOTES, 'UTF-8') : '';
$feature = str_replace('-', ' ', $feature);
?>
<div class="content_block">
  <div class="content_inner">
    <div style="text-align:center; padding:48px 24px; color:#e9e9ee;
                font-family:'Segoe UI',Arial,sans-serif;">
      <div style="font-size:64px; line-height:1; margin-bottom:16px;">&#128679;</div>
      <h1 style="margin:0 0 10px; font-size:24px; color:#e0b34c;">
        Diese Funktion ist noch in Arbeit
      </h1>
      <?php if ($feature !== ''): ?>
        <p style="margin:0 0 18px; font-size:15px; color:#9a9aa6;">
          &bdquo;<strong style="color:#e9e9ee; text-transform:capitalize;"><?= $feature; ?></strong>&ldquo;
          wird gerade gebaut und steht bald zur Verf&uuml;gung. &#9203;
        </p>
      <?php endif; ?>
      <a href="<?= BASE_URL; ?>home/"
         style="display:inline-block; margin-top:8px; padding:10px 22px;
                background:#c0392b; color:#fff; text-decoration:none;
                border-radius:22px; font-weight:600;">
        &#8592; Zur&uuml;ck zur Startseite
      </a>
    </div>
  </div>
</div>
