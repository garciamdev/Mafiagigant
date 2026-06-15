<?php

//$accesskey = "xF0ut-P3cU-4EgJRH-5eG9FegBX-eg9MsDGv-3cEd9RwT";
 

require_once '../../config/db.config.php';
require_once '../database.php';
$db = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);


date_default_timezone_set("Europe/Amsterdam"); 

//echo"access: $accesskey <Br />";

			$sql = "SELECT * FROM settings where name = 'access_key'  " ;
			$db->query($sql)->execute() ;
			$f = $db->query($sql)->fetch();
			$accesskey =$f[0]['value'];

?>