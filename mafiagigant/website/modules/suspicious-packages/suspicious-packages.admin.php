<?php

    if(!isset($userdata[0]['authority']) or $userdata[0]['authority'] != 'admin'){
        header("Location: /");
        exit(); 
    }

$var = "edit";

          $user = array(
                'username' => $db->escape($user),
            );
           // $user_id = $db->insert('users', $user); 



  	$q = "SELECT * FROM suspiciouspackages";
	$c = $db->query($q)->fetch();
  	$q = "SELECT * FROM countrys";
	$countrys = $db->query($q)->fetch();



if($var == 'edit'){

	$id = isset($_GET['id']) ? $_GET['id'] : '';
	$id = 1;
	$id = $db->escape($id);

 


	if($_SERVER['REQUEST_METHOD'] === 'POST'){
	
	print_r($_POST);
		$money 	= isset($_POST['money']) ? $_POST['money'] : 0;
		$maxmoney 	= isset($_POST['maxmoney']) ? $_POST['maxmoney'] : 0;
		$bullets 	= isset($_POST['bullets']) ? $_POST['bullets'] : '0';
		$maxbullets = isset($_POST['maxbullets']) ? $_POST['maxbullets'] : 0;
		$credits 	= isset($_POST['credits']) ? $_POST['credits'] : '0';
		$maxcredits = isset($_POST['maxcredits']) ? $_POST['maxcredits'] : 0;
		
		$exp = isset($_POST['exp']) ? $_POST['exp'] : 0;
		$maxexp = isset($_POST['maxexp']) ? $_POST['maxexp'] : 0;
		$cooldown = isset($_POST['cooldown']) ? $_POST['cooldown'] : 0;
		$quantity = isset($_POST['quantity']) ? $_POST['quantity'] : 0;
		$country = isset($_POST['country']) ? $_POST['country'] : 0;
		
		
	
                    
			
          $info = array(
                'money' => $db->escape($money),
                'maxmoney' => $db->escape($maxmoney),
                'bullets' => $db->escape($bullets),
                'maxbullets' => $db->escape($maxbullets),
                'credits' => $db->escape($credits),
                'maxcredits' => $db->escape($maxcredits),
                'exp' => $db->escape($exp),
                'maxexp' => $db->escape($maxexp),
                'cooldown' => $db->escape($cooldown),
                'quantity' => $db->escape($quantity),
                'country' => $db->escape($country),
            );

		$where = array(
			'id' => $id
		);
		$db->where($where)->update('suspiciouspackages', $info); 
     
     
     

		
		
     
     
		
		
	}


  	$q = "SELECT * FROM suspiciouspackages where id = '".$id."' ";
	$c = $db->query($q)->fetch();


}




