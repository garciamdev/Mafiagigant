<?php

include('connect.php');


$now = date("Y-m-d H:i:s");


//add bullets to bulletfactory
$qu = "update objects_bulletfactory set amount = amount + addbullets, addbullets = 0 where time < '".$now."' and addbullets > 0 ";
$db->query($qu)->execute() ;

	
	
	
	
	
$qc = "SELECT * FROM work_working where  time < '".$now."' and amount > 0";
$fc = $db->query($qc)->fetch();
if($db->affected_rows  > 0)
{	

foreach($fc as $f){


	$q = "SELECT username,xp,cash,id FROM users where id = '".$f['users_id']."' ";
	$userdata = $db->query($q)->fetch();
			
			
	$what = $f['receive'];
	if($what == 'drugs'){
					
					
			$q = "SELECT * FROM drugs_stock where drugs = '".$f['receive_id']."' and username = '".$userdata[0]['username']."'";
			$tc = $db->query($q)->fetch();
			if($db->affected_rows == '0'){	
	
		
			$drugs = array(
                'drugs' => $f['receive_id'],
                'username' => $userdata[0]['username'],
                'amount' => $f['amount'],
            );
         	$drugs = $db->insert('drugs_stock', $drugs); 



			}else{
				$drugs = array(
                'amount' => ($tc[0]['amount'] + $f['amount']),
           	 );
			$where = array(
                'drugs' => $f['receive_id'],
                'username' => $userdata[0]['username'],
			);
			$db->where($where)->update('drugs_stock', $drugs); 

			
			}
			
			
			$user = array(
                'xp' => ($userdata[0]['xp'] + $f['exp']),
           	 );
			$where = array(
				'id' => $userdata[0]['id']
			);
			$db->where($where)->update('users', $user); 
			
			
	}
				
				if($what == 'money'){
					
			$user = array(
                'cash' => ($userdata[0]['cash'] + $f['amount']),
                'xp' => ($userdata[0]['xp'] + $f['exp']),
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
	