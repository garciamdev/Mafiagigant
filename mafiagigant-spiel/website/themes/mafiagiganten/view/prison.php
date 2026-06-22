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
          <td width="5%" class="tsub"><img src="/themes/img/icons/object_prison.png"></td>
          <td class="tsub" colspan="4"><?= $text[$lang]['page_title_prison'];?></td>
        </tr>
        <tr>
          <td class="tcell" colspan="3""><?= $text[$lang]['profit_jail'];?></td>
          <td width="5%" class="tcell"><img src="/themes/img/icons/stats_cash.png"></td>
          <td class="tcell"><?= number($earnings);?></td>
        </tr>
      </tbody></table>
      
      
      <table class="content_table">
        <tbody><tr>
          <td width="5%" class="tsub"><img src="/themes/img/icons/setting.png"></td>
          <td class="tsub" colspan="5"><?= $text[$lang]['settings'];?></td>
        </tr>
        <tr>
          <td class="tcell" colspan="1""><?= $text[$lang]['buyoutprice'];?></td>
          <td width="5%" class="tcell"><img src="/themes/img/icons/stats_cash.png"></td>
          <td class="tcell"><input maxlength="12" style="width: 60px" type="text" class="input" name="price" value="<?= $price;?>"></td>
          
          <td class="tcell"><input type="submit" name="submit" class="submit" value="<?= $text[$lang]['save_setting'];?>"></td>
          <td class="tcell"><?= txt($text[$lang]['minprice'], "{minprice}", number($minprice));?><br /><?= txt($text[$lang]['maxprice'], "{maxprice}", number($maxprice));?></td>
          
          
          
        </tr>
      </tbody></table>
      
      
      
      <p><input type="hidden" name="buy" value="1">
      </p>
    </form>
  </div>
</div>


<?php } ?>


          
          
          <?php
          
          
          
?>

<div class="content_block">
  <div class="content_inner">
    <h1><?= $text[$lang]['page_title_prison'];?></h1>
    <table class="wrap_table">
      <tbody><tr>
        <td width="49%">
          <table class="content_table">
            <tbody><tr>
              <td width="10%" class="tsub">&nbsp;</td>
              <td width="40%" class="tsub"><?= $text[$lang]['prison_country'];?></td>
              <td width="10%" class="tsub">&nbsp;</td>
              <td width="40%" class="tsub"><?= $text[$lang]['inmates'];?></td>
            </tr>
                      
          <?php
          $hide = 1;
          $total1 = 0;
          foreach($c as $f){
        
          	if($hide <= ceil($countrycount /2)){
          $inmates = isset($arrtimer[$f['id']]) ? $arrtimer[$f['id']] : 0;
	          ?>
          
          
            <tr>
              <td class="tcell" align="center"><img src="<?= $f['img']; ?>"></td>
              <td class="tcell"><?= gettranslation($f['id'], $t); ?></td>
              <td class="tcell" align="center"><img src="/themes/img/icons/status_offline.png"></td>
              <td class="tcell"><?= $inmates; ?></td>
            </tr>
          <?php 
			$hide = $hide + 1;
			$total1 = $total1 + 1;
			}
		} ?>
           
          </tbody></table>
        </td>
        <td width="2%">&nbsp;</td>
        <td width="49%">
          <table class="content_table">
            <tbody><tr>
              <td width="10%" class="tsub">&nbsp;</td>
              <td width="40%" class="tsub"><?= $text[$lang]['prison_country'];?></td>
              <td width="10%" class="tsub">&nbsp;</td>
              <td width="40%" class="tsub"><?= $text[$lang]['inmates'];?></td>
            </tr>
                      
          <?php
          $hide = 1;
          $total2 = 0;
          foreach($c as $f){
          	if($hide > ceil($countrycount /2) ){
          $inmates = isset($arrtimer[$f['id']]) ? $arrtimer[$f['id']] : 0;
          ?>
          
          
            <tr>
              <td class="tcell" align="center"><img src="<?= $f['img']; ?>"></td>
              <td class="tcell"><?= gettranslation($f['id'], $t); ?></td>
              <td class="tcell" align="center"><img src="/themes/img/icons/status_offline.png"></td>
              <td class="tcell"><?= $inmates; ?></td>
            </tr>
          <?php 
        
			$total2 = $total2 + 1;
			
			  }
          
			$hide = $hide + 1;
			}
			
			if($total2 != $total1){ ?>
			
			<tr>
              <td class="tcell">&nbsp;</td>
              <td class="tcell">&nbsp;</td>
              <td class="tcell">&nbsp;</td>
              <td class="tcell">&nbsp;</td>
            </tr>
			
			
			<?php
			}?>
           
          </tbody></table>
        </td>
      </tr>
    </tbody></table>
  </div>
</div>




          
          <?php
          
          
       
    
    
      
     $text[$lang]['page_text_prison_country_content1'] =  txt($text[$lang]['page_text_prison_country_content1'], '{breakoutpoints}',number($userdata[0]['breakoutpoints']));
     $text[$lang]['page_text_prison_country_content1'] =  txt($text[$lang]['page_text_prison_country_content1'], '{amount}',number($price));




?>



<div class="content_block">
  <div class="content_inner">
    <h1><?= txt($text[$lang]['page_title_prison_country'], '{country}',getcountry($userdata[0]['country']));?></h1>
    
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
              
              
    <p>
    </p>
    <p><?= $text[$lang]['page_text_prison_country_content']; ?></p>
    <p><?= $text[$lang]['page_text_prison_country_content1']; ?>
    </p>
    
    <form method="post">
    <table class="content_table" id="ajax">      <tbody><tr>
        <td width="5%" class="tsub" align="center">#</td>
        <td width="5%" class="tsub">&nbsp;</td>
        <td width="20%" class="tsub"><?= $text[$lang]['table_username']; ?></td>
        <td width="5%" class="tsub">&nbsp;</td>
        <td width="20%" class="tsub"><?= $text[$lang]['table_family']; ?></td>
        <td width="5%" class="tsub">&nbsp;</td>
        <td width="15%" class="tsub"><?= $text[$lang]['table_rank']; ?></td>
        <td width="5%" class="tsub">&nbsp;</td>
        <td width="15%" class="tsub"><?= $text[$lang]['table_time']; ?></td>
        <td width="5%" class="tsub">&nbsp;</td>
      </tr>
      
      <?php if(isset($arrusers[$userdata[0]['country']])){
      	
      			foreach($arrusers[$userdata[0]['country']] as $f => $a)
      			{
      ?>
            <tr>
              <td class="tcell"></td>
              <td class="tcell" align="center"><?= onlinestatus($a['username']); ?></td>
              <td class="tcell"><a href="member/<?= $f;?>"><?= $a['username']; ?></a></td>
              <td class="tcell" align="center"><img src="/themes/img/icons/stats_family.png"></td>
              <td class="tcell"></td>
              <td class="tcell" align="center"><img src="/themes/img/icons/stats_rank.png"></td>
              <td class="tcell"><?= rank($a['username']);?></td>
              <td class="tcell" align="center"><img src="/themes/img/icons/clock.png"></td>
              <td class="tcell"><font id="count_timer_<?= $a['username'];?>"></font></td>
              
              <?php if($owner == $userdata[0]['username']){ ?>
              
              	<td class="tcell" align="center"><button type='submit' name='username' value='<?= $a['username'];?>' style='background:none;border:none;padding:0'><img src='/themes/img/icons/breakout.png'></button></td>
              
              <?php }elseif($a['username'] == $userdata[0]['username']){ 
              		if($userdata[0]['breakoutpoints'] > 0){ ?>
              	<td class="tcell" align="center"><button type='submit' name='username' value='<?= $a['username'];?>' style='background:none;border:none;padding:0'><img src='/themes/img/icons/breakout.png'></button></td>

              		<?php }else{ ?>
              		
				<td class="tcell" align="center"><button type='submit' name='username' value='<?= $a['username'];?>' style='background:none;border:none;padding:0'><img src='/themes/img/icons/stats_cash.png'></button></td>

              		<?php
              		}
              	?>
              		
              	
              
              <?php }else{ ?>
              
              	<td class="tcell" align="center"><button type='submit' name='username' value='<?= $a['username'];?>' style='background:none;border:none;padding:0'><img src='/themes/img/icons/breakout.png'></button></td>
             <?php  } ?>

            </tr>
      
      <script language="javascript">
	countdown('<?=$a['time']?>','count_timer_<?=$a['username']?>','');
</script>
      <?php


      			}
      	}else{?>
     
      
      
      
      <tr>
        <td class="tcell" align="center"><img src="/themes/img/icons/info_info.png"></td>
        <td class="tcell" colspan="9"><?= $text[$lang]['prison_empty'];?></td>
      </tr>
      <?php } ?>

</tbody></table></form>
  </div>
</div>