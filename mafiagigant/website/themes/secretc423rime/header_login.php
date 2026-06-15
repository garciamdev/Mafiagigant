<?php
header("Cache-Control: no-cache, must-revalidate");
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Secret Crime - Het online XXL Maffiaspel</title>
    <link rel="stylesheet" type="text/css" href="/themes/secretcrime/css/fancybox.css"/>
    <link rel="stylesheet" type="text/css" href="/themes/secretcrime/css/game.css"/>
    <link rel="stylesheet" type="text/css" href="/themes/secretcrime/css/style.css"/>
    <style type="text/css">
      .vip { background: url('/images/icons/set_1/game_vip.png') right center no-repeat; padding-right: 14px; }
      .level0 { color: red !important; text-decoration: line-through !important; }
      .level1 { color: #FFFFFF !important; }
      .level2 { color: #12D6E4 !important; }
      .level3 { color: #D884DC !important; }
      .level4 { color: #FFFFFF !important; }
      .level5 { color: #61FF05 !important; }
      .level6 { color: #FF0000 !important; background: url('/images/icons/set_1/game_owner.png') right center no-repeat; padding-right: 20px; }
      h1.gamenaam { color: #FFFFFF !important; top: 20px !important; }    </style>
    <base href="https://www.secretcrime.nl"/>
    <link rel="shortcut icon" type="image/png" href="favicon"/>
    <meta name="keywords" content="Gratis, XXL, Online, Maffia, Spel, Game, Crime, RPG, Free, Prijzen, Uitgebreid, Nieuw, Gezellig, Online maffia game"/>
    <meta name="description" content="Meld je gratis aan en speel gezellig mee met dit fantastische XXL online Maffia spel. 22.500+ anderen gingen je voor!"/>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15"/>
    <meta charset="utf-8">

    <script type="text/javascript" src="/themes/secretcrime/js/jquery-1.7.1.js"></script>
    <script type="text/javascript" src="/themes/secretcrime/js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="/themes/secretcrime/js/jquery.fancybox-1.2.1.pack.js"></script>
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
   <!-- <script type="text/javascript" src="/scripts/ajax/prototype.js"></script>
		<script type="text/javascript" src="/scripts/cufon/cufon-yui.js"></script>
		<script type="text/javascript" src="/scripts/cufon/fonts/Impact.font.js"></script>
		<script type="text/javascript">
      Cufon.replace('h1.gamenaam', { fontFamily: 'Impact', color: '#FFFFFF' });
		</script>-->
  </head>
  <body><script type="text/javascript" src="/themes/secretcrime/js/tooltip/tooltip.js"></script>
    <div id="wrap">
<style>
#memberheader{
background: url('<?= BASE_URL; ?>/themes/secretcrime/img/header-login.png') center top no-repeat;
height: 200px;
position: relative; 
border-top-left-radius: 30px;
border-top-right-radius: 30px;
}
#memberheader #stats {
position: relative;
top: 0;
left: 680px;
width: 255px;
height: 160px;
padding: 5px 5px 0px 15px;
color: green !important;
}
.headertable td {
    color: #FFFF !important;
}
.headertable center {
    color: #FFFF !important;
}
.headertable strong {
    color: #FFFF !important;
}
.headertable span {
    color: #FFFF !important;
}
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
      <div id="memberheader">
<div id="stats">
<div class="content_block">
<div class="content_inner">
<h1>statistieken</h1>
<table class="headertable">
<tbody>
<tr>
	<td  width="16px"><?= imgicons('online');?> </td>
	<td  colspan="3"><strong> <?= $userdata[0]['username']; ?></strong></td>
</tr>
<tr>
	<td><img src="/themes/img/stats_power.png" alt="" width="16" height="16" align="top"></td>
	<td width="140px"><strong><span id="stats_power"><?= number($userdata[0]['att_power'] + $userdata[0]['deff_power']); ?></span></strong></td>
	<td width="16px"><img id="stats_flag" src="/themes/img/flag_de.png"/></td>
	<td width="60px"> <strong><span id="stats_country"></span></strong></td>
</tr>
<tr>
	<td><img src="/themes/img/stats_cash.png" alt="" width="16" height="16" align="top"> </td>
	<td> <strong> <span id="stats_cash">¤ <?= number($userdata[0]['cash']); ?></span></strong></td>
	<td><img src="/themes/img/stats_credits.png" width="16" height="16" align="top"> </td>
	<td> <strong> <span id="stats_credits"> <?= $userdata[0]['credits']; ?></span></strong></td>
</tr>
<tr>
	<td><img src="/themes/img/stats_bank.png" width="16" height="16" align="top"> </td>
	<td> <strong><span id="stats_bank">¤ <?= number($userdata[0]['bank']); ?></span></strong></td>
	<td><img src="/themes/img/stats_health.png" width="16" height="16" align="top"> </td>
	<td> <strong><span id="stats_health"> <?= $userdata[0]['health']; ?>%</span></strong></td>
</tr>
<tr>
	<td><img src="/themes/img/stats_safe.png" width="16" height="16" align="top"> </td>
	<td> <strong><span id="stats_safe">¤ <?= number($userdata[0]['safe']); ?></span></strong></td>
	<td><img src="themes/img/icons/stats_icon.png" width="16" height="16" align="top"> </td>
	<td></td>
</tr>
<tr>
	<td><img src="/themes/img/icons/stats_rank.png" width="16" height="16" align="top"> </td>
	<td> <strong><span id="stats_rank"> <?= rank($userdata[0]['username']);?></span></strong></td>
	<td><img src="themes/img/diamant.png" width="16" height="16" align="top"></td>
	<td></td>
</tr>
<!--<tr>
	<td colspan="4"><strong><span id="stats_rankbar"><span style="white-space: nowrap"><img src="themes/img/bars_05/health_1.png" height="10" align="absmiddle"><img src="themes/img/bars_05/health_2.png" width="8" height="10" align="absmiddle"><img src="themes/img/bars_05/health_5.png" width="92" height="10" align="absmiddle"><img src="themes/img/bars_05/health_6.png" height="10" align="absmiddle"></span></span> 
	</strong> <strong><span id="stats_rankpct"><?= rangvordering($userdata[0]['username']); ?>%</span> </strong> </td>
</tr>
-->

<tr>
	<td colspan="3">
	
		<div class="hpbarbg">
				<div class="xpbar" style="width: <?= rangvordering($userdata[0]['username']);?>%;"></div>
						
			</div>
	</td><td><strong><span id="stats_rankpct"><?= rangvordering($userdata[0]['username']); ?>%</span> </strong> </td>
</tr>
 

</tbody>
</table>
</div></div>
</div>
      </div>
      <div id="topmenu">
<!-- <ul class="menu_top"><li><a href="http://www.secretcrime.nl/">Home</a></li><li><a href="crew">Crew</a></li><li><a href="info/1/ronde-4">Ronde 4</a></li><li><a href="contact">Contact</a></li><li><a href="login/logout">Log out</a></li></ul> -->
<ul class="menu_top">
<li><a href="/">Home</a></li>
<li><a href="/logout">Uitloggen</a></li></ul>
      </div>
      <div id="left">
<ul class="menu_crime">

 
	
<li class="title"><?= $text[$lang]['menu_crimes_head'];?></li>
<li><a href="crimes"><?= $text[$lang]['menu_crimes_crimes'];?><small class="pull-right" id="count_timer_crimes"></small></a></li>
<li><a style="color:red" href="robbery"><?= $text[$lang]['menu_crimes_robery'];?></a></li>
<li><a style="color:red" href="organized-crime"><?= $text[$lang]['menu_crimes_organizedcrime'];?></a></li>
<li><a style="color:red" href="group-robbery"><?= $text[$lang]['menu_crimes_grouprobery'];?></a></li>
<li><a style="color:red" href="shooting"><?= $text[$lang]['menu_crimes_shooting'];?></a></li>
<li><a style="color:red" href="attack"><?= $text[$lang]['menu_crimes_murder'];?></a></li>
<li><a style="color:red" href="cars/steal"><?= $text[$lang]['menu_crimes_stealcars'];?></a></li>
<li><a style="color:red" href="drugs"><?= $text[$lang]['menu_crimes_drugs'];?></a></li>
<li><a style="color:red" href="transport"><?= $text[$lang]['menu_crimes_moneytruckrobery'];?></a></li>
<li><a style="color:red" href="targets"><?= $text[$lang]['menu_crimes_targets'];?></a></li>
<li><a style="color:red" href="missions"><?= $text[$lang]['menu_crimes_missions'];?></a></li>
<li><a style="color:red" href="Redlight"><?= $text[$lang]['menu_crimes_redlight'];?></a></li>
<li><a style="color:red" href="work"><?= $text[$lang]['menu_crimes_work'];?></a></li>
</ul> 
<!-- <ul class="menu_neighborhood"><li class="title">Neighborhood</li><li><a href="bank">Bank account</a></li>
<li><a href="stock-exchange">Stock market</a></li><li><a href="safe">Safe</a></li><li><a href="shop">Shop</a></li><li><a href="hospital">Hospital</a></li>
<li><a href="bullet-factory">Ammunition factory</a></li>
<li><a href="airport">Airport</a></li>
<li><a href="auction">Auction</a></li><li><a href="cars">Garage</a></li>
<li><a href="prison">Prison</a></li>
<li><a href="sports-hall">Gym</a></li><li><a href="boxing">Boxing club</a></li>
<li><a href="president">President</a></li>
<li><a href="court">Court</a></li>
<li><a href="info/4/wiet-uitleg">Wiet uitleg</a></li><li><a href="info/5/huizen">Huizen</a></li></ul> -->
<ul class="menu_neighborhood"><li class="title">Omgeving</li>
<li><a style="color:red" href="red-light-district">Red light district</a></li>
<li><a href="bank">Bank</a></li>
<li><a style="color:red" href="stock-exchange">Beurs</a></li>
<li><a style="color:red" href="safe">Kluis</a></li>
<li><a style="color:red" href="shop">Winkel</a></li>
<li><a style="color:red" href="hospital">Ziekenhuis</a></li>
<li><a style="color:red" href="bullet-factory">Kogelfabriek</a></li>
<li><a style="color:red" href="airport">Vliegveld</a></li>
<li><a style="color:red" href="auction">Veiling</a></li>
<li><a style="color:red" href="cars">Garage</a></li>
<li><a style="color:red" href="prison">Gevangenis</a></li>
<li><a href="sports-hall">Sporthal  <small class="pull-right" id="count_timer_gym"></small></a></li>
<li><a href="boxing">Boksschool <small class="pull-right" id="count_timer_boxing"></small></a></li>
<li><a style="color:red" href="president">President</a></li>
<li><a style="color:red" href="court">Rechtbank</a></li>
<li><a style="color:red" href="info/4/wiet-uitleg">Wiet uitleg</a></li>
<li><a style="color:red" href="weed-exchange">Wiet omwisselen</a></li>
<li><a style="color:red" href="houses">Huizen</a></li>
</ul>
<ul class="menu_casino"><li class="title">Casino</li>
<li><a style="color:red" href="blackjack">Blackjack</a></li>
<li><a style="color:red" href="wheel-of-fortune">Wheel of Fortune</a></li>
<li><a style="color:red" href="slots">Slot machine</a></li>
<li><a style="color:red" href="poker">Poker</a></li>
<li><a style="color:red" href="higher-lower">Higher / lower</a></li>
<li><a style="color:red" href="lottery">Lottery</a></li>
<li><a style="color:red" href="scratch-cards">Scratchcards</a></li>
<li><a style="color:red" href="crack-the-safe">Crack the safe</a></li>
<li><a style="color:red" href="horse-racing">Horse races</a></li>
<li><a style="color:red" href="guess-the-number">Guess the number</a></li>
<li><a style="color:red" href="roulette">Roulette</a></li>
</ul>
<ul class="menu_members"><li class="title">Members</li>
<li class="mu"><a href="members"><span style="color:red"  >23.020</span> Crimers</a></li>
<li class="mt"><a style="color:red"> <span>0</span> today</a></li>
<li class="mo"><a href="online"><span><?= $online; ?></span> online</a></li>
</ul>
      </div>
    <div id="center">
<br />