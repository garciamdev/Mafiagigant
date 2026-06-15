<div class="content_block">
  <form method="post" id="memberform">
    <div class="content_inner">

      <h1><?= $text[$lang]['page_title'];?></h1>
      <table class="content_table">
        <tbody><tr>
          <td width="20%" class="tcell">&nbsp;</td>
          <td width="5%" class="tcell" align="center"><img src="/themes/img/icons/sort.png"></td>
          <td width="30%" class="tcell"><?= $text[$lang]['order_at'];?></td>
          <td width="25%" class="tcell"><select onchange="document.getElementById('memberform').submit();" class="select" name="sort_members">
            <option selected="selected"  value="0"><?= $text[$lang]['order_power'];?></option>
            <option value="1"><?= $text[$lang]['order_rank'];?></option>
            <option value="2"><?= $text[$lang]['order_join'];?></option>
          </select></td>
          <td width="20%" class="tcell">&nbsp;</td>
        </tr>
      </tbody></table>
      <table class="content_table">
        <tbody><tr>
          <td class="tsub" align="center">#</td>
          <td class="tsub">&nbsp;</td>
          <td class="tsub"><?= $text[$lang]['table_username'];?></td>
          <td class="tsub">&nbsp;</td>
          <td class="tsub"><?= $text[$lang]['table_family'];?></td>
          
          	<?php if($sort == 'join'){ ?>
          <td class="tsub">&nbsp;</td>
          <td class="tsub"><?= $text[$lang]['table_join'];?></td>
          <?php } ?>
			<?php if($sort == 'power'){ ?>

          <td class="tsub">&nbsp;</td>
          <td class="tsub"><?= $text[$lang]['table_power'];?></td>
          <?php } ?>
			<?php if($sort == 'rank'){ ?>

          <td class="tsub">&nbsp;</td>
          <td class="tsub"><?= $text[$lang]['table_rank'];?></td>
          <?php } ?>
          
          
          <td class="tsub">&nbsp;</td>
          <td colspan="3" class="tsub"><?= $text[$lang]['table_options'];?></td>
        </tr>
        
        					<?php	
        					$i = 1;
			foreach($fo as $o){ ?>
				
				   <tr>
          <td width="5%" class="tcell" align="center"><?= $i; ?></td>
          <td width="5%" class="tcell" align="center"><?= onlinestatus($o['username']);?></td>
          <td width="20%" class="tcell"><a href="member/<?= $o['username'];?>" class="level1 vip"><?= $o['username'];?></a></td>
			<td></td><td></td> 
			<?php if($sort == 'join'){ ?>
          <td width="5%" class="tcell" align="center"><img src="/themes/img/icons/date.png"></td>
          <td width="20%" class="tcell"><?= $o['signup_date'];?></td>
          <?php } ?>
			<?php if($sort == 'power'){ ?>
          <td width="5%" class="tcell" align="center"><img src="/themes/img/icons/stats_power.png"></td>
          <td width="20%" class="tcell"><?= number($o['att_power'] + $o['deff_power']);?></td>
          <?php } ?>
			<?php if($sort == 'rank'){ ?>
          <td width="5%" class="tcell" align="center"><img src="/themes/img/icons/stats_rank.png"></td>
          <td width="20%" class="tcell"><?= rank($o['username']);?></td>
          <?php } ?>
          

          <td width="5%" class="tcell" align="center"><img src="/themes/img/icons/flag_1/flag_de.png"></td>          
 <td width="5%" class="tcell" align="center"><img onmouseover="TagToTip('info<?= $o['username'];?>', OFFSETY, -60, PADDING, 0)" onmouseout="UnTip()" src="/themes/img/icons/info_info.png"></td>
       
            <td style="display: none">
            <div class="tiptag" id="info<?= $o['username'];?>" style="width: 200px; display: none;">
              <table class="content_table">
                <tbody><tr>
                  <td width="15%" class="tcell"><img src="/themes/img/icons/stats_rank.png"></td>
                  <td class="tcell"><?= rank($o['username']);?></td>
                </tr>
               <!-- <tr>
                  <td class="tcell"><img src="/themes/img/icons/stats_health.png"></td>
                  <td class="tcell"><span style="white-space: nowrap"><img src="/images/bars_01/health_1.png" height="10" align="absmiddle"><img src="/images/bars_01/health_2.png" width="100" height="10" align="absmiddle"><img src="/images/bars_01/health_3.png" height="10" align="absmiddle"></span><span class="rankbar_text">&nbsp;100%</span></td>
                </tr>-->
                <tr>
                  <td class="tcell"><img src="/themes/img/icons/stats_cash.png"></td>
                  <td class="tcell">€ <?= number($o['cash']);?></td>
                </tr>
                <tr>
                  <td class="tcell"><img src="/themes/img/icons/stats_bank.png"></td>
                  <td class="tcell">€<?= number($o['bank']);?></td>
                </tr>
                <tr>
                  <td class="tcell"><img src="/themes/img/icons/flag_eg.png"></td>
                  <td class="tcell">Egypt</td>
                </tr>
              </tbody></table>
            </div>
          </td>
          
	</tr>
	
		<?php	$i = $i + 1; } ?>
        
        
        
        
        
      </tbody></table>
    </div>
  </form>
</div>