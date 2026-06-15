<?php

    if(!isset($_SESSION['suid']) or $_SESSION['suid'] == ''){
        header("Location: ".BASE_URL."login/");
        exit(); 
    }

    if(!isset($userdata[0]['authority']) or $userdata[0]['authority'] != 'admin'){
        //header("Location: /");
        //exit(); 
    }
 

  	$q = "SELECT * FROM translations where activity = 'drugs' and lang = '".$lang."'";
	$td = $db->query($q)->fetch();
  	$q = "SELECT * FROM translations where activity = 'countrys' and lang = '".$lang."'";
	$tc = $db->query($q)->fetch();

$text['nl']['page_title'] = 'Overvallen';
$text['nl']['table_crimes'] = 'Overval';
$text['nl']['table_country'] = 'Land';
$text['nl']['table_chance'] = 'Kans';
$text['nl']['table_everywhere'] = 'overal te plegen';
$text['nl']['table_incountry'] = 'Alleen in {country}';
$text['nl']['captcha'] = 'Deze overval plegen? Klik op het groene vinkje!!';
	$text['nl']['crime_wait'] = 'Je moet nog {timer} wachten voor dat je weer een overval kan doen!';
	$text['nl']['no_crime_selected'] = 'Geen overval geselecteerd';
	$text['nl']['cheating'] = 'Probeer je de boel op te lichten?';
	$text['nl']['crime_doenst_exist'] = 'U probeert een overval uit te voeren die niet bestaat!';
	$text['nl']['crime_success_money'] = 'Overval is gelukt! je hebt hiermee {amount} verdiend.';
	$text['nl']['crime_success_drugs'] = 'Overval is gelukt! je hebt hiermee {amount} {drugs} verdiend.';
		$text['nl']['crime_failed'] = 'Helaas is de overval mislukt! Je verliest {health}% gezondheid!';
			$text['nl']['crime_go_to_jail'] = 'Je bent gepakt door de politie! Je gaat naar de gevangenis en je verliest {health}% gezondheid!!';
$text['nl']['only_incountry'] = 'Deze overval kan je alleen plegen in {country}';

$text['en']['page_title'] = 'Robberies';
$text['en']['table_crimes'] = 'Robbery';
$text['en']['table_country'] = 'Country';
$text['en']['table_chance'] = 'Chance';
$text['en']['table_everywhere'] = 'everywhere';
$text['en']['table_incountry'] = 'Only in {country}';
$text['en']['captcha'] = 'Want to commit this robbery? Click the green checkmark!';
$text['en']['crime_wait'] = 'You still need to wait {timer} before you can do another robbery!';
$text['en']['no_crime_selected'] = 'No robbery selected';
$text['en']['cheating'] = 'Are you trying to cheat?';
$text['en']['crime_doesnt_exist'] = "You are trying to commit a robbery that doesn't exist!";
$text['en']['crime_success_money'] = 'Robbery successful! You earned {amount} with this.';
$text['en']['crime_success_drugs'] = 'Robbery successful! You earned {amount} {drugs}.';
$text['en']['crime_failed'] = 'Unfortunately, the robbery failed! You lose {health}% health!';
$text['en']['crime_go_to_jail'] = 'You have been caught by the police! You are going to jail and lose {health}% health!';
$text['en']['only_incountry'] = 'You can only commit this robbery in {country}';

$text['de']['page_title'] = 'Überfälle';
$text['de']['table_crimes'] = 'Überfall';
$text['de']['table_country'] = 'Land';
$text['de']['table_chance'] = 'Chance';
$text['de']['table_everywhere'] = 'überall durchführbar';
$text['de']['table_incountry'] = 'Nur in {country}';
$text['de']['captcha'] = 'Diesen Überfall begehen? Klicke auf das grüne Häkchen!!';
$text['de']['crime_wait'] = 'Du musst noch {timer} warten, bevor du einen weiteren Überfall begehen kannst!';
$text['de']['no_crime_selected'] = 'Kein Überfall ausgewählt';
$text['de']['cheating'] = 'Versuchst du zu schummeln?';
$text['de']['crime_doenst_exist'] = 'Du versuchst einen Überfall zu begehen, der nicht existiert!';
$text['de']['crime_success_money'] = 'Der Überfall war erfolgreich! Du hast {amount} verdient.';
$text['de']['crime_success_drugs'] = 'Der Überfall war erfolgreich! Du hast {amount} {drugs} verdient.';
$text['de']['crime_failed'] = 'Leider ist der Überfall fehlgeschlagen! Du verlierst {health}% Gesundheit!';
$text['de']['crime_go_to_jail'] = 'Du wurdest von der Polizei erwischt! Du kommst ins Gefängnis und verlierst {health}% Gesundheit!!';
$text['de']['only_incountry'] = 'Diesen Überfall kannst du nur in {country} begehen';


$text['es']['page_title'] = 'Asaltos';
$text['es']['table_crimes'] = 'Asalto';
$text['es']['table_country'] = 'País';
$text['es']['table_chance'] = 'Probabilidad';
$text['es']['table_everywhere'] = 'puede cometerse en cualquier lugar';
$text['es']['table_incountry'] = 'Solo en {country}';
$text['es']['captcha'] = '¿Cometer este asalto? ¡Haz clic en la marca verde!!';
$text['es']['crime_wait'] = 'Debes esperar {timer} antes de poder cometer otro asalto.';
$text['es']['no_crime_selected'] = 'Ningún asalto seleccionado';
$text['es']['cheating'] = '¿Estás intentando hacer trampas?';
$text['es']['crime_doenst_exist'] = 'Estás intentando cometer un asalto que no existe.';
$text['es']['crime_success_money'] = '¡Éxito en el asalto! Has ganado {amount} con esto.';
$text['es']['crime_success_drugs'] = '¡Éxito en el asalto! Has ganado {amount} {drugs}.';
$text['es']['crime_failed'] = '¡Lamentablemente, el asalto falló! Pierdes {health}% de salud.';
$text['es']['crime_go_to_jail'] = '¡La policía te ha atrapado! Vas a la cárcel y pierdes {health}% de salud.';
$text['es']['only_incountry'] = 'Solo puedes cometer este asalto en {country}';


$text['pt']['page_title'] = 'Assaltos';
$text['pt']['table_crimes'] = 'Assalto';
$text['pt']['table_country'] = 'País';
$text['pt']['table_chance'] = 'Chance';
$text['pt']['table_everywhere'] = 'pode ser cometido em qualquer lugar';
$text['pt']['table_incountry'] = 'Apenas em {country}';
$text['pt']['captcha'] = 'Cometer este assalto? Clique na marca de seleção verde!!';
$text['pt']['crime_wait'] = 'Você precisa esperar {timer} antes de poder cometer outro assalto!';
$text['pt']['no_crime_selected'] = 'Nenhum assalto selecionado';
$text['pt']['cheating'] = 'Você está tentando trapacear?';
$text['pt']['crime_doenst_exist'] = 'Você está tentando cometer um assalto que não existe!';
$text['pt']['crime_success_money'] = 'Assalto bem-sucedido! Você ganhou {amount} com isso.';
$text['pt']['crime_success_drugs'] = 'Assalto bem-sucedido! Você ganhou {amount} {drugs}.';
$text['pt']['crime_failed'] = 'Infelizmente, o assalto falhou! Você perde {health}% de saúde!';
$text['pt']['crime_go_to_jail'] = 'Você foi pego pela polícia! Você está indo para a prisão e perde {health}% de saúde!!';
$text['pt']['only_incountry'] = 'Você só pode cometer este assalto em {country}';


$text['fr']['page_title'] = 'Cambriolages';
$text['fr']['table_crimes'] = 'Cambriolage';
$text['fr']['table_country'] = 'Pays';
$text['fr']['table_chance'] = 'Chance';
$text['fr']['table_everywhere'] = "peut être commis n'importe où";
$text['fr']['table_incountry'] = 'Uniquement en {country}';
$text['fr']['captcha'] = 'Commencer ce cambriolage ? Cliquez sur la coche verte !!';
$text['fr']['crime_wait'] = 'Vous devez attendre {timer} avant de pouvoir commettre un autre cambriolage !';
$text['fr']['no_crime_selected'] = 'Aucun cambriolage sélectionné';
$text['fr']['cheating'] = 'Essayez-vous de tricher ?';
$text['fr']['crime_doenst_exist'] = "Vous essayez de commettre un cambriolage qui n'existe pas !";
$text['fr']['crime_success_money'] = 'Cambriolage réussi ! Vous avez gagné {amount} avec cela.';
$text['fr']['crime_success_drugs'] = 'Cambriolage réussi ! Vous avez gagné {amount} {drugs}.';
$text['fr']['crime_failed'] = 'Malheureusement, le cambriolage a échoué ! Vous perdez {health}% de santé !';
$text['fr']['crime_go_to_jail'] = 'Vous avez été attrapé par la police ! Vous allez en prison et vous perdez {health}% de santé !!';
$text['fr']['only_incountry'] = "Vous ne pouvez commettre ce cambriolage qu'en {country}";

$text['cs']['page_title'] = 'Přepady';
$text['cs']['table_crimes'] = 'Přepad';
$text['cs']['table_country'] = 'Země';
$text['cs']['table_chance'] = 'Šance';
$text['cs']['table_everywhere'] = 'lze spáchat kdekoliv';
$text['cs']['table_incountry'] = 'Pouze v {country}';
$text['cs']['captcha'] = 'Spáchat tento přepad? Klikněte na zelenou zaškrtávátko!!';
$text['cs']['crime_wait'] = 'Musíte počkat {timer} předtím, než můžete spáchat další přepad!';
$text['cs']['no_crime_selected'] = 'Není vybrán žádný přepad';
$text['cs']['cheating'] = 'Snažíte se podvádět?';
$text['cs']['crime_doenst_exist'] = 'Snažíte se spáchat přepad, který neexistuje!';
$text['cs']['crime_success_money'] = 'Přepad byl úspěšný! Vydělal jste {amount} tímto způsobem.';
$text['cs']['crime_success_drugs'] = 'Přepad byl úspěšný! Vydělal jste {amount} {drugs}.';
$text['cs']['crime_failed'] = 'Bohužel přepad selhal! Ztratíte {health}% zdraví!';
$text['cs']['crime_go_to_jail'] = 'Policií vás chytili! Jdete do vězení a ztratíte {health}% zdraví!!';
$text['cs']['only_incountry'] = 'Tento přepad můžete spáchat pouze v {country}';


$q = "SELECT * FROM timers where activity = 'robbery' and username = '".$userdata[0]['username']."'";
$timer = $db->query($q)->fetch();

$now = date("Y-m-d H:i:s");
$wait = 0;
if($timer[0]['time'] >= $now){
		$wait = datetotime($timer[0]['time']) - time();
		$count_timer = '<font id="count_timer"></font>';
		$text[$lang]['crime_wait'] = txt($text[$lang]['crime_wait'],'{timer}', $count_timer);
		$errors[] = $text[$lang]['crime_wait'];
}


if($_SERVER['REQUEST_METHOD'] === 'POST'){

	$id = isset($_POST['robbery']) ? $_POST['robbery'] : '0';
	$id = $db->escape($id);
	
	
	if($id == 0){
		$errors[] = $text[$lang]['no_crime_selected'];
	}
	
	if(!is_numeric($id)){
		$errors[] = $text[$lang]['cheating'];
	}
	

  	$qc = "SELECT * FROM robbery where id = '".$id."' ";
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
	 	
		$qc = "SELECT * FROM chances where username = '".$userdata[0]['username']."' and activity = 'robbery' and activity_id = '".$id."' ";
		$fchance = $db->query($qc)->fetch();
		if($db->affected_rows == '0')
		{	
			$crimec = array(
                'activity' => 'robbery',
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
				'activity' => 'robbery',
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
		
			$receive = rand($fc[0]['minreceive'],$fc[0]['maxreceive']);
			$what = $fc[0]['receive'];
			
	
				if($what == 'drugs'){
					$text[$lang]['crime_success_drugs'] = txt($text[$lang]['crime_success_drugs'],'{drugs}',gettranslation($fc[0]['receive_id'],$td));
					$success[] = txt($text[$lang]['crime_success_drugs'],'{amount}',number($receive));
					
					
			$q = "SELECT * FROM drugs_stock where drugs = '".$fc[0]['receive_id']."' and username = '".$userdata[0]['username']."'";
			$tc = $db->query($q)->fetch();
			if($db->affected_rows == '0'){	
	
		
			$drugs = array(
                'drugs' => $fc[0]['receive_id'],
                'username' => $userdata[0]['username'],
                'amount' => $receive,
            );
         	$drugs = $db->insert('drugs_stock', $drugs); 



			}else{
				$drugs = array(
                'amount' => ($tc[0]['amount'] + $receive),
           	 );
			$where = array(
                'drugs' => $fc[0]['receive_id'],
                'username' => $userdata[0]['username'],
			);
			$db->where($where)->update('drugs_stock', $drugs); 

			
			}
			
			
			$user = array(
                'xp' => ($userdata[0]['xp'] + $xp),
           	 );
			$where = array(
				'id' => $userdata[0]['id']
			);
			$db->where($where)->update('users', $user); 
			
			
				}else{
					$success[] = txt($text[$lang]['crime_success_money'],'{amount}',number($receive));
					
					
			$user = array(
                'cash' => ($userdata[0]['cash'] + $receive),
                'xp' => ($userdata[0]['xp'] + $xp),
           	 );
			$where = array(
				'id' => $userdata[0]['id']
			);
			$db->where($where)->update('users', $user); 
			
			
				}
			
		}else{
		
		
			$user = array(
                'health' => ($userdata[0]['health'] - $health),
           	 );
			$where = array(
				'id' => $userdata[0]['id']
			);
			$db->where($where)->update('users', $user); 
			
			
			$randchance = rand(0,100);
			if($randchance >= $fc[0]['jailchance']){
		
				$errors[] = txt($text[$lang]['crime_failed'],"{health}",$health);
				
				
			$user = array(
                'xp' => ($userdata[0]['xp'] + $xp),
           	 );
			$where = array(
				'id' => $userdata[0]['id']
			);
			$db->where($where)->update('users', $user); 
			
			
			}else{
			
				$errors[] = txt($text[$lang]['crime_go_to_jail'],"{health}",$health);
				jail($userdata[0]['username'], $fc[0]['jailtime']);
			}
		
		}
		
		
		
		$nextcrime = timetodate(time() + $fc[0]['cooldown']);
		$qc = "SELECT * FROM timers where username = '".$userdata[0]['username']."' and activity = 'robbery'";
		$fchance = $db->query($qc)->fetch();
		if($db->affected_rows == '0')
		{	
			$timers = array(
                'activity' => 'robbery',
                'username' =>$userdata[0]['username'],
                'time' => $nextcrime,
            );
         	$timers = $db->insert('timers', $timers); 
		}else{
			$timers = array(
                'time' => $nextcrime,
           	 );
			$where = array(
				'activity' => 'robbery',
				'username' => $userdata[0]['username']
			);
			$db->where($where)->update('timers', $timers); 
		}





		//$success[] = "perc = ".$perc." > rand ".$randchance." >>".$fc[0]['successexpneeded'];
		
		
		//$success[] = $text[$lang]['crime_success'];

	}



}


 	$q = "SELECT * FROM translations where activity = 'robbery' and lang = '".$lang."'";
	$t = $db->query($q)->fetch();


 	$q = "SELECT * FROM chances where activity = 'robbery' and username = '".$userdata[0]['username']."'";
	$chance = $db->query($q)->fetch();
	


  	$q = "SELECT * FROM robbery";
	$c = $db->query($q)->fetch();
	
	
	