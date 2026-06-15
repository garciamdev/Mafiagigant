
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
      <div id="right">
      
<!-- <ul class="menu_credit"><li class="title">Credits menu</li><li><a href="callcredits">Buy credits</a></li>
<li><a href="exchange-office">Exchange office</a></li>
<li><a href="credit-lottery">Credit lottery</a></li>
</ul> -->
<ul class="menu_credit"><li class="title">Creditsmenu</li>
<li><a style="color:red" href="">Credits kopen</a></li>
<li><a style="color:red" href="http://www.secretcrime.nl/exchange-office">Wisselkantoor</a></li>
<li><a style="color:red" href="http://www.secretcrime.nl/credit-lottery">Creditloterij</a></li>
</ul>
<ul class="menu_general"><li class="title">General</li>
<li><a style="color:red" href="owners">Property overview</a></li>
<li><a style="color:red" href="forum">Forum</a></li>
<li><a  href="chat">Chatbox</a></li>
<li><a style="color:red" href="manual">Manual</a></li>
<li><a style="color:red" href="maffia-story">The story</a></li>
<li><a style="color:red" href="news">Recent News</a></li>
<li><a style="color:red" href="poll">Poll</a></li>
<li><a style="color:orange" href="stats">Statistics</a></li>
<li><a style="color:red" href="hall-of-fame">Hall of fame</a></li></ul>
<!-- <ul class="menu_personal"><li class="title">Personal</li><li><a href="members">Member Rankings</a></li>
<li><a href="online">Members online</a></li>
<li><a href="mail/inbox">Messages (4)</a></li>
<li><a href="settings">Settings</a></li>
<li><a href="notepad">Notepad</a></li>
<li><a href="logs">Logs</a></li>
<li><a href="referrals">Referrals</a></li>
</ul> -->
<ul class="menu_personal"><li class="title">Persoonlijk</li>
<li><a style="color:red" href="diamants">Diamanten</a></li>
<li><a style="color:red" href="members">Ledenlijst</a></li>
<li><a style="color:red" href="online">Online leden</a></li>
<li><a style="color:red" href="mail/inbox">Berichten</a></li>
<li><a style="color:red" href="settings">Instellingen</a></li>
<li><a style="color:red" href="notepad">Kladblok</a></li>
<li><a style="color:red" href="logs">Logs</a></li>
<li><a style="color:red" href="referrals">Referrals</a></li>
<li><a style="color:red" href="familyinsurance">Familie verzekering</a></li>
</ul>
<ul class="menu_family"><li class="title">Family</li>
<li><a style="color:red" href="family">Family overview</a></li>
<li><a style="color:red" href="family/apply">Join a family</a></li>
<li><a style="color:red" href="family/new">Create a family</a></li>
</ul>
<ul class="menu_linkpartners"><li class="title">Link partners</li><li><a target="_blank" href="https://www.facebook.com/secretcrime.nl">Like Secretcrime on facebook</a></li>
<li><a  target="_blank" href="https://www.facebook.com/groups/1459359581523036">Secretcrime - Facebook</a></li>
<li><a target="_blank" href="https://www.secretcrime.be/">NEW Game</a></li>
<li><a target="_blank" href="https://www.secretcrime.be">Secretcrime.BE</a></li>
</ul>

      </div>
      <div id="footer">
&copy; <strong>Secretcrime.nl</strong> All rights reserved
      </div>
      <?php if($var != ''){$extraurl = $var.'/';}else{ $extraurl = '';}?>
      <?php if($module == 'homelogin'){$module = '/home';}?>
<div id="footer">
Taalkeuze:
  <a style="font-weight: normal; color: #bbb; text-decoration: none" href="<?=$module;?>/<?=$extraurl;?>?language=nl"><img style="margin-bottom: -4px" src="/themes/img/flag_nl.png"> Nederlands</a>
  <a style="font-weight: normal; color: #bbb; text-decoration: none" href="<?=$module;?>/<?=$extraurl;?>?language=en"><img style="margin-bottom: -4px" src="/themes/img/flag_en.png"> English</a>
  <a style="font-weight: normal; color: #bbb; text-decoration: none" href="<?=$module;?>/<?=$extraurl;?>?language=de"><img style="margin-bottom: -4px" src="/themes/img/flag_de.png"> Deutsch</a>
  <a style="font-weight: normal; color: #bbb; text-decoration: none" href="<?=$module;?>/<?=$extraurl;?>?language=fr"><img style="margin-bottom: -4px" src="/themes/img/flag_fr.png"> Français</a>
  <a style="font-weight: normal; color: #bbb; text-decoration: none" href="<?=$module;?>/<?=$extraurl;?>?language=cs"><img style="margin-bottom: -4px" src="/themes/img/flag_cz.png"> Čeština</a>
  <a style="font-weight: normal; color: #bbb; text-decoration: none" href="<?=$module;?>/<?=$extraurl;?>?language=pt"><img style="margin-bottom: -4px" src="/themes/img/flag_pt.png"> Português</a>
  <a style="font-weight: normal; color: #bbb; text-decoration: none" href="<?=$module;?>/<?=$extraurl;?>?language=sp"><img style="margin-bottom: -4px" src="/themes/img/flag_es.png"> Español</a>
</div>
    </div>
     
 
 
 <script language="javascript">
	countdown('<?=$count_timer_crimes?>','count_timer_crimes','');
	countdown('<?=$count_timer_boxing?>','count_timer_boxing','');
	countdown('<?=$count_timer_gym?>','count_timer_gym','');
</script>
    <script type="text/javascript">
      var d = new Date();
      t1 = parseInt((d.getTime()-d.getTimezoneOffset()*60000).toString().substring(0, 10));
      t2 = 1695589602;
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
      _gaq.push(['b._setAccount', 'UA-37975877-1']);
      _gaq.push(['b._trackPageview']);
      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();
    </script>
  </body>
</html>


