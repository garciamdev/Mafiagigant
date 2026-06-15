<?php
require_once '../config/db.config.php';
require_once '../core/database.php';
$db = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);


date_default_timezone_set("Europe/Amsterdam"); 
$defealt_time_zone = date_default_timezone_set("Europe/Amsterdam"); 


require_once '../core/functions.php';


$date = date("Y-m-d H:i:s");
