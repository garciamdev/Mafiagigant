<?php

    if(!isset($userdata[0]['authority']) or $userdata[0]['authority'] != 'admin'){
        header("Location: /");
        exit(); 
    }



          $user = array(
                'username' => $db->escape($user),
            );
           // $user_id = $db->insert('users', $user); 



  	$q = "SELECT * FROM translations where activity = 'shop_title' and lang = '".$lang."'";
	$tt = $db->query($q)->fetch();
  	$q = "SELECT * FROM translations where activity = 'shop_description' and lang = '".$lang."'";
	$td = $db->query($q)->fetch();

  	$q = "SELECT * FROM shop";
	$c = $db->query($q)->fetch();


  	$q = "SELECT * FROM languages";
	$l = $db->query($q)->fetch();
	
	
	
	
	

if($var == 'edit'){

	$id = isset($_GET['id']) ? $_GET['id'] : '';
	$id = $db->escape($id);

 


	if($_SERVER['REQUEST_METHOD'] === 'POST'){
	
	print_r($_POST);
		$sort = isset($_POST['sort']) ? $_POST['sort'] : 0;
		$att 	= isset($_POST['att']) ? $_POST['att'] : 0;
		$deff 	= isset($_POST['deff']) ? $_POST['deff'] : 0;
		$category = isset($_POST['category']) ? $_POST['category'] : 0;
		$price = isset($_POST['price']) ? $_POST['price'] : 0;
		$img = isset($_POST['img']) ? $_POST['img'] : 0;
		
		if($category == 'att'){ $category = 'attack';} else{ $category == 'defence'; }
	
                    
			
          $shop = array(
                'price' => $db->escape($price),
                'category' => $db->escape($category),
                'att' => $db->escape($att),
                'deff' => $db->escape($deff),
                'sort' => $db->escape($sort),
                'img' => $db->escape($img),
            );

		$where = array(
			'id' => $id
		);
		$db->where($where)->update('shop', $shop); 
     
     
     
	
	
	
     	foreach($l as $language){
				
			$planguagetitle = $db->escape($_POST[$language[lang].'_title']);
			$planguagedescription = $db->escape($_POST[$language[lang].'_description']);
			
			//echo "$planguagetitle -> $planguagedescription <br />";
  			$q = "SELECT * FROM translations where activity = 'shop_title' and lang = '".$language['lang']."' and activity_id = '".$id."'";
			$tc = $db->query($q)->fetch();
			if($db->affected_rows == '0'){	
	
		
			$data = array(
                'activity' => 'shop_title',
                'activity_id' => $id,
                'lang' => $language['lang'],
                'content' => $planguagetitle,
            );
         	$insert = $db->insert('translations', $data); 



			}else{
				$data = array(
                'content' => $planguagetitle,
           	 );
			$where = array(
                'activity' => 'shop_title',
				'activity_id' => $id,
				'lang' => $language['lang']
			);
			$db->where($where)->update('translations', $data); 

			
			}
		
			$q = "SELECT * FROM translations where activity = 'shop_description' and lang = '".$language['lang']."' and activity_id = '".$id."'";
			$tc = $db->query($q)->fetch();
			if($db->affected_rows == '0'){	
	
		
			$data = array(
                'activity' => 'shop_description',
                'activity_id' => $id,
                'lang' => $language['lang'],
                'content' => $planguagedescription,
            );
         	$insert = $db->insert('translations', $data); 



			}else{
				$data = array(
                'content' => $planguagedescription,
           	 );
			$where = array(
                'activity' => 'shop_description',
				'activity_id' => $id,
				'lang' => $language['lang']
			);
			$db->where($where)->update('translations', $data); 

			
			}
		



		} 
		
		
     
     
		
		
	}



  	$q = "SELECT * FROM translations where activity = 'shop_title' and activity_id = '".$id."' ";
	$tt = $db->query($q)->fetch();
  	$q = "SELECT * FROM translations where activity = 'shop_description' and activity_id = '".$id."' ";
	$td = $db->query($q)->fetch();

  	$q = "SELECT * FROM shop where id = '".$id."' ";
	$c = $db->query($q)->fetch();


}




if($var == 'new'){



	if($_SERVER['REQUEST_METHOD'] === 'POST'){
	
	print_r($_POST);
		$sort = isset($_POST['sort']) ? $_POST['sort'] : 0;
		$att 	= isset($_POST['att']) ? $_POST['att'] : 0;
		$deff 	= isset($_POST['deff']) ? $_POST['deff'] : 0;
		$category = isset($_POST['category']) ? $_POST['category'] : 0;
		$price = isset($_POST['price']) ? $_POST['price'] : 0;
		$img = isset($_POST['img']) ? $_POST['img'] : 0;
		
		if($category == 'att'){ $category = 'attack';} else{ $category == 'defence'; }
	
                    
			
          $shop = array(
                'price' => $db->escape($price),
                'category' => $db->escape($category),
                'att' => $db->escape($att),
                'deff' => $db->escape($deff),
                'sort' => $db->escape($sort),
                'img' => $db->escape($img),
            );

     
	  $id = $db->insert('shop', $shop); 



	
	
     	foreach($l as $language){
				
			$planguagetitle = $db->escape($_POST[$language[lang].'_title']);
			$planguagedescription = $db->escape($_POST[$language[lang].'_description']);
			

		
			$data = array(
                'activity' => 'shop_title',
                'activity_id' => $id,
                'lang' => $language['lang'],
                'content' => $planguagetitle,
            );
         	$insert = $db->insert('translations', $data); 


		
			$data = array(
                'activity' => 'shop_description',
                'activity_id' => $id,
                'lang' => $language['lang'],
                'content' => $planguagedescription,
            );
         	$insert = $db->insert('translations', $data); 




		} 
		
		
     
     
		
		
	}



}




if($var == 'delete'){


	$id = isset($_GET['id']) ? $_GET['id'] : '';
	$id = $db->escape($id);
	
	
if($_SERVER['REQUEST_METHOD'] === 'POST'){



		$where = array('activity_id' => $id, 'activity' => 'shop_title' );
		$db->delete('translations')->where($where)->execute();
		$where = array('activity_id' => $id, 'activity' => 'shop_description' );
		$db->delete('translations')->where($where)->execute();
		
		
		$where = array('id' => $id );
		$db->delete('shop')->where($where)->execute();
		
		
		
        header("Location: /admin/shop/");
        exit(); 
	
}
	
	


  	$q = "SELECT * FROM translations where activity = 'shop_title' and activity_id = '".$id."' ";
	$tt = $db->query($q)->fetch();


  	$q = "SELECT * FROM shop where id = '".$id."' ";
	$c = $db->query($q)->fetch();


}







