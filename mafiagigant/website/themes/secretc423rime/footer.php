</div>
<div id="right">


	
	
<ul class="menu_members"><li class="title"><?= $txt[$lang]['menu_members_title']; ?></li><li class="mu"><a><span>23.020</span> <?= $txt[$lang]['menu_stats_members']; ?></a></li>
<li class="mt"><a><span>0</span> <?= $txt[$lang]['menu_stats_today']; ?></a></li>
<li class="mo"><a><span><?= $online; ?></span> <?= $txt[$lang]['menu_stats_online']; ?></a></li>
</ul>
<ul class="menu_linkpartners"><li class="title">Link partners</li><li><a target="_blank" href="https://www.facebook.com/secretcrime.nl">Like Secretcrime on facebook</a></li>
<li><a target="_blank" href="https://www.facebook.com/groups/1459359581523036">Secretcrime - Facebook</a></li>
<li><a target="_blank" href="https://www.secretcrime.be/">NEW Game</a></li>
<li><a target="_blank" href="https://www.secretcrime.be">Secretcrime.BE</a></li>
</ul>
      </div>
      
      <div id="footer">
&copy; <strong>Secretcrime.nl</strong> All rights reserved
      </div>      <?php if($var != ''){$extraurl = $var.'/';}else{ $extraurl = '';}?>

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


