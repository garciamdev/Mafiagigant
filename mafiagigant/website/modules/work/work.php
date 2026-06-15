<?php

    if(!isset($_SESSION['suid']) or $_SESSION['suid'] == ''){
        header("Location: ".BASE_URL."login/");
        exit(); 
    }

    if(!isset($userdata[0]['authority']) or $userdata[0]['authority'] != 'admin'){ 
     $noaccess = 1;
    }
 
 
 
 //add work
  $now = date("Y-m-d H:i:s");
$qc = "SELECT * FROM work_working where users_id = '".$userdata[0]['id']."' and time < '".$now."' and amount > 0";
$fc = $db->query($qc)->fetch();
if($db->affected_rows  > 0)
{	

	$what = $fc[0]['receive'];
	if($what == 'drugs'){
					
					
			$q = "SELECT * FROM drugs_stock where drugs = '".$fc[0]['receive_id']."' and username = '".$userdata[0]['username']."'";
			$tc = $db->query($q)->fetch();
			if($db->affected_rows == '0'){	
	
		
			$drugs = array(
                'drugs' => $fc[0]['receive_id'],
                'username' => $userdata[0]['username'],
                'amount' => $fc[0]['amount'],
            );
         	$drugs = $db->insert('drugs_stock', $drugs); 



			}else{
				$drugs = array(
                'amount' => ($tc[0]['amount'] + $fc[0]['amount']),
           	 );
			$where = array(
                'drugs' => $fc[0]['receive_id'],
                'username' => $userdata[0]['username'],
			);
			$db->where($where)->update('drugs_stock', $drugs); 

			
			}
			
			
			$user = array(
                'xp' => ($userdata[0]['xp'] + $fc[0]['exp']),
           	 );
			$where = array(
				'id' => $userdata[0]['id']
			);
			$db->where($where)->update('users', $user); 
			
			
	}
				
				if($what == 'money'){
					
			$user = array(
                'cash' => ($userdata[0]['cash'] + $fc[0]['amount']),
                'xp' => ($userdata[0]['xp'] + $fc[0]['exp']),
           	 );
			$where = array(
				'id' => $userdata[0]['id']
			);
			$db->where($where)->update('users', $user); 
			
			
				}
				
					
			$workdone = array(
                'amount' => '0',
                'exp' => '0'
           	 );
			$where = array(
				'users_id' => $userdata[0]['id']
			);
			$db->where($where)->update('work_working', $workdone); 
			
				
			

	
}
	

	
	

  	$q = "SELECT * FROM translations where activity = 'drugs' and lang = '".$lang."'";
	$td = $db->query($q)->fetch();
  	$q = "SELECT * FROM translations where activity = 'countrys' and lang = '".$lang."'";
	$tc = $db->query($q)->fetch();

$text['nl']['page_title'] = 'Werken voor de maffia';
$text['nl']['table_crimes'] = 'Werk';
$text['nl']['table_cooldown'] = 'Tijd';
$text['nl']['table_resting'] = 'Rusttijd';
$text['nl']['table_earnings'] = 'Verdiensten';

$text['nl']['table_chance'] = 'Kans';
$text['nl']['table_everywhere'] = 'overal te plegen';
$text['nl']['table_incountry'] = 'Alleen in {country}';
$text['nl']['captcha'] = 'Beginnen met werken? Klik op het groene vinkje!!';
	$text['nl']['crime_wait'] = 'Je bent nog {timer} aan het werk, hierna moet je nog uitrusten!';
	$text['nl']['crime_wait_resting'] = 'Je moet nog {timer} wachten voor dat je weer aan het werk kan gaan!';
	$text['nl']['no_crime_selected'] = 'Geen werk geselecteerd';
	$text['nl']['cheating'] = 'Probeer je de boel op te lichten?';
	$text['nl']['crime_doenst_exist'] = 'U probeert werk uit te voeren wat niet bestaat!';
	$text['nl']['crime_success_money'] = 'Je begint met werken. Over {cooldown} ontvang je € {amount}.';
	$text['nl']['crime_success_drugs'] = 'Je begint met werken. Over {cooldown} ontvang je {amount} {drugs}';
		$text['nl']['crime_failed'] = 'Helaas is het werken mislukt!';
			$text['nl']['crime_go_to_jail'] = 'Je bent gepakt door de politie! Je gaat naar de gevangenis!';
$text['nl']['only_incountry'] = 'Deze overval kan je alleen plegen in {country}';



$q = "SELECT * FROM timers where activity = 'work' and username = '".$userdata[0]['username']."'";
$timer = $db->query($q)->fetch();
$currentlyworking = 0;
$now = date("Y-m-d H:i:s");
$wait = 0;
if($timer[0]['time'] >= $now){


	$qc = "SELECT * FROM work_working where users_id = '".$userdata[0]['id']."'  and amount > 0";
	$working = $db->query($qc)->fetch();
	if($working[0]['time'] >= $now){
	
	$currentlyworking = 1;
		$wait = datetotime($working[0]['time']) - time();
		$count_timer = '<font id="count_timer"></font>';
		$text[$lang]['crime_wait'] = txt($text[$lang]['crime_wait'],'{timer}', $count_timer);
		$errors[] = $text[$lang]['crime_wait'];
		
	
	}else{
	
		$wait = datetotime($timer[0]['time']) - time();
		$count_timer = '<font id="count_timer"></font>';
		$text[$lang]['crime_wait_resting'] = txt($text[$lang]['crime_wait_resting'],'{timer}', $count_timer);
		$errors[] = $text[$lang]['crime_wait_resting'];
	
	}

}


if($_SERVER['REQUEST_METHOD'] === 'POST'){

	$id = isset($_POST['work']) ? $_POST['work'] : '0';
	$id = $db->escape($id);
	
	
	if($id == 0){
		$errors[] = $text[$lang]['no_crime_selected'];
	}
	
	if(!is_numeric($id)){
		$errors[] = $text[$lang]['cheating'];
	}
	

  	$qc = "SELECT * FROM work where id = '".$id."' ";
	$fc = $db->query($qc)->fetch();
	if($db->affected_rows != '1')
	{	
		$errors[] = $text[$lang]['crime_doenst_exist'];
	}


	if($fc[0]['country'] != 0){
		if($userdata[0]['country'] != $fc[0]['country']){
			$errors[] = txt($text[$lang]['only_incountry'],"{country}",getcountry($fc[0]['country'],$tc));
		}
	}

	if(empty($errors))
	{
	 	$xp = rand($fc[0]['exp'],$fc[0]['maxexp']);
	 	$health = rand($fc[0]['minhealth'],$fc[0]['maxhealth']);
	 	
	

		$money = 0;
		$bullets = 0;
		$randchance = rand(0,100);
		
			$receive = rand($fc[0]['minreceive'],$fc[0]['minreceive']);
			$what = $fc[0]['receive'];
			
	
				if($what == 'drugs'){
					$text[$lang]['crime_success_drugs'] = txt($text[$lang]['crime_success_drugs'],'{cooldown}',showcooldown($fc[0]['cooldown']));
					$text[$lang]['crime_success_drugs'] = txt($text[$lang]['crime_success_drugs'],'{drugs}',gettranslation($fc[0]['receive_id'],$td));
					$success[] = txt($text[$lang]['crime_success_drugs'],'{amount}',number($receive));
		
				}else{
					$text[$lang]['crime_success_money'] = txt($text[$lang]['crime_success_money'],'{cooldown}',showcooldown($fc[0]['cooldown']));
					$success[] = txt($text[$lang]['crime_success_money'],'{amount}',number($receive));
			
				}
			
	
	
	
		
		
		
		$nextcrime = timetodate(time() + $fc[0]['resting']);
		$qc = "SELECT * FROM timers where username = '".$userdata[0]['username']."' and activity = 'work'";
		$fchance = $db->query($qc)->fetch();
		if($db->affected_rows == '0')
		{	
			$timers = array(
                'activity' => 'work',
                'username' =>$userdata[0]['username'],
                'time' => $nextcrime,
            );
         	$timers = $db->insert('timers', $timers); 
		}else{
			$timers = array(
                'time' => $nextcrime,
           	 );
			$where = array(
				'activity' => 'work',
				'username' => $userdata[0]['username']
			);
			$db->where($where)->update('timers', $timers); 
		}
		
		
		
		$nextcrime = timetodate(time() +  $fc[0]['cooldown']);
		$qc = "SELECT * FROM work_working where users_id = '".$userdata[0]['id']."' ";
		$fchance = $db->query($qc)->fetch();
		if($db->affected_rows == '0')
		{	
			$timers = array(
                'users_id' => $userdata[0]['id'],
                'receive' => $fc[0]['receive'],
                'receive_id' => $fc[0]['receive_id'],
                'amount' => $fc[0]['minreceive'],
                'exp' => $xp,
                'time' => $nextcrime,
            );
         	$timers = $db->insert('work_working', $timers); 
		}else{
			$timers = array(
                'receive' => $fc[0]['receive'],
                'receive_id' => $fc[0]['receive_id'],
                'amount' => $fc[0]['minreceive'],
                'exp' => $xp,
                'time' => $nextcrime,
           	 );
			$where = array(
				'users_id' => $userdata[0]['id'],
			);
			$db->where($where)->update('work_working', $timers); 
		}
	
	



	}



}


 	$q = "SELECT * FROM translations where activity = 'work' and lang = '".$lang."'";
	$t = $db->query($q)->fetch();


  	$q = "SELECT * FROM work";
	$c = $db->query($q)->fetch();
	
	
	
	