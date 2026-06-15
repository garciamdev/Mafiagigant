<?php




    if(!isset($_SESSION['suid']) or $_SESSION['suid'] == ''){
        header("Location: ".BASE_URL."login/");
        exit(); 
    }

 
 
 
 	function cleanstring($string) {
		 return preg_replace("/[^A-Za-z0-9 ]/", ' ', $string);
	}	



	$family =		$db->escape(htmlspecialchars(trim(strip_tags($varid))));


	if(!preg_match('/^([a-zA-Z0-9._-]+)$/is', $family)){
		$errors[]= $text[$lang]['incorrect_signs'];
  	}
  	
$famname = '';

	 		
	if(empty($errors))
	{
	

$qm = "SELECT  * FROM family where id = '".$family."' ";
$f = $db->query($qm)->fetch();
$famname = $f[0]['familyname'];
$count = $db->affected_rows;
if($count == 0){

		$errors[]= $text[$lang]['family_notexist'];
}else{


		$q = "SELECT sum(att_power + deff_power) as power , count(id) as members FROM users where family = '".$family."' ";
		$p = $db->query($q)->fetch();
		
		
		$q = "SELECT * FROM users where family = '".$family."' ";
		$famusers = $db->query($q)->fetch();
} 
				
		}
