<?php

    if(!isset($userdata[0]['authority']) or $userdata[0]['authority'] != 'admin'){
        header("Location: /");
        exit(); 
    }


  	$q = "SELECT * FROM translations where activity = 'work' and lang = '".$lang."'";
	$t = $db->query($q)->fetch();
  	$q = "SELECT * FROM translations where activity = 'drugs' and lang = '".$lang."'";
	$td = $db->query($q)->fetch();

  	$q = "SELECT * FROM work";
	$c = $db->query($q)->fetch();
  	$q = "SELECT * FROM drugs";
	$d = $db->query($q)->fetch();
	
  	$q = "SELECT * FROM countrys";
	$countrys = $db->query($q)->fetch();


  	$q = "SELECT * FROM languages";
	$l = $db->query($q)->fetch();
	


if($var == 'new'){

if($_SERVER['REQUEST_METHOD'] === 'POST'){

		$receive 	= isset($_POST['receive']) ? $_POST['receive'] : 'money';
		$receive = explode("_", $receive);
		$receive_id = $receive[1];
		$receive = $receive[0];
		
		
		$minreceive 	= isset($_POST['minreceive']) ? $_POST['minreceive'] : 0;
		$maxreceive 	= isset($_POST['minreceive']) ? $_POST['minreceive'] : 0;
		
		$minhealth 	= isset($_POST['minhealth']) ? $_POST['minhealth'] : '0';
		$maxhealth 	= isset($_POST['maxhealth']) ? $_POST['maxhealth'] : '0';
		$exp = isset($_POST['exp']) ? $_POST['exp'] : 0;
		$maxexp = isset($_POST['maxexp']) ? $_POST['maxexp'] : 0;
		$jailchance = 0;
		$jailtime = 0;
		$cooldown = isset($_POST['cooldown']) ? $_POST['cooldown'] : 0;
		$resting = isset($_POST['resting']) ? $_POST['resting'] : 0;
		$level = isset($_POST['level']) ? $_POST['level']  : 0;
		$country = isset($_POST['country']) ? $_POST['country']  : 0;
		$sort = isset($_POST['sort']) ? $_POST['sort'] : 0;
		$successmaxperc = 100;
		$successexpneeded = 0;
		 
		 
          $crime = array(
                'receive' => $db->escape($receive),
                'receive_id' => $db->escape($receive_id),
                'minreceive' => $db->escape($minreceive),
                'maxreceive' => $db->escape($maxreceive),
                
                'minhealth' => $db->escape($minhealth),
                'maxhealth' => $db->escape($maxhealth),
                'exp' => $db->escape($exp),
                'maxexp' => $db->escape($maxexp),
                'jailchance' => $db->escape($jailchance),
                'jailtime' => $db->escape($jailtime),
                'cooldown' => $db->escape($cooldown),
                'resting' => $db->escape($resting),
                'level' => $db->escape($level),
                'sort' => $db->escape($sort),
                'country' => $db->escape($country),
                'successmaxperc' => $db->escape($successmaxperc),
                'successexpneeded' => $db->escape($successexpneeded),
            );


          $crime = $db->insert('work', $crime); 


          
          

	

	foreach($l as $language){
				
				
			$planguage = $db->escape($_POST[$language['lang']]);
			
			$countrysl = array(
                'activity' => 'work',
                'activity_id' => $crime,
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
	
	
		$receive 	= isset($_POST['receive']) ? $_POST['receive'] : 'money';
		$receive = explode("_", $receive);
		$receive_id = $receive[1];
		$receive = $receive[0];
		
		
		$minreceive 	= isset($_POST['minreceive']) ? $_POST['minreceive'] : 0;
		$maxreceive 	= isset($_POST['minreceive']) ? $_POST['minreceive'] : 0;
		
		$minhealth 	= isset($_POST['minhealth']) ? $_POST['minhealth'] : '0';
		$maxhealth 	= isset($_POST['maxhealth']) ? $_POST['maxhealth'] : '0';
		$exp = isset($_POST['exp']) ? $_POST['exp'] : 0;
		$maxexp = isset($_POST['maxexp']) ? $_POST['maxexp'] : 0;
		$jailchance = 0;
		$jailtime = 0;
		$cooldown = isset($_POST['cooldown']) ? $_POST['cooldown'] : 0;
		$resting = isset($_POST['resting']) ? $_POST['resting'] : 0;
		$level = isset($_POST['level']) ? $_POST['level']  : 0;
		$country = isset($_POST['country']) ? $_POST['country']  : 0;
		$sort = isset($_POST['sort']) ? $_POST['sort'] : 0;
		$successmaxperc = 100;
		$successexpneeded = 0;
		 
          $update = array(
                'receive' => $db->escape($receive),
                'receive_id' => $db->escape($receive_id),
                'minreceive' => $db->escape($minreceive),
                'maxreceive' => $db->escape($maxreceive),
                
                'minhealth' => $db->escape($minhealth),
                'maxhealth' => $db->escape($maxhealth),
                'exp' => $db->escape($exp),
                'maxexp' => $db->escape($maxexp),
                'jailchance' => $db->escape($jailchance),
                'jailtime' => $db->escape($jailtime),
                'cooldown' => $db->escape($cooldown),
                'resting' => $db->escape($resting),
                'level' => $db->escape($level),
                'sort' => $db->escape($sort),
                'country' => $db->escape($country),
                'successmaxperc' => $db->escape($successmaxperc),
                'successexpneeded' => $db->escape($successexpneeded),
            );


       
		$where = array(
			'id' => $id
		);
		$db->where($where)->update('work', $update); 
     
     
     
	
	
	
     	foreach($l as $language){
				
			$planguage = $db->escape($_POST[$language['lang']]);
			
  			$q = "SELECT * FROM translations where activity = 'work' and lang = '".$language['lang']."' and activity_id = '".$id."'";
			$tc = $db->query($q)->fetch();
			if($db->affected_rows == '0'){	
	
		
			$crimel = array(
                'activity' => 'work',
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
                'activity' => 'work',
				'lang' => $language['lang']
			);
			$db->where($where)->update('translations', $crimel); 

			
			}
		
		



		} 
		
		
     
     
		
		
	}



  	$q = "SELECT * FROM translations where activity = 'work' and activity_id = '".$id."' ";
	$t = $db->query($q)->fetch();

  	$q = "SELECT * FROM work where id = '".$id."' ";
	$c = $db->query($q)->fetch();


}





if($var == 'delete'){


	$id = isset($_GET['id']) ? $_GET['id'] : '';
	$id = $db->escape($id);
	
	
if($_SERVER['REQUEST_METHOD'] === 'POST'){



		$where = array('activity_id' => $id, 'activity' => 'work' );
		$db->delete('translations')->where($where)->execute();
		
		
		$where = array('id' => $id );
		$db->delete('work')->where($where)->execute();
		
		
        header("Location: /admin/work/");
        exit(); 
	
}
	
	


  	$q = "SELECT * FROM translations where activity = 'work' and activity_id = '".$id."' ";
	$t = $db->query($q)->fetch();

  	$q = "SELECT * FROM work where id = '".$id."' ";
	$c = $db->query($q)->fetch();


}


