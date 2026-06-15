<?php

    if(!isset($_SESSION['suid']) or $_SESSION['suid'] == ''){
        header("Location: ".BASE_URL."login/");
        exit(); 
    }
    
    
    	$text['nl']['boxing_wait'] = 'Je moet nog {timer} wachten voor dat je weer hoger - lager kan spelen!';



  
    $q = "SELECT * FROM timers where activity = 'higherlower' and username = '".$userdata[0]['username']."'";
$timer = $db->query($q)->fetch();

$now = date("Y-m-d H:i:s");
$wait = 0;
if($timer[0]['time'] >= $now){
		$wait = datetotime($timer[0]['time']) - time();
		$count_timer = '<font id="count_timer"></font>';
		$text[$lang]['higherlower'] = txt($text[$lang]['higherlower'],'{timer}', $count_timer);
		$errors[] = $text[$lang]['higherlower'];
}




if(!isset($_SESSION['hlround'])){
	$_SESSION['hlround'] = 1;
	$_SESSION['hlold'] = rand(1,100);
}

$hlround = $_SESSION['hlround']; 
$hlroundmin = $hlround - 1;
$price = [1600, 3200, 6400, 10000, 14400, 19600, 26600, 32400, 40000, 48400, 57600, 67600, 78400, 100000];



$hlgetal = rand(1,100);

if($hlgetal == $_SESSION['hlold']) {
	$hlgetal = rand(1,100);
}

if(isset($_POST['hi']) OR isset($_POST['lo'])){

$errors[] = "old".$_SESSION['hlold']." > hlgetal".$hlgetal ."round >".$_SESSION['hlround']." > price> ".$price[$hlroundmin];

	if(isset($_POST['hi'])){
		if($hlgetal > $_SESSION['hlold']  AND $_SESSION['hlround'] < 16) {
			if($hlround == 15){
				//$connection->query("$hlacties[$hlronde]");
				
				$success[] = "ronde 15 gelukt!";
				$error = "laatsteronde";
				unset($_SESSION['hlround']);
				$keuze = "hoger";
			}
			else {
				$_SESSION['hlround'] = $_SESSION['hlround'] + 1;
				$_SESSION['hlold'] = $hlgetal;
				$success[] = "gelukt!";
				
			}
		}
		else {
		
		//add price
		$error = "failed";
		unset($_SESSION['hlround']);
		$keuze = "hoger";
		
$errors[] = "mislukt!";

		}
	
	}
	if(isset($_POST['lo'])){
		if($hlgetal < $_SESSION['hlold'] AND $_SESSION['hlround'] < 16) {
			if($hlround == 15){	
						$success[] = "ronde 15 gelukt!";

				$error = "laatsteronde";
				unset($_SESSION['hlround']);
				$keuze = "lager";
			}
			else {
				$_SESSION['hlround'] = $_SESSION['hlround'] + 1;
				$_SESSION['hlold'] = $hlgetal;
				$success[] = "gelukt!";
			}
		}
		else {
		$error = "failed";
		unset($_SESSION['hlround']);
		$keuze = "lager";	
$errors[] = "mislukt!";	
		}	
	}
}


