<?php

    if(!isset($userdata[0]['authority']) or $userdata[0]['authority'] != 'admin'){
        header("Location: /");
        exit(); 
    }


  	$q = "SELECT * FROM translations where activity = 'drugs' and lang = '".$lang."'";
	$t = $db->query($q)->fetch();

  	$q = "SELECT * FROM drugs";
	$c = $db->query($q)->fetch();


  	$q = "SELECT * FROM languages";
	$l = $db->query($q)->fetch();
	


if($var == 'new'){

if($_SERVER['REQUEST_METHOD'] === 'POST'){
	
			$minprice	= isset($_POST['minprice']) ? $_POST['minprice'] : '0';
		$maxprice 	= isset($_POST['maxprice']) ? $_POST['maxprice'] : '0';
		$sort 	= isset($_POST['sort']) ? $_POST['sort'] : '0';
		
		
  	$q = "SELECT * FROM countrys";
	$fc = $db->query($q)->fetch();
	
	
     
    	 $insert = array(
                'minprice' => $db->escape($minprice),
                'maxprice' => $db->escape($maxprice),
                'sort' => $db->escape($sort),
            );
          $insert = $db->insert('drugs', $insert); 
          
          
		foreach($fc as $ffc){
		$price = rand($minprice,$maxprice);

    	 $drugprice = array(
                'price' => $db->escape($price),
                'drugs' => $db->escape($insert),
                'country' => $db->escape($ffc['id']),
            );
          $drugprice = $db->insert('drugs_prices', $drugprice); 

		}
	

	foreach($l as $language){
				
				
			$planguage = $db->escape($_POST[$language[lang]]);
			
			$countrysl = array(
                'activity' => 'drugs',
                'activity_id' => $insert,
                'lang' => $language['lang'],
                'content' => $planguage,
            );
         	$countrysl = $db->insert('translations', $countrysl); 

		} 
			
			




} 



}






if($var == 'edit'){

	$id = isset($_GET['id']) ? $_GET['id'] : '';
	$id = $db->escape($id);

 


	if($_SERVER['REQUEST_METHOD'] === 'POST'){
	
				$minprice	= isset($_POST['minprice']) ? $_POST['minprice'] : '0';
		$maxprice 	= isset($_POST['maxprice']) ? $_POST['maxprice'] : '0';
		$sort 	= isset($_POST['sort']) ? $_POST['sort'] : '0';
		
          $update = array(
                'minprice' => $db->escape($minprice),
                'maxprice' => $db->escape($maxprice),
                'sort' => $db->escape($sort),
            );
		$where = array(
			'id' => $id
		);
		$db->where($where)->update('drugs', $update); 
     
     
     
	
	
	
     	foreach($l as $language){
				
			$planguage = $db->escape($_POST[$language[lang]]);
			
  			$q = "SELECT * FROM translations where activity = 'drugs' and lang = '".$language['lang']."' and activity_id = '".$id."'";
			$tc = $db->query($q)->fetch();
			if($db->affected_rows == '0'){	
	
		
			$crimel = array(
                'activity' => 'drugs',
                'activity_id' => $id,
                'lang' => $language['lang'],
                'content' => $planguage,
            );
         	$crimel = $db->insert('translations', $crimel); 



			}else{
				$crimel = array(
                'content' => $planguage,
           	 );
			$where = array(
				'activity_id' => $id,
                'activity' => 'drugs',
				'lang' => $language['lang']
			);
			$db->where($where)->update('translations', $crimel); 

			
			}
		
		



		} 
		
		
     
     
		
		
	}



  	$q = "SELECT * FROM translations where activity = 'drugs' and activity_id = '".$id."' ";
	$t = $db->query($q)->fetch();

  	$q = "SELECT * FROM drugs where id = '".$id."' ";
	$c = $db->query($q)->fetch();


}





if($var == 'delete'){


	$id = isset($_GET['id']) ? $_GET['id'] : '';
	$id = $db->escape($id);
	
	
if($_SERVER['REQUEST_METHOD'] === 'POST'){



		$where = array('activity_id' => $id, 'activity' => 'drugs' );
		$db->delete('translations')->where($where)->execute();
		
		
		$where = array('id' => $id );
		$db->delete('drugs')->where($where)->execute();
		$where = array('drugs' => $id );
		$db->delete('drugs_prices')->where($where)->execute();
		
		
		
        header("Location: /admin/drugs/");
        exit(); 
	
}
	
	


  	$q = "SELECT * FROM translations where activity = 'drugs' and activity_id = '".$id."' ";
	$t = $db->query($q)->fetch();

  	$q = "SELECT * FROM drugs where id = '".$id."' ";
	$c = $db->query($q)->fetch();


}


