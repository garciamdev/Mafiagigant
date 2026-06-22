<?php
 if($count == '0'){?>
			<div class="content_block">
  <div class="content_inner">
    <h1>Spieler nicht gefunden!</h1>
    </div></div>
    
    <?php
	
	
	}else{
	

	?>
	
	<div class="content_block">
  <div class="content_inner">
    <h1><?= $fm[0]['username'];?></h1>
    <table class="content_table" id="member_buttons">
    

	
      <tbody><tr>
        <td width="4%" align="center"><img src="/themes/img/icons/attack.png"></td>
        <td><a href="attack/<?= $fm[0]['username'];?>"><?= $text[$lang]['attack'];?></a></td>
        <td width="4%" align="center"><img src="/themes/img/icons/stats_boxing.png"></td>
        <td><a href="boxing/<?= $fm[0]['username'];?>"><?= $text[$lang]['boks'];?></a></td>
        <td width="4%" align="center"><img src="/themes/img/icons/mail_new.png"></td>
        <td><a href="mail/<?= $fm[0]['username'];?>"><?= $text[$lang]['message'];?></a></td>
        <td width="4%" align="center"><img src="/themes/img/icons/respect_up.png"></td>
        <td><a href="respect/<?= $fm[0]['username'];?>/"><?= $text[$lang]['respect_plus'];?></a></td>
      </tr>
    </tbody></table>
    <table class="content_table">
      <tbody><tr>
        <td width="22%" class="tcell"><?= $text[$lang]['username'];?></td>
        <td width="5%" class="tcell" align="center"><?= onlinestatus($fm[0]['username']);?></td>
        <td width="58%" colspan="4" class="tcell"><a href="member/<?= $fm['username'];?>" class="level1 vip"><?= $fm[0]['username'];?></a></td>
        <td width="15%" class="tcell" rowspan="4" align="center"><img alt="" class="avatar" src="/uploads/game_avatars/59-1.png" width="80" height="80"></td>
      </tr>
      <tr>
        <td class="tcell"><?= $text[$lang]['health'];?></td>
        <td class="tcell" align="center"><img src="/themes/img/icons/stats_health.png"></td>
        <td colspan="4" class="tcell"><!--<span style="white-space: nowrap"><img src="/images/bars_05/health_1.png" height="10" align="absmiddle"><img src="/images/bars_05/health_2.png" width="100" height="10" align="absmiddle"><img src="/images/bars_05/health_3.png" height="10" align="absmiddle"></span><span class="rankbar_text">&nbsp;100%</span>--></td>
      </tr>
      <tr>
        <td class="tcell"><?= $text[$lang]['power'];?></td>
        <td class="tcell" align="center"><img src="/themes/img/icons/stats_power.png"></td>
        <td colspan="4" class="tcell"><?= number($fm[0]['att_power'] + $fm[0]['deff_power']);?></td>
      </tr>
      <tr>
        <td class="tcell"><?= $text[$lang]['country'];?></td>
        <td class="tcell" align="center"><img src="/themes/img/icons/flag_1/flag.png"></td>
        <td colspan="4" class="tcell"><em><?= $text[$lang]['country_hide'];?></em></td>
      </tr>
      
      <tr>
        <td class="tcell"><?= $text[$lang]['married'];?></td>
        <td class="tcell" align="center"><img src="/themes/img/icons/stats_family.png"></td>
        <td colspan="5" class="tcell"><em><?= $text[$lang]['married_no'];?></em></td>
      </tr>
      <tr>
        <td width="22%" class="tcell"><?= $text[$lang]['cash'];?></td>
        <td width="5%" class="tcell" align="center"><img src="/themes/img/icons/stats_cash.png"></td>
        <td width="23%" class="tcell">€ <?= number($fm[0]['cash']);?></td>
        <td width="22%" class="tcell"><?= $text[$lang]['signup'];?></td>
        <td width="5%" class="tcell" align="center"><img src="/themes/img/icons/date.png"></td>
        <td colspan="2" width="23%" class="tcell"><?= $fm[0]['signup_date'];?></td>
      </tr>
      <tr>
        <td width="22%" class="tcell"><?= $text[$lang]['bank'];?></td>
        <td width="5%" class="tcell" align="center"><img src="/themes/img/icons/stats_bank.png"></td>
        <td width="23%" class="tcell">€ <?= number($fm[0]['bank']);?></td>
        <td></td><td></td><td colspan="2" ></td>
        <!--<td width="22%" class="tcell">Aangebracht door</td>
        <td width="5%" class="tcell" align="center"><img src="/images/icons/set_1/stats_referrals.png"></td>
        <td colspan="2" width="23%" class="tcell">Geen referral</td>-->
      </tr>
      
      


      <tr>
        <td width="22%" class="tcell"><?= $text[$lang]['family'];?></td>
        <td width="5%" class="tcell" align="center"><img src="/themes/img/icons/stats_family.png"></td>
        <td width="23%" class="tcell"><em><?= $text[$lang]['family_no'];?></em></td>
        <td width="22%" class="tcell"><?= $text[$lang]['lastonline'];?></td>
        <td width="5%" class="tcell" align="center"><img src="/themes/img/icons/date.png"></td>
        <td colspan="2" width="23%" class="tcell"><?= $fm[0]['lastaction_date'];?></td>
      </tr>
      <tr>
        <td width="22%" class="tcell"><?= $text[$lang]['gender'];?></td>
            <td width="5%" class="tcell" align="center"><img src="/themes/img/icons/gender_female.png"></td>
        <td width="23%" class="tcell">-</td>
            <td width="22%" class="tcell"><?= $text[$lang]['att_win'];?></td>
        <td width="5%" class="tcell" align="center"><img src="/themes/img/icons/stats_attack.png"></td>
        <td colspan="2" width="23%" class="tcell">0</td>
      </tr>
      <tr>
        <td width="22%" class="tcell"><?= $text[$lang]['rank'];?></td>
        <td width="5%" class="tcell" align="center"><img src="/themes/img/icons/stats_rank.png"></td>
        <td width="23%" class="tcell"><?= rank($fm[0]['username']);?></td>
        <td width="22%" class="tcell"><?= $text[$lang]['att_lost'];?></td>
        <td width="5%" class="tcell" align="center"><img src="/themes/img/icons/stats_defence.png"></td>
        <td colspan="2" width="23%" class="tcell">0</td>
      </tr>
      <tr>
        <td width="22%" class="tcell"><?= $text[$lang]['respect'];?></td>
        <td width="5%" class="tcell" align="center"><img src="/themes/img/icons/stats_respect.png"></td>
        <td width="23%" class="tcell">0</td>
        <td width="22%" class="tcell"><?= $text[$lang]['killed'];?></td>
        <td width="5%" class="tcell" align="center"><img src="/themes/img/icons/stats_murders.png"></td>
        <td colspan="2" width="23%" class="tcell">0</td>
      </tr>
      <tr>
        <td width="22%" class="tcell"><?= $text[$lang]['protection'];?></td>
        <td width="5%" class="tcell" align="center"><img src="/themes/img/icons/stats_protect.png"></td>
        <td width="23%" class="tcell"></td>
        <td width="22%" class="tcell"><?= $text[$lang]['missions'];?></td>
        <td width="5%" class="tcell" align="center"><img src="/themes/img/icons/stats_mission.png"></td>
        <td colspan="2" width="23%" class="tcell">0</td>
      </tr>
      <tr>
        <td width="22%" class="tcell"><?= $text[$lang]['holiday'];?></td>
        <td width="5%" class="tcell" align="center"><img src="/themes/img/icons/stats_holiday.png"></td>
        <td width="23%" class="tcell">Nee</td>
        <td colspan="5" class="tcell">&nbsp;</td>
      </tr>
    </tbody></table>
    <table class="content_table">
      <tbody><tr><td class="tsub"><?= $text[$lang]['profile'];?></td></tr>
      <tr><td class="tcell"> </td></tr>
    </tbody></table>

  </div>
</div>

<?php } ?>