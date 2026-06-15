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
    <link rel="shortcut icon" type="image/png" href="/themes/favicon.png"/>
    <meta name="keywords" content="Gratis, XXL, Online, Maffia, Spel, Game, Crime, RPG, Free, Prijzen, Uitgebreid, Nieuw, Gezellig, Online maffia game"/>
    <meta name="description" content="Meld je gratis aan en speel gezellig mee met dit fantastische XXL online Maffia spel. 22.500+ anderen gingen je voor!"/>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-15"/>
    <script type="text/javascript" src="/themes/secretcrime/js/jquery-1.7.1.js"></script>
    <script type="text/javascript" src="/themes/secretcrime/js/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="/themes/secretcrime/js/jquery.fancybox-1.2.1.pack.js"></script>
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
    <!--<script type="text/javascript" src="/scripts/ajax/prototype.js"></script>
		<script type="text/javascript" src="/scripts/cufon/cufon-yui.js"></script>
		<script type="text/javascript" src="/scripts/cufon/fonts/Impact.font.js"></script>-->
  </head>
  <body><script type="text/javascript" src="/themes/secretcrime/js/tooltip/tooltip.js"></script>
    <div id="wrap">
<style>
#memberheader{
background: url('https://www.secretcrime.be/secretcrime/header.png') center top no-repeat;
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
</style>
      <div id="header">

      </div>
      <div id="topmenu">

<ul class="menu_top"><li><a href="/"><?=$txt[$lang]['menu_home'];?></a></li><li><a href="crew"><?=$txt[$lang]['menu_crew'];?></a></li>
<li><a href="info/1/deathmatch">Ronde 4 Death match</a></li>
</ul>


      </div>
      <div id="left">
      
      <ul class="menu_welcome"><li class="title"><?=$txt[$lang]['menu_welcome_title'];?></li><li><a href="register"><?=$txt[$lang]['menu_register'];?></a></li>
<li><a href="manual"><?=$txt[$lang]['menu_manual'];?></a></li>
<li><a href="maffia-story"><?=$txt[$lang]['menu_story'];?></a></li><li><a href="/lost-password"><?=$txt[$lang]['menu_lostpassword'];?></a></li>
</ul>


      </div>
    <div id="center">
    <br />
   <?php
    
   $txt['nl']['newhere'] = 'Welkom op de nieuwe versie! Heb je al een account? doe dan een wachtwoord reset.';
// English
$txt['en']['newhere'] = "Welcome to the new version! Do you already have an account? Then, please reset your password.";

// German
$txt['de']['newhere'] = "Willkommen zur neuen Version! Haben Sie bereits ein Konto? Dann setzen Sie bitte Ihr Passwort zurück.";

// Spanish
$txt['es']['newhere'] = "¡Bienvenido a la nueva versión! ¿Ya tienes una cuenta? Entonces, por favor, restablece tu contraseña.";

// Portuguese
$txt['pt']['newhere'] = "Bem-vindo à nova versão! Já tem uma conta? Então, por favor, redefina sua senha.";

// French
$txt['fr']['newhere'] = "Bienvenue à la nouvelle version ! Avez-vous déjà un compte ? Alors, veuillez réinitialiser votre mot de passe.";

// Czech
$txt['cs']['newhere'] = "Vítejte v nové verzi! Máte již účet? Pak prosím resetujte své heslo.";

?>
     <table class="info_info">
        <tbody><tr>
          <td width="5%" align="center"><img src="/themes/img/info_info.png"></td>
          <td width="95%"><?= $txt[$lang]['newhere'];?></td>
        </tr>
      </tbody></table>
      
      