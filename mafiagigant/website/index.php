<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


if($_SERVER['REMOTE_ADDR'] != '217.104.81.107'){
//echo "The website is currently unavailable";
//exit;
}

if ($_SERVER['HTTP_HOST'] === 'www.secretcrime.nl') {
    $redirectUrl = 'https://secretcrime.nl' . $_SERVER['REQUEST_URI'];
    header("Location: $redirectUrl", true, 301);
    exit;
}

session_start();
header('Content-Type: text/html; charset=utf-8');
$module = isset($_GET['module']) ? $_GET['module'] : 'home';
$redmodule = $module;
$var = isset($_GET['var']) ? $_GET['var'] : '';

//echo $module;
include("core/language.php");
include("core/theme.php");
include("config/config.php");
include("core/database.php");
$db = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);

 	$now = date("Y-m-d H:i:s");
//echo ">".$lang;

include("core/functions.php"); 

if($module == 'register' or $module == 'lost-password'){
 


	include("core/class/PhPmailer/src/Exception.php");
	include("core/class/PhPmailer/src/PHPMailer.php");
	 
	include("core/captcha.php");
}

$loadcaptcha = array("crimes","jail","boxing","sports-hall","red-light-district","suspicious-packages",
"hospital","robbery","cars","wheel-of-fortune","transport","work","family");
if(in_array($module,$loadcaptcha)){
	include("core/captcha.php");
}

    $count_timer_jail = 0;
    $count_timer_flying = 0;
    $currenthealth = 100;
    
if(login()){
$currenthealth = $userdata[0]['health'];

if($userdata[0]['country'] == 0){

  	$q = "SELECT id FROM countrys order by rand() limit 1";
	$ccc = $db->query($q)->fetch();
	$info = array(
		'country' => $ccc[0]['id']
	);
	$where = array(
		'id' => $user_id,
	);
	$db->where($where)->update('users', $info); 
}


 	$lastaction = date("Y-m-d H:i:s");
	$info = array(
		'lastaction_date' => $lastaction
	);
	$where = array(
		'id' => $user_id,
	);
	$db->where($where)->update('users', $info); 
            	
    $count_timer_gym = 0;
    $count_timer_boxing = 0;
    $count_timer_crimes = 0;
    $count_timer_jail = 0;
    $count_timer_fly = 0;
    $count_timer_flying = 0;
    $count_timer_redlight = 0;
    $count_timer_robbery = 0;
    $count_timer_stealcars = 0;
    $count_timer_suspiciouspackages = 0;
    $count_timer_race = 0;
    $count_timer_wheel = 0;
    $count_timer_transport = 0;
    $q = "SELECT * FROM timers where username = '".$userdata[0]['username']."'";
	$timers = $db->query($q)->fetch();
	foreach($timers as $t){
		if($t['activity'] == 'boxing'){ $count_timer_boxing = datetotime($t['time']) - time();}
		if($t['activity'] == 'crimes'){ $count_timer_crimes = datetotime($t['time']) - time();}
		if($t['activity'] == 'jail'){ $count_timer_jail = datetotime($t['time']) - time();}
		if($t['activity'] == 'gym'){ $count_timer_gym = datetotime($t['time']) - time();}
		if($t['activity'] == 'fly'){ $count_timer_fly = datetotime($t['time']) - time();}
		if($t['activity'] == 'flying'){ $count_timer_flying = datetotime($t['time']) - time();}
		if($t['activity'] == 'redlight'){ $count_timer_redlight = datetotime($t['time']) - time();}
		if($t['activity'] == 'robbery'){ $count_timer_robbery = datetotime($t['time']) - time();}
		if($t['activity'] == 'suspiciouspackages'){ $count_timer_suspiciouspackages = datetotime($t['time']) - time();}
		if($t['activity'] == 'stealcars'){ $count_timer_stealcars = datetotime($t['time']) - time();}
		if($t['activity'] == 'race'){ $count_timer_race = datetotime($t['time']) - time();}
		if($t['activity'] == 'wheeloffortune'){ $count_timer_wheel = datetotime($t['time']) - time();}
		if($t['activity'] == 'transport'){ $count_timer_transport = datetotime($t['time']) - time();}
	}

}
 
$jailallowed = array("chat","prison","stats","online");
if($count_timer_jail > 0 and !in_array($module,$jailallowed)){
        header("Location: ".BASE_URL."prison/");
}
 
$healthwarning = array("hospital","exchange-office","airport","bank","safe","prison");
if($currenthealth <= 35 and !in_array($module,$healthwarning)){
        header("Location: ".BASE_URL."hospital/");
}
 
if($count_timer_flying > 0 ){
	$module = 'airport';
      //  header("Location: ".BASE_URL."airport/");
}




	//include("chat/chat.php");

define("ROOTPATH", dirname(__FILE__));

// Path to app folder.
define("APPPATH", ROOTPATH."/");


@include(APPPATH ."modules/".$module."/".$module.".php");
 

if(isset($_SESSION['suid']) and $_SESSION['suid'] != '') {


        $quserdata = $db->query("SELECT * FROM users   where  id = '".$db->escape($_SESSION['suid'])."' ");
        $userdata = $db->fetch($quserdata);
        $user_id =  $userdata[0]['id'];
    	

}



include("themes/loader.php");
exit;


echo"<BR />DIT IS EEN TEST:<BR />$lang <br />";

ECHO $txt[$lang]['footer_made_by'];

ECHO"<BR />EINDE TEST<BR />";

?>