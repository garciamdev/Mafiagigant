<?php

    if(!isset($userdata[0]['authority']) or $userdata[0]['authority'] != 'admin'){
        header("Location: /");
        exit(); 
    }




  	$q = "SELECT * FROM translations where activity = 'exchangeoffice' and lang = '".$lang."'";
	$t = $db->query($q)->fetch();

  	$q = "SELECT * FROM exchangeoffice";
	$c = $db->query($q)->fetch();


  	$q = "SELECT * FROM languages";
	$l = $db->query($q)->fetch();

if($var == 'new'){

if($_SERVER['REQUEST_METHOD'] === 'POST'){
	
			$price	= isset($_POST['price']) ? $_POST['price'] : '0';
		$value 	= isset($_POST['value']) ? $_POST['value'] : '0';
		$dbfield 	= isset($_POST['option']) ? $_POST['option'] : '0';
		$sort 	= isset($_POST['sort']) ? $_POST['sort'] : '0';
		
		
          $exchangeoffice = array(
                'value' => $db->escape($value),
                'price' => $db->escape($price),
                'sort' => $db->escape($sort),
                'dbfield' => $db->escape($dbfield),
            );
          $exchangeoffice = $db->insert('exchangeoffice', $exchangeoffice); 


	foreach($l as $language){
				
				
			$planguage = $db->escape($_POST[$language['lang']]);
			
			$countrysl = array(
                'activity' => 'exchangeoffice',
                'activity_id' => $exchangeoffice,
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

		$price	= isset($_POST['price']) ? $_POST['price'] : '0';
		$value 	= isset($_POST['value']) ? $_POST['value'] : '0';
		$dbfield 	= isset($_POST['option']) ? $_POST['option'] : '0';
		$sort 	= isset($_POST['sort']) ? $_POST['sort'] : '0';
		
		
                    
					
          $update = array(
                'value' => $db->escape($value),
                'price' => $db->escape($price),
                'sort' => $db->escape($sort),
                'dbfield' => $db->escape($dbfield),
            );



		$where = array(
			'id' => $id
		);
		$db->where($where)->update('exchangeoffice', $update); 
     
     
     
	
	
	
     	foreach($l as $language){
				
			$planguage = $db->escape($_POST[$language['lang']]);
			
  			$q = "SELECT * FROM translations where activity = 'exchangeoffice' and lang = '".$language['lang']."' and activity_id = '".$id."'";
			$tc = $db->query($q)->fetch();
			if($db->affected_rows == '0'){	
	
		
			$insertl = array(
                'activity' => 'exchangeoffice',
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
                'activity' => 'exchangeoffice',
				'activity_id' => $id,
				'lang' => $language['lang']
			);
			$db->where($where)->update('translations', $updatel); 

			
			}
		
		



		} 
		
		
     
     
		
		
	}



  	$q = "SELECT * FROM translations where activity = 'exchangeoffice' and activity_id = '".$id."' ";
	$t = $db->query($q)->fetch();

  	$q = "SELECT * FROM exchangeoffice where id = '".$id."' ";
	$c = $db->query($q)->fetch();


}





if($var == 'delete'){


	$id = isset($_GET['id']) ? $_GET['id'] : '';
	$id = $db->escape($id);
	
	
if($_SERVER['REQUEST_METHOD'] === 'POST'){



		$where = array('activity_id' => $id, 'activity' => 'exchangeoffice' );
		$db->delete('translations')->where($where)->execute();
		
		
		$where = array('id' => $id );
		$db->delete('countrys')->where($where)->execute();
		
		
		
        header("Location: /admin/exchange-office/");
        exit(); 
	
}
	
	


  	$q = "SELECT * FROM translations where activity = 'exchangeoffice' and activity_id = '".$id."' ";
	$t = $db->query($q)->fetch();

  	$q = "SELECT * FROM countrys where id = '".$id."' ";
	$c = $db->query($q)->fetch();


}




