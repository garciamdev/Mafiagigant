					<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

					<script src="/themes/general/chat/chatlarge.js"></script>



<div class="content_block">
	<div class="content_inner">
      <h1>Mini-chat</h1>
     <div id="shoutbox"> 
		<div id="shoutbox-messages">
        <!-- Existing messages will be displayed here -->
    	</div>
    
    
		<!--<table class="minichat"><tbody><tr><td width="4%"><img src="/images/icons/custom/59-status_online.png"></td><td width="18%"><a href="member/Donna13" class="level1 vip">Donna13</a>:</td><td width="76%">FC Red Bull Salzburg - FC Blau-Weiß Linz: 0-1 <img style="margin-bottom: -2px" src="/images/icons/smile_1/smile_biggrin.gif"> <img style="margin-bottom: -2px" src="/images/icons/smile_1/smile_biggrin.gif"> <img style="margin-bottom: -2px" src="/images/icons/smile_1/smile_biggrin.gif"> </td></tr><tr><td width="4%"><img src="/images/icons/custom/59-status_online.png"></td><td width="18%"><a href="member/Donna13" class="level1 vip">Donna13</a>:</td><td width="76%">First defeat since 45 home games <img style="margin-bottom: -2px" src="/images/icons/smile_1/smile_crosseyes.gif"> </td></tr><tr><td width="4%"><img src="/images/icons/custom/59-status_online.png"></td><td width="18%"><a href="member/Donna13" class="level1 vip">Donna13</a>:</td><td width="76%">We are still celebrating <img style="margin-bottom: -2px" src="/images/icons/smile_1/smile_crosseyes.gif"> <img style="margin-bottom: -2px" src="/images/icons/smile_1/smile_crosseyes.gif"> <img style="margin-bottom: -2px" src="/images/icons/smile_1/smile_crosseyes.gif"> </td></tr></tbody></table>      </div> --> 
	
       		HELLO WORLD
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