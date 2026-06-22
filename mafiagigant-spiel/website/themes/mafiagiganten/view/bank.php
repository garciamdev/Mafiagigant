<div class="content_block">
  <div class="content_inner">
    <h1><?= $text[$lang]['bank_account'];?></h1>
    <form method="post">
      <?php
      if (!empty($errors)) {
        foreach ($errors as $error) {
      ?>
          <table class="info_bad">
            <tbody>
              <tr>
                <td width="5%" align="center"><img src="/themes/img/info_bad.png"></td>
                <td width="95%"><?= $error ?></td>
              </tr>
            </tbody>
          </table>
      <?php
        }
      }
      ?>

      <?php
      if (!empty($success)) {
        foreach ($success as $succes) {
      ?>
          <table class="info_good">
            <tbody>
              <tr>
                <td width="5%" align="center"><img src="/themes/img/info_good.png"></td>
                <td width="95%"><?= $succes ?></td>
              </tr>
            </tbody>
          </table>
      <?php
        }
      }
      ?>

      <p>
        <?= $text[$lang]['welcome_to_bank']; ?>
      </p>
      <p>
        <?= $text[$lang]['deposit_withdraw_info']; ?>
      </p>
      <table class="content_table">
        <tbody>
          <tr>
            <td colspan="2" width="31%" class="tcell"><?= $text[$lang]['bank_transactions_left']; ?></td>
            <td width="5%" class="tcell" align="center"><img src="/themes/img/icons/info_info.png"></td>
            <td colspan="2" class="tcell">48</td>
          </tr>
          <tr>
            <td colspan="2" width="31%" class="tcell"><?= $text[$lang]['cash']; ?></td>
            <td width="5%" class="tcell" align="center"><img src="/themes/img/icons/stats_cash.png"></td>
            <td colspan="2" class="tcell">€ <?= number($userdata[0]['cash']); ?></td>
          </tr>
          <tr>
            <td colspan="2" width="31%" class="tcell"><?= $text[$lang]['bank_account']; ?></td>
            <td width="5%" class="tcell" align="center"><img src="/themes/img/icons/stats_bank.png"></td>
            <td colspan="2" class="tcell">€ <?= number($userdata[0]['bank']); ?></td>
          </tr>
          <tr>
            <td colspan="2" width="31%" class="tcell"><?= $text[$lang]['deposit_withdraw']; ?></td>
            <td width="5%" class="tcell" align="center"><img src="/themes/img/icons/stats_money.png"></td>
            <td class="tcell"><input maxlength="12" style="width: 100px" type="text" class="input" name="amount" value="0"></td>
            <td width="45%" class="tcell"><input type="submit" class="submit" name="deposit" value="<?= $text[$lang]['deposit']; ?>"> <input type="submit" class="submit" name="withdraw" value="<?= $text[$lang]['withdraw']; ?>"></td>
          </tr>
        </tbody>
      </table>
    </form>
  </div>
</div>
