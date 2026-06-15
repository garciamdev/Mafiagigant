<div class="content_block">
  <div class="content_inner">
    <table class="content_table">
      <tbody><tr>
        <td width="4%">&nbsp;</td>
       <!-- <td width="5%" align="center"><img src="/themes/img/icons/drugs.png"></td>
        <td width="18%"><a href="drugs">Drugs</a></td>-->
          <td width="5%" align="center"><img src="/themes/img/icons/drugs_down.png"></td>
          <td width="18%"><a href="drugs/sell"><?= $text[$lang]['sell_drugs']; ?></a></td>
          <td width="5%" align="center"><img src="/themes/img/icons/stockexchange.png"></td>
          <td width="18%"><a href="drugs/prices"><?= $text[$lang]['drug_prices']; ?></a></td>
        <!--<td width="5%" align="center"><img src="/themes/img/icons/shop.png"></td>
        <td width="18%"><a href="drugs/upgrade">Upgrade shop</a></td>-->
        <td width="4%">&nbsp;</td>
      </tr>
    </tbody></table>
  </div>
</div>




<?php
if($var == 'sell'){ ?>


<!--<div class="content_block">
  <div class="content_inner">
    <h1>Sell drugs</h1>
    <p>
      Here you can sell your stash of drugs.
      The amount you get for each bag is dependent on the market price of the country you're in.
    </p>
  </div>
</form></div>-->
<div class="content_block">
  <div class="content_inner">
    <h1><?= $text[$lang]['drugs_trade_title']; ?></h1>
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

    <form method="post">
      <table class="content_table">
        <tbody>
          <tr>
            <td width="25%" class="tsub"><?= $text[$lang]['drugs']; ?></td>
            <td width="5%" class="tsub">&nbsp;</td>
            <td width="20%" class="tsub"><?= $text[$lang]['stock']; ?></td>
            <td width="5%" class="tsub">&nbsp;</td>
            <td width="20%" class="tsub"><?= $text[$lang]['drug_market_price']; ?></td>
            <td width="5%" class="tsub">&nbsp;</td>
            <td width="20%" class="tsub"><?= $text[$lang]['sell']; ?></td>
          </tr>
          <?php
          foreach ($d as $foreach) {
          ?>
            <tr>
              <td class="tcell"><?= gettranslation($foreach['id'], $td); ?></td>
              <td class="tcell" align="center"><img src="/themes/img/icons/drugs_up.png"></td>
              <td class="tcell"><?= number($ffds[$foreach['id']][0]); ?> <?= $text[$lang]['bags']; ?></td>
              <td class="tcell" align="center"><img src="/themes/img/icons/stats_cash.png"></td>
              <td class="tcell">€ <?= number($ffdp[$foreach['id']][0]); ?></td>
              <td class="tcell" align="center"><img src="/themes/img/icons/drugs_down.png"></td>
              <td class="tcell"><input class="input" type="text" name="<?= $foreach['id']; ?>" maxlength="6" style="width: 60px" value="0"></td>
            </tr>
          <?php
          }
          ?>
        </tbody>
      </table>
      <p><input type="submit" name="sell" class="submit" value="<?= $text[$lang]['sell_drugs']; ?>"></p>
    </form>
  </div>
</div>




<?php
}
if($var == 'prices'){ ?>

<!-- div class="content_block">
  <div class="content_inner">
    <h1>Drug market prices</h1>
    <p>
      Each country is unique regarding the supply and demand for drugs.
      That's why there are different prices.
      The market prices are updated every 5 minutes!
    </p>
  </div>
</div> -->
<div class="content_block">
  <div class="content_inner">
    <h1><?= $text[$lang]['drug_market_prices_title']; ?></h1>
    <table class="content_table">
      <tbody>
        <tr>
          <td width="5%" class="tsub">&nbsp;</td>
          <td width="17%" class="tsub"><?= $text[$lang]['country']; ?></td>
          <?php
          foreach ($d as $foreach) {
            echo '<td width="*" class="tsub">' . gettranslation($foreach['id'], $td) . '</td>';
          }
          ?>
        </tr>
        <?php
        foreach ($c as $country) {
          echo '<tr>';
          echo '<td class="tcell" align="center"><img src="' . getflag($country['id']) . '"></td>';
          echo '<td class="tcell">' . getcountry($country['id']) . '</td>';
          foreach ($d as $foreach) {
            $price = isset($drugsprice[$country['id']][$foreach['id']][0]) ? '€ ' . number($drugsprice[$country['id']][$foreach['id']][0]) : '';
            echo '<td width="*" class="tcell">' . $price . '</td>';
          }
          echo '</tr>';
        }
        ?>
      </tbody>
    </table>
  </div>
</div>
 


<?php } ?>
