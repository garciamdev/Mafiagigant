<?php
header("Cache-Control: no-cache, must-revalidate");
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
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
      h1.gamenaam { color: # !important; } 
      
      
.hpbarbg{
    width: 130px;
    height: 10px;
    border: 1px solid #f9fafa;
    background-color: rgb(206 206 206);
    position: relative;
    border-radius: 2px;	
}

    
    
.xpbar{
	background: #12bb08;
    height: 100%;
    border-radius: 2px;
	  
	  
}
.pull-right {
float: right!important;
padding-right: 10px;
}

   </style>
    <base href="<?= BASE_URL;?>"/>
    <link rel="shortcut icon" type="image/png" href="favicon"/>
    <meta name="keywords" content="Mafia game, Mafia world, Mafia fun, gangster game, criminal game, gangster, online rpg, free game, play free, create free game, host game"/>
    <meta name="description" content="This is a web and text based role-playing game that takes place in the criminal world of the Mafia."/>
    <meta charset="UTF-8"/>

    <script type="text/javascript" src="/themes/mafiagiganten/js/jquery-1.7.1.js"></script>
    <script type="text/javascript" src="/themes/mafiagiganten/js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="/themes/mafiagiganten/js/jquery.fancybox-1.2.1.pack.js"></script>
	<script type="text/javascript" src="/themes/js/tools.js"></script>	




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
  <body><script type="text/javascript" src="/themes/mafiagiganten/js/tooltip/tooltip.js"></script>
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
              <li><a href="/">Startseite</a></li><li><a href="contact">Kontakt</a></li><li><a href="crew">Crew</a></li><li><a href="manual">Spielregeln</a></li><li><a href="logout">Abmelden</a></li>
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
              <div class="block block-creditmenu"><div class="top"><h1>Credits menu</h1>
              <div class="icon">&nbsp;</div></div><div class="content"><ul><li><a href="callcredits">Credits kaufen</a></li>
<li><a href="exchange-office">Exchange office</a></li>
<li><a href="credit-lottery">Credit-Lotterie</a></li>
</ul></div><div class="bottom">&nbsp;</div></div>
<div class="block block-algemeen"><div class="top"><h1>General</h1>
<div class="icon">&nbsp;</div></div><div class="content"><ul><li><a  href="owners">Property overview</a></li>
<li><a href="forum">Forum</a></li><li><a href="chat">Chatbox</a></li><li><a href="manual">Handbuch</a></li>
<li><a href="maffia-story">Die Geschichte</a></li><li><a style="color:orange" href="news">Recent News</a></li><li><a  href="stats">Statistics</a></li>
<li><a href="quiz">Tägliches Quiz</a></li>
<li><a  href="https://tuerchen.app/Ap1moQO9xdjco5C7">Advent calender</a></li>





</ul>

</div><div class="bottom">&nbsp;</div></div>
              <div class="block block-persoonlijk"><div class="top"><h1>Personal</h1><div class="icon">&nbsp;</div></div><div class="content"><ul><li><a href="members">Member Rankings</a></li>
<li><a href="online">Members online</a></li>
<li><a href="mail/inbox">Nachrichten</a></li>
<li><a href="donate">Spenden</a></li><li><a href="settings">Einstellungen</a></li>
<li><a href="notepad">Notizblock</a></li>
<li><a style="color:red" href="logs">Logs</a></li>
<li><a style="color:red" href="referrals">Referrals</a></li>
</ul></div><div class="bottom">&nbsp;</div></div>
              <div class="block block-omgeving"><div class="top"><h1>Neighborhood</h1><div class="icon">&nbsp;</div></div><div class="content"><ul><li><a href="bank">Bank account</a></li>
<li><a href="safe">Safe</a></li>
<li><a  href="shop">Shop</a></li><li><a href="hospital">Hospital</a></li>
<li><a href="bullet-factory">Munitionsfabrik</a></li>
<li><a  href="airport">Airport</a></li>
<li><a style="color:red" href="auction">Auction</a></li><li><a style="color:orange" href="cars">Garage</a></li>
<li><a href="prison">Prison</a></li>
<li><a href="sports-hall">Gym</a></li><li><a  href="boxing">Boxing club</a></li>
<li><a style="color:red" href="president">President</a></li>
<li><a style="color:red" href="court">Court</a></li>
</ul></div><div class="bottom">&nbsp;</div></div>
            </div>
          </div>
          <div id="content-center" style="min-height:300px;">
            <div class="top">&nbsp;</div>
            <div class="middle">
<div id="post-list">

