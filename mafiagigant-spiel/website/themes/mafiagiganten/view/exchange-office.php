<div class="content_block">
  <div class="content_inner">
    <h1><?php echo $text[$lang]['exchange_office_title']; ?></h1>
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
      <p><?php echo txt($text[$lang]['exchange_description'],'{credits}',number($userdata[0]['credits'])); ?></p>
      <table class="content_table">
        <tbody>
          <tr>
            <td class="tsub" width="5%">&nbsp;</td>
            <td class="tsub" width="5%">&nbsp;</td>
            <td class="tsub"><?php echo $text[$lang]['item']; ?></td>
            <td class="tsub" width="5%">&nbsp;</td>
            <td class="tsub" width="20%"><?php echo $text[$lang]['credits']; ?></td>
            <td class="tsub" width="5%">&nbsp;</td>
          </tr>
          
                 	<?php
        	
    
						
						
						
			foreach($c as $f){
				$img = '';
				if($f['dbfield'] == 'money'){ $img = '<img src="/themes/img/icons/stats_bank.png">';}
				if($f['dbfield'] == 'protection'){ $img = '<img src="/themes/img/icons/stats_money.png">'; $img = '';}
				
				if($f['dbfield'] == 'safe'){ $img = '<img src="/themes/img/icons/stats_safe.png">';}
				if($f['dbfield'] == 'health'){ $img = '<img src="/themes/img/icons/stats_health.png">';}
				if($f['dbfield'] == 'breakout'){ $img = '<img src="/themes/img/icons/breakout.png">';}
			?>
				
					
          <tr>
            <td class="tcell" align="center"><input type="radio" name="exchange" value="<?= $f['id'];?>"></td>
            <td class="tcell" align="center"><?= $img;?></td>
            <td class="tcell"><?= txt(gettranslation($f['id'], $t),'{amount}',number($f['value']));?></td>
            <td class="tcell" align="center"><img src="/themes/img/icons/stats_credits.png"></td>
            <td class="tcell"><?= $f['price'];?> <?php echo $text[$lang]['credits']; ?></td>
            <td class="tcell" width="5%" align="center">&nbsp;</td>
          </tr>
  
                        
			
			<?php } ?>
			
			
			
			
		
          <!-- Repeat for other items -->
        </tbody>
      </table>
      <p><input type="submit" name="submit" class="submit" value="<?php echo $text[$lang]['buy_now']; ?>"></p>
    </form>
  </div>
</div>