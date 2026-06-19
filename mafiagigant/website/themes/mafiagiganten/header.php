<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Mafiagiganten.de - Mafiosi unter sich</title>
    <link rel="stylesheet" type="text/css" href="/themes/mafiagiganten/js/jquery.fancybox.css"/>
    <link rel="stylesheet" type="text/css" href="/themes/mafiagiganten/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="/themes/mafiagiganten/css/game.css"/>
    <style type="text/css">
      .vip { background: url('/images/icons/set_1/game_vip.png') right center no-repeat; padding-right: 14px; }
      .level0 { color: red !important; text-decoration: line-through !important; }
      .level1 { color: #EEF5F4 !important; }
      .level2 { color: #229B0E !important; }
      .level3 { color: #EEE7E0 !important; }
      .level4 { color: #EEAE38 !important; }
      .level5 { color: #F3EBE9 !important; }
      .level6 { color: #4E00FF !important; background: url('/images/icons/set_1/game_owner.png') right center no-repeat; padding-right: 20px; }
      h1.gamenaam { color: # !important; }    </style>
    <base href="<?= BASE_URL;?>"/>
    <link rel="shortcut icon" type="image/png" href="favicon"/>
    <meta name="keywords" content="Mafia Spiel, Mafiaspiel, Mafia game, Mafiagame, Gangster Spiel, Gangsterspiel, Gangster, online rpg, Gratis Spiel, Gratis spielen, kostenlos, Terror, Ganoven"/>
    <meta name="description" content="Es ist ein web- und textbasiertes Rollenspiel, dass in der kriminellen Welt der Mafia spielt."/>
    <meta charset="UTF-8"/>
    <script type="text/javascript" src="/scripts/jquery-1.7.1.js"></script>
    <script type="text/javascript" src="/scripts/fancybox/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="/scripts/fancybox/jquery.fancybox-1.2.1.pack.js"></script>
    <script type="text/javascript">
      if (top.location != location) {
        top.location.href = document.location.href;
      }    
    </script>
    <script type="text/javascript">
      var jQ = jQuery.noConflict();
      jQ(document).ready(function() {
        jQ("a.fancy").fancybox({
          'zoomOpacity': true,
          'overlayShow': false,
          'zoomSpeedIn': 500,
          'zoomSpeedOut': 500
        });
      });
    </script>
    <script type="text/javascript" src="/scripts/ajax/prototype.js"></script>
		<script type="text/javascript" src="/scripts/cufon/cufon-yui.js"></script>
  </head>
  <body>
    <script type="text/javascript" src="/scripts/tooltip/tooltip.js"></script>
    <div id="main">
      <div id="main-inner">
        <div id="header">
          <div id="logo" style="background:url(/themes/mafiagiganten/img/373951.jpg) no-repeat;height:174px;width:350px;">
            <div id="logo-inner">
              <h1 class="gamenaam"></h1>
            </div>
          </div>
          <div id="menu">
            <ul>
              <li><a href="/">Startseite</a></li><li><a href="contact">Kontakt</a></li><li><a href="crew">Team</a></li>
            </ul>
          </div>
          <script>
            jQ('#menu li').prepend('<div class="left">&nbsp;</div>');
            jQ('#menu li').append('<div class="right">&nbsp;</div>');
          </script>
        </div>
        <div id="content">
          <div id="content-left">
            <div class="blocks">
              <div class="block block-algemeen"><div class="top"><h1>Willkommen</h1><div class="icon">&nbsp;</div></div><div class="content"><ul><li><a href="register">Registrieren</a></li>
<li><a href="manual">Anleitung</a></li>
<li><a href="maffia-story">Die Geschichte</a></li><li><a href="login/lost-password">Passwort vergessen?</a></li>

<li><a href="disclaimer">disclaimer</a></li>
<li><a href="dsgvo">DSGVO</a></li>

</ul></div><div class="bottom">&nbsp;</div></div>
              <div class="block block-screenshots"><div class="top"><h1>Screenshots</h1><div class="icon">&nbsp;</div></div><div class="content"><ul><li><a target="_blank" href="/layouts/049/screens_de/big1.png"><img alt="" src="/layouts/049/screens_de/small1.png" width="152" height="72"/></a></li>
<li><a target="_blank" href="/layouts/049/screens_de/big2.png"><img alt="" src="/layouts/049/screens_de/small2.png" width="152" height="72"/></a></li>
<li><a target="_blank" href="/layouts/049/screens_de/big3.png"><img alt="" src="/layouts/049/screens_de/small3.png" width="152" height="72"/></a></li>
</ul></div><div class="bottom">&nbsp;</div></div>
            </div>
          </div>
          <div id="content-center" style="min-height:300px;">
            <div class="top">&nbsp;</div>
            <div class="middle">

<div id="post-list">

