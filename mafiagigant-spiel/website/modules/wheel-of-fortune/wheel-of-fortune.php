<?php

    if(!isset($_SESSION['suid']) or $_SESSION['suid'] == ''){
        header("Location: ".BASE_URL."login/");
        exit(); 
    }

    if(!isset($userdata[0]['authority']) or $userdata[0]['authority'] != 'admin'){ 
    // $noaccess = 0;
    }
 
 
 
$text['nl']['wheel_title'] = "Geluksrad";
$text['nl']['item'] = "Prijs";
$text['nl']['pricewin'] = "Je hebt {price} gewonnen";
$text['nl']['wait'] = 'Je moet nog {timer} wachten voor dat je weer aan het geluksrad kan draaien';
$text['nl']['captcha'] = 'Rad draaien? Klik op het groene vinkje!';

$text['en']['wheel_title'] = "Lucky Wheel";
$text['en']['item'] = "Reward";
$text['en']['pricewin'] = "You've won {price}";
$text['en']['wait'] = "You have to wait {timer} before spinning the lucky wheel again";
$text['en']['captcha'] = "Spin the wheel? Click on the green checkmark!";

$text['de']['wheel_title'] = "Glücksrad";
$text['de']['item'] = "Preis";
$text['de']['pricewin'] = "Du hast {price} gewonnen";
$text['de']['wait'] = "Du musst noch {timer} warten, bevor du das Glücksrad erneut drehen kannst";
$text['de']['captcha'] = "Rad drehen? Klicke auf den Button!";

$text['es']['wheel_title'] = "Ruleta de la Suerte";
$text['es']['item'] = "Premio";
$text['es']['pricewin'] = "Has ganado {price}";
$text['es']['wait'] = "Debes esperar {timer} antes de volver a girar la ruleta de la suerte";
$text['es']['captcha'] = "¿Girar la ruleta? ¡Haz clic en la marca de verificación verde!";

$text['pt']['wheel_title'] = "Roleta da Sorte";
$text['pt']['item'] = "Prêmio";
$text['pt']['pricewin'] = "Você ganhou {price}";
$text['pt']['wait'] = "Você precisa esperar {timer} antes de girar a roleta da sorte novamente";
$text['pt']['captcha'] = "Girar a roleta? Clique na marca de seleção verde!";

$text['fr']['wheel_title'] = "Roue de la Fortune";
$text['fr']['item'] = "Prix";
$text['fr']['pricewin'] = "Vous avez gagné {price}";
$text['fr']['wait'] = "Vous devez attendre {timer} avant de pouvoir faire tourner la roue de la fortune à nouveau";
$text['fr']['captcha'] = "Faire tourner la roue ? Cliquez sur la coche verte !";

$text['cs']['wheel_title'] = "Kolo štěstí";
$text['cs']['item'] = "Cena";
$text['cs']['pricewin'] = "Vyhráli jste {price}";
$text['cs']['wait'] = "Musíte ještě počkat {timer} než můžete znovu točit na kolu štěstí";
$text['cs']['captcha'] = "Točit kolo? Klikněte na zelenou zaškrtávací značku!";




		
$q = "SELECT * FROM timers where activity = 'wheeloffortune' and username = '".$userdata[0]['username']."'";
$timer = $db->query($q)->fetch();
$now = date("Y-m-d H:i:s");
$wait = 0;
if($timer[0]['time'] >= $now){
		$wait = datetotime($timer[0]['time']) - time();
		$count_timer = '<font id="count_timer"></font>';
		$text[$lang]['wait'] = txt($text[$lang]['wait'],'{timer}', $count_timer);
		$errors[] = $text[$lang]['wait'];
}




 $highlightIndex = -1; // Index van de winnende prijs, standaardwaarde is -1

  	$q = "SELECT * FROM translations where activity = 'wheeloffortune' and lang = '".$lang."'";
	$t = $db->query($q)->fetch();
 
 
  	$q = "SELECT * FROM wheeloffortune order by sort asc";
	$wall = $db->query($q)->fetch();
if($_SERVER['REQUEST_METHOD'] === 'POST'){


	if(empty($errors))
	{
	
	
  	$q = "SELECT * FROM wheeloffortune order by rand() limit 1";
	$w = $db->query($q)->fetch();
	
	
$text[$lang]['pricewin'] = "Je hebt {price} gewonnen";


	$startpricewin = txt(gettranslation($w[0]['id'], $t),'{amount}',number($w[0]['value'])); //winning price
	$success[] = txt($text[$lang]['pricewin'],'{price}',$startpricewin); //winning price
	
	
	//$success[] = txt(gettranslation($w[0]['id'], $t),'{amount}',number($w[0]['value'])); //winning price
 
 
 
 
 			if($w[0]['dbfield'] == 'money'){
				$user = array( 'bank' => ($userdata[0]['bank'] + $w[0]['value']) );
				$where = array('id' => $userdata[0]['id']);
				$db->where($where)->update('users', $user); 
			}
			
			
			if($w[0]['dbfield'] == 'breakout'){
				$user = array( 'breakoutpoints' => ($userdata[0]['breakoutpoints'] + $w[0]['value']) );
				$where = array('id' => $userdata[0]['id']);
				$db->where($where)->update('users', $user); 
			}
			
			if($w[0]['dbfield'] == 'garagespots'){
				$user = array( 'garagespots' => ($userdata[0]['garagespots'] + $w[0]['value']) );
				$where = array('id' => $userdata[0]['id']);
				$db->where($where)->update('users', $user); 
			}
			if($w[0]['dbfield'] == 'credits'){
				$user = array( 'credits' => ($userdata[0]['credits'] + $w[0]['value']) );
				$where = array('id' => $userdata[0]['id']);
				$db->where($where)->update('users', $user); 
			}
	
	
	
			$nextcrime = timetodate(time() + 1800);
		//$nextcrime = timetodate(time() + 0);
		$qc = "SELECT * FROM timers where username = '".$userdata[0]['username']."' and activity = 'wheeloffortune'";
		$fchance = $db->query($qc)->fetch();
		if($db->affected_rows == '0')
		{	
			$timers = array(
                'activity' => 'wheeloffortune',
                'username' =>$userdata[0]['username'],
                'time' => $nextcrime,
            );
         	$timers = $db->insert('timers', $timers); 
		}else{
			$timers = array(
                'time' => $nextcrime,
           	 );
			$where = array(
				'activity' => 'wheeloffortune',
				'username' => $userdata[0]['username']
			);
			$db->where($where)->update('timers', $timers); 
		}
	
	
 
        $captcha = true; // Set the captcha variable to true upon successful captcha validation

    $winningItem = gettranslation($w[0]['id'], $t);
    $winningAmount = number($w[0]['value']);

    $i = 1;
    	foreach($wall as $all){
    		if($w[0]['id'] == $all['id']){
    		$winningItemIndex = $i - 1;
				//$success[] = $winningItemIndex;
    		}
    		$i = $i + 1;
    	}

}
}
 
 



  	$q = "SELECT * FROM wheeloffortune order by sort asc";
	$w = $db->query($q)->fetch();
	
	