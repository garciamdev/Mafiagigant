<?php
if($owner == ''){ 
?>



<div class="content_block">
  <div class="content_inner">
    <h1><?= $text[$lang]['page_title'];?></h1>
     
                 <?php
              if(!empty($errorss))
              {
                  foreach($errorss AS $error)
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
              if(!empty($successs))
              {
                  foreach($successs AS $succes)
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
              
              
    <form method="post">
      <p><?= txt($text[$lang]['page_content'], '{country}',getcountry($userdata[0]['country']));?></p>
      <table class="content_table">
        <tbody><tr>
          <td width="5%" class="tsub"><img src="/themes/img/icons/object_prison.png"></td>
          <td class="tsub"><?= txt($text[$lang]['buy_text'], '{amount}',number($objectprice));?></td>
        </tr>
        <tr>
          <td width="5%" class="tcell"><img src="/themes/img/icons/stats_cash.png"></td>
          <td class="tcell"><?= $text[$lang]['text1'];?></td>
        </tr>
        <tr>
          <td width="5%" class="tcell"><img src="/themes/img/icons/clock.png"></td>
          <td class="tcell"><?= $text[$lang]['text2'];?></td>
        </tr>
      </tbody></table>
      <p><input type="hidden" name="buy" value="1"><input type="submit" name="submit" class="submit" value="<?= txt($text[$lang]['purchase_button'], '{amount}',number($objectprice));?>"></p>
    </form>
  </div>
</div>


<?php } ?>


<?php
if($owner == $userdata[0]['username']){ 
?>



<div class="content_block">
  <div class="content_inner">
    <h1><?= $text[$lang]['page_title_prison'];?></h1>
     
                 <?php
              if(!empty($errorss))
              {
                  foreach($errorss AS $error)
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
              if(!empty($successs))
              {
                  foreach($successs AS $succes)
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
              
    <form method="post">
      
      <table class="content_table">
        <tbody><tr>
          <td width="5%" class="tsub" colspan="1"><img src="/themes/img/icons/object_bulletfactory.png"></td>
          <td width="95%" class="tsub" colspan="5"><?= $text[$lang]['page_title_prison'];?></td>
        </tr>
        <tr>
          <td width="75%"  class="tcell" colspan="3""><?= $text[$lang]['profit_hospital'];?></td>
          <td width="5%" class="tcell"><img src="/themes/img/icons/stats_cash.png"></td>
          <td class="tcell"><?= number($earnings);?></td>
        </tr>
        <tr>
          <td width="75%"  class="tcell" colspan="3""><?= $text[$lang]['your_health'];?></td>
          <td width="5%" class="tcell"><img src="/themes/img/icons/stats_bullets.png"></td>
          <td class="tcell"><?= number($stock);?></td>
        </tr>
      </tbody></table>
      
      
      <table class="content_table">
        <tbody><tr>
          <td width="5%" class="tsub"><img src="/themes/img/icons/settings.png"></td>
          <td class="tsub" colspan="5"><?= $text[$lang]['settings'];?></td>
        </tr>
        <tr>
          <td class="tcell" colspan="1""><?= $text[$lang]['healprice'];?></td>
          <td width="5%" class="tcell"><img src="/themes/img/icons/stats_cash.png"></td>
          <td class="tcell"><input maxlength="12" style="width: 60px" type="text" class="input" name="price" value="<?= $price;?>"></td>
          
          <td class="tcell"><input type="submit" name="submit" class="submit" value="<?= $text[$lang]['save_setting'];?>"></td>
          <td class="tcell"><?= txt($text[$lang]['minprice'], "{minprice}", number($minprice));?><br /><?= txt($text[$lang]['maxprice'], "{maxprice}", number($maxprice));?></td>
          
          
          <input type="hidden" name="buy" value="1">
        </tr>
      </tbody></table>
      
      <table class="content_table">
        <tbody><tr>
          <td colspan="1" width="5%" class="tsub"><img src="/themes/img/icons/setting.png"></td> 
          <td colspan="4" class="tsub" width="95%" colspan="5"><?= $text[$lang]['procude'];?></td>
        </tr>
         <tr>
        <?php 
        if($timer > $now){ ?>
        
            <td colspan="5" class="tcell" colspan="1" ><?= txt($text[$lang]['wait'],'{timer}', $count_timer);?></td>
          <?php }else{ ?>
            <td colspan="3" class="tcell" colspan="1" ><?= $text[$lang]['startprocude'];?></td>
          <td collspan="2" class="tcell"><input type="submit" name="produce" class="submit" value="<?= $text[$lang]['startprocudebtn'];?>"></td>
          <?php } ?>
          
        </tr>
      </tbody></table>
      
      
      <p>
      </p>
    </form>
  </div>
</div>


<script language="javascript">
	countdown('<?=$wait?>','count_timer','');
</script>


<?php } ?>


<?php
if($owner != ''){

if($owner != $userdata[0]['username']){ 
?>
<div class="content_block">
  <div class="content_inner">
    <h1><?= $text[$lang]['hospital_title']; ?></h1>
    
    <?php
    if (!empty($errors)) {
      foreach($errors as $error) {
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
      foreach($success as $succes) {
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
    <?php if($owner != '') { ?>
      <table class="content_table">
        <tbody>
          <tr>
            <td width="5%" class="tsub" align="center"><img src="/themes/img/icons/object_bulletfactory.png"></td>
            <td colspan="6" class="tsub"><?= $text[$lang]['hospital']; ?></td>
          </tr>
          <tr>
            <td colspan="2" class="tcell" width="20%"><?= $text[$lang]['owner']; ?></td>
            <td width="5%" class="tcell" align="center"><?= onlinestatus($o[0]['username']); ?></td>
            <td class="tcell" width="25%"><a href="member/<?= $o[0]['username'];?>" class=""><?= $o[0]['username'];?></a></td>
            <td class="tcell" width="20%"><?= $text[$lang]['price_per_percent']; ?></td>
            <td class="tcell" width="5%" align="center"><img src="/themes/img/icons/stats_cash.png"></td>
            <td class="tcell" width="25%">€ <?= number($price); ?></td>
          </tr>
        </tbody>
      </table>
    <?php } ?>
      <p><?= $text[$lang]['welcome_message']; ?></p>
      <table class="content_table">
        <tbody>
          <tr> 
            <td colspan="2" width="31%" class="tcell"><?= $text[$lang]['your_health']; ?></td>
            <td width="5%" class="tcell" align="center"><img src="/themes/img/icons/stats_bullets.png"></td>
            <td colspan="2" class="tcell"><?= $stock;?></td>
          </tr>
          <tr>
            <td colspan="2" width="31%" class="tcell"><?= $text[$lang]['buy_extra_health']; ?></td>
            <td width="5%" class="tcell" align="center"><img src="/themes/img/icons/stats_bullets.png"></td>
            <td class="tcell"><input maxlength="12" style="width: 30px" type="text" class="input" name="bullets" value="<?= (100 - $userdata[0]['health']); ?>"></td>
         
         	<td width="*" class="tcell"><input type="submit" class="submit" name="purchase" value="<?= $text[$lang]['captcha']; ?>"></td>
         
          </tr>
        </tbody> 
      </table>
  
  
    </form>
  </div>
</div>

<?php } } ?>