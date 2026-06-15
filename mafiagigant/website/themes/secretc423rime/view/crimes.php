	
		



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
        <tbody><tr>
          <td width="5%" class="tsub">&nbsp;</td>
          <td width="5%" class="tsub">&nbsp;</td>
          <td width="70%" class="tsub"><?= $text[$lang]['table_crimes'];?></td>
          <td width="5%" class="tsub">&nbsp;</td>
          <td width="15%" class="tsub"><?= $text[$lang]['table_chance'];?></td>
        </tr>
        
        	<?php
        	
    
						
						
						
			foreach($c as $crime){
				
				if($crime['successexpneeded'] > 0) {
					$perc = floor((getactivityxp($crime['id'], $chance) / $crime['successexpneeded']) * 100);
				}else{
					$perc = 100;
				}
				
				if($perc < 1){ $perc = 0;}
				if($perc > 100){ $perc = 100;}
				if($perc > $crime['successmaxperc']){
					$perc = $crime['successmaxperc'];
				}
				
			?>
				
				
				
        <tr>
          <td align="center" class="tcell"><input type="radio" name="crime" value="<?= $crime['id'];?>"></td>
          <td align="center" class="tcell"><?= imgicons('crime');?></td>
          <td class="tcell"><?= gettranslation($crime['id'], $t);?></td>
          <td align="center" class="tcell"><img src="themes/img/icons/chance.png"></td>
          <td class="tcell"><?= $perc;?>%</td>
        </tr>
        
        
                    
                        
			
			<?php } ?>
			
			
			
			<!--
        <tr>
          <td align="center" class="tcell"><input type="radio" name="crime" value="1"></td>
          <td align="center" class="tcell"><img src="/images/icons/custom/59-crime.png"></td>
          <td class="tcell">Steal candy from a child</td>
          <td align="center" class="tcell"><img src="/images/icons/set_2/chance.png"></td>
          <td class="tcell">0%</td>
        </tr>
        <tr>
          <td align="center" class="tcell"><input type="radio" name="crime" value="2"></td>
          <td align="center" class="tcell"><img src="/images/icons/custom/59-crime.png"></td>
          <td class="tcell">Rob a beggar</td>
          <td align="center" class="tcell"><img src="/images/icons/set_2/chance.png"></td>
          <td class="tcell">0%</td>
        </tr>
        <tr>
          <td align="center" class="tcell"><input type="radio" name="crime" value="3"></td>
          <td align="center" class="tcell"><img src="/images/icons/custom/59-crime.png"></td>
          <td class="tcell">Pickpocket pedestrians</td>
          <td align="center" class="tcell"><img src="/images/icons/set_2/chance.png"></td>
          <td class="tcell">0%</td>
        </tr>
        <tr>
          <td align="center" class="tcell"><input type="radio" name="crime" value="4"></td>
          <td align="center" class="tcell"><img src="/images/icons/custom/59-crime.png"></td>
          <td class="tcell">Steal a scooter</td>
          <td align="center" class="tcell"><img src="/images/icons/set_2/chance.png"></td>
          <td class="tcell">0%</td>
        </tr>
        <tr>
          <td align="center" class="tcell"><input type="radio" name="crime" value="5"></td>
          <td align="center" class="tcell"><img src="/images/icons/custom/59-crime.png"></td>
          <td class="tcell">Bust open an ATM (Automated Teller Machine)</td>
          <td align="center" class="tcell"><img src="/images/icons/set_2/chance.png"></td>
          <td class="tcell">0%</td>
        </tr>
        <tr>
          <td align="center" class="tcell"><input type="radio" name="crime" value="6"></td>
          <td align="center" class="tcell"><img src="/images/icons/custom/59-crime.png"></td>
          <td class="tcell">Steal jewelry from an jeweler</td>
          <td align="center" class="tcell"><img src="/images/icons/set_2/chance.png"></td>
          <td class="tcell">0%</td>
        </tr>
        <tr>
          <td align="center" class="tcell"><input type="radio" name="crime" value="7"></td>
          <td align="center" class="tcell"><img src="/images/icons/custom/59-crime.png"></td>
          <td class="tcell">Steal artwork from a museum</td>
          <td align="center" class="tcell"><img src="/images/icons/set_2/chance.png"></td>
          <td class="tcell">0%</td>
        </tr>
        <tr>
          <td align="center" class="tcell"><input type="radio" name="crime" value="8"></td>
          <td align="center" class="tcell"><img src="/images/icons/custom/59-crime.png"></td>
          <td class="tcell">Kidnap the president</td>
          <td align="center" class="tcell"><img src="/images/icons/set_2/chance.png"></td>
          <td class="tcell">0%</td>
        </tr>
        <tr>
          <td align="center" class="tcell"><input type="radio" name="crime" value="9"></td>
          <td align="center" class="tcell"><img src="/images/icons/custom/59-crime.png"></td>
          <td class="tcell">Steal money from another criminal in Germany</td>
          <td align="center" class="tcell"><img src="/images/icons/set_2/chance.png"></td>
          <td class="tcell">0%</td>
        </tr>-->
      </tbody></table>
<table class="content_table"><tbody><tr><td class="tsub"><?= $text[$lang]['captcha'];?></td></tr>
<tr>
<td class="tcell"><div style="padding: 2px; text-align: center"><?= showcaptcha();?></div></td></tr>

</tbody>

</table>   


 </form>
  </div>
  
<!--
  
  <div class="content_block">
  <div class="content_inner">
    <h1>Misdaden</h1>
    <form method="post">
      <table class="content_table">
        <tbody><tr>
          <td width="5%" class="tsub">&nbsp;</td>
          <td width="5%" class="tsub">&nbsp;</td>
          <td width="70%" class="tsub">Misdaad</td>
          <td width="5%" class="tsub">&nbsp;</td>
          <td width="15%" class="tsub">Kans</td>
        </tr>
        <tr>
          <td align="center" class="tcell"><input type="radio" name="crime" value="1"></td>
          <td align="center" class="tcell"><img src="/images/icons/custom/59-crime.png"></td>
          <td class="tcell">Snoep stelen van een kind</td>
          <td align="center" class="tcell"><img src="/images/icons/set_2/chance.png"></td>
          <td class="tcell">0%</td>
        </tr>
        <tr>
          <td align="center" class="tcell"><input type="radio" name="crime" value="2"></td>
          <td align="center" class="tcell"><img src="/images/icons/custom/59-crime.png"></td>
          <td class="tcell">Een zwerver beroven</td>
          <td align="center" class="tcell"><img src="/images/icons/set_2/chance.png"></td>
          <td class="tcell">0%</td>
        </tr>
        <tr>
          <td align="center" class="tcell"><input type="radio" name="crime" value="3"></td>
          <td align="center" class="tcell"><img src="/images/icons/custom/59-crime.png"></td>
          <td class="tcell">Zakkenrollen op straat</td>
          <td align="center" class="tcell"><img src="/images/icons/set_2/chance.png"></td>
          <td class="tcell">0%</td>
        </tr>
        <tr>
          <td align="center" class="tcell"><input type="radio" name="crime" value="4"></td>
          <td align="center" class="tcell"><img src="/images/icons/custom/59-crime.png"></td>
          <td class="tcell">Een scooter stelen</td>
          <td align="center" class="tcell"><img src="/images/icons/set_2/chance.png"></td>
          <td class="tcell">0%</td>
        </tr>
        <tr>
          <td align="center" class="tcell"><input type="radio" name="crime" value="5"></td>
          <td align="center" class="tcell"><img src="/images/icons/custom/59-crime.png"></td>
          <td class="tcell">Een pinautomaat ramkraken</td>
          <td align="center" class="tcell"><img src="/images/icons/set_2/chance.png"></td>
          <td class="tcell">0%</td>
        </tr>
        <tr>
          <td align="center" class="tcell"><input type="radio" name="crime" value="6"></td>
          <td align="center" class="tcell"><img src="/images/icons/custom/59-crime.png"></td>
          <td class="tcell">Juwelen stelen bij een juwelier</td>
          <td align="center" class="tcell"><img src="/images/icons/set_2/chance.png"></td>
          <td class="tcell">0%</td>
        </tr>
        <tr>
          <td align="center" class="tcell"><input type="radio" name="crime" value="7"></td>
          <td align="center" class="tcell"><img src="/images/icons/custom/59-crime.png"></td>
          <td class="tcell">Kunst stelen uit het museum</td>
          <td align="center" class="tcell"><img src="/images/icons/set_2/chance.png"></td>
          <td class="tcell">0%</td>
        </tr>
        <tr>
          <td align="center" class="tcell"><input type="radio" name="crime" value="8"></td>
          <td align="center" class="tcell"><img src="/images/icons/custom/59-crime.png"></td>
          <td class="tcell">Ontvoer de president</td>
          <td align="center" class="tcell"><img src="/images/icons/set_2/chance.png"></td>
          <td class="tcell">0%</td>
        </tr>
        <tr>
          <td align="center" class="tcell"><input type="radio" name="crime" value="9"></td>
          <td align="center" class="tcell"><img src="/images/icons/custom/59-crime.png"></td>
          <td class="tcell">Geld stelen van een andere crimineel in Duitsland</td>
          <td align="center" class="tcell"><img src="/images/icons/set_2/chance.png"></td>
          <td class="tcell">0%</td>
        </tr>
      </tbody></table>
<table class="content_table"><tbody><tr><td class="tsub">Misdaad plegen? Klik op het groene vinkje!!</td></tr><tr><td class="tcell"><div style="padding: 2px; text-align: center"><input type="hidden" name="challenge" value="9296967"><input type="hidden" name="sess" value="31b001b2860ef933add8e6d364c66842">&nbsp;<input type="submit" style="border: 0; padding: 0; width: 48px; height: 48px; background: url('captcha?challenge=9296967&amp;response=WXXK') no-repeat;" name="R_WXXK" value="&nbsp;">&nbsp;&nbsp;<input type="submit" style="border: 0; padding: 0; width: 48px; height: 48px; background: url('captcha?challenge=9296967&amp;response=BLDM') no-repeat;" name="R_BLDM" value="&nbsp;">&nbsp;&nbsp;<input type="submit" style="border: 0; padding: 0; width: 48px; height: 48px; background: url('captcha?challenge=9296967&amp;response=KHKP') no-repeat;" name="R_KHKP" value="&nbsp;">&nbsp;&nbsp;<input type="submit" style="border: 0; padding: 0; width: 48px; height: 48px; background: url('captcha?challenge=9296967&amp;response=YLCS') no-repeat;" name="R_YLCS" value="&nbsp;">&nbsp;</div></td></tr></tbody></table>    </form>
  </div>
</div>-->


<script language="javascript">
	countdown('<?=$wait?>','count_timer','/crimes');
</script>
