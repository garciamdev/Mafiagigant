</div>
              <div class="clear">&nbsp;</div>
            </div>
            <div class="bottom">&nbsp;</div>
          </div>
          <div id="content-right">
            <div class="blocks">
              <div class="block block-inloggen">
                <div class="top">
                  <h1>Anmelden</h1>
                  <div class="icon">&nbsp;</div>
                </div>
                <form method="post" action="<?= BASE_URL; ?>login">
                  <div class="content">
                    Benutzername<br/>
                    <input name="username" type="text" class="text" /><br/>
                    Passwort<br/>
                    <input name="password" type="password" class="password" /><br/>
                    <br/>
                    <input type="submit" class="submit" name="submit" value="Anmelden"/>
                  </div>
                </form>
                <div class="bottom">
                  &nbsp;
                </div>
              </div>
              <div class="block block-leden"><div class="top"><h1>Mitglieder</h1><div class="icon">&nbsp;</div></div><div class="content"><ul><li class="mu"><a><span>3.228</span> Giganten</a></li>
<li class="mo"><a><span><?= $online;?></span> Online</a></li>
</ul></div><div class="bottom">&nbsp;</div></div>
              <div class="block block-linkpartners"><div class="top"><h1>Linkpartner</h1><div class="icon">&nbsp;</div></div><div class="content"><ul><li><a target="_blank" href="https://www.facebook.com/mafiagiganten?fref=ts">Besuche uns auf Facebook</a></li>
<li><a target="_blank" href="http://appsgeyser.com/getwidget/Mafiagiganten">Mafiagiganten jetzt auch als App - f&uuml;r Android</a></li>
</ul></div><div class="bottom">&nbsp;</div></div>
            </div>
          </div>
        </div>
      <div id="footer">&copy; <strong>Mafiagiganten.de</strong> Alle Rechte vorbehalten | <span style="cursor: pointer" onclick="document.location='http://www.mafiagiganten.de/impressum'">Impressum</span></div>
      </div>
    </div>
    <script type="text/javascript">
      var d = new Date();
      t1 = parseInt((d.getTime()-d.getTimezoneOffset()*60000).toString().substring(0, 10));
      t2 = 1696014941;
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
      _gaq.push(['_setAccount', 'UA-2268134-19']);
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
Sprachauswahl:

&nbsp; <a style="font-weight: normal; color: #bbb; text-decoration: none" href="<?=$module;?>/<?=$extraurl;?>?language=de"><img style="margin-bottom: -4px" src="/themes/img/flag_de.png">&nbsp;Deutsch</a>
&nbsp; <a style="font-weight: normal; color: #bbb; text-decoration: none" href="<?=$module;?>/<?=$extraurl;?>?language=en"><img style="margin-bottom: -4px" src="/themes/img/flag_en.png">&nbsp;English</a>
</div>
  </body>
</html>

