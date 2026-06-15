


<div class="content_block">
  <div class="content_inner">
      <h1><?= $text[$lang]['title']; ?></h1>
      <p><?= $text[$lang]['description']; ?></p>
    <table class="wrap_table">
      <tbody><tr>
        <td width="49%">
          <table class="content_table">
            <tbody><tr>
              <td width="10%" class="tcell" align="center"><img src="/themes/img/icons/crime.png"></td>
                    <td width="66%" class="tcell"><a href="crimes"><?= $text[$lang]['crime']; ?></a></td>
              <td width="24%" class="tcell" align="center" ><a href="crimes" id="timer_crimes"></a></td>
            </tr>
            <tr>
              <td width="10%" class="tcell" align="center"><img src="/themes/img/icons/stats_redlight.png"></td>
              <td width="66%" class="tcell"><a href="red-light-district">Red-light district</a></td>
              <td width="24%" class="tcell" align="center"><a href="red-light-district" id="timer_redlight">00:00:00</a></td>
            </tr><!--
            <tr>
              <td width="10%" class="tcell" align="center"><img src="/images/icons/custom/59-crime.png"></td>
              <td width="66%" class="tcell">Organized crime</td>
              <td width="24%" class="tcell" align="center" id="cdtimer_1"><a href="organized-crime">00:00:00</a></td>
            </tr>
            <tr>
              <td width="10%" class="tcell" align="center"><img src="/images/icons/set_2/stats_shooting.png"></td>
              <td width="66%" class="tcell">Marksmanship</td>
              <td width="24%" class="tcell" align="center" id="cdtimer_2"><a href="shooting">00:00:00</a></td>
            </tr>-->
            <tr>
              <td width="10%" class="tcell" align="center"><img src="/themes/img/icons/car.png"></td>
              <td width="66%" class="tcell"><a href="cars/steal">Steal cars</a></td>
              <td width="24%" class="tcell" align="center"><a href="cars/steal" id="timer_stealcars" >00:00:00</a></td>
            </tr>
            <tr>
              <td width="10%" class="tcell" align="center"><img src="/themes/img/icons/racing.png"></td>
              <td width="66%" class="tcell"><a href="cars/race">Race</a></td>
              <td width="24%" class="tcell" align="center"><a href="cars/race" id="timer_race">00:00:00</a></td>
            </tr><!--
            <tr>
              <td width="10%" class="tcell" align="center"><img src="/images/icons/flag_2/flag_cn.png"></td>
              <td width="66%" class="tcell">Human trafficking</td>
              <td width="24%" class="tcell" align="center" id="cdtimer_5"><a href="smuggling">00:00:00</a></td>
            </tr>-->
            <tr>
              <td width="10%" class="tcell" align="center"><img src="/themes/img/icons/transport.png"></td>
              <td width="66%" class="tcell"><a href="transport">Money truck robbery</a></td>
              <td width="24%" class="tcell" align="center"><a href="transport"  id="timer_transport">00:00:00</a></td>
            </tr>
            <tr>
              <td width="10%" class="tcell" align="center"><img src="/themes/img/icons/drugs.png"></td>
              <td width="66%" class="tcell"><a href="robbery">Robbery</a></td>
              <td width="24%" class="tcell" align="center"><a href="robbery" id="timer_robbery">00:00:00</a></td>
            </tr><!--
            <tr>
              <td width="10%" class="tcell" align="center"><img src="/images/icons/set_2/stats_family.png"></td>
              <td width="66%" class="tcell">Group robbery</td>
              <td width="24%" class="tcell" align="center" id="cdtimer_8"><a href="group-robbery">00:00:00</a></td>
            </tr>
            <tr>
              <td width="10%" class="tcell" align="center"><img src="/images/icons/flag_2/flag_ru.png"></td>
              <td width="66%" class="tcell">Russian Mafia</td>
              <td width="24%" class="tcell" align="center" id="cdtimer_9">02:53:09</td>
            </tr>-->
            <tr>
              <td width="10%" class="tcell" align="center"><img src="/themes/img/icons/packages.png"></td>
              <td width="66%" class="tcell"><a href="suspicious-packages" >Mysterious packages</a></td>
              <td width="24%" class="tcell" align="center"><a href="suspicious-packages" id="timer_suspiciouspackages">00:00:00</a></td>
            </tr>
          </tbody></table>
        </td>
        <td width="2%">&nbsp;</td>
        <td width="49%">
          <table class="content_table">
            <tbody><!--<tr>
              <td width="10%" class="tcell" align="center"><img src="/images/icons/flag_2/flag_eg.png"></td>
              <td width="66%" class="tcell">Murder "The Pharaoh"</td>
              <td width="24%" class="tcell" align="center" id="cdtimer_11"><a href="farao">00:00:00</a></td>
            </tr>
            <tr>
              <td width="10%" class="tcell" align="center"><img src="/images/icons/flag_2/flag_it.png"></td>
              <td width="66%" class="tcell">Junkie pope</td>
              <td width="24%" class="tcell" align="center" id="cdtimer_12"><a href="pope">00:00:00</a></td>
            </tr>-->
            <tr>
              <td width="10%" class="tcell" align="center"><img src="/themes/img/icons/airport.png"></td>
              <td width="66%" class="tcell"><a href="airport">Fly</a></td>
              <td width="24%" class="tcell" align="center""><a href="airport" id="timer_fly">00:00:00</a></td>
            </tr>
            <tr>
              <td width="10%" class="tcell" align="center"><img src="/themes/img/icons/stats_boxing.png"></td>
              <td width="66%" class="tcell"><a href="boxing"><?= $text[$lang]['boxing']; ?></a></td>
              <td width="24%" class="tcell" align="center"><a href="boxing" id="timer_boxing">00:00:00</a></td>
            </tr>
            <tr>
              <td width="10%" class="tcell" align="center"><img src="/themes/img/icons/sports.png"></td>
              <td width="66%" class="tcell"><a href="sports-hall"><?= $text[$lang]['sports-hall'];?></a></td>
              <td width="24%" class="tcell" align="center"><a href="sports-hall" id="timer_gym">00:00:00</a></td>
            </tr>
            <tr> 
              <td width="10%" class="tcell" align="center"><img src="/themes/img/icons/wheel.png"></td>
              <td width="66%" class="tcell"><a href="wheel-of-fortune">Wheel of Fortune</a></td>
              <td width="24%" class="tcell" align="center"><a href="wheel-of-fortune"  id="timer_wheel">00:00:00</a></td>
            </tr><!--
            <tr>
              <td width="10%" class="tcell" align="center"><img src="/images/icons/custom/59-stats_protect.png"></td>
              <td width="66%" class="tcell">Protection</td>
              <td width="24%" class="tcell" align="center" id="cdtimer_17"><a href="exchange-office">00:00:00</a></td>
            </tr>
            <tr>
              <td width="10%" class="tcell" align="center"><img src="/images/icons/set_1/attack.png"></td>
              <td width="66%" class="tcell">Murder</td>
              <td width="24%" class="tcell" align="center" id="cdtimer_18"><a href="attack">00:00:00</a></td>
            </tr>
            <tr>
              <td width="10%" class="tcell" align="center"><img src="/images/icons/set_1/stats_bank.png"></td>
              <td width="66%" class="tcell">Work</td>
              <td width="24%" class="tcell" align="center" id="cdtimer_19"><a href="work">00:00:00</a></td>
            </tr>
            <tr>
              <td width="10%" class="tcell" align="center"><img src="/images/icons/custom/59-hilo.png"></td>
              <td width="66%" class="tcell">Higher / lower</td>
              <td width="24%" class="tcell" align="center" id="cdtimer_20"><a href="higher-lower">00:00:00</a></td>
            </tr>
            <tr>
              <td width="10%" class="tcell">&nbsp;</td>
              <td width="66%" class="tcell">&nbsp;</td>
              <td width="24%" class="tcell">&nbsp;</td>
            </tr>-->
          </tbody></table>
        </td>
      </tr>
    </tbody></table>
    
  </div>
 
 
  
 <script language="javascript">
	countdown('<?=$count_timer_crimes?>','timer_crimes','');
</script>

 <script language="javascript">
	countdown('<?=$count_timer_boxing?>','timer_boxing','');
	countdown('<?=$count_timer_gym?>','timer_gym','');
	countdown('<?=$count_timer_fly?>','timer_fly','');
	countdown('<?=$count_timer_redlight?>','timer_redlight','');
	countdown('<?=$count_timer_robbery?>','timer_robbery','');
	countdown('<?=$count_timer_suspiciouspackages?>','timer_suspiciouspackages','');
	countdown('<?=$count_timer_stealcars?>','timer_stealcars','');
	countdown('<?=$count_timer_race?>','timer_race','');
	countdown('<?=$count_timer_wheel?>','timer_wheel','');
	countdown('<?=$count_timer_transport?>','timer_transport','');
	
	
</script>


</div>


<div class="content_block">
  <div class="content_inner">
    <h1><?= $text[$lang]['user_title']; ?></h1>
    <table class="content_table">
      <tbody>
        <tr>
          <td width="22%" class="tcell"><?= $text[$lang]['username']; ?></td>
          <td width="5%" class="tcell" align="center"><img src="/themes/img/icons/status_online.png"></td>
          <td width="58%" colspan="4" class="tcell"><a href="member/<?= $userdata[0]['username']; ?>" ><?= $userdata[0]['username']; ?></a></td>
          <td width="15%" class="tcell" rowspan="4" align="center"><img alt="" class="avatar" src="/uploads/game_avatars/59-1.png" width="80" height="80"></td>
        </tr>
        <tr>
          <td class="tcell"><?= $text[$lang]['rank']; ?></td>
          <td class="tcell" align="center"><img src="/themes/img/icons/stats_rank.png"></td>
          <td colspan="4" class="tcell"><?= rank($userdata[0]['username']); ?></td>
        </tr>
        <tr>
          <td class="tcell"><?= $text[$lang]['progress']; ?></td>
          <td class="tcell" align="center"><img src="/themes/img/icons/stats_rankprogress.png"></td>
          <td colspan="4" class="tcell"><div class="hpbarbg"><div class="xpbar" style="width: <?= rangvordering($userdata[0]['username']); ?>%;"></div></div><?= rangvordering($userdata[0]['username']); ?>%</td>
        </tr>
        <tr>
          <td width="22%" class="tcell"><?= $text[$lang]['country']; ?></td>
          <td width="5%" class="tcell" align="center"><img src="/themes/img/icons/flag_1/flag.png"></td>
          <td width="23%" class="tcell"></td>
          <td width="22%" class="tcell"><?= $text[$lang]['credits']; ?></td>
          <td width="5%" class="tcell" align="center"><img src="/themes/img/icons/stats_credits.png"></td>
          <td colspan="2" width="23%" class="tcell"><?= number($userdata[0]['credits']); ?></td>
        </tr>
        <tr>
          <td width="22%" class="tcell"><?= $text[$lang]['family']; ?></td>
          <td width="5%" class="tcell" align="center"><img src="/themes/img/icons/stats_family.png"></td>
          <td width="23%" class="tcell"><em><?= $text[$lang]['no_family']; ?></em></td>
          <td width="22%" class="tcell"><?= $text[$lang]['attack_strength']; ?></td>
          <td width="5%" class="tcell" align="center"><img src="/themes/img/icons/stats_attack.png"></td>
          <td colspan="2" width="23%" class="tcell"><?= number($userdata[0]['att_power']); ?></td>
        </tr>
        <tr>
          <td width="22%" class="tcell"><?= $text[$lang]['cash']; ?></td>
          <td width="5%" class="tcell" align="center"><img src="/themes/img/icons/stats_cash.png"></td>
          <td width="23%" class="tcell">€ <?= number($userdata[0]['cash']); ?></td>
          <td width="22%" class="tcell"><?= $text[$lang]['defense_strength']; ?></td>
          <td width="5%" class="tcell" align="center"><img src="/themes/img/icons/stats_defence.png"></td>
          <td colspan="2" width="23%" class="tcell"><?= number($userdata[0]['deff_power']); ?></td>
        </tr>

<tr>
  <td width="22%" class="tcell"><?= $text[$lang]['bank_account']; ?></td>
  <td width="5%" class="tcell" align="center"><img src="/themes/img/icons/stats_bank.png"></td>
  <td width="23%" class="tcell">€ <?= number($userdata[0]['bank']); ?></td>
  <td width="22%" class="tcell"><?= $text[$lang]['boxing_skill']; ?></td>
  <td width="5%" class="tcell" align="center"><img src="/themes/img/icons/stats_boxing.png"></td>
  <td colspan="2" width="23%" class="tcell"><?= number($userdata[0]['box_power']); ?></td>
</tr>
<tr>
  <td width="22%" class="tcell"><?= $text[$lang]['total_assets']; ?></td>
  <td width="5%" class="tcell" align="center"><img src="/themes/img/icons/stats_money.png"></td>
  <td width="23%" class="tcell">€ <?= number($userdata[0]['cash'] + $userdata[0]['bank']); ?></td>
  <td width="22%" class="tcell"><?= $text[$lang]['total_strength']; ?></td>
  <td width="5%" class="tcell" align="center"><img src="/themes/img/icons/stats_power.png"></td>
  <td colspan="2" width="23%" class="tcell"><?= number($userdata[0]['att_power'] + $userdata[0]['deff_power']); ?></td>
</tr>
<tr>
  <td width="22%" class="tcell"><?= $text[$lang]['ammunition']; ?></td>
  <td width="5%" class="tcell" align="center"><img src="/themes/img/icons//stats_bullets.png"></td>
  <td width="23%" class="tcell"></td>
  <td width="22%" class="tcell"><?= $text[$lang]['vip_account']; ?></td>
  <td width="5%" class="tcell" align="center"><img src="/themes/img/icons/vip.gif"></td>
  <td colspan="2" width="23%" class="tcell"></td>
</tr>
<tr>
  <td width="22%" class="tcell"><?= $text[$lang]['respect_points']; ?></td>
  <td width="5%" class="tcell" align="center"><img src="/themes/img/icons/stats_respect.png"></td>
  <td width="23%" class="tcell"></td>
  <td width="22%" class="tcell"><?= $text[$lang]['wishing_stones']; ?></td>
  <td width="5%" class="tcell" align="center"><img src="/themes/img/icons/stats_stones.png"></td>
  <td colspan="2" width="23%" class="tcell"></td>
</tr>
<tr>
  <td width="22%" class="tcell"><?= $text[$lang]['cars_stolen']; ?></td>
  <td width="5%" class="tcell" align="center"><img src="/themes/img/icons/car.png"></td>
  <td width="23%" class="tcell"></td>
  <td width="22%" class="tcell"><?= $text[$lang]['jail_busts']; ?></td>
  <td width="5%" class="tcell" align="center"><img src="/themes/img/icons/breakout.png"></td>
  <td colspan="2" width="23%" class="tcell"></td>
</tr>
<tr>
  <td width="22%" class="tcell"><?= $text[$lang]['referrals']; ?></td>
  <td width="5%" class="tcell" align="center"><img src="/themes/img/icons/stats_referrals.png"></td>
  <td width="23%" class="tcell">0</td>
  <td width="22%" class="tcell"><?= $text[$lang]['marksmanship']; ?></td>
  <td width="5%" class="tcell" align="center"><img src="/themes/img/icons/stats_shooting.png"></td>
  <td colspan="2" width="23%" class="tcell">Level 1</td>
</tr>


      </tbody>
    </table>
  </div>
</div>
