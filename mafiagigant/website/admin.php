<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
header('Content-Type: text/html; charset=utf-8');
$module = isset($_GET['module']) ? $_GET['module'] : 'home';
$var = isset($_GET['var']) ? $_GET['var'] : '';
include("core/language.php");
include("core/theme.php");
include("config/config.php");
include("core/database.php");
$db = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);


include("core/functions.php");

if($userdata[0]['authority'] != 'admin'){
        header("Location: ".BASE_URL."");
        exit(); 
}
$theme = "admin";

if(login()){

 	$lastaction = date("Y-m-d H:i:s");
	$info = array(
		'lastaction_date' => $lastaction
	);
	$where = array(
		'id' => $user_id,
	);
	$db->where($where)->update('users', $info); 
            	
}
	//include("chat/chat.php");

define("ROOTPATH", dirname(__FILE__));

// Path to app folder.
define("APPPATH", ROOTPATH."/");


@include(APPPATH ."modules/".$module."/".$module.".admin.php");





include("themes/loader.php");


exit;


?>