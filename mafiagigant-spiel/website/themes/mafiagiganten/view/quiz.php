<div class="content_block">
  <div class="content_inner">
    <h1>Tägliches Quiz</h1>

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
      .qz-wrap { font-family:"Segoe UI",Arial,sans-serif; color:#e9e9ee; }
      .qz-q { font-size:17px; font-weight:600; margin:12px 0 16px; }
      .qz-opt { display:block; width:100%; text-align:left; box-sizing:border-box;
        background:#26262b; border:1px solid #34343b; border-radius:8px; cursor:pointer;
        color:#e9e9ee; padding:12px 14px; font-size:14px; margin-bottom:8px; }
      .qz-opt:hover { background:#1e8e3e; border-color:#1e8e3e; }
      .qz-info { color:#9a9aa6; font-size:13px; }
    </style>

    <div class="qz-wrap">
      <?php if ($quiz_wait > 0): ?>
        <p class="qz-info">✅ Du hast das heutige Quiz bereits gespielt. Komm morgen wieder für eine neue Frage und € <?= number($quiz_reward) ?>!</p>
      <?php elseif ($quiz_current !== null): ?>
        <p class="qz-info">Beantworte die Frage richtig und gewinne € <?= number($quiz_reward) ?>. Nur ein Versuch pro Tag!</p>
        <div class="qz-q"><?= htmlspecialchars($quiz_current['q']) ?></div>
        <form method="post" action="">
          <?php foreach ($quiz_current['a'] as $i => $opt): ?>
            <button class="qz-opt" type="submit" name="answer" value="<?= $i ?>">
              <?= chr(65 + $i) ?>) <?= htmlspecialchars($opt) ?>
            </button>
          <?php endforeach; ?>
        </form>
      <?php endif; ?>
    </div>
  </div>
</div>
