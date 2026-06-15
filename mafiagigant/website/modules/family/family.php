<?php

    if(!isset($_SESSION['suid']) or $_SESSION['suid'] == ''){
        header("Location: ".BASE_URL."login/");
        exit(); 
    }

    if(!isset($userdata[0]['authority']) or $userdata[0]['authority'] != 'admin'){ 
     $noaccess = 1;
    }
 
 
 
 
	if($var == 'new'){
 		require_once('new.php');
 	}
	if($var == 'apply'){
	$var = 'join';
 		require_once('join.php');
 	}
	if($var == '' or $var =='overview'){
		$var = 'overview';
 		require_once('overview.php');
 	}
 	
	if(is_numeric($var)){
		$varid = $var;
		$var = 'famprofile';
 		require_once('famprofile.php');
 	}