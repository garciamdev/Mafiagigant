<?php


    if(!isset($_SESSION['suid']) or $_SESSION['suid'] == ''){
        header("Location: ".BASE_URL."login/");
        exit(); 
    }

    if(!isset($userdata[0]['authority']) or $userdata[0]['authority'] != 'admin'){
        //header("Location: /");
        //exit(); 
    }
    
$text['en']['airport_title'] = "Airport";
$text['en']['current_country'] = "President of";
$text['en']['choose_destination'] = "Choose a destination";
$text['en']['ticket_price'] = "Ticket price";
$text['en']['residents'] = "Residents";
$text['en']['president'] = "President";
$text['en']['hide_destination'] = "Hide my destination for 24 hours (costs € 100.000 in cash)";
$text['en']['fly'] = "Fly";
$text['en']['no_country_selected'] = "You have to select a country!";
$text['en']['cheating'] = "Trying to cheat?";
$text['en']['country_doenst_exist'] = "This country doesnt exist!";
$text['en']['fly_success'] = "You are flying to your new destination!";
$text['en']['flying_wait'] = "You have to wait {timer} before your flight lands!";
$text['en']['fly_wait'] = "You have to wait {timer} before you can take a flight!";
$text['en']['not_enough_cash'] = "You need € {amount} cash!";

$text['nl']['airport_title'] = "Luchthaven";
$text['nl']['current_country'] = "President van";
$text['nl']['choose_destination'] = "Kies een bestemming";
$text['nl']['ticket_price'] = "Ticketprijs";
$text['nl']['residents'] = "Inwoners";
$text['nl']['president'] = "President";
$text['nl']['hide_destination'] = "Verberg mijn bestemming voor 24 uur (kost € 100.000 contant)";
$text['nl']['fly'] = "Vliegen";
$text['nl']['no_country_selected'] = "Je moet een land selecteren!";
$text['nl']['cheating'] = "Probeer je te bedriegen?";
$text['nl']['country_doenst_exist'] = "Dit land bestaat niet!";
$text['nl']['fly_success'] = "Je vliegt naar je nieuwe bestemming!";
$text['nl']['flying_wait'] = "Je moet {timer} wachten voordat je vlucht landt!";
$text['nl']['fly_wait'] = "Je moet {timer} wachten voordat je een vlucht kunt nemen!";
$text['nl']['not_enough_cash'] = "Je hebt € {amount} contant nodig!";

$text['de']['airport_title'] = "Flughafen";
$text['de']['current_country'] = "Präsident von";
$text['de']['choose_destination'] = "Wähle ein Reiseziel";
$text['de']['ticket_price'] = "Ticketpreis";
$text['de']['residents'] = "Einwohner";
$text['de']['president'] = "Präsident";
$text['de']['hide_destination'] = "Mein Reiseziel für 24 Stunden verbergen (kostet € 100.000 in bar)";
$text['de']['fly'] = "Fliegen";
$text['de']['no_country_selected'] = "Du musst ein Land auswählen!";
$text['de']['cheating'] = "Versuchst du zu schummeln?";
$text['de']['country_doenst_exist'] = "Dieses Land existiert nicht!";
$text['de']['fly_success'] = "Du fliegst zu deinem neuen Reiseziel!";
$text['de']['flying_wait'] = "Du musst {timer} warten, bevor dein Flug landet!";
$text['de']['fly_wait'] = "Du musst {timer} warten, bevor du einen Flug nehmen kannst!";
$text['de']['not_enough_cash'] = "Du benötigst € {amount} in bar!";


$text['es']['airport_title'] = "Aeropuerto";
$text['es']['current_country'] = "Presidente de";
$text['es']['choose_destination'] = "Elige un destino";
$text['es']['ticket_price'] = "Precio del billete";
$text['es']['residents'] = "Residentes";
$text['es']['president'] = "Presidente";
$text['es']['hide_destination'] = "Ocultar mi destino durante 24 horas (costo € 100,000 en efectivo)";
$text['es']['fly'] = "Volar";
$text['es']['no_country_selected'] = "¡Debes seleccionar un país!";
$text['es']['cheating'] = "¿Intentando hacer trampa?";
$text['es']['country_doenst_exist'] = "Este país no existe!";
$text['es']['fly_success'] = "Estás volando a tu nuevo destino!";
$text['es']['flying_wait'] = "Debes esperar {timer} antes de que tu vuelo aterrice!";
$text['es']['fly_wait'] = "Debes esperar {timer} antes de poder tomar un vuelo!";
$text['es']['not_enough_cash'] = "Necesitas € {amount} en efectivo!";

$text['pt']['airport_title'] = "Aeroporto";
$text['pt']['current_country'] = "Presidente de";
$text['pt']['choose_destination'] = "Escolha um destino";
$text['pt']['ticket_price'] = "Preço do bilhete";
$text['pt']['residents'] = "Residentes";
$text['pt']['president'] = "Presidente";
$text['pt']['hide_destination'] = "Ocultar meu destino por 24 horas (custa € 100.000 em dinheiro)";
$text['pt']['fly'] = "Voar";
$text['pt']['no_country_selected'] = "Você precisa selecionar um país!";
$text['pt']['cheating'] = "Tentando trapacear?";
$text['pt']['country_doenst_exist'] = "Este país não existe!";
$text['pt']['fly_success'] = "Você está voando para o seu novo destino!";
$text['pt']['flying_wait'] = "Você precisa esperar {timer} antes de seu voo pousar!";
$text['pt']['fly_wait'] = "Você precisa esperar {timer} antes de poder pegar um voo!";
$text['pt']['not_enough_cash'] = "Você precisa de € {amount} em dinheiro!";


$text['fr']['airport_title'] = "Aéroport";
$text['fr']['current_country'] = "Président de";
$text['fr']['choose_destination'] = "Choisissez une destination";
$text['fr']['ticket_price'] = "Prix du billet";
$text['fr']['residents'] = "Résidents";
$text['fr']['president'] = "Président";
$text['fr']['hide_destination'] = "Cacher ma destination pendant 24 heures (coûte € 100 000 en espèces)";
$text['fr']['fly'] = "Vol";
$text['fr']['no_country_selected'] = "Vous devez sélectionner un pays!";
$text['fr']['cheating'] = "Essaie-tu de tricher?";
$text['fr']['country_doenst_exist'] = "Ce pays n'existe pas!";
$text['fr']['fly_success'] = "Vous volez vers votre nouvelle destination!";
$text['fr']['flying_wait'] = "Vous devez attendre {timer} avant que votre vol atterrisse!";
$text['fr']['fly_wait'] = "Vous devez attendre {timer} avant de pouvoir prendre un vol!";
$text['fr']['not_enough_cash'] = "Vous avez besoin de € {amount} en espèces!";

$text['cs']['airport_title'] = "Letiště";
$text['cs']['current_country'] = "Prezidentem";
$text['cs']['choose_destination'] = "Vyberte si destinaci";
$text['cs']['ticket_price'] = "Cena letenky";
$text['cs']['residents'] = "Obyvatelé";
$text['cs']['president'] = "Prezident";
$text['cs']['hide_destination'] = "Skrýt mou destinaci na 24 hodin (stojí € 100 000 v hotovosti)";
$text['cs']['fly'] = "Letět";
$text['cs']['no_country_selected'] = "Musíte vybrat zemi!";
$text['cs']['cheating'] = "Snažíš se podvádět?";
$text['cs']['country_doenst_exist'] = "Tato země neexistuje!";
$text['cs']['fly_success'] = "Letíte na své nové místo určení!";
$text['cs']['flying_wait'] = "Musíte počkat {timer} než přistane váš let!";
$text['cs']['fly_wait'] = "Musíte počkat {timer} než můžete nastoupit na let!";
$text['cs']['not_enough_cash'] = "Potřebujete € {amount} hotově!";



$q = "SELECT * FROM timers where activity = 'flying' and username = '".$userdata[0]['username']."'";
$timer = $db->query($q)->fetch();

$now = date("Y-m-d H:i:s");
$waitfly = 0;
if($timer[0]['time'] >= $now){
		$waitfly = datetotime($timer[0]['time']) - time();
		$count_timer = '<font id="count_timer"></font>';
		$text[$lang]['flying_wait'] = txt($text[$lang]['flying_wait'],'{timer}', $count_timer);
		$flying = $text[$lang]['flying_wait'];
}


$q = "SELECT * FROM timers where activity = 'fly' and username = '".$userdata[0]['username']."'";
$timer = $db->query($q)->fetch();
$now = date("Y-m-d H:i:s");
$wait = 0;
if($timer[0]['time'] >= $now){
		$wait = datetotime($timer[0]['time']) - time();
		$count_timer = '<font id="count_timer"></font>';
		$text[$lang]['fly_wait'] = txt($text[$lang]['fly_wait'],'{timer}', $count_timer);
		$errors[] = $text[$lang]['fly_wait'];
}


    
    
if($_SERVER['REQUEST_METHOD'] === 'POST'){

	$id = isset($_POST['fly']) ? $_POST['fly'] : '0';
	$id = $db->escape($id);
	 
	$hide = isset($_POST['hide']) ? $_POST['hide'] : '0';
	if($hide != 1){ $hide = 0;  $price = 0;}else{ $hide = 1; $price = 100000;}
	
		$hide = isset($_POST['hide']) ? $_POST['hide'] : '0';
	if($hide != 1){ $hide = 0;  $price = 0;}else{ $hide = 1; $price = 100000;}
	

	if($id == 0){
		$errors[] = $text[$lang]['no_country_selected'];
	}
	
	if(!is_numeric($id)){
		$errors[] = $text[$lang]['cheating'];
	}
	

  	$qc = "SELECT * FROM countrys where id = '".$id."' ";
	$fc = $db->query($qc)->fetch();
	if($db->affected_rows != '1')
	{	
		$errors[] = $text[$lang]['country_doenst_exist'];
	}
	
	if($userdata[0]['cash'] < ($fc[0]['price'] + $price)){
			
			$errors[] = txt($text[$lang]['not_enough_cash'],'{amount}',number($fc[0]['price']));
	}
	
	
	if(empty($errors))
	{
	
	

		$nextflying = timetodate(time() + $fc[0]['cooldown']);
		$qc = "SELECT * FROM timers where username = '".$userdata[0]['username']."' and activity = 'flying'";
		$fchance = $db->query($qc)->fetch();
		if($db->affected_rows == '0')
		{	
			$timers = array(
                'activity' => 'flying',
                'username' =>$userdata[0]['username'],
                'time' => $nextflying,
            );
         	$timers = $db->insert('timers', $timers); 
		}else{
			$timers = array(
                'time' => $nextflying,
           	 );
			$where = array(
				'activity' => 'flying',
				'username' => $userdata[0]['username']
			);
			$db->where($where)->update('timers', $timers); 
		}





		$nextfly = timetodate(time() + 600);
		$qc = "SELECT * FROM timers where username = '".$userdata[0]['username']."' and activity = 'fly'";
		$fchance = $db->query($qc)->fetch();
		if($db->affected_rows == '0')
		{	
			$timers = array(
                'activity' => 'fly',
                'username' =>$userdata[0]['username'],
                'time' => $nextflying,
            );
         	$timers = $db->insert('timers', $timers); 
		}else{
			$timers = array(
                'time' => $nextfly,
           	 );
			$where = array(
				'activity' => 'fly',
				'username' => $userdata[0]['username']
			);
			$db->where($where)->update('timers', $timers); 
		}







	if($hide == 1){
		$hidetime = timetodate(time() + 86400);
	}else{
		$hidetime = timetodate(time() - 1);
	}
		
			$user = array(
                'country' => $id,
                'country_hide' => $hidetime,
                'cash' => ($userdata[0]['cash'] - ($fc[0]['price'] + $price)),
           	 );
			$where = array(
				'id' => $userdata[0]['id']
			);
			$db->where($where)->update('users', $user); 
		//$success[] = "perc = ".$perc." > rand ".$randchance." >>".$fc[0]['successexpneeded'];
		
		
		//$success[] = $text[$lang]['crime_success'];
		
			$success[] = txt($text[$lang]['fly_success'],'{cooldown}',$fc[0]['cooldown']);
	
	}


}
    
 	$q = "SELECT * FROM translations where activity = 'countrys' and lang = '".$lang."'";
	$t = $db->query($q)->fetch();



  	$q = "SELECT * FROM objects where object = 'president'  ";
	$o = $db->query($q)->fetch();
	
	
  	$q = "SELECT * FROM countrys";
	$c = $db->query($q)->fetch();
	
	
				$owner = getobjectowner($userdata[0]['country'], $o);
				$currentcountry = getcountry($userdata[0]['country']);
				


						function getredidents($id){
						global $db;
							
  						$q = "SELECT * FROM users where country = '".$id."'  ";
						$o = $db->query($q)->fetch();
						$return = $db->affected_rows;
						$return = isset($return) ? $return : 0;
						return $return;
						}
						
	    						