<?php


    if(!isset($_SESSION['suid']) or $_SESSION['suid'] == ''){
        header("Location: ".BASE_URL."login/");
        exit(); 
    }

 
 
 
 	function cleanstring($string) {
		 return preg_replace("/[^A-Za-z0-9 ]/", ' ', $string);
	}	





$text['nl']['empty_family'] = "Geen familienaam ingevuld!";
$text['nl']['family_short'] = "Familienaam moet minimaal 3 tekens bevatten!";
$text['nl']['family_long'] = "Familienaam mag maximaal 15 tekens bevatten!";
$text['nl']['family_exist'] = "Familienaam bestaat al";
$text['nl']['family_incorrect_signs'] = "Incorecte tekens bij Familienaam!";
$text['nl']['created_family'] = "Familie aanmaken is gelukt";
$text['nl']['incorrect_signs'] = "Je maakt gebruik van tekens die niet zijn toegestaan!";



if($_SERVER['REQUEST_METHOD'] === 'POST'){

	$family =		$db->escape(htmlspecialchars(trim(strip_tags($_POST['familyname']))));



	#inlognaam
	if(empty($family)){
		$errors[]= $text[$lang]['empty_family'];
  	}  
 	if(strlen($family) < 3 ){
 	
		$errors[]= $text[$lang]['family_short'];
  	}
	
    #Is de inlognaam wel korter dan 10 tekens
	if(strlen($family) > 15 ){
	
		$errors[]= $text[$lang]['family_long'];
  	}
  	


	if(!preg_match('/^([a-zA-Z0-9._-]+)$/is', $family)){
		$errors[]= $text[$lang]['incorrect_signs'];
  	}
  	
	$q = "SELECT familyname FROM family where familyname = '".$family."'  LIMIT 1";
	$f = $db->query($q)->fetch();
	if($db->affected_rows != '0'){	
		$errors[]= $text[$lang]['family_exist'];
	}
	


  	
  	 		
	if(empty($errors))
	{
	
	
			$info = array(
                'owner' =>$userdata[0]['username'],
                'familyname' =>$family
            );
         	$familyid = $db->insert('family', $info); 
		
			$info = array(
                'family' => $familyid,
           	 );
			$where = array(
				'id' => $userdata[0]['id']
			);
			$db->where($where)->update('users', $info); 
	
		$success[]= $text[$lang]['created_family'];
	
	
	
	
	}
	
	
}