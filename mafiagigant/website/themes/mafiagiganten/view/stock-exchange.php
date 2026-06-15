
<div class="content_block">
  <div class="content_inner">
    <h1><?= $text[$lang]['stock_title']; ?></h1>
    
    <p><?= $text[$lang]['stock_generaltext']; ?></p>
    
    
    </div>
</div>


<div class="content_block">
  <div class="content_inner">
    <h1><?= $text[$lang]['stock_title_exchange']; ?></h1>
    
<?php if($incountry == 0){?>
    <p><?= $text[$lang]['stock_exchangetext']; ?></p>
    <p><?php if($settings[0]['commission'] > 0){?><?= $text[$lang]['stock_exchangetextcorrupt']; ?><?php } ?> <?= $text[$lang]['stock_exchangetextmax']; ?></p>
    <?php } ?>
    
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
<?php if($incountry == 0){?>
<form method="post">
  <table class="content_table">
    <tbody>
      <tr>
        <td colspan="2" width="31%" class="tcell"><?= $text[$lang]['share']; ?></td>
        <td width="5%" class="tcell" align="center"><img src="/themes/img/icons/stockexchange.png"></td>
        <td colspan="2" class="tcell">
          <select name="stock" class="select" id="stock">
            <?php foreach ($c as $f) { ?>
              <option value="<?= $f['id']; ?>"><?= gettranslation($f['id'], $t); ?></option>
            <?php } ?>
          </select>
        </td>
      </tr>
      <tr>
        <td colspan="2" width="31%" class="tcell"><?= $text[$lang]['amount']; ?></td>
        <td width="5%" class="tcell" align="center"></td>
        <td class="tcell"><input maxlength="12" style="width: 100px" type="text" class="input" name="amount" value="0"></td>
        <td width="45%" class="tcell">
          <input type="submit" class="submit" name="buy" value="<?= $text[$lang]['buy']; ?>">
          <input type="submit" class="submit" name="sell" value="<?= $text[$lang]['sell']; ?>">
        </td>
      </tr>
    </tbody>
  </table>
</form>

    
    <?php } ?>
    </div>
</div>


<?php if($incountry == 0){?>


<div class="content_block">
  <div class="content_inner">
    <h1><?= $text[$lang]['stock_title_market']; ?></h1>
   <p><?= $text[$lang]['stock_title_market_text']; ?></p>

      <table class="content_table">
        <tbody>
          <tr>
            <td width="25%" class="tsub"><?= $text[$lang]['stock']; ?></td>
            <td width="5%" class="tsub">&nbsp;</td>
            <td width="20%" class="tsub"><?= $text[$lang]['price']; ?></td>
            <td width="5%" class="tsub">&nbsp;</td>
            <td width="20%" class="tsub"><?= $text[$lang]['currentstock']; ?></td>
          </tr>
          <?php
          foreach ($c as $foreach) {
          ?>
            <tr>
              <td class="tcell"><?= gettranslation($foreach['id'], $t); ?></td>
              <td class="tcell" align="center"><img src="/themes/img/icons/stats_cash.png"></td>
              <td class="tcell">€ <?= number($foreach['price']); ?></td>
              <td class="tcell" align="center"><img src="/themes/img/icons/stockexchange.png"></td>
              <td class="tcell"><?= number($ffds[$foreach['id']][0]); ?></td>
         </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
  </div>
</div>


<?php } ?>


