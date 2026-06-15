<?php

    if(!isset($userdata[0]['authority']) or $userdata[0]['authority'] != 'admin'){
        header("Location: /");
        exit(); 
    }


 

  	$q = "SELECT * FROM translations where activity = 'cars' and lang = '".$lang."'";
	$tc = $db->query($q)->fetch();
	
  	$q = "SELECT * FROM translations where activity = 'stealcars' and lang = '".$lang."'";
	$tsc = $db->query($q)->fetch();


  	$q = "SELECT * FROM cars";
	$c = $db->query($q)->fetch();
	
  	$q = "SELECT * FROM stealcars";
	$sc = $db->query($q)->fetch();


  	$q = "SELECT * FROM languages";
	$l = $db->query($q)->fetch();


if($var =='newstealcars'){

	

if($_SERVER['REQUEST_METHOD'] === 'POST'){
	
	
		$exp = isset($_POST['exp']) ? $_POST['exp'] : 0;
		$maxexp = isset($_POST['maxexp']) ? $_POST['maxexp'] : 0;
		$jailchance = isset($_POST['jailchance']) ? $_POST['jailchance'] : 0;
		$jailtime = isset($_POST['jailtime']) ? $_POST['jailtime'] : 0;
		$cooldown = isset($_POST['cooldown']) ? $_POST['cooldown'] : 0;
		$level = isset($_POST['level']) ? $_POST['level']  : 0;
		$sort = isset($_POST['sort']) ? $_POST['sort'] : 0;
		$successmaxperc = isset($_POST['successmaxperc']) ? $_POST['successmaxperc']  : 0;
		$successexpneeded = isset($_POST['successexpneeded']) ? $_POST['successexpneeded'] : 0;
		
          $stealcars = array(
                'exp' => $db->escape($exp),
                'maxexp' => $db->escape($maxexp),
                'jailchance' => $db->escape($jailchance),
                'jailtime' => $db->escape($jailtime),
                'cooldown' => $db->escape($cooldown),
                'level' => $db->escape($level),
                'sort' => $db->escape($sort),
                'successmaxperc' => $db->escape($successmaxperc),
                'successexpneeded' => $db->escape($successexpneeded),
            );
          $stealcars = $db->insert('stealcars', $stealcars); 


	foreach($l as $language){
				
				
			$planguage = $db->escape($_POST[$language[lang]]);
			
			$translation = array(
                'activity' => 'stealcars',
                'activity_id' => $stealcars,
                'lang' => $language['lang'],
                'content' => $planguage,
            );
         	$crimel = $db->insert('translations', $translation); 



		} 
			
			




} 




}

if($var == 'newcar'){

if($_SERVER['REQUEST_METHOD'] === 'POST'){
	
		$price	= isset($_POST['price']) ? $_POST['price'] : '0';
		$stealcars	= isset($_POST['stealcars']) ? $_POST['stealcars'] : '0';
		$img	= isset($_POST['img']) ? $_POST['img'] : '0';
		$sort 	= isset($_POST['sort']) ? $_POST['sort'] : '0';
		
		
          $insert = array(
                'price' => $db->escape($price),
                'stealcars' => $db->escape($stealcars),
                'img' => $db->escape($img),
                'sort' => $db->escape($sort),
            );
          $insert = $db->insert('cars', $insert); 


	foreach($l as $language){
				
				
			$planguage = $db->escape($_POST[$language[lang]]);
			
			$countrysl = array(
                'activity' => 'cars',
                'activity_id' => $insert,
                'lang' => $language['lang'],
                'content' => $planguage,
            );
         	$countrysl = $db->insert('translations', $countrysl); 

		} 
			
			




} 



}




if($var == 'editcar'){

	$id = isset($_GET['id']) ? $_GET['id'] : '';
	$id = $db->escape($id);

 


	if($_SERVER['REQUEST_METHOD'] === 'POST'){

		$price	= isset($_POST['price']) ? $_POST['price'] : '0';
		$stealcars	= isset($_POST['stealcars']) ? $_POST['stealcars'] : '0';
		$img	= isset($_POST['img']) ? $_POST['img'] : '0';
		$sort 	= isset($_POST['sort']) ? $_POST['sort'] : '0';
		
		
          $update = array(
                'price' => $db->escape($price),
                'stealcars' => $db->escape($stealcars),
                'img' => $db->escape($img),
                'sort' => $db->escape($sort),
            );   
					
       


		$where = array(
			'id' => $id
		);
		$db->where($where)->update('cars', $update); 
     
     
     
	
	
	
     	foreach($l as $language){
				
			$planguage = $db->escape($_POST[$language[lang]]);
			
  			$q = "SELECT * FROM translations where activity = 'cars' and lang = '".$language['lang']."' and activity_id = '".$id."'";
			$tc = $db->query($q)->fetch();
			if($db->affected_rows == '0'){	
	
		
			$insertl = array(
                'activity' => 'cars',
                'activity_id' => $id,
                'lang' => $language['lang'],
                'content' => $planguage,
            );
         	$insertl = $db->insert('translations', $insertl); 



			}else{
				$updatel = array(
                'content' => $planguage,
           	 );
			$where = array(
                'activity' => 'cars',
				'activity_id' => $id,
				'lang' => $language['lang']
			);
			$db->where($where)->update('translations', $updatel); 

			
			}
		
		



		} 
		
		
     
     
		
		
	}



  	$q = "SELECT * FROM translations where activity = 'cars' and activity_id = '".$id."' ";
	$tc = $db->query($q)->fetch();

  	$q = "SELECT * FROM cars where id = '".$id."' ";
	$c = $db->query($q)->fetch();


}





if($var == 'editstealcar'){

	$id = isset($_GET['id']) ? $_GET['id'] : '';
	$id = $db->escape($id);

 


	if($_SERVER['REQUEST_METHOD'] === 'POST'){

		$exp = isset($_POST['exp']) ? $_POST['exp'] : 0;
		$maxexp = isset($_POST['maxexp']) ? $_POST['maxexp'] : 0;
		$jailchance = isset($_POST['jailchance']) ? $_POST['jailchance'] : 0;
		$jailtime = isset($_POST['jailtime']) ? $_POST['jailtime'] : 0;
		$cooldown = isset($_POST['cooldown']) ? $_POST['cooldown'] : 0;
		$level = isset($_POST['level']) ? $_POST['level']  : 0;
		$sort = isset($_POST['sort']) ? $_POST['sort'] : 0;
		$successmaxperc = isset($_POST['successmaxperc']) ? $_POST['successmaxperc']  : 0;
		$successexpneeded = isset($_POST['successexpneeded']) ? $_POST['successexpneeded'] : 0;
		
          $update = array(
                'exp' => $db->escape($exp),
                'maxexp' => $db->escape($maxexp),
                'jailchance' => $db->escape($jailchance),
                'jailtime' => $db->escape($jailtime),
                'cooldown' => $db->escape($cooldown),
                'level' => $db->escape($level),
                'sort' => $db->escape($sort),
                'successmaxperc' => $db->escape($successmaxperc),
                'successexpneeded' => $db->escape($successexpneeded),
            );


		$where = array(
			'id' => $id
		);
		$db->where($where)->update('stealcars', $update); 
     
     
     
	
     
	
	
	
     	foreach($l as $language){
				
			$planguage = $db->escape($_POST[$language[lang]]);
			
  			$q = "SELECT * FROM translations where activity = 'stealcars' and lang = '".$language['lang']."' and activity_id = '".$id."'";
			$tc = $db->query($q)->fetch();
			if($db->affected_rows == '0'){	
	
		
			$insertl = array(
                'activity' => 'stealcars',
                'activity_id' => $id,
                'lang' => $language['lang'],
                'content' => $planguage,
            );
         	$insertl = $db->insert('translations', $insertl); 



			}else{
				$updatel = array(
                'content' => $planguage,
           	 );
			$where = array(
                'activity' => 'stealcars',
				'activity_id' => $id,
				'lang' => $language['lang']
			);
			$db->where($where)->update('translations', $updatel); 

			
			}
		
		



		} 
		
		
     
     
		
		
	}



  	$q = "SELECT * FROM translations where activity = 'stealcars' and activity_id = '".$id."' ";
	$tsc = $db->query($q)->fetch();

  	$q = "SELECT * FROM stealcars where id = '".$id."' ";
	$sc = $db->query($q)->fetch();


}





if($var == 'delete'){


	$id = isset($_GET['id']) ? $_GET['id'] : '';
	$id = $db->escape($id);
	
	
if($_SERVER['REQUEST_METHOD'] === 'POST'){



		$where = array('activity_id' => $id, 'activity' => 'cars' );
		$db->delete('translations')->where($where)->execute();
		
		
		$where = array('id' => $id );
		$db->delete('cars')->where($where)->execute();
		
		
		
        header("Location: /admin/cars/");
        exit(); 
	
}
	
	


  	$q = "SELECT * FROM translations where activity = 'cars' and activity_id = '".$id."' ";
	$t = $db->query($q)->fetch();

  	$q = "SELECT * FROM cars where id = '".$id."' ";
	$c = $db->query($q)->fetch();


}




