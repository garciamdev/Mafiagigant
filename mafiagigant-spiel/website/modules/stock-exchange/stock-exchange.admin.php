<?php

    if(!isset($userdata[0]['authority']) or $userdata[0]['authority'] != 'admin'){
        header("Location: /");
        exit(); 
    }


  	$q = "SELECT * FROM translations where activity = 'stockexchange' and lang = '".$lang."'";
	$t = $db->query($q)->fetch();

  	$q = "SELECT * FROM stockexchange";
	$c = $db->query($q)->fetch();
	
	
  	$q = "SELECT * FROM stockexchange_settings";
	$settings = $db->query($q)->fetch();


  	$q = "SELECT * FROM languages";
	$l = $db->query($q)->fetch();
	
  	$q = "SELECT * FROM countrys";
	$countrys = $db->query($q)->fetch();
	


if($var == 'new'){

if($_SERVER['REQUEST_METHOD'] === 'POST'){
	
			$minprice	= isset($_POST['minprice']) ? $_POST['minprice'] : '0';
		$maxprice 	= isset($_POST['maxprice']) ? $_POST['maxprice'] : '0';
		$sort 	= isset($_POST['sort']) ? $_POST['sort'] : '0';
		
		
  	
	
     
		$price = rand($minprice,$maxprice);
    	 $insert = array(
                'minprice' => $db->escape($minprice),
                'maxprice' => $db->escape($maxprice),
                'price' => $db->escape($price),
                'sort' => $db->escape($sort),
            );
          $insert = $db->insert('stockexchange', $insert); 
          

	

	foreach($l as $language){
				
				
			$planguage = $db->escape($_POST[$language['lang']]);
			
			$countrysl = array(
                'activity' => 'stockexchange',
                'activity_id' => $insert,
                'lang' => $language['lang'],
                'content' => $planguage,
            );
         	$countrysl = $db->insert('translations', $countrysl); 

		} 
			
			




} 



}






if($var == 'settings'){

	$id = isset($_GET['id']) ? $_GET['id'] : '1';
	$id = $db->escape($id);
	$id = 1;
	if($_SERVER['REQUEST_METHOD'] === 'POST'){
	
		$maxquantity 	= isset($_POST['maxquantity']) ? $_POST['maxquantity'] : '0';
		$commission 	= isset($_POST['commission']) ? $_POST['commission'] : '0';
			$country 	= isset($_POST['country']) ? $_POST['country'] : '0';
		
          $update = array(
                'maxquantity' => $db->escape($maxquantity),
                'commission' => $db->escape($commission),
                'country' => $db->escape($country),
            );
		$where = array(
			'id' => $id
		);
		$db->where($where)->update('stockexchange_settings', $update); 
     
     

		
	}


  	$q = "SELECT * FROM stockexchange_settings where id = '".$id."' ";
	$settings = $db->query($q)->fetch();


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
		$db->where($where)->update('stockexchange', $update); 
     
     
     
	
	
	
     	foreach($l as $language){
				
			$planguage = $db->escape($_POST[$language['lang']]);
			
  			$q = "SELECT * FROM translations where activity = 'stockexchange' and lang = '".$language['lang']."' and activity_id = '".$id."'";
			$tc = $db->query($q)->fetch();
			if($db->affected_rows == '0'){	
	
		
			$crimel = array(
                'activity' => 'stockexchange',
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
                'activity' => 'stockexchange',
				'lang' => $language['lang']
			);
			$db->where($where)->update('translations', $crimel); 

			
			}
		
		



		} 
		
		
     
     
		
		
	}



  	$q = "SELECT * FROM translations where activity = 'stockexchange' and activity_id = '".$id."' ";
	$t = $db->query($q)->fetch();

  	$q = "SELECT * FROM stockexchange where id = '".$id."' ";
	$c = $db->query($q)->fetch();


}





if($var == 'delete'){


	$id = isset($_GET['id']) ? $_GET['id'] : '';
	$id = $db->escape($id);
	
	
if($_SERVER['REQUEST_METHOD'] === 'POST'){



		$where = array('activity_id' => $id, 'activity' => 'stockexchange' );
		$db->delete('translations')->where($where)->execute();
		
		
		$where = array('id' => $id );
		$db->delete('stockexchange')->where($where)->execute();
		
		
		
        header("Location: /admin/stock-exchange/");
        exit(); 
	
}
	
	


  	$q = "SELECT * FROM translations where activity = 'stockexchange' and activity_id = '".$id."' ";
	$t = $db->query($q)->fetch();

  	$q = "SELECT * FROM stockexchange where id = '".$id."' ";
	$c = $db->query($q)->fetch();


}


