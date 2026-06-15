	
		



	<div class="content_inner">
    <h1><?= $text[$lang]['page_title'];?></h1>
    
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
              
               
    <form method="post">
      <table class="content_table">
        <tbody>
        <tr>
          <td width="5%" class="tsub">&nbsp;</td>
          <td width="43%" class="tsub"><?= $text[$lang]['table_crimes'];?></td>
          <td width="5%" class="tsub">&nbsp;</td>
          <td width="22%" class="tsub"><?= $text[$lang]['table_earnings'];?></td>
          <td width="5%" class="tsub">&nbsp;</td>
          <td width="22%" class="tsub"><?= $text[$lang]['table_cooldown'];?></td>
          <td width="5%" class="tsub">&nbsp;</td>
          <td width="22%" class="tsub"><?= $text[$lang]['table_resting'];?></td>
        </tr>
        	<?php
        	
    
						
						
						
			foreach($c as $crime){
				
	
	$receivetext = '';
				if($crime['country'] == 0){ 
					$countrytext = $text[$lang]['table_everywhere']; 
				}else{ 
					$countrytext = txt($text[$lang]['table_incountry'],"{country}",getcountry($crime['country'],$tc)); 
				}
				
					if($crime['receive'] == 'drugs'){ 
					$img = '/themes/img/icons/drugs.png'; 
					
					$receivetext = number($crime['minreceive'])." ".gettranslation($crime['receive_id'],$td);
				}else{ 
					$img = '/themes/img/icons/stats_cash.png'; 
					$receivetext = "€ ".number($crime['minreceive']);
				}
			?>
				
				
				
        <tr>
          <td align="center" class="tcell"><?php if($crime['country'] == 0 or $userdata[0]['country'] == $crime['country']){?><input type="radio" name="work" value="<?= $crime['id'];?>"><?php } ?></td>
          <td class="tcell"><?= gettranslation($crime['id'], $t);?></td>
                    <td align="center" class="tcell"><img src="<?= $img;?> "></td>
                    <td align="center" class="tcell"><?= $receivetext;?></td>

          <td align="center" class="tcell"><img src="themes/img/icons/clock.png"></td>
          <td class="tcell"><?= showcooldown($crime['cooldown']);?></td>
          <td align="center" class="tcell"><img src="themes/img/icons/clock.png"></td>
          <td class="tcell"><?= showcooldown($crime['resting']);?></td>
        </tr>
        
        
                    
                        
			
			<?php } ?>
			
			
		
      </tbody></table>
<table class="content_table"><tbody><tr><td class="tsub"><?= $text[$lang]['captcha'];?></td></tr>
<tr>
<td class="tcell"><div style="padding: 2px; text-align: center"><?= showcaptcha();?></div></td></tr>

</tbody>

</table>   


 </form>
  </div>
  


<script language="javascript">
	countdown('<?=$wait?>','count_timer','/robbery');
</script>
