<?php



    if(!isset($_SESSION['suid']) or $_SESSION['suid'] == ''){
        header("Location: ".BASE_URL."login/");
        exit(); 
    }

    if(!isset($userdata[0]['authority']) or $userdata[0]['authority'] != 'admin'){
       // header("Location: /");
       // exit(); 
    }
    
    

$text['nl']['redlight_title'] = 'Red-light district';
$text['nl']['search_instructions'] = 'Eens in de 10 minuten kun je zoeken naar nieuwe prostituees.';
$text['nl']['prostitutes_on_street'] = 'Aantal prostituees op straat';
$text['nl']['prostitutes_in_brothels'] = 'Aantal prostituees in bordelen';
$text['nl']['look_for_prostitutes'] = 'Op zoek naar prostituees? Klik op het groene vinkje';
$text['nl']['earnings_info'] = 'Elke prostituee in een bordeel levert je € 40 per uur op. Maar de huur voor de kamer is € 20 per uur. Prostituees op straat leveren je € 15 per uur op.';
$text['nl']['prostitutes_on_street'] = 'Aantal prostituees op straat';
$text['nl']['prostitutes_in_brothels'] = 'Aantal prostituees in bordelen';
$text['nl']['put_into_brothel'] = 'In het bordeel plaatsen';
$text['nl']['move'] = 'Verplaatsen';
$text['nl']['put_back_on_streets'] = 'Terug op straat plaatsen';
$text['nl']['redlight_description'] = 'De Wallen is de perfecte plek om geld te verdienen. Hier kun je proberen prostituees te overtuigen om voor jou te werken.';
$text['nl']['search_for_prostitutes'] = 'Zoek naar prostituees';
$text['nl']['employ_prostitutes'] = 'Prostituees in een bordeel in dienst nemen';
$text['nl']['put_hookers_back_on_streets'] = 'Prostituees terug op straat zetten';
$text['nl']['redlight_success'] = 'Je hebt {amount} hoeren van de straat geplukt!';
$text['nl']['redlight_wait'] = 'Je moet nog {timer} wachten voor dat je weer hoeren kan zoeken!';
$text['nl']['redlight_toomany'] = 'Je hebt geen {amount} hoeren beschikbaar!';
$text['nl']['redlight_moved'] = 'Je hebt {amount} hoeren verplaatst!';
$text['nl']['cheating'] = 'Probeer je de boel op te lichten?';

$text['en']['redlight_title'] = 'Red-light district';
$text['en']['search_instructions'] = 'You can search for new prostitutes every 10 minutes.';
$text['en']['prostitutes_on_street'] = 'Number of prostitutes on the street';
$text['en']['prostitutes_in_brothels'] = 'Number of prostitutes in brothels';
$text['en']['look_for_prostitutes'] = 'Looking for prostitutes? Click the green checkmark';
$text['en']['earnings_info'] = 'Each prostitute in a brothel earns you €40 per hour, but the room rent is €20 per hour. Prostitutes on the street earn you €15 per hour.';
$text['en']['put_into_brothel'] = 'Place in the brothel';
$text['en']['move'] = 'Move';
$text['en']['put_back_on_streets'] = 'Put back on the streets';
$text['en']['redlight_description'] = 'The Red-light district is the perfect place to earn money. Here, you can try to convince prostitutes to work for you.';
$text['en']['search_for_prostitutes'] = 'Search for prostitutes';
$text['en']['employ_prostitutes'] = 'Hire prostitutes in a brothel';
$text['en']['put_hookers_back_on_streets'] = 'Put prostitutes back on the streets';
$text['en']['redlight_success'] = 'You have picked up {amount} hookers from the street!';
$text['en']['redlight_wait'] = 'You have to wait {timer} before you can search for hookers again!';
$text['en']['redlight_toomany'] = "You don't have {amount} hookers available!";
$text['en']['redlight_moved'] = 'You have moved {amount} hookers!';
$text['en']['cheating'] = 'Are you trying to cheat?';



$text['de']['redlight_title'] = 'Rotlichtviertel';
$text['de']['search_instructions'] = 'Alle 10 Minuten kannst du nach neuen Prostituierten suchen.';
$text['de']['prostitutes_on_street'] = 'Anzahl der Prostituierten auf der Straße';
$text['de']['prostitutes_in_brothels'] = 'Anzahl der Prostituierten in Bordellen';
$text['de']['look_for_prostitutes'] = 'Auf der Suche nach Prostituierten? Klicke auf den Button';
$text['de']['earnings_info'] = 'Jede Prostituierte im Bordell bringt dir €40 pro Stunde, aber die Zimmermiete beträgt €20 pro Stunde. Prostituierte auf der Straße bringen dir €15 pro Stunde ein.';
$text['de']['put_into_brothel'] = 'Ins Bordell bringen';
$text['de']['move'] = 'Bewegen';
$text['de']['put_back_on_streets'] = 'Wieder auf die Straße setzen';
$text['de']['redlight_description'] = 'Das Rotlichtviertel ist der perfekte Ort, um Geld zu verdienen. Hier kannst du versuchen, Prostituierte zu überzeugen, für dich zu arbeiten.';
$text['de']['search_for_prostitutes'] = 'Nach Prostituierten suchen';
$text['de']['employ_prostitutes'] = 'Prostituierte in einem Bordell anstellen';
$text['de']['put_hookers_back_on_streets'] = 'Prostituierte wieder auf die Straße setzen';
$text['de']['redlight_success'] = 'Du hast {amount} Prostituierten von der Straße geholt!';
$text['de']['redlight_wait'] = 'Du musst noch {timer} warten, bevor du wieder nach Prostituierten suchen kannst!';
$text['de']['redlight_toomany'] = 'Du hast keine {amount} Prostituierten verfügbar!';
$text['de']['redlight_moved'] = 'Du hast {amount} Prostituierten bewegt!';
$text['de']['cheating'] = 'Versuchst du zu schummeln?';


$text['es']['redlight_title'] = 'Barrio Rojo';
$text['es']['search_instructions'] = 'Puedes buscar nuevas prostitutas cada 10 minutos.';
$text['es']['prostitutes_on_street'] = 'Número de prostitutas en la calle';
$text['es']['prostitutes_in_brothels'] = 'Número de prostitutas en burdeles';
$text['es']['look_for_prostitutes'] = '¿Buscando prostitutas? Haz clic en la marca verde';
$text['es']['earnings_info'] = 'Cada prostituta en un burdel te genera €40 por hora, pero el alquiler de la habitación cuesta €20 por hora. Las prostitutas en la calle te generan €15 por hora.';
$text['es']['put_into_brothel'] = 'Colocar en el burdel';
$text['es']['move'] = 'Mover';
$text['es']['put_back_on_streets'] = 'Devolver a la calle';
$text['es']['redlight_description'] = 'El Barrio Rojo es el lugar perfecto para ganar dinero. Aquí puedes intentar convencer a las prostitutas para que trabajen para ti.';
$text['es']['search_for_prostitutes'] = 'Buscar prostitutas';
$text['es']['employ_prostitutes'] = 'Contratar prostitutas en un burdel';
$text['es']['put_hookers_back_on_streets'] = 'Devolver prostitutas a la calle';
$text['es']['redlight_success'] = '¡Has recogido {amount} prostitutas de la calle!';
$text['es']['redlight_wait'] = 'Debes esperar {timer} antes de poder buscar prostitutas nuevamente.';
$text['es']['redlight_toomany'] = 'No tienes {amount} prostitutas disponibles.';
$text['es']['redlight_moved'] = 'Has movido {amount} prostitutas.';
$text['es']['cheating'] = '¿Estás intentando hacer trampas?';

$text['pt']['redlight_title'] = 'Distrito de Luz Vermelha';
$text['pt']['search_instructions'] = 'Você pode procurar por novas prostitutas a cada 10 minutos.';
$text['pt']['prostitutes_on_street'] = 'Número de prostitutas na rua';
$text['pt']['prostitutes_in_brothels'] = 'Número de prostitutas em bordéis';
$text['pt']['look_for_prostitutes'] = 'Procurando por prostitutas? Clique no visto verde';
$text['pt']['earnings_info'] = 'Cada prostituta em um bordel rende €40 por hora, mas o aluguel do quarto custa €20 por hora. Prostitutas na rua rendem €15 por hora.';
$text['pt']['put_into_brothel'] = 'Colocar no bordel';
$text['pt']['move'] = 'Mover';
$text['pt']['put_back_on_streets'] = 'Devolver às ruas';
$text['pt']['redlight_description'] = 'O Distrito de Luz Vermelha é o lugar perfeito para ganhar dinheiro. Aqui, você pode tentar convencer prostitutas a trabalhar para você.';
$text['pt']['search_for_prostitutes'] = 'Procurar por prostitutas';
$text['pt']['employ_prostitutes'] = 'Contratar prostitutas em um bordel';
$text['pt']['put_hookers_back_on_streets'] = 'Devolver prostitutas às ruas';
$text['pt']['redlight_success'] = 'Você pegou {amount} prostitutas da rua!';
$text['pt']['redlight_wait'] = 'Você precisa esperar {timer} para poder procurar prostitutas novamente!';
$text['pt']['redlight_toomany'] = 'Você não tem {amount} prostitutas disponíveis!';
$text['pt']['redlight_moved'] = 'Você moveu {amount} prostitutas!';
$text['pt']['cheating'] = 'Está tentando trapacear?';

$text['fr']['redlight_title'] = 'Quartier Rouge';
$text['fr']['search_instructions'] = 'Vous pouvez rechercher de nouvelles prostituées toutes les 10 minutes.';
$text['fr']['prostitutes_on_street'] = 'Nombre de prostituées dans la rue';
$text['fr']['prostitutes_in_brothels'] = 'Nombre de prostituées dans les bordels';
$text['fr']['look_for_prostitutes'] = 'À la recherche de prostituées ? Cliquez sur la coche verte';
$text['fr']['earnings_info'] = 'Chaque prostituée dans un bordel vous rapporte €40 par heure, mais le loyer de la chambre coûte €20 par heure. Les prostituées dans la rue vous rapportent €15 par heure.';
$text['fr']['put_into_brothel'] = 'Placer dans le bordel';
$text['fr']['move'] = 'Déplacer';
$text['fr']['put_back_on_streets'] = 'Remettre dans la rue';
$text['fr']['redlight_description'] = "Le Quartier Rouge est l'endroit idéal pour gagner de l'argent. Ici, vous pouvez essayer de convaincre des prostituées de travailler pour vous.";
$text['fr']['search_for_prostitutes'] = 'Rechercher des prostituées';
$text['fr']['employ_prostitutes'] = 'Embaucher des prostituées dans un bordel';
$text['fr']['put_hookers_back_on_streets'] = 'Remettre des prostituées dans la rue';
$text['fr']['redlight_success'] = 'Vous avez récupéré {amount} prostituées de la rue !';
$text['fr']['redlight_wait'] = 'Vous devez attendre {timer} avant de pouvoir rechercher à nouveau des prostituées !';
$text['fr']['redlight_toomany'] = "Vous n'avez pas {amount} prostituées disponibles !";
$text['fr']['redlight_moved'] = 'Vous avez déplacé {amount} prostituées !';
$text['fr']['cheating'] = 'Essayez-vous de tricher ?';


$text['cs']['redlight_title'] = 'Červená čtvrť';
$text['cs']['search_instructions'] = 'Můžete hledat nové prostitutky každých 10 minut.';
$text['cs']['prostitutes_on_street'] = 'Počet prostitutek na ulici';
$text['cs']['prostitutes_in_brothels'] = 'Počet prostitutek v lupanárnách';
$text['cs']['look_for_prostitutes'] = 'Hledáte prostitutky? Klikněte na zelenou fajfku';
$text['cs']['earnings_info'] = 'Každá prostitutka v lupanárně vám vydělá €40 za hodinu, ale nájem za pokoj stojí €20 za hodinu. Prostitutky na ulici vám vydělají €15 za hodinu.';
$text['cs']['put_into_brothel'] = 'Umístit do lupanáru';
$text['cs']['move'] = 'Přesunout';
$text['cs']['put_back_on_streets'] = 'Vrátit na ulici';
$text['cs']['redlight_description'] = 'Červená čtvrť je ideálním místem k vydělání peněz. Zde můžete zkusit přesvědčit prostitutky, aby pro vás pracovaly.';
$text['cs']['search_for_prostitutes'] = 'Hledat prostitutky';
$text['cs']['employ_prostitutes'] = 'Zaměstnat prostitutky v lupanáru';
$text['cs']['put_hookers_back_on_streets'] = 'Vrátit prostitutky na ulici';
$text['cs']['redlight_success'] = 'Z ulice jste sebral/a {amount} prostitutky!';
$text['cs']['redlight_wait'] = 'Musíte počkat ještě {timer} než budete moci znovu hledat prostitutky!';
$text['cs']['redlight_toomany'] = 'Nemáte k dispozici {amount} prostitutek!';
$text['cs']['redlight_moved'] = 'Přesunul/a jste {amount} prostitutky!';
$text['cs']['cheating'] = 'Zkusit podvádět?';


$quantity = rand(1,10);	
    
$varallowed = array("search","manage","reverse");
if(in_array($var,$varallowed)){
	$varallowed = 'yes';
}else{
	$varallowed = 'no';
}
 


 
if($var == 'search'){
$q = "SELECT * FROM timers where activity = 'redlight' and username = '".$userdata[0]['username']."'";
$timer = $db->query($q)->fetch();
$now = date("Y-m-d H:i:s");
$wait = 0;
if($timer[0]['time'] >= $now){
		$wait = datetotime($timer[0]['time']) - time();
		$count_timer = '<font id="count_timer"></font>';
		$text[$lang]['redlight_wait'] = txt($text[$lang]['redlight_wait'],'{timer}', $count_timer);
		$errors[] = $text[$lang]['redlight_wait'];
}


 	if($_SERVER['REQUEST_METHOD'] === 'POST'){

 		if(empty($errors))
		{
		
		

		$nexttime = timetodate(time() + 600);
		$qc = "SELECT * FROM timers where username = '".$userdata[0]['username']."' and activity = 'redlight'";
		$fchance = $db->query($qc)->fetch();
		if($db->affected_rows == '0')
		{	
			$timers = array(
                'activity' => 'redlight',
                'username' =>$userdata[0]['username'],
                'time' => $nexttime,
            );
         	$timers = $db->insert('timers', $timers); 
		}else{
			$timers = array(
                'time' => $nexttime,
           	 );
			$where = array(
				'activity' => 'redlight',
				'username' => $userdata[0]['username']
			);
			$db->where($where)->update('timers', $timers); 
		}





			$user = array(
                'prostitutes' => ($userdata[0]['prostitutes'] + $quantity),
           	 );
			$where = array(
				'id' => $userdata[0]['id']
			);
			$db->where($where)->update('users', $user); 

			
	
			$success[] = txt($text[$lang]['redlight_success'],'{amount}', $quantity);
		}
 	}
 
}

if($var == 'manage'){
	
 	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		
		$amount = isset($_POST['amount']) ? $_POST['amount'] : '0';
		$amount = $db->escape($amount);
		 
		 	
	if(!is_numeric($amount)){
		$errors[] = $text[$lang]['cheating'];
	}
	
	
		if($amount > $userdata[0]['prostitutes']){
			$errors[] = txt($text[$lang]['redlight_toomany'],'{amount}', $amount);
		}
	
		
 		if(empty($errors))
		{
		
			
			$user = array(
                'prostitutes' => ($userdata[0]['prostitutes'] - $amount),
                'prostitutes_work' => ($userdata[0]['prostitutes_work'] + $amount),
           	 );
			$where = array(
				'id' => $userdata[0]['id']
			);
			$db->where($where)->update('users', $user); 

			
	
			$success[] = txt($text[$lang]['redlight_moved'],'{amount}', $amount);
		}
	}

}

if($var == 'reverse'){
 	if($_SERVER['REQUEST_METHOD'] === 'POST'){
		
		$amount = isset($_POST['amount']) ? $_POST['amount'] : '0';
		$amount = $db->escape($amount);
		 
		 	if(!is_numeric($amount)){
		$errors[] = $text[$lang]['cheating'];
	}
	
	
	
		if($amount > $userdata[0]['prostitutes_work']){
			$errors[] = txt($text[$lang]['redlight_toomany'],'{amount}', $amount);
		}
	
		
 		if(empty($errors))
		{
		
			
			$user = array(
                'prostitutes' => ($userdata[0]['prostitutes'] + $amount),
                'prostitutes_work' => ($userdata[0]['prostitutes_work'] - $amount),
           	 );
			$where = array(
				'id' => $userdata[0]['id']
			);
			$db->where($where)->update('users', $user); 

			
	
			$success[] = txt($text[$lang]['redlight_moved'],'{amount}', $amount);
		}
	}


}
