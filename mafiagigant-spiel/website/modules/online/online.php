<?php

    if(!isset($_SESSION['suid']) or $_SESSION['suid'] == ''){
        header("Location: ".BASE_URL."login/");
        exit(); 
    }


include("online.lang.php");

					$onlinedate = timetodate(datetotime(date("Y-m-d H:i:s")) - 3600);

$sort = '';
if($_SERVER['REQUEST_METHOD'] === 'POST'){

	$sort = isset($_POST['sort_members']) ? $_POST['sort_members'] : '';
	
}

	if($sort == 2){ $sort = 'join'; 
		            $qo = "SELECT  * FROM users where lastaction_date > '".$onlinedate."' order by signup_date desc";
	} elseif ($sort == 1) { 
		$sort = 'rank'; 
		            $qo = "SELECT  * FROM users where lastaction_date > '".$onlinedate."' order by xp desc";
	}else{ $sort = 'power'; 
		            $qo = "SELECT  * FROM users where lastaction_date > '".$onlinedate."' order by (att_power + deff_power) desc";
	}
		
	            
	            
	            
	            $fo = $db->query($qo)->fetch();


