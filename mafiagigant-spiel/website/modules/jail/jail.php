<?php


    if(!isset($_SESSION['suid']) or $_SESSION['suid'] == ''){
        header("Location: ".BASE_URL."login/");
        exit(); 
    }



if($_SERVER['REQUEST_METHOD'] === 'POST'){

			$timers = array(
                'time' => $now,
           	 );
			$where = array(
				'activity' => 'jail',
				'username' => $userdata[0]['username']
			);
			$db->where($where)->update('timers', $timers); 
        header("Location: ".BASE_URL."");
			
}