<?php

    if(!isset($_SESSION['suid']) or $_SESSION['suid'] == ''){
        header("Location: ".BASE_URL."login/");
        exit(); 
    }

    if(!isset($userdata[0]['authority']) or $userdata[0]['authority'] != 'admin'){ 
     //$noaccess = 0;
    }
 

  	$q = "SELECT * FROM translations where activity = 'cars' and lang = '".$lang."'";
	$tc = $db->query($q)->fetch();
 
 
  	$q = "SELECT * FROM garage where username = '".$userdata[0]['username']."' and country = '".$userdata[0]['country']."' and demage < '30' order by demage asc";
	$cars = $db->query($q)->fetch();
	
	$cooldown = 180;
	$jailtime = 120;
	$jailchance = 20;
	$minreceive = 40000;
	$maxreceive = 150000;
	$xp = rand(5,15);
	
	
	
$text['nl']['page_title'] = 'Waardetransport overvallen';
$text['nl']['page_text'] = 'Overval een waardetransport! Om een waardetransport te overvallen heb je een vluchtauto nodig met minder dan 30% schade. Huur hulpmiddelen om je slaagkans te vergroten. Een snelle vluchtauto verhoogt natuurlijk eveneens je slaagkans.';
$text['nl']['success'] = 'De waardetransport overval is gelukt! Je hebt € {amount} buit gemaakt!';
			$text['nl']['failed_demage'] = 'Helaas is de waardetransport overval mislukt. Je auto heeft {demage}% schade opgelopen!';
		$text['nl']['failed'] = 'Het is je niet gelukt de waardetransport te overvallen.';
		$text['nl']['go_to_jail'] = 'Helaas, de politie stond je op te wachten! Je auto is in beslag genomen.';
	$text['nl']['wait'] = 'Je moet nog {timer} wachten voor dat je weer een waardetransport kan overvallen!';
	$text['nl']['cheating'] = 'Probeer je vals te spelen?';
	$text['nl']['no_car_selected'] = 'Geen auto geselecteerd!';
	$text['nl']['nocaravailable'] = 'Geen auto beschikbaar!';
$text['nl']['rob_value_transport'] = 'Overval waardetransport';
$text['nl']['rob_transport_description'] = 'Overval een waardetransport! Om een waardetransport te overvallen heb je een vluchtauto nodig met minder dan 30% schade. Huur hulpmiddelen om je slaagkans te vergroten. Een snelle vluchtauto verhoogt natuurlijk eveneens je slaagkans.';
$text['nl']['choose_getaway_car'] = 'Kies een vluchtauto';
$text['nl']['rob_transport_during'] = 'Overval transport tijdens';
$text['nl']['loading'] = 'Laden';
$text['nl']['transport'] = 'Transport';
$text['nl']['unloading'] = 'Uitladen';
$text['nl']['hire_tools'] = 'Huur hulpmiddelen';
$text['nl']['tools'] = 'Gereedschap';
$text['nl']['explosives'] = 'Explosieven';
$text['nl']['ex_employee'] = 'Ex-werknemer';
$text['nl']['captcha'] = 'Waardetransport overvallen? Klik op het groene vinkje!';


$text['en']['page_title'] = 'Robbing Valuable Transports';
$text['en']['page_text'] = 'Rob a valuable transport! To rob a valuable transport, you need a getaway car with less than 30% damage. Rent tools to increase your chances of success. A fast getaway car also improves your success rate.';
$text['en']['success'] = 'The valuable transport robbery was successful! You have stolen €{amount}!';
$text['en']['failed_demage'] = 'Unfortunately, the valuable transport robbery failed. Your car sustained {demage}% damage!';
$text['en']['failed'] = 'You failed to rob the valuable transport.';
$text['en']['go_to_jail'] = 'Unfortunately, the police were waiting for you! Your car has been confiscated.';
$text['en']['wait'] = 'You have to wait {timer} before you can rob another valuable transport!';
$text['en']['cheating'] = 'Are you trying to cheat?';
$text['en']['no_car_selected'] = 'No car selected!';
$text['en']['nocaravailable'] = 'No car available!';
$text['en']['rob_value_transport'] = 'Rob Valuable Transport';
$text['en']['rob_transport_description'] = 'Rob a valuable transport! To rob a valuable transport, you need a getaway car with less than 30% damage. Rent tools to increase your chances of success. A fast getaway car also improves your success rate.';
$text['en']['choose_getaway_car'] = 'Choose a getaway car';
$text['en']['rob_transport_during'] = 'Rob transport during';
$text['en']['loading'] = 'Loading';
$text['en']['transport'] = 'Transport';
$text['en']['unloading'] = 'Unloading';
$text['en']['hire_tools'] = 'Rent tools';
$text['en']['tools'] = 'Tools';
$text['en']['explosives'] = 'Explosives';
$text['en']['ex_employee'] = 'Ex-employee';
$text['en']['captcha'] = 'Rob a valuable transport? Click on the green checkmark!';

$text['de']['page_title'] = 'Werttransporte überfallen';
$text['de']['page_text'] = 'Überfalle einen Werttransport! Für einen Werttransportüberfall benötigst du ein Fluchtfahrzeug mit weniger als 30% Schaden. Miete Werkzeuge, um deine Erfolgschancen zu erhöhen. Ein schnelles Fluchtfahrzeug verbessert natürlich auch deine Erfolgschancen.';
$text['de']['success'] = 'Der Werttransportüberfall war erfolgreich! Du hast €{amount} erbeutet!';
$text['de']['failed_demage'] = 'Leider ist der Werttransportüberfall fehlgeschlagen. Dein Auto hat {demage}% Schaden erlitten!';
$text['de']['failed'] = 'Du hast den Werttransport nicht überfallen können.';
$text['de']['go_to_jail'] = 'Die Polizei hat leider auf dich gewartet! Dein Auto wurde beschlagnahmt.';
$text['de']['wait'] = 'Du musst noch {timer} warten, bevor du einen weiteren Werttransport überfallen kannst!';
$text['de']['cheating'] = 'Versuchst du zu betrügen?';
$text['de']['no_car_selected'] = 'Kein Auto ausgewählt!';
$text['de']['nocaravailable'] = 'Kein Auto verfügbar!';
$text['de']['rob_value_transport'] = 'Werttransport überfallen';
$text['de']['rob_transport_description'] = 'Überfalle einen Werttransport! Für einen Werttransportüberfall benötigst du ein Fluchtfahrzeug mit weniger als 30% Schaden. Miete Werkzeuge, um deine Erfolgschancen zu erhöhen. Ein schnelles Fluchtfahrzeug verbessert natürlich auch deine Erfolgschancen.';
$text['de']['choose_getaway_car'] = 'Wähle ein Fluchtfahrzeug';
$text['de']['rob_transport_during'] = 'Überfalle Transport während';
$text['de']['loading'] = 'Laden';
$text['de']['transport'] = 'Transport';
$text['de']['unloading'] = 'Entladen';
$text['de']['hire_tools'] = 'Werkzeuge mieten';
$text['de']['tools'] = 'Werkzeuge';
$text['de']['explosives'] = 'Sprengstoff';
$text['de']['ex_employee'] = 'Ex-Mitarbeiter';
$text['de']['captcha'] = 'Werttransport überfallen? Klicke auf den Button!';


$text['es']['page_title'] = 'Asalto a Transportes de Valor';
$text['es']['page_text'] = '¡Asalta un transporte de valor! Para llevar a cabo un asalto a un transporte de valor, necesitas un vehículo de escape con menos del 30% de daño. Alquila herramientas para aumentar tus posibilidades de éxito. Un vehículo de escape rápido también mejora tus posibilidades de éxito.';
$text['es']['success'] = '¡El asalto al transporte de valor fue exitoso! ¡Has robado €{amount}!';
$text['es']['failed_demage'] = 'Lamentablemente, el asalto al transporte de valor falló. ¡Tu vehículo sufrió un {demage}% de daño!';
$text['es']['failed'] = 'No pudiste llevar a cabo el asalto al transporte de valor.';
$text['es']['go_to_jail'] = 'Lamentablemente, la policía te estaba esperando. Tu vehículo ha sido confiscado.';
$text['es']['wait'] = 'Debes esperar {timer} antes de poder asaltar otro transporte de valor.';
$text['es']['cheating'] = '¿Estás intentando hacer trampa?';
$text['es']['no_car_selected'] = 'No se ha seleccionado ningún vehículo.';
$text['es']['nocaravailable'] = 'No hay vehículos disponibles.';
$text['es']['rob_value_transport'] = 'Asaltar Transporte de Valor';
$text['es']['rob_transport_description'] = '¡Asalta un transporte de valor! Para llevar a cabo un asalto a un transporte de valor, necesitas un vehículo de escape con menos del 30% de daño. Alquila herramientas para aumentar tus posibilidades de éxito. Un vehículo de escape rápido también mejora tus posibilidades de éxito.';
$text['es']['choose_getaway_car'] = 'Elige un vehículo de escape';
$text['es']['rob_transport_during'] = 'Asaltar transporte durante';
$text['es']['loading'] = 'Cargando';
$text['es']['transport'] = 'Transporte';
$text['es']['unloading'] = 'Descargando';
$text['es']['hire_tools'] = 'Alquila herramientas';
$text['es']['tools'] = 'Herramientas';
$text['es']['explosives'] = 'Explosivos';
$text['es']['ex_employee'] = 'Ex empleado';
$text['es']['captcha'] = '¿Asaltar un transporte de valor? ¡Haz clic en la marca de verificación verde!';

$text['pt']['page_title'] = 'Assalto a Transportes de Valor';
$text['pt']['page_text'] = 'Assalte um transporte de valor! Para assaltar um transporte de valor, você precisa de um veículo de fuga com menos de 30% de dano. Alugue ferramentas para aumentar suas chances de sucesso. Um veículo de fuga rápido também melhora suas chances de sucesso.';
$text['pt']['success'] = 'O assalto ao transporte de valor foi bem-sucedido! Você roubou €{amount}!';
$text['pt']['failed_demage'] = 'Infelizmente, o assalto ao transporte de valor falhou. Seu veículo sofreu {demage}% de dano!';
$text['pt']['failed'] = 'Você não conseguiu assaltar o transporte de valor.';
$text['pt']['go_to_jail'] = 'Infelizmente, a polícia estava esperando por você. Seu veículo foi apreendido.';
$text['pt']['wait'] = 'Você precisa esperar {timer} antes de poder assaltar outro transporte de valor!';
$text['pt']['cheating'] = 'Está tentando trapacear?';
$text['pt']['no_car_selected'] = 'Nenhum veículo selecionado!';
$text['pt']['nocaravailable'] = 'Nenhum veículo disponível!';
$text['pt']['rob_value_transport'] = 'Assaltar Transporte de Valor';
$text['pt']['rob_transport_description'] = 'Assalte um transporte de valor! Para assaltar um transporte de valor, você precisa de um veículo de fuga com menos de 30% de dano. Alugue ferramentas para aumentar suas chances de sucesso. Um veículo de fuga rápido também melhora suas chances de sucesso.';
$text['pt']['choose_getaway_car'] = 'Escolha um veículo de fuga';
$text['pt']['rob_transport_during'] = 'Assaltar transporte durante';
$text['pt']['loading'] = 'Carregando';
$text['pt']['transport'] = 'Transporte';
$text['pt']['unloading'] = 'Descarregando';
$text['pt']['hire_tools'] = 'Alugue ferramentas';
$text['pt']['tools'] = 'Ferramentas';
$text['pt']['explosives'] = 'Explosivos';
$text['pt']['ex_employee'] = 'Ex-funcionário';
$text['pt']['captcha'] = 'Assaltar um transporte de valor? Clique na marca de verificação verde!';

$text['fr']['page_title'] = 'Attaque de Transports de Valeur';
$text['fr']['page_text'] = "Attaquez un transport de valeur ! Pour attaquer un transport de valeur, vous avez besoin d'une voiture de fuite avec moins de 30 % de dommages. Louez des outils pour augmenter vos chances de succès. Une voiture de fuite rapide améliore également vos chances de réussite.";
$text['fr']['success'] = "L'attaque du transport de valeur a réussi ! Vous avez volé €{amount} !";
$text['fr']['failed_demage'] = "Malheureusement, l'attaque du transport de valeur a échoué. Votre voiture a subi {demage}% de dommages !";
$text['fr']['failed'] = "Vous n'avez pas réussi à attaquer le transport de valeur.";
$text['fr']['go_to_jail'] = 'Malheureusement, la police vous attendait ! Votre voiture a été confisquée.';
$text['fr']['wait'] = 'Vous devez attendre {timer} avant de pouvoir attaquer un autre transport de valeur !';
$text['fr']['cheating'] = 'Essayez-vous de tricher ?';
$text['fr']['no_car_selected'] = 'Aucune voiture sélectionnée !';
$text['fr']['nocaravailable'] = 'Aucune voiture disponible !';
$text['fr']['rob_value_transport'] = 'Attaquer Transport de Valeur';
$text['fr']['rob_transport_description'] = "Attaquez un transport de valeur ! Pour attaquer un transport de valeur, vous avez besoin d'une voiture de fuite avec moins de 30 % de dommages. Louez des outils pour augmenter vos chances de succès. Une voiture de fuite rapide améliore également vos chances de réussite.";
$text['fr']['choose_getaway_car'] = 'Choisissez une voiture de fuite';
$text['fr']['rob_transport_during'] = 'Attaquer transport pendant';
$text['fr']['loading'] = 'Chargement';
$text['fr']['transport'] = 'Transport';
$text['fr']['unloading'] = 'Déchargement';
$text['fr']['hire_tools'] = 'Louez des outils';
$text['fr']['tools'] = 'Outils';
$text['fr']['explosives'] = 'Explosifs';
$text['fr']['ex_employee'] = 'Ex-employé';
$text['fr']['captcha'] = 'Attaquer un transport de valeur ? Cliquez sur la coche verte !';


$text['cs']['page_title'] = 'Přepadení transportu hodnot';
$text['cs']['page_text'] = 'Přepadejte transport hodnot! K úspěšnému přepadení potřebujete únikové vozidlo s méně než 30% poškození. Pronajměte si nástroje pro zvýšení šance na úspěch. Rychlé únikové vozidlo samozřejmě také zvyšuje šanci na úspěch.';
$text['cs']['success'] = 'Přepadení transportu hodnot bylo úspěšné! Získali jste € {amount} kořist!';
$text['cs']['failed_demage'] = 'Bohužel přepadení transportu hodnot se nezdařilo. Vaše vozidlo utrpělo {demage}% poškození!';
$text['cs']['failed'] = 'Nepodařilo se vám přepadnout transport hodnot.';
$text['cs']['go_to_jail'] = 'Bohužel, policie na vás čekala! Vaše vozidlo bylo zabaveno.';
$text['cs']['wait'] = 'Musíte ještě počkat {timer} než budete moci znovu přepadnout transport hodnot!';
$text['cs']['cheating'] = 'Snažíte se podvádět?';
$text['cs']['no_car_selected'] = 'Nevybrali jste žádné vozidlo!';
$text['cs']['nocaravailable'] = 'Žádné vozidlo není k dispozici!';
$text['cs']['rob_value_transport'] = 'Přepadení transportu hodnot';
$text['cs']['rob_transport_description'] = 'Přepadejte transport hodnot! K úspěšnému přepadení potřebujete únikové vozidlo s méně než 30% poškození. Pronajměte si nástroje pro zvýšení šance na úspěch. Rychlé únikové vozidlo samozřejmě také zvyšuje šanci na úspěch.';
$text['cs']['choose_getaway_car'] = 'Vyberte únikové vozidlo';
$text['cs']['rob_transport_during'] = 'Přepadení transportu během';
$text['cs']['loading'] = 'Nakládání';
$text['cs']['transport'] = 'Transport';
$text['cs']['unloading'] = 'Vykládání';
$text['cs']['hire_tools'] = 'Pronajměte si nástroje';
$text['cs']['tools'] = 'Nástroje';
$text['cs']['explosives'] = 'Výbušniny';
$text['cs']['ex_employee'] = 'Bývalý zaměstnanec';
$text['cs']['captcha'] = 'Přepadnout transport hodnot? Klikněte na zelenou fajfku!';



		
$q = "SELECT * FROM timers where activity = 'transport' and username = '".$userdata[0]['username']."'";
$timer = $db->query($q)->fetch();
$now = date("Y-m-d H:i:s");
$wait = 0;
if($timer[0]['time'] >= $now){
		$wait = datetotime($timer[0]['time']) - time();
		$count_timer = '<font id="count_timer"></font>';
		$text[$lang]['wait'] = txt($text[$lang]['wait'],'{timer}', $count_timer);
		$errors[] = $text[$lang]['wait'];
}


 
  	$q = "SELECT * FROM garage where username = '".$userdata[0]['username']."' and country = '".$userdata[0]['country']."' and demage < '30' order by demage asc";
	$cars = $db->query($q)->fetch();
	$countcars = $db->affected_rows;
	if($countcars == 0){
		$errors[] = $text[$lang]['nocaravailable'];
	}
	
	
	
if($_SERVER['REQUEST_METHOD'] === 'POST'){

		function getcarinfo($id){
						global $db;
							
  						$q = "SELECT * FROM cars where id = '".$id."'  ";
						$o = $db->query($q)->fetch();
						return $o;
						}
						
						
	$id = isset($_POST['car']) ? $_POST['car'] : '0';
	$id = $db->escape($id);
	
	if($id == 0){
		$errors[] = $text[$lang]['no_car_selected'];
	}
	
	if(!is_numeric($id)){
		$errors[] = $text[$lang]['cheating'];
	}
	
	
	
	$valid = 0;
	foreach($cars as $f){
    		if ($f['id'] == $id) {
    			$valid = 1;
    			$carinfo = getcarinfo($f['car']);
    			$id = $f['id'];
    			
    			$demage = $f['demage'];
    			
    		}	
    }
    
	if($valid == 0){
		$errors[] = $text[$lang]['cheating'];
	}
	
	
	if(empty($errors))
	{
		
		$value = $carinfo[0]['price'] - (($carinfo[0]['price'] / 100) * $damage);
		
		
		$successperc = 35;
		$invested = 0;
		if($_POST['workers']){$successperc = $successperc + 15; $invested = $invested + 50000; }
		if($_POST['explosives']){$successperc = $successperc + 5;$invested = $invested + 10000;}
		if($_POST['tools']){$successperc = $successperc + 5;$invested = $invested + 5000;}
		
			$cash = $userdata[0]['cash'] - $invested;
			
			if($invested > 0){
			$user = array(
                'cash' => ($cash),
           	 );
			$where = array(
				'id' => $userdata[0]['id']
			);
			$db->where($where)->update('users', $user); 
			
			
			}
		
		
		$randchance = rand(0,100);
		
		$receive = rand(($minreceive + $invested),($maxreceive + $invested)) ;
		if($successperc >= $randchance){
		
				
			$user = array(
                'xp' => ($userdata[0]['xp'] + $xp),
                'cash' => ($cash + $receive),
           	 );
			$where = array(
				'id' => $userdata[0]['id']
			);
			$db->where($where)->update('users', $user); 
			
				$success[] = txt($text[$lang]['success'],"{amount}",number($receive));
		
		}else{
	
			$jailpers = 25;
			$randchance = rand(0,100);
			
			if($randchance >= $jailpers){
		
				$randchance = rand(0,1);
				if($randchance == 0){
					$adddemage = rand(1,15);
					$info = array( 'demage' => ($demage + $adddemage)  );
					$where = array( 'id' => $id 	);
					$db->where($where)->update('garage', $info); 
					
					$errors[] = txt($text[$lang]['failed_demage'],"{demage}",number($adddemage));
				}else{
				
					$errors[] = $text[$lang]['failed'];
				}
		
			}else{
			
			   
					$info = array( 'demage' => '100'  );
					$where = array( 'id' => $id 	);
					$db->where($where)->update('garage', $info); 
	
				$errors[] = $text[$lang]['go_to_jail'];
				jail($userdata[0]['username'], $jailtime);
			}
		}
		
		
		$nextcrime = timetodate(time() + $cooldown);
		//$nextcrime = timetodate(time() + 0);
		$qc = "SELECT * FROM timers where username = '".$userdata[0]['username']."' and activity = 'transport'";
		$fchance = $db->query($qc)->fetch();
		if($db->affected_rows == '0')
		{	
			$timers = array(
                'activity' => 'transport',
                'username' =>$userdata[0]['username'],
                'time' => $nextcrime,
            );
         	$timers = $db->insert('timers', $timers); 
		}else{
			$timers = array(
                'time' => $nextcrime,
           	 );
			$where = array(
				'activity' => 'transport',
				'username' => $userdata[0]['username']
			);
			$db->where($where)->update('timers', $timers); 
		}


	}




}





