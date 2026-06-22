<?php

if($var == 'weapons'){
?>

<div class="content_block">
  <div class="content_inner">

            <h1><?= $text[$lang]['title_weapon']; ?></h1>  
                 <?php
              if(!empty($errors))
              {
                  foreach($errors AS $error)
                  {?>
                       <table class="info_bad">
        <tbody><tr>
          <td width="5%" align="center"><img src="/themes/img/info_bad.png"></td>
          <td width="95%"><?= $error ?></td>
        </tr>
      </tbody></table><?php
                  }
              }
              ?>
					
				 	
                <?php
              if(!empty($success))
              {
                  foreach($success AS $succes)
                  {?>
                       <table class="info_good">
        <tbody><tr>
          <td width="5%" align="center"><img src="/themes/img/info_good.png"></td>
          <td width="95%"><?= $succes ?></td>
        </tr>
      </tbody></table><?php
                  }
              }
              ?>
              

<?php


foreach($c as $f){
?>

  <form method="post">
          <table class="content_table" style="margin-top: 10px">
                        <tbody>
                            <tr>
                                <td class="tsub" colspan="4"><?= gettranslation($f['id'], $tt); ?></td>
                            </tr>
                            <tr>
                                <td width="35%" align="center" valign="center" rowspan="8" class="tcell">
                                    <img src="<?= $f['img']; ?>">
                                </td>
                                <td align="center" class="tcell" width="5%"><img src="/themes/img/icons/info_info.png"></td>
                                <td colspan="2" width="60%" class="tcell"><?= gettranslation($f['id'], $td); ?></td>
                            </tr>
                            <tr>
                                <td class="tcell" colspan="4">&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="tcell" align="center"><img src="/themes/img/icons/stats_attack.png"></td>
                                <td width="25%" class="tcell"><?= $text[$lang]['attack']; ?></td>
                                <td class="tcell"><?= number($f['att']); ?></td>
                            </tr>
                            <tr>
                                <td class "tcell" align="center"><img src="/themes/img/icons/stats_defence.png"></td>
                                <td class="tcell"><?= $text[$lang]['defense']; ?></td>
                                <td class="tcell"><?= number($f['deff']); ?></td>
                            </tr>
                            <tr>
                                <td class="tcell" align="center"><img src="/themes/img/icons/stats_cash.png"></td>
                                <td class="tcell"><?= $text[$lang]['price']; ?></td>
                                <td class="tcell">€ <?= number($f['price']); ?></td>
                            </tr>
                            <tr>
                                <td class="tcell" colspan="4">&nbsp;</td>
                            </tr>
                            <tr>
                                <td align="center" class="tcell" width="5%"><img src="/themes/img/icons/shop.png"></td>
                                <td class="tcell"><?= $text[$lang]['buy']; ?></td>
                                <td class="tcell"><input maxlength="12" style="width:60px" type="text" class="input" name="amount" value="0"></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="tcell" align="right">
                                    <input type="submit" class="submit" name="cash" value="<?= $text[$lang]['buy']; ?>">
                                </td>
                                <td class="tcell">
                                    <input type="submit" class="submit" name="bank" value="<?= $text[$lang]['pay_by_bank']; ?>">
                                </td>
                            </tr>
                        </tbody>
                    </table>
    <input type="hidden" name="buy" value="<?= $f['id'];?>">
    </form>
   
   
   <?php
	


}


?>
  </div>
</div>
<?php 
}else
if($var == 'protection'){
?>

<div class="content_block">
  <div class="content_inner">
            <h1><?= $text[$lang]['title_protection']; ?></h1>  
  
                 <?php
              if(!empty($errors))
              {
                  foreach($errors AS $error)
                  {?>
                       <table class="info_bad">
        <tbody><tr>
          <td width="5%" align="center"><img src="/themes/img/info_bad.png"></td>
          <td width="95%"><?= $error ?></td>
        </tr>
      </tbody></table><?php
                  }
              }
              ?>
					
					
                <?php
              if(!empty($success))
              {
                  foreach($success AS $succes)
                  {?>
                       <table class="info_good">
        <tbody><tr>
          <td width="5%" align="center"><img src="/themes/img/info_good.png"></td>
          <td width="95%"><?= $succes ?></td>
        </tr>
      </tbody></table><?php
                  }
              }
              ?>
              

<?php

 
foreach($c as $f){
?>

  <form method="post">
    <table class="content_table" style="margin-top: 10px">
      <tbody><tr>
        <td class="tsub" colspan="4"><?= gettranslation($f['id'], $tt);?></td>
      </tr>
      <tr>
        <td width="35%" align="center" valign="center" rowspan="8" class="tcell"><img src="<?= $f['img'];?>"></td>
        <td align="center" class="tcell" width="5%"><img src="/themes/img/icons/info_info.png"></td>
        <td colspan="2" width="60%" class="tcell"><?= gettranslation($f['id'], $td);?></td>
      </tr>
      <tr><td class="tcell" colspan="4">&nbsp;</td></tr>
      <tr>
        <td class="tcell" align="center"><img src="/themes/img/icons/stats_attack.png"></td>
        <td width="25%" class="tcell">Attack</td>
        <td class="tcell"><?= number($f['att']);?></td>
      </tr>
      <tr>
        <td class="tcell" align="center"><img src="/themes/img/icons/stats_defence.png"></td>
        <td class="tcell">Defense</td>
        <td class="tcell"><?= number($f['deff']);?></td>
      </tr>
      <tr>
        <td class="tcell" align="center"><img src="/themes/img/icons/stats_cash.png"></td>
        <td class="tcell">Price</td>
        <td class="tcell">€ <?= number($f['price']);?></td>
      </tr>
      <tr><td class="tcell" colspan="4">&nbsp;</td></tr>
      <tr>
        <td align="center" class="tcell" width="5%"><img src="/themes/img/icons/shop.png"></td>
        <td class="tcell">Buy:</td>
        <td class="tcell"><input maxlength="12" style="width:60px" type="text" class="input" name="amount" value="0"></td>
      </tr>
      <tr>
        <td colspan="2" class="tcell" align="right"><input type="submit" class="submit" name="cash" value="Buy"></td><td class="tcell"><input type="submit" class="submit" name="bank" value="Pay by bank"></td>
      </tr>
    </tbody></table>
    <input type="hidden" name="buy" value="<?= $f['id'];?>">
    </form>
   
   
   <?php
	


}


?>
  </div>
</div>
<?php 
}else{?>

<div class="content_block">
  <div class="content_inner">
    <h1><?= $text[$lang]['shop_title']; ?></h1>
    <p><?= $text[$lang]['choose_shop']; ?></p>
    <table class="content_table">
      <tbody>
        <tr>
          <td>&nbsp;</td>
          <td class="tcell" width="5%" align="center"><img src="/themes/img/icons/attack.png"></td>
          <td class="tcell" width="30%"><a href="shop/weapons"><?= $text[$lang]['weapons']; ?></a></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td class="tcell" width="5%" align="center"><img src="/themes/img/icons/stats_protect.png"></td>
          <td class="tcell" width="30%"><a href="shop/protection"><?= $text[$lang]['protection']; ?></a></td>
          <td>&nbsp;</td>
        </tr>
    <!--  <tr>
        <td>&nbsp;</td>
        <td class="tcell" width="5%" align="center"><img src="/images/icons/set_1/house.png"></td>
        <td class="tcell" width="30%"><a href="shop/houses">Houses</a></td>
        <td>&nbsp;</td>
      </tr>
      
      -->      </tbody>
    </table>
  </div>
</div>





<?php }
 ?>