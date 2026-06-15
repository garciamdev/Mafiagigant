<?php

if($var != 'steal'){
exit();
}
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
	
  	$q = "SELECT * FROM translations where activity = 'countrys' and lang = '".$lang."'";
	$tc = $db->query($q)->fetch();
	
	
	
	
	

if($var == 'steal'){

$q = "SELECT * FROM timers where activity = 'stealcars' and username = '".$userdata[0]['username']."'";
$timer = $db->query($q)->fetch();

$now = date("Y-m-d H:i:s");
$wait = 0;
if($timer[0]['time'] >= $now){
		$wait = datetotime($timer[0]['time']) - time();
		$count_timer = '<font id="count_timer"></font>';
		$text[$lang]['crime_wait'] = txt($text[$lang]['crime_wait'],'{timer}', $count_timer);
		$errors[] = $text[$lang]['crime_wait'];
}

	$qcu = "SELECT count(id) as quantity FROM garage where  username = '".$userdata[0]['username']."' and country = '".$userdata[0]['country']."'";
	$fcu = $db->query($qcu)->fetch();
	$totalcarsincountry = isset($fcu[0]['quantity']) ? $fcu[0]['quantity']  : 0;
		
		$full = 0;
	if($totalcarsincountry >= $userdata[0]['garagespots']){
	$full = 1;
			$errors[] = $text[$lang]['garage_full'];

	}

}






if($_SERVER['REQUEST_METHOD'] === 'POST'){

if($var == 'steal'){
		$id = isset($_POST['stealcars']) ? $_POST['stealcars'] : '0';
		$id = $db->escape($id);
	
	
	if($id == 0){
		$errors[] = $text[$lang]['no_crime_selected'];
	}
	
	if(!is_numeric($id)){
		$errors[] = $text[$lang]['cheating'];
	}
	

  	$qc = "SELECT * FROM stealcars where id = '".$id."' ";
	$fc = $db->query($qc)->fetch();
	if($db->affected_rows != '1')
	{	
		$errors[] = $text[$lang]['crime_doenst_exist'];
	}



	if(empty($errors))
	{
	 	$xp = rand($fc[0]['exp'],$fc[0]['maxexp']);
	 	
		$qc = "SELECT * FROM chances where username = '".$userdata[0]['username']."' and activity = 'stealcars' and activity_id = '".$id."' ";
		$fchance = $db->query($qc)->fetch();
		if($db->affected_rows == '0')
		{	
			$crimec = array(
                'activity' => 'stealcars',
                'activity_id' => $id,
                'username' =>$userdata[0]['username'],
                'xp' => $xp,
            );
         	$crimec = $db->insert('chances', $crimec); 
		}else{
			$crimec = array(
                'xp' => ($fchance[0]['xp'] + $xp),
           	 );
			$where = array(
				'activity' => 'stealcars',
				'activity_id' => $id,
				'username' => $userdata[0]['username']
			);
			$db->where($where)->update('chances', $crimec); 
		
		}






		if($fc[0]['successexpneeded'] > 0) {
			$perc = floor((getactivityxp($fc[0]['id'], $fchance) / $fc[0]['successexpneeded']) * 100);
		}else{
			$perc = 100;
		}
		if($perc < 1){ $perc = 0;}
		if($perc > 100){ $perc = 100;}
		if($perc > $fc[0]['successmaxperc']){
			$perc = $fc[0]['successmaxperc'];
		}
				
		$money = 0;
		$bullets = 0;
		$randchance = rand(0,100);
		
		if($perc >= $randchance){
		
			$demage = rand(0,70);
			
			
			
			$q = "SELECT * FROM cars where stealcars = '".$fc[0]['id']."' order by rand() limit 1";
			$fcar = $db->query($q)->fetch();
			
			
			$receive = $fcar[0]['price'] - (( $fcar[0]['price'] / 100 ) * $demage);
			
			
			$text[$lang]['crime_success'] = txt($text[$lang]['crime_success'],'{car}',gettranslation($fcar[0]['id'],$tcars));
			$success[] = txt($text[$lang]['crime_success'],'{amount}',number($receive));
					
			$success[] = "<img src='".$fcar[0]['img']."'>";
					
		
		
			$car = array(
                'car' => $fcar[0]['id'],
                'demage' => $demage,
                'country' =>$userdata[0]['country'],
                'username' =>$userdata[0]['username'],
            );
         	$carc = $db->insert('garage', $car); 
         	
         	
         	
			
			$user = array(
                'xp' => ($userdata[0]['xp'] + $xp),
           	 );
			$where = array(
				'id' => $userdata[0]['id']
			);
			$db->where($where)->update('users', $user); 
			
			
			
		}else{
		
			
			
			$randchance = rand(0,100);
			if($randchance >= $fc[0]['jailchance']){
		
				$errors[] = $text[$lang]['crime_failed'];
				
				
			$user = array(
                'xp' => ($userdata[0]['xp'] + $xp),
           	 );
			$where = array(
				'id' => $userdata[0]['id']
			);
			$db->where($where)->update('users', $user); 
			
			
			}else{
			
				$errors[] = $text[$lang]['crime_go_to_jail'];
				jail($userdata[0]['username'], $fc[0]['jailtime']);
			}
		
		}
		
		
		
		$nextcrime = timetodate(time() + $fc[0]['cooldown']);

		$qc = "SELECT * FROM timers where username = '".$userdata[0]['username']."' and activity = 'stealcars'";
		$fchance = $db->query($qc)->fetch();
		if($db->affected_rows == '0')
		{	
			$timers = array(
                'activity' => 'stealcars',
                'username' =>$userdata[0]['username'],
                'time' => $nextcrime,
            );
         	$timers = $db->insert('timers', $timers); 
		}else{
			$timers = array(
                'time' => $nextcrime,
           	 );
			$where = array(
				'activity' => 'stealcars',
				'username' => $userdata[0]['username']
			);
			$db->where($where)->update('timers', $timers); 
		}


	}

}









}




 	$q = "SELECT * FROM chances where activity = 'stealcars' and username = '".$userdata[0]['username']."'";
	$chance = $db->query($q)->fetch();
	


  	$q = "SELECT * FROM stealcars";
	$c = $db->query($q)->fetch();
	
	

	
	
	
	

	
	
	
		
	