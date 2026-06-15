<?php
if(!isset($_SESSION['suid']) or $_SESSION['suid'] == ''){
		echo"Forbidden!";
		exit;
}
    
    
require_once("../../config/config.php");
require_once("../../core/database.php");
$db = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);
require_once("../../core/functions.php");


echo loadChat();
?>


