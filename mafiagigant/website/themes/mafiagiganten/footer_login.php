
		<?php if($module != 'chat'){ ?> 		 


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


  

				<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
				<script src="/themes/general/chat/chat.js"></script>
			
<div class="content_block">
	<div class="content_inner">
      <h1>Mini-chat</h1>
      
     <div id="shoutbox">
		<div id="shoutbox-messages">
        <!-- Existing messages will be displayed here -->
    	</div>
    
    
		<!--<table class="minichat"><tbody><tr><td width="4%"><img src="/images/icons/custom/59-status_online.png"></td><td width="18%"><a href="member/Donna13" class="level1 vip">Donna13</a>:</td><td width="76%">FC Red Bull Salzburg - FC Blau-Weiß Linz: 0-1 <img style="margin-bottom: -2px" src="/images/icons/smile_1/smile_biggrin.gif"> <img style="margin-bottom: -2px" src="/images/icons/smile_1/smile_biggrin.gif"> <img style="margin-bottom: -2px" src="/images/icons/smile_1/smile_biggrin.gif"> </td></tr><tr><td width="4%"><img src="/images/icons/custom/59-status_online.png"></td><td width="18%"><a href="member/Donna13" class="level1 vip">Donna13</a>:</td><td width="76%">First defeat since 45 home games <img style="margin-bottom: -2px" src="/images/icons/smile_1/smile_crosseyes.gif"> </td></tr><tr><td width="4%"><img src="/images/icons/custom/59-status_online.png"></td><td width="18%"><a href="member/Donna13" class="level1 vip">Donna13</a>:</td><td width="76%">We are still celebrating <img style="margin-bottom: -2px" src="/images/icons/smile_1/smile_crosseyes.gif"> <img style="margin-bottom: -2px" src="/images/icons/smile_1/smile_crosseyes.gif"> <img style="margin-bottom: -2px" src="/images/icons/smile_1/smile_crosseyes.gif"> </td></tr></tbody></table>      </div> --> 
	
        	<table class="minichat">
          		<tbody><tr>
            	<td width="4%"><?= onlinestatus($userdata[0]['username']);?></td>
            	<td width="18%"><a href="member/<?= $userdata[0]['username']; ?>" class="level1 vip"><?= $userdata[0]['username']; ?></a>:</td>
            	<td width="60%"><input style="width: 300px" maxlength="80" class="input" type="text" name="text" id="message" value=""></td>
            	<td width="18%"><input type="submit" class="submit" name="chatbutton" id="send" value="Send"></td>
          		</tr>
        		</tbody>
        	</table>
      
	</div>

</div>
</div>
	

				
	<!-- jQuery -->
		<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<!-- /jQuery -->




    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <?php } ?>
    
    
    </div>
              <div class="clear">&nbsp;</div>
            </div>
            <div class="bottom">&nbsp;</div>
          </div>
          <div id="content-right">
            <div class="blocks">
<div class="block block-stats">
<div class="top">
<h1><span id="stats_rankbar2">
<span style="white-space: nowrap">
<img src="/images/bars_01/health_4.png" height="10" align="absmiddle">
<img src="/images/bars_01/health_5.png" width="100" height="10" align="absmiddle">
<img src="/images/bars_01/health_6.png" height="10" align="absmiddle">
</span><span class="rankbar_text">&nbsp;0%</span></span>

		<div class="hpbarbg"><div class="xpbar" style="width: <?= rangvordering($userdata[0]['username']);?>%;"></div></div>
</h1>
	
	
<div class="icon">&nbsp;</div>
</div>
<div class="content">
<table>
<tr>
<td class="var">Rank</td>
<td class="icon"><img src="/themes/img/icons/stats_rank.png" width="16" height="16"/></td>
<td class="value"><span id="stats_rank"><?= rank($userdata[0]['username']);?></span></td>
</tr>
<tr>
<td class="var">Strength</td>
<td class="icon"><img src="/themes/img/icons/stats_power.png" width="16" height="16"/></td>
<td class="value"><span id="stats_power"><?= number($userdata[0]['att_power'] + $userdata[0]['deff_power']); ?></span></td>
</tr>
<tr>
<td class="var">Cash</td>
<td class="icon"><img src="/themes/img/icons/stats_cash.png" width="16" height="16"/></td>
<td class="value"><span id="stats_cash">€ <?= number($userdata[0]['cash']); ?></span></td>
</tr>
<tr>
<td class="var">Bank account</td>
<td class="icon"><img src="/themes/img/icons/stats_bank.png" width="16" height="16"/></td>
<td class="value"><span id="stats_bank">€ <?= number($userdata[0]['bank']); ?></span></td>
</tr>
<tr>
<td class="var">Country</td>
<td class="icon"><img id="stats_flag" src="/themes/img/icons/flag_1/flag.png" width="16" height="16"/></td>
<td class="value"><span id="stats_country"></span></td>
</tr>
<tr>
<td class="var">Credits</td>
<td class="icon"><img src="/themes/img/icons/stats_credits.png" width="16" height="16"/></td>
<td class="value"><span id="stats_credits"><?= number($userdata[0]['credits']); ?></span></td>
</tr>
<tr>
<td class="var">Health</td>
<td class="icon"><img src="/themes/img/icons/stats_health.png" width="16" height="16"/></td>
<td class="value"><span id="stats_health"><?= number($userdata[0]['health']); ?>%</span></td>
</tr>
</table>
</div>
<div class="bottom">
&nbsp;
</div>
</div>
              <div class="block block-criminaliteit"><div class="top"><h1>Criminal acts</h1>
              <div class="icon">&nbsp;</div></div><div class="content"><ul>
              <li><a href="crimes">Crimes</a></li>
              <li><a href="robbery">Robbery</a></li>
<li><a style="color:red" href="organized-crime">Organized crime</a></li>
<li><a style="color:red" href="group-robbery">Group robbery</a></li>
<li><a style="color:red" href="shooting">Marksmanship</a></li>
<li><a style="color:red" href="attack">Murder</a></li>
<li><a style="color:red" href="russian-roulette">Russian roulette</a></li>
<li><a style="color:orange" href="cars/steal">Steal cars</a></li>
<li><a style="color:orange" href="drugs">Drugs</a></li>
<li><a style="color:orange" href="transport">Money truck robbery</a></li>
<li><a style="color:red" href="targets">Personal goals</a></li>
<li><a style="color:red" href="missions">Missions</a></li>
<li><a href="red-light-district">Red-light district</a></li>
<li><a style="color:red" href="work">Work</a></li>
<li><a style="color:red" href="farao">Murder "The Pharaoh"</a></li></ul></div><div class="bottom">&nbsp;</div></div>
              <div class="block block-casino"><div class="top"><h1>Casino</h1><div class="icon">&nbsp;</div></div><div class="content"><ul>
              <li><a style="color:red" href="blackjack">Blackjack</a></li>
<li><a style="color:orange" href="wheel-of-fortune">Wheel of Fortune</a></li>
<li><a style="color:red" href="slots">Slot machine</a></li>
<li><a style="color:red"  href="poker">Poker</a></li>
<li><a style="color:red" href="soccer">Soccer betting</a></li>
<li><a style="color:red" href="higher-lower">Higher / lower</a></li>
<li><a style="color:red" href="lottery">Lottery</a></li>
<li><a style="color:red" href="scratch-cards">Scratchcards</a></li>
<li><a style="color:red" href="crack-the-safe">Crack the safe</a></li>
<li><a style="color:red" href="horse-racing">Horse races</a></li>
<li><a style="color:red" href="guess-the-number">Guess the number</a></li>
<li><a style="color:red" href="roulette">Roulette</a></li>
</ul></div><div class="bottom">&nbsp;</div></div>
              <div class="block block-familie"><div class="top"><h1>Family</h1><div class="icon">&nbsp;</div></div><div class="content"><ul>
              <li><a style="color:red" href="family">Family overview</a></li>
<li><a style="color:red" href="family/apply">Join a family</a></li>
<li><a style="color:red" href="family/new">Create a family</a></li>
</ul></div><div class="bottom">&nbsp;</div></div>
              <div class="block block-leden"><div class="top"><h1>Members</h1><div class="icon">&nbsp;</div></div><div class="content"><ul><li class="mu"><a href="members"><span style="color:red">3.228</span> Giganten</a></li>
<li class="mo"><a href="online"><span><?= $online; ?></span> online</a></li>
</ul></div><div class="bottom">&nbsp;</div></div>
              <div class="block block-linkpartners"><div class="top"><h1>Link partners</h1><div class="icon">&nbsp;</div></div><div class="content"><ul><li><a target="_blank" href="https://www.facebook.com/mafiagiganten?fref=ts">Besuche uns auf Facebook</a></li>
<li><a target="_blank" href="http://appsgeyser.com/getwidget/Mafiagiganten">Mafiagiganten jetzt auch als App - f&uuml;r Android</a></li>
</ul></div><div class="bottom">&nbsp;</div></div>
            </div>
          </div>
        </div>
      <div id="footer">&copy; <strong>Mafiagiganten.de</strong> All rights reserved</div>
      </div>
    </div>
    <script type="text/javascript">
      var d = new Date();
      t1 = parseInt((d.getTime()-d.getTimezoneOffset()*60000).toString().substring(0, 10));
      t2 = 1696016644;
      tz = Math.round((t1-t2)/3600);
      var expires = new Date();
      var expdate = expires.getTime();
      expdate += 3600*1000*360;
      expires.setTime(expdate);
      var tt = new Date().getHours();
      var hh = new Date().getMinutes();
      var newCookie='tz='+tz+'; path=/; expires='+expires.toGMTString();
      window.document.cookie=newCookie;
    </script>
    <script type="text/javascript">Cufon.now();</script>
    <script>
      if (document.getElementById('overlay')) {
        document.getElementById('overlay').style.visibility='hidden';
        document.getElementById('overlay').style.top='61px';
      }
    </script>
    <script type="text/javascript">
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-2268134-21']);
      _gaq.push(['anonymizeIp']); _gaq.push(['_trackPageview']);
      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();
    </script>
<script>
document.body.style.marginTop = '30px';
</script>


    <?php if($var != ''){$extraurl = $var.'/';}else{ $extraurl = '';}?>
      <?php if($module == 'homelogin'){$module = '/home';}?>
<div id="language_bar" style="position: absolute; top: 0; left: 0; right: 0; height: 20px; background: #333; border-bottom: 1px solid #444; font-size: 11px; font-family: Arial; color: #aaa; font-weight: bold; text-align: center; padding: 5px 0; line-height: 20px">
Language selection:

&nbsp; <a style="font-weight: normal; color: #bbb; text-decoration: none" href="<?=$module;?>/<?=$extraurl;?>?language=de"><img style="margin-bottom: -4px" src="/themes/img/flag_de.png">&nbsp;Deutsch</a>
&nbsp; <a style="font-weight: normal; color: #bbb; text-decoration: none" href="<?=$module;?>/<?=$extraurl;?>?language=en"><img style="margin-bottom: -4px" src="/themes/img/flag_en.png">&nbsp;English</a>
</div>
  </body>
</html>
