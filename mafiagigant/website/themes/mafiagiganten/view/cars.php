<div class="content_block">
  <div class="content_inner">
    <table class="content_table">
      <tbody><tr>

        <td width="5%" align="center"><img src="/themes/img/icons/car.png"></td>
        <td><a href="cars/steal"><?= $text[$lang]['topmenu_cars_stealcars'];?></a></td>
     <td width="5%" align="center"><img src="/themes/img/icons/racing.png"></td>
        <td><a href="cars/race">Race</a></td>
        <td width="5%" align="center"><img src="/themes/img/icons/garage.png"></td>
        <td><a href="cars"><?= $text[$lang]['topmenu_cars_garage'];?></a></td>
      </tr>
    </tbody></table>
  </div>
</div>

<?php if($var == 'steal'){ ?>	
<div class="content_block">
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
              
               <?php if($full == 0){?>
    <form method="post">
      <table class="content_table">
        <tbody>
        <tr>
          <td width="5%" class="tsub">&nbsp;</td>
          <td width="5%" class="tsub">&nbsp;</td>
          <td width="43%" class="tsub"><?= $text[$lang]['table_crimes'];?></td>
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
          <td align="center" class="tcell"><input type="radio" name="stealcars" value="<?= $crime['id'];?>"></td>
          <td align="center" class="tcell"><img src="/themes/img/icons/car.png"></td>
          <td class="tcell"><?= gettranslation($crime['id'], $t);?></td>
          <td align="center" class="tcell"><img src="themes/img/icons/chance.png"></td>
          <td class="tcell"><?= $perc;?> %</td>
        </tr>
        
        
                    
                        
			
			<?php } ?>
			
			
		
      </tbody></table>
<table class="content_table"><tbody><tr><td class="tsub"><?= $text[$lang]['captcha'];?></td></tr>
<tr>
<td class="tcell"><div style="padding: 2px; text-align: center"><?= showcaptcha();?></div></td></tr>

</tbody>

</table>   


 </form>
 <?php } ?>
  </div>
  

</div>
<script language="javascript">
	countdown('<?=$wait?>','count_timer','/cars');
</script>

<?php } ?>


<?php if($var == 'race'){ ?>	
      <style>
        .info_good {
            display: none;
        }
    </style><div class="content_block">
<div class="content_inner">
    <h1><?= $text[$lang]['page_title_race'];?></h1>

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
              
              
                     if(!empty($success))
              { 
              
              ?><table class="content_table" style="width: 75%; margin-left: auto; margin-right: auto">
      <tbody><?php
    
                  foreach($success AS $succes)
                  {?>
                    <tr  class="info_good">
          <td class="tcell" align="center"><img src="/themes/img/icons/racing.png"></td>
          <td class="tcell" width="100%"><?= $succes;?></td>
        </tr><?php
        
                  }?> 
      </tbody> 
    </table><?php
              }?>
              
              
              
<script>
        function showTables() {
            var tables = document.querySelectorAll(".info_good");
            var index = 0;

            function showNextTable() {
                if (index < tables.length) {
                    tables[index].style.display = "table";
                    index++;
                } else {
                    clearInterval(interval);
                }
            }

            var interval = setInterval(showNextTable, 750); // 1000 milliseconds = 1 second
        }

        showTables();
    </script>
    


    <?php 
    if($racing != 1){
    if($nocars == 0){
    $i = 0;
    	foreach($g as $f){
    		$carinfo = getcarinfo($f['car']);
    		
    		if($i == 0){
    		echo '<table class="wrap_table"><tr>';
    		}
    		
    		$value = $carinfo[0]['price'] - (( $carinfo[0]['price'] / 100 ) * $f['demage']);
    	?>
    
    
        <td width="32%">
          <table class="content_table">
            <tr>
              <td width="100%" class="tsub" colspan="2"><?= gettranslation($f['car'],$tcars);?></td>
            </tr>
            

  
              <tr>
              <td colspan="2" align="center" class="tcell"><img onmouseover="TagToTip('over<?=$f['id'];?>', OFFSETY, -60, PADDING, 0)" onmouseout="UnTip()" src="<?= $carinfo[0]['img'];?>" width="200" height="200"/></td>
              <td style="display: none">
                <div class="tiptag" id="over<?=$f['id'];?>" style="width: 200px">
                  <table class="content_table" style="width: 200px">
                    <tr>
                      <td width="42%" class="tcell"><?= $text[$lang]['garage_carinfo_value'];?></td>
                      <td width="15%" class="tcell"><img src="/themes/img/icons/stats_cash.png"/></td>
                      <td class="tcell">€ <?= number($value);?></td>
                    </tr> 
                    <tr>
                      <td class="tcell"><?= $text[$lang]['garage_carinfo_demage'];?></td>
                      <td class="tcell"><img src="/themes/img/icons/garage.png"/></td>
                      <td class="tcell"><?= $f['demage'];?>%</td>
                    </tr>
                    <tr>
                      <td class="tcell"><?= $text[$lang]['garage_carinfo_newprice'];?></td>
                      <td class="tcell"><img src="/themes/img/icons/cash_up.png"/></td>
                      <td class="tcell">€ <?= number($carinfo[0]['price']);?></td>
                    </tr>
                  </table>
                </div>
              </td>
            </tr>
            <?php if($f['demage'] > $maxdemage){?>
            <tr>
              <td class="tcell" width="10%"><img src="/themes/img/icons/garage.png"/></td>
              <td class="tcell" width="90%"><a href="cars/repair" onclick="return multiform(<?=$f['id'];?>,'repair')"><?= $text[$lang]['race_car_repair'];?></a></td>
            </tr>
            <?php }else{ ?>
            <tr>
              <td class="tcell" width="10%"><img src="/themes/img/icons/racing.png"/></td>
              <td class="tcell" width="90%"><a href="cars/race" onclick="return multiform(<?=$f['id'];?>,'race')"><?= $text[$lang]['race_car_startrace'];?></a></td>
            </tr>
            <?php } ?>
        	</table>
        </td>
            
            
           <?php 
            
            $i = $i + 1;
            
            
            if($i == 1){
            echo'<td width="2%">&nbsp;</td>';
            }
            if($i == 2){
    		echo "</tr>  </table>"; $i = 0;}
            
    	}
    	
    	if($i == 1){ echo ' <td width="32%">&nbsp;</td>';	}
    	if($i != 0){ echo "</tr>  </table>"; 	}
    	
    	}
    ?>
    
    
    <form method="post" id="multipost"><input id="multicars" type="hidden" name="cars" value=""></form>

    
      <script type="text/javascript">
function multiform(id, action) {
  document.getElementById('multipost').action='cars/'+action;

    document.getElementById('multicars').value = id;
  
  document.getElementById('multipost').submit();
  return false;
}
</script>
    
    





<?php } ?>


</div></div>


<script language="javascript">
	countdown('<?=$wait?>','count_timer','/cars/race');
</script>

<?php } ?>
<?php if($var == 'repair'){ ?>	


<div class="content_block">

<div class="content_inner">
    <h1><?= $text[$lang]['page_title_repair'];?></h1>
    
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
              
              
	<?php if(!isset($_POST['repair']) and empty($errors) ){ ?>
         <table class="content_table">
            <tbody><tr>
              <td width="10%" class="tsub">&nbsp;</td>
              <td width="30%" class="tsub"><?= $text[$lang]['table_car'];?></td>
              <td width="10%" class="tsub">&nbsp;</td>
              <td width="20%" class="tsub"><?= $text[$lang]['table_newprice'];?></td>
              <td width="10%" class="tsub">&nbsp;</td>
              <td width="20%" class="tsub"><?= $text[$lang]['table_demage'];?></td>
              <td width="10%" class="tsub">&nbsp;</td>
              <td width="20%" class="tsub"><?= $text[$lang]['table_repaircost'];?></td>
            </tr></tbody>
            <?php
            
            $totalrepair = 0;
    	foreach($g as $f){
    	if (in_array($f['id'], $pcars)) {
    	
    	
    	
    		$carinfo = getcarinfo($f['car']);
    		$value = round((( $carinfo[0]['price'] / 100 ) * $f['demage']) * 1.10);
    		$totalrepair = $totalrepair + $value;
    		if($f['demage'] > 0){
    	?>
    	<tr>
    			<td class="tcell" align="center"><img src="/themes/img/icons/car.png"></td>
              <td class="tcell"><?= gettranslation($f['car'],$tcars);?></td>
    			<td class="tcell" align="center"><img src="/themes/img/icons/cash_up.png"></td>
              <td  class="tcell"><?= number($carinfo[0]['price']);?></td>
    			<td class="tcell" align="center"><img src="/themes/img/icons/garage.png"></td>
              <td  class="tcell"><?= $f['demage'];?>%</td>
    			<td class="tcell" align="center"><img src="/themes/img/icons/stats_cash.png"></td>
              <td  class="tcell">€ <?= number($value);?></td>
            </tr>
            <?php
            }
    	}
    	}
    	?>
            <tr>
    			<td class="tcell" align="center" colspan="7"><?= $text[$lang]['table_sellcar_total'];?></td>
              <td  class="tcell">€ <?= number($totalrepair);?></td>
            </tr>
            
            </table>
            
            
            <p><?= $text[$lang]['text_repair'];?></p>
            <form method="post">
            <input type="hidden" name="cars" value="<?=$_POST['cars'];?>">
            <input type="submit" class="submit" name="repair" value="<?= $text[$lang]['buttonyes'];?>">
<input type="submit" class="submit" name="notrepair" value="<?= $text[$lang]['buttonno'];?>">

 </form>
 
 <?php } ?>
  </div></div>
  
  

<?php } ?>







<?php if($var == 'dealer'){ ?>	


<div class="content_block">

<div class="content_inner">
    <h1><?= $text[$lang]['page_title_sell'];?></h1>
    
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
              
              
	<?php if(!isset($_POST['sell']) and empty($errors) ){ ?>
         <table class="content_table">
            <tbody><tr>
              <td width="10%" class="tsub">&nbsp;</td>
              <td width="50%" class="tsub"><?= $text[$lang]['table_car'];?></td>
              <td width="10%" class="tsub">&nbsp;</td>
              <td width="20%" class="tsub"><?= $text[$lang]['table_sellcar'];?></td>
            </tr></tbody>
            <?php
            
            $totalsell = 0;
    	foreach($g as $f){
    	if (in_array($f['id'], $pcars)) {
    	
    	
    	
    		$carinfo = getcarinfo($f['car']);
    		$value = round( $carinfo[0]['price'] - (( $carinfo[0]['price'] / 100 ) * $f['demage']) * 1.0);
    		$totalsell = $totalsell + $value;
    		
    	?>
    	<tr>
    			<td class="tcell" align="center"><img src="/themes/img/icons/car.png"></td>
              <td class="tcell"><?= gettranslation($f['car'],$tcars);?></td>
    			<td class="tcell" align="center"><img src="/themes/img/icons/stats_cash.png"></td>
              <td  class="tcell">€ <?= number($value);?></td>
            </tr>
            <?php
            
    	}
    	}
    	?>
            <tr>
    			<td class="tcell" align="center" colspan="3"><?= $text[$lang]['table_sellcar_total'];?></td>
              <td  class="tcell">€ <?= number($totalsell);?></td>
            </tr>
            
            </table>
            
            
            <p><?= $text[$lang]['text_sell'];?></p>
            <form method="post">
            <input type="hidden" name="cars" value="<?=$_POST['cars'];?>">
            <input type="submit" class="submit" name="sell" value="<?= $text[$lang]['buttonyes'];?>">
<input type="submit" class="submit" name="notsell" value="<?= $text[$lang]['buttonno'];?>">

 </form>
 
 <?php } ?>
  </div></div>
  

<?php } ?>






<?php if($varallowed == 'no'){?>





  
    <div class="content_block">
  <div class="content_inner">
    <h1><?= $text[$lang]['page_title_garage'];?></h1>
    <p><?= txt($text[$lang]['text_garage'],"{amount}","<b>".$userdata[0]['garagespots']."</b>");?></p>
    <table class="wrap_table">
      <tbody><tr>
        <td width="49%">
          <table class="content_table">
            <tbody><tr>
              <td width="10%" class="tsub">&nbsp;</td>
              <td width="40%" class="tsub"><?= $text[$lang]['table_garage'];?></td>
              <td width="10%" class="tsub">&nbsp;</td>
              <td width="40%" class="tsub"><?= $text[$lang]['table_garageamount'];?></td>
            </tr>
                      
          <?php
          $hide = 1;
          $total1 = 0;
          
          foreach($countrys as $f){
        
          	if($hide <= ceil($countrycount /2)){
          $cars = isset($arrcars[$f['id']]) ? $arrcars[$f['id']] : 0;
	          ?>
          
          
            <tr>
              <td class="tcell" align="center"><img src="<?= $f['img']; ?>"></td>
              <td class="tcell"><?= gettranslation($f['id'], $tc); ?></td>
              <td class="tcell" align="center"><img src="/themes/img/icons/car.png"></td>
              <td class="tcell"><?= $cars; ?></td>
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
              <td width="40%" class="tsub"><?= $text[$lang]['table_garage'];?></td>
              <td width="10%" class="tsub">&nbsp;</td>
              <td width="40%" class="tsub"><?= $text[$lang]['table_garageamount'];?></td>
            </tr>
                      
          <?php
          $hide = 1;
          $total2 = 0;
          foreach($countrys as $f){
          	if($hide > ceil($countrycount /2) ){
          $inmates = isset($arrtimer[$f['id']]) ? $arrtimer[$f['id']] : 0;
          ?>
          
          
            <tr>
              <td class="tcell" align="center"><img src="<?= $f['img']; ?>"></td>
              <td class="tcell"><?= gettranslation($f['id'], $tc); ?></td>
              <td class="tcell" align="center"><img src="/themes/img/icons/car.png"></td>
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
    
    
    
    <table class="content_table">
      <tbody><tr>
        <td class="tcell" width="51%"><?= $text[$lang]['text_garage_totaldifferentcars'];?></td>
        <td class="tcell" width="5%" align="center"><img src="/themes/img/icons/car.png"></td>
        <td class="tcell" width="44%"><?= $totaldifferentcars;?></td>
      </tr>
      <tr>
        <td class="tcell"><?= $text[$lang]['text_garage_totalpossession'];?></td>
        <td class="tcell" align="center"><img src="/themes/img/icons/car.png"></td>
        <td class="tcell"><?= $totalcars;?></td>
      </tr>
      <tr>
        <td class="tcell"><?= $text[$lang]['text_garage_incountry'];?></td>
        <td class="tcell" align="center"><img src="/themes/img/icons/car.png"></td>
        <td class="tcell"><?= $totalcarsincountry;?></td>
      </tr>
    </tbody></table>
    
    
  </div>
</div>










<div class="content_block">
  <div class="content_inner">
    <h1><?= txt($text[$lang]['page_title_garage_in'],"{country}",getcountry($userdata[0]['country']));?></h1>

    
    
    
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
    if($nocars == 0){
    $i = 0;
    	foreach($g as $f){
    	
    		$carinfo = getcarinfo($f['car']);
    		
    		if($i == 0){
    		echo '<table class="wrap_table"><tr>';
    		}
    		
    		$value = $carinfo[0]['price'] - (( $carinfo[0]['price'] / 100 ) * $f['demage']);
    	?>
    
    
        <td width="32%">
          <table class="content_table">
            <tr>
              <td class="tsub" width="10%" align="center"><input onclick="this.blur();" onchange="document.getElementById('carall').checked=false;" type="checkbox" id="car<?= $f['id'];?>" name="car" value="27204240"/></td>
              <td width="90%" class="tsub"><?= gettranslation($f['car'],$tcars);?></td>
            </tr>
            

  
              <tr>
              <td colspan="2" align="center" class="tcell"><img onmouseover="TagToTip('over<?=$f['id'];?>', OFFSETY, -60, PADDING, 0)" onmouseout="UnTip()" src="<?= $carinfo[0]['img'];?>" width="200" height="200"/></td>
              <td style="display: none">
                <div class="tiptag" id="over<?=$f['id'];?>" style="width: 200px">
                  <table class="content_table" style="width: 200px">
                    <tr>
                      <td width="42%" class="tcell"><?= $text[$lang]['garage_carinfo_value'];?></td>
                      <td width="15%" class="tcell"><img src="/themes/img/icons/stats_cash.png"/></td>
                      <td class="tcell">€ <?= number($value);?></td>
                    </tr> 
                    <tr>
                      <td class="tcell"><?= $text[$lang]['garage_carinfo_demage'];?></td>
                      <td class="tcell"><img src="/themes/img/icons/garage.png"/></td>
                      <td class="tcell"><?= $f['demage'];?>%</td>
                    </tr>
                    <tr>
                      <td class="tcell"><?= $text[$lang]['garage_carinfo_newprice'];?></td>
                      <td class="tcell"><img src="/themes/img/icons/cash_up.png"/></td>
                      <td class="tcell">€ <?= number($carinfo[0]['price']);?></td>
                    </tr>
                  </table>
                </div>
              </td>
            </tr>
            
            <tr>
              <td class="tcell" width="10%"><img src="/themes/img/icons/garage.png"/></td>
              <td class="tcell" width="90%"><a href="cars/repair" onclick="return multiform(<?=$f['id'];?>,'repair')"><?= $text[$lang]['garage_bottom_repair'];?></a></td>
            </tr>
            <tr>
              <td class="tcell" width="10%"><img src="/themes/img/icons/stats_cash.png"/></td>
              <td class="tcell" width="90%"><a href="cars/dealer" onclick="return multiform(<?=$f['id'];?>,'dealer')"><?= $text[$lang]['garage_bottom_selldealer'];?></a></td>
            </tr>
            
        	</table>
        </td>
            
            
           <?php 
            
            $i = $i + 1;
            
            
            if($i == 1){
            echo'<td width="2%">&nbsp;</td>';
            }
            if($i == 2){
    		echo "</tr>  </table>"; $i = 0;}
            
    	}
    	
    	if($i == 1){ echo ' <td width="32%">&nbsp;</td>';	}
    	if($i != 0){ echo "</tr>  </table>"; 	}
    ?>
    
    
    
    
    
  
    <table class="content_table">
      <tr>
        <td class="tcell" width="5%" align="center"><input onclick="this.blur();" onchange="
            <?php 
    	foreach($g as $f){ echo" document.getElementById('car".$f['id']."').checked=this.checked;";}
    	
    	?>  " id="carall" type="checkbox" name="all" value="1"/></td>
        <td class="tcell" width="23%"><?= $text[$lang]['garage_bottom_selectall'];?></td>
        <td class="tcell" width="5%"><img src="/themes/img/icons/garage.png"/></td>
        <td class="tcell" width="21%"><a onclick="return multiform(0,'repair')" href="cars/repair"><?= $text[$lang]['garage_bottom_repair'];?></a></td>
        <td class="tcell" width="5%"><img src="/themes/img/icons/stats_cash.png"/></td>
        <td class="tcell" width="26%"><a onclick="return multiform(0,'dealer')" href="cars/dealer"><?= $text[$lang]['garage_bottom_selldealer'];?></a></td>
      </tr>
    </table>
<form method="post" id="multipost"><input id="multicars" type="hidden" name="cars" value=""></form>
<script type="text/javascript">
function multiform(id, action) {
  document.getElementById('multipost').action='cars/'+action;
  if (id == 0) {
    document.getElementById('multicars').value = '';
    <?php 
    	foreach($g as $f){
    	echo" if (document.getElementById('car".$f['id']."').checked) { document.getElementById('multicars').value += '".$f['id'].",'; } 
    	";
    	}
    ?>
  } else {
    document.getElementById('multicars').value = id;
  }
  document.getElementById('multipost').submit();
  return false;
}
</script>

<?php } ?>

  </div>
</div>





<?php } ?>