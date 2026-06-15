<?php

    if(!isset($_SESSION['suid']) or $_SESSION['suid'] == ''){
        header("Location: ".BASE_URL."login/");
        exit(); 
    }

    if(!isset($userdata[0]['authority']) or $userdata[0]['authority'] != 'admin'){
       // header("Location: /");
       // exit(); 
    }
 

  	$q = "SELECT * FROM translations where activity = 'stealcars' and lang = '".$lang."'";
	$tsc = $db->query($q)->fetch();
	$t = $tsc;
  	$q = "SELECT * FROM translations where activity = 'cars' and lang = '".$lang."'";
	$tcars = $db->query($q)->fetch();
  	$q = "SELECT * FROM translations where activity = 'countrys' and lang = '".$lang."'";
	$tc = $db->query($q)->fetch();


  
  
 

	if($varallowed == 'no'){
		$qcu = "SELECT count(id) as quantity FROM garage where  username = '".$userdata[0]['username']."' and country = '".$userdata[0]['country']."'";
	$fcu = $db->query($qcu)->fetch();
	$totalcarsincountry = isset($fcu[0]['quantity']) ? $fcu[0]['quantity']  : 0;
		
		$nocars = 0;
		if($totalcarsincountry == 0){
					$errors[] = $text[$lang]['nocars'];
		$nocars = 1;

		}
	}
 




if($_SERVER['REQUEST_METHOD'] === 'POST'){


if($var == 'repair'){


$pcars = explode(",",$_POST['cars']);


  		$q = "SELECT * FROM garage where username = '".$userdata[0]['username']."' and country = '".$userdata[0]['country']."' and demage > 0";
		$g = $db->query($q)->fetch();
		
		$totalrepair = 0;
		foreach($g as $f){
    		if (in_array($f['id'], $pcars)) {
    	
    			$carinfo = getcarinfo($f['car']);
    			$value = round((( $carinfo[0]['price'] / 100 ) * $f['demage']) * 1.10);
    			$totalrepair = $totalrepair + $value;
    			
    		
    		
    		}	
    	}
	
	
    		if($totalrepair == 0){
    			$errors[] = $text[$lang]['no_cars'];
    		}
    		
	if(isset($_POST['repair'])){
	
	


    		
    		if($userdata[0]['cash'] <= $totalrepair){
    		$errors[] = $text[$lang]['not_enough'];
    		}
    		
    		
			if(empty($errors))
			{
			
			
					foreach($g as $f){
    		if (in_array($f['id'], $pcars)) {
    
    						
			$repair = array(
                'demage' => 0,
           	 );
			$where = array(
				'id' => $f['id']
			);
			$db->where($where)->update('garage', $repair); 
			
			
    		
    		
    		}	
    	}

			
			
			$user = array(
                'cash' => ($userdata[0]['cash'] - $totalrepair),
           	 );
			$where = array(
				'id' => $userdata[0]['id']
			);
			$db->where($where)->update('users', $user); 
			
			
			
    	
    		$success[] = $text[$lang]['repaired'];
    	
    	
			
			}
			
			
	
	}	
	if(isset($_POST['notrepair'])){
	
		$var = 'garage';
		$varallowed = 'no';
	}
	
	

}








if($var == 'dealer'){


$pcars = explode(",",$_POST['cars']);

 
  		$q = "SELECT * FROM garage where username = '".$userdata[0]['username']."' and country = '".$userdata[0]['country']."' ";
		$g = $db->query($q)->fetch();
		
		$totalsell = 0;
		foreach($g as $f){
    		if (in_array($f['id'], $pcars)) {
    	
    			$carinfo = getcarinfo($f['car']);
    			$value = round( $carinfo[0]['price'] - (( $carinfo[0]['price'] / 100 ) * $f['demage']) * 1.0);
    			$totalsell = $totalsell + $value;
    			
    		
    		
    		}	
    	}
	
	
    		if($totalsell == 0){
    			$errors[] = $text[$lang]['no_cars_selected'];
    		}
    		
	if(isset($_POST['sell'])){
	
	


    		
			if(empty($errors))
			{
			
			
					foreach($g as $f){
    		if (in_array($f['id'], $pcars)) {
    
    		
		$where = array('id' => $f['id'] );
		$db->delete('garage')->where($where)->execute();

			
			
    		
    		
    		}	
    	}

			
			
			$user = array(
                'cash' => ($userdata[0]['cash'] + $totalsell),
           	 );
			$where = array(
				'id' => $userdata[0]['id']
			);
			$db->where($where)->update('users', $user); 
			
			
			
    	
    		$success[] = $text[$lang]['selldealer'];
    	
    	
			
			}
			
			
	
	}	
	if(isset($_POST['notsell'])){
	
		$var = 'garage';
		$varallowed = 'no';
	}
	

}



}





  	$q = "SELECT * FROM garage where username = '".$userdata[0]['username']."' and country = '".$userdata[0]['country']."'";
	$g = $db->query($q)->fetch();
	
	
	
						function getcarinfo($id){
						global $db;
							
  						$q = "SELECT * FROM cars where id = '".$id."'  ";
						$o = $db->query($q)->fetch();
						return $o;
						}
				  		
						
						
		    

	
  	$q = "SELECT * FROM countrys";
	$countrys = $db->query($q)->fetch();
	$countrycount = $db->affected_rows;
	
	
	$qcu = "SELECT count(id) as quantity FROM cars";
	$fcu = $db->query($qcu)->fetch();
	$totaldifferentcars = isset($fcu[0]['quantity']) ? $fcu[0]['quantity']  : 0;
	
	$qcu = "SELECT count(distinct(car)) as quantity FROM garage where  username = '".$userdata[0]['username']."' ";
	$fcu = $db->query($qcu)->fetch();
	$totalcars = isset($fcu[0]['quantity']) ? $fcu[0]['quantity']  : 0;
	
	$qcu = "SELECT count(distinct(car)) as quantity FROM garage where  username = '".$userdata[0]['username']."' and country = '".$userdata[0]['country']."'";
	$fcu = $db->query($qcu)->fetch();
	$totalcarsincountry = isset($fcu[0]['quantity']) ? $fcu[0]['quantity']  : 0;
		
	

$arrcars[] = '';
foreach($countrys as $ft){
	
	$qcu = "SELECT count(id) as quantity FROM garage where country = '".$ft['id']."' and  username = '".$userdata[0]['username']."'";
	$fcu = $db->query($qcu)->fetch();
	$uc = $fcu[0]['quantity']; 
	$arrcars[$ft[id]] = isset($uc) ? $uc  : 0;
}
	
	
	
	
	
	
	
	
		
	