<?php


    if(!isset($_SESSION['suid']) or $_SESSION['suid'] == ''){
        header("Location: ".BASE_URL."login/");
        exit(); 
    }

 
 
 
 	function cleanstring($string) {
		 return preg_replace("/[^A-Za-z0-9 ]/", ' ', $string);
	}	





$text['nl']['familynotexist'] = "Familie bestaat niet!";
$text['nl']['familynotexistcheat'] = "Probeer je iets te doen wat niet mag?";
$text['nl']['empty_family'] = "Je moet je wel aanmelden bij een familie!";
$text['nl']['incorrect_signs'] = "Je maakt gebruik van tekens die niet zijn toegestaan!";
$text['nl']['signedup'] = "Je hebt je aangemeld!";



if($_SERVER['REQUEST_METHOD'] === 'POST'){

	$family =		$db->escape(htmlspecialchars(trim(strip_tags($_POST['to']))));

	if(!is_numeric($family)){
		$errors[]= $text[$lang]['familynotexistcheat'];

	}

	#inlognaam
	if(empty($family)){
		$errors[]= $text[$lang]['empty_family'];
  	}  
  	


	if(!preg_match('/^([a-zA-Z0-9._-]+)$/is', $family)){
		$errors[]= $text[$lang]['incorrect_signs'];
  	}
  	
  	
  	if(empty($errors)){
		$q = "SELECT id FROM family where id = '".$family."'  LIMIT 1";
		$f = $db->query($q)->fetch();
		if($db->affected_rows == '0'){	
			$errors[]= $text[$lang]['familynotexist'];
		}
	}
	


  	
  	 		
	if(empty($errors))
	{
	

			$info = array(
                'family' => $f[0]['id'],
           	 );
			$where = array(
				'id' => $userdata[0]['id']
			);
			$db->where($where)->update('users', $info); 
	
		$success[]= $text[$lang]['signedup'];
	
	
	
	
	}
	
	
}

	$q = "SELECT id,familyname FROM family";
	$family = $db->query($q)->fetch();
	
	