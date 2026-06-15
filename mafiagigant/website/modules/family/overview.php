<?php


    if(!isset($_SESSION['suid']) or $_SESSION['suid'] == ''){
        header("Location: ".BASE_URL."login/");
        exit(); 
    }

 
 
 
 	function cleanstring($string) {
		 return preg_replace("/[^A-Za-z0-9 ]/", ' ', $string);
	}	






	$q = "SELECT id,familyname FROM family";
	$family = $db->query($q)->fetch();
	
	foreach($family as $f){
	
		$q = "SELECT sum(att_power + deff_power) as power , count(id) as members FROM users where family = '".$f['id']."' ";
		$p = $db->query($q)->fetch();
		
		$faminfo[$f['id']]['power'] = isset($p[0]['power']) ? $p[0]['power'] : 0;
		$faminfo[$f['id']]['members'] =isset( $p[0]['members']) ?  $p[0]['members'] : 0;
	
	}
	