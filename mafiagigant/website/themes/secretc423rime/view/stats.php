<div class="content_block">
  <div class="content_inner">
    <h1>Statistieken</h1>
    <p>
      Zie hieronder een overzicht van de statistieken.
    </p>
    
<table class="wrap_table">
<tbody>

<tr>
<td width="49%">
          <table class="content_table">
            <tbody><tr>
              <td colspan="3" class="tsub">Top <?= $limit;?> power</td>
            </tr>
            
    	<?php
foreach($fpower as $f){
	if($f['power'] > 0){?>
            <tr>
              <td class="tcell" width="44%"><a href="member/<?= $f['username'];?>"><?= $f['username'];?></a></td>
              <td class="tcell" width="10%" align="center"><img src="/themes/img/icons/stats_power.png"></td>
              <td class="tcell" width="46%" align="center"><?= number($f['power']);?></td>
            </tr>
	<?php }
				
}	
	?>
	
	
	       </tbody></table>
</td>
<td width="2%">&nbsp;</td>
<td width="49%">
          <table class="content_table">
            <tbody><tr>
              <td colspan="3" class="tsub">Top <?= $limit;?> geld</td>
            </tr>
            
    	<?php
foreach($fmoney as $f){
	if($f['money'] > 0){?>
            <tr>
              <td class="tcell" width="44%"><a href="member/<?= $f['username'];?>"><?= $f['username'];?></a></td>
              <td class="tcell" width="10%" align="center"><img src="/themes/img/icons/stats_money.png"></td>
              <td class="tcell" width="46%" align="center"><?= number($f['money']);?></td>
            </tr>
	<?php }
				
}	
	?></tbody></table>



</td>
</tr>


      <tr><td colspan="3">&nbsp;</td></tr>


<tr>
<td width="49%">
          <table class="content_table">
            <tbody><tr>
              <td colspan="3" class="tsub">Top <?= $limit;?> boks power</td>
            </tr>
            
    	<?php
foreach($fbox as $f){
	if($f['box_power'] > 0){?>
            <tr>
              <td class="tcell" width="44%"><a href="member/<?= $f['username'];?>"><?= $f['username'];?></a></td>
              <td class="tcell" width="10%" align="center"><img src="/themes/img/icons/stats_boxing.png"></td>
              <td class="tcell" width="46%" align="center"><?= number($f['box_power']);?></td>
            </tr>
	<?php }
				
}	
	?></tbody></table>
	
	
</td>



<td width="2%">&nbsp;</td>
<td width="49%">
          <table class="content_table">
            <tbody><tr>
              <td colspan="3" class="tsub">Top <?= $limit;?> rank</td>
            </tr>
            
    	<?php
foreach($frank as $f){
	if($f['xp'] > 0){?>
            <tr>
              <td class="tcell" width="44%"><a href="member/<?= $f['username'];?>"><?= $f['username'];?></a></td>
              <td class="tcell" width="10%" align="center"><img src="/themes/img/icons/stats_rank.png"></td>
              <td class="tcell" width="46%" align="center"><?= rank($f['username']);?></td>
            </tr>
	<?php }
				
}	
	?></tbody></table>



</td>
</tr>











</tbody>
</table>
	
	
	
  </div>
</div>