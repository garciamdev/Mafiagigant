<?php

    if(!isset($userdata[0]['authority']) or $userdata[0]['authority'] != 'admin'){
        header("Location: /");
        exit(); 
    }



          $user = array(
                'username' => $db->escape($user),
            );
           // $user_id = $db->insert('users', $user); 



  	$q = "SELECT * FROM translations where activity = 'crimes' and lang = '".$lang."'";
	$t = $db->query($q)->fetch();

  	$q = "SELECT * FROM crimes";
	$c = $db->query($q)->fetch();


  	$q = "SELECT * FROM languages";
	$l = $db->query($q)->fetch();

if($var == 'new'){


	
	

if($_SERVER['REQUEST_METHOD'] === 'POST'){
	
		$money 	= isset($_POST['money']) ? $_POST['money'] : 0;
		$maxmoney 	= isset($_POST['maxmoney']) ? $_POST['maxmoney'] : 0;
		$bullets 	= isset($_POST['bullets']) ? $_POST['bullets'] : '0';
		$maxbullets = isset($_POST['maxbullets']) ? $_POST['maxbullets'] : 0;
		$exp = isset($_POST['exp']) ? $_POST['exp'] : 0;
		$maxexp = isset($_POST['maxexp']) ? $_POST['maxexp'] : 0;
		$jailchance = isset($_POST['jailchance']) ? $_POST['jailchance'] : 0;
		$jailtime = isset($_POST['jailtime']) ? $_POST['jailtime'] : 0;
		$cooldown = isset($_POST['cooldown']) ? $_POST['cooldown'] : 0;
		$level = isset($_POST['level']) ? $_POST['level']  : 0;
		$sort = isset($_POST['sort']) ? $_POST['sort'] : 0;
		$successmaxperc = isset($_POST['successmaxperc']) ? $_POST['successmaxperc']  : 0;
		$successexpneeded = isset($_POST['successexpneeded']) ? $_POST['successexpneeded'] : 0;
		
          $crime = array(
                'money' => $db->escape($money),
                'maxmoney' => $db->escape($maxmoney),
                'bullets' => $db->escape($bullets),
                'maxbullets' => $db->escape($maxbullets),
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
          $crime = $db->insert('crimes', $crime); 


	foreach($l as $language){
				
				
			$planguage = $db->escape($_POST[$language['lang']]);
			
			$crimel = array(
                'activity' => 'crimes',
                'activity_id' => $crime,
                'lang' => $language['lang'],
                'content' => $planguage,
            );
         	$crimel = $db->insert('translations', $crimel); 



		} 
			
			




} 



}



if($var == 'edit'){

	$id = isset($_GET['id']) ? $_GET['id'] : '';
	$id = $db->escape($id);

 


	if($_SERVER['REQUEST_METHOD'] === 'POST'){
	print_r($_POST);
		$money 	= isset($_POST['money']) ? $_POST['money'] : 0;

		$maxmoney 	= isset($_POST['maxmoney']) ? $_POST['maxmoney'] : 0;
		$bullets 	= isset($_POST['bullets']) ? $_POST['bullets'] : '0';
		$maxbullets = isset($_POST['maxbullets']) ? $_POST['maxbullets'] : 0;
		$exp = isset($_POST['exp']) ? $_POST['exp'] : 0;
		$maxexp = isset($_POST['maxexp']) ? $_POST['maxexp'] : 0;
		$jailchance = isset($_POST['jailchance']) ? $_POST['jailchance'] : 0;
		$jailtime = isset($_POST['jailtime']) ? $_POST['jailtime'] : 0;
		$cooldown = isset($_POST['cooldown']) ? $_POST['cooldown'] : 0;
		$level = isset($_POST['level']) ? $_POST['level']  : 0;
		$sort = isset($_POST['sort']) ? $_POST['sort'] : 0;
		$successmaxperc = isset($_POST['successmaxperc']) ? $_POST['successmaxperc']  : 0;
		$successexpneeded = isset($_POST['successexpneeded']) ? $_POST['successexpneeded'] : 0;
		
	
                    
			
          $crimes = array(
                'money' => $db->escape($money),
                'maxmoney' => $db->escape($maxmoney),
                'bullets' => $db->escape($bullets),
                'maxbullets' => $db->escape($maxbullets),
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
		$db->where($where)->update('crimes', $crimes); 
     
     
     
	
	
	
     	foreach($l as $language){
				
			$planguage = $db->escape($_POST[$language['lang']]);
			
  			$q = "SELECT * FROM translations where activity = 'crimes' and lang = '".$language['lang']."' and activity_id = '".$id."'";
			$tc = $db->query($q)->fetch();
			if($db->affected_rows == '0'){	
	
		
			$crimel = array(
                'activity' => 'crimes',
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
				'activity' => 'crimes',

				'lang' => $language['lang']
			);
			$db->where($where)->update('translations', $crimel); 

			
			}
		
		



		} 
		
		
     
     
		
		
	}



  	$q = "SELECT * FROM translations where activity = 'crimes' and activity_id = '".$id."' ";
	$t = $db->query($q)->fetch();

  	$q = "SELECT * FROM crimes where id = '".$id."' ";
	$c = $db->query($q)->fetch();


}





if($var == 'delete'){


	$id = isset($_GET['id']) ? $_GET['id'] : '';
	$id = $db->escape($id);
	
	
if($_SERVER['REQUEST_METHOD'] === 'POST'){



		$where = array('activity_id' => $id, 'activity' => 'crimes' );
		$db->delete('translations')->where($where)->execute();
		
		
		$where = array('id' => $id );
		$db->delete('crimes')->where($where)->execute();
		
		
		
        header("Location: /admin/crimes/");
        exit(); 
	
}
	
	


  	$q = "SELECT * FROM translations where activity = 'crimes' and activity_id = '".$id."' ";
	$t = $db->query($q)->fetch();

  	$q = "SELECT * FROM crimes where id = '".$id."' ";
	$c = $db->query($q)->fetch();


}




