<?php

    if(!isset($_SESSION['suid']) or $_SESSION['suid'] == ''){
        header("Location: ".BASE_URL."login/");
        exit(); 
    }


$text['nl']['page_title'] = 'Misdaden';
$text['nl']['table_crimes'] = 'Misdaad';
$text['nl']['table_chance'] = 'Kans';
$text['nl']['captcha'] = 'Deze misdaad plegen? Klik op het groene vinkje!!';
	
	$text['nl']['cheating'] = 'Probeer je de boel op te lichten?';
	$text['nl']['no_crime_selected'] = 'Geen misdaad geselecteerd';
	$text['nl']['crime_doenst_exist'] = 'U probeert een misdaad uit te voeren die niet bestaat!';
	$text['nl']['crime_success_money'] = 'Misdaad is gelukt! je hebt hiermee {amount} verdiend.';
	$text['nl']['crime_success_bullets'] = 'Misdaad is gelukt! je hebt hiermee {bullets} kogels verdiend.';
	$text['nl']['crime_success_money_bullets'] = 'Misdaad is gelukt! je hebt hiermee {bullets} kogels en {amount} cash verdiend.';
	$text['nl']['crime_wait'] = 'Je moet nog {timer} wachten voor dat je weer een misdaad kan doen!';
	$text['nl']['crime_failed'] = 'Helaas is de misdaad mislukt! Probeer het volgende keer opnieuw';
	$text['nl']['crime_go_to_jail'] = 'Je bent gepakt door de politie! Je gaat naar de gevangenis!';
	
	
		$text['en']['page_title'] = 'Crimes';
$text['en']['table_crimes'] = 'Crime';
$text['en']['table_chance'] = 'Chance';
$text['en']['captcha'] = 'Commit this crime? Klik op het groene vinkje!!';

$text['en']['cheating'] = 'Are you trying to cheat?';
$text['en']['no_crime_selected'] = 'No crime selected';
$text['en']['crime_doenst_exist'] = 'You are trying to commit a crime that does not exist!';
$text['en']['crime_success_money'] = 'Crime successful! You have earned {amount} with this.';
$text['en']['crime_success_bullets'] = 'Crime successful! You have earned {bullets} bullets with this.';
$text['en']['crime_success_money_bullets'] = 'Crime successful! You have earned {bullets} bullets and {amount} cash with this.';
$text['en']['crime_wait'] = 'You still have to wait {timer} before you can commit another crime!';
$text['en']['crime_failed'] = 'Unfortunately, the crime failed! Please try again next time.';
$text['en']['crime_go_to_jail'] = 'You have been caught by the police! You are going to jail!';

$text['de']['page_title'] = 'Verbrechen';
$text['de']['table_crimes'] = 'Verbrechen';
$text['de']['table_chance'] = 'Chance';
$text['de']['captcha'] = 'Dieses Verbrechen begehen? Klicke auf den Button!';

$text['de']['cheating'] = 'Versuchst du zu betrügen?';
$text['de']['no_crime_selected'] = 'Kein Verbrechen ausgewählt';
$text['de']['crime_doenst_exist'] = 'Du versuchst, ein Verbrechen zu begehen, das nicht existiert!';
$text['de']['crime_success_money'] = 'Verbrechen erfolgreich! Du hast {amount} verdient.';
$text['de']['crime_success_bullets'] = 'Verbrechen erfolgreich! Du hast {bullets} Kugeln verdient.';
$text['de']['crime_success_money_bullets'] = 'Verbrechen erfolgreich! Du hast {bullets} Kugeln und {amount} Bargeld verdient.';
$text['de']['crime_wait'] = 'Du musst noch {timer} warten, bevor du ein weiteres Verbrechen begehen kannst!';
$text['de']['crime_failed'] = 'Leider ist das Verbrechen gescheitert! Bitte versuche es beim nächsten Mal erneut.';
$text['de']['crime_go_to_jail'] = 'Du wurdest von der Polizei erwischt! Du kommst ins Gefängnis!';

$text['es']['page_title'] = 'Crimenes';
$text['es']['table_crimes'] = 'Crimen';
$text['es']['table_chance'] = 'Oportunidad';
$text['es']['captcha'] = '¿Cometer este crimen? ¡Haz clic en la marca de verificación verde!';

$text['es']['cheating'] = '¿Estás intentando hacer trampa?';
$text['es']['no_crime_selected'] = 'Ningún crimen seleccionado';
$text['es']['crime_doenst_exist'] = 'Estás intentando cometer un crimen que no existe.';
$text['es']['crime_success_money'] = '¡Crimen exitoso! Has ganado {amount}.';
$text['es']['crime_success_bullets'] = '¡Crimen exitoso! Has ganado {bullets} balas.';
$text['es']['crime_success_money_bullets'] = '¡Crimen exitoso! Has ganado {bullets} balas y {amount} efectivo.';
$text['es']['crime_wait'] = 'Todavía debes esperar {timer} antes de poder cometer otro crimen.';
$text['es']['crime_failed'] = 'Desafortunadamente, el crimen falló. Por favor, inténtalo de nuevo la próxima vez.';
$text['es']['crime_go_to_jail'] = '¡Has sido atrapado por la policía! ¡Vas a la cárcel!';

$text['pt']['page_title'] = 'Crimes';
$text['pt']['table_crimes'] = 'Crime';
$text['pt']['table_chance'] = 'Chance';
$text['pt']['captcha'] = 'Cometer este crime? Clique na marca de seleção verde!';

$text['pt']['cheating'] = 'Você está tentando trapacear?';
$text['pt']['no_crime_selected'] = 'Nenhum crime selecionado';
$text['pt']['crime_doenst_exist'] = 'Você está tentando cometer um crime que não existe!';
$text['pt']['crime_success_money'] = 'Crime bem-sucedido! Você ganhou {amount}.';
$text['pt']['crime_success_bullets'] = 'Crime bem-sucedido! Você ganhou {bullets} balas.';
$text['pt']['crime_success_money_bullets'] = 'Crime bem-sucedido! Você ganhou {bullets} balas e {amount} em dinheiro.';
$text['pt']['crime_wait'] = 'Você ainda precisa esperar {timer} antes de cometer outro crime!';
$text['pt']['crime_failed'] = 'Infelizmente, o crime falhou! Por favor, tente novamente na próxima vez.';
$text['pt']['crime_go_to_jail'] = 'Você foi pego pela polícia! Você vai para a cadeia!';


$text['fr']['page_title'] = 'Crimes';
$text['fr']['table_crimes'] = 'Crime';
$text['fr']['table_chance'] = 'Chance';
$text['fr']['captcha'] = 'Commis ce crime ? Cliquez sur la coche verte !';

$text['fr']['cheating'] = 'Essayez-vous de tricher ?';
$text['fr']['no_crime_selected'] = 'Aucun crime sélectionné';
$text['fr']['crime_doenst_exist'] = 'Vous essayez de commettre un crime qui n\'existe pas !';
$text['fr']['crime_success_money'] = 'Crime réussi ! Vous avez gagné {amount}.';
$text['fr']['crime_success_bullets'] = 'Crime réussi ! Vous avez gagné {bullets} balles.';
$text['fr']['crime_success_money_bullets'] = 'Crime réussi ! Vous avez gagné {bullets} balles et {amount} en espèces.';
$text['fr']['crime_wait'] = 'Vous devez encore attendre {timer} avant de pouvoir commettre un autre crime !';
$text['fr']['crime_failed'] = 'Malheureusement, le crime a échoué ! Veuillez réessayer la prochaine fois.';
$text['fr']['crime_go_to_jail'] = 'Vous avez été attrapé par la police ! Vous allez en prison !';


$text['cs']['page_title'] = 'Zločiny';
$text['cs']['table_crimes'] = 'Zločin';
$text['cs']['table_chance'] = 'Šance';
$text['cs']['captcha'] = 'Spáchat tento zločin? Klikněte na zelenou značku!';

$text['cs']['cheating'] = 'Zkoušíte podvádět?';
$text['cs']['no_crime_selected'] = 'Nebyl vybrán žádný zločin';
$text['cs']['crime_doenst_exist'] = 'Snažíte se spáchat zločin, který neexistuje!';
$text['cs']['crime_success_money'] = 'Zločin úspěšný! Získali jste {amount}.';
$text['cs']['crime_success_bullets'] = 'Zločin úspěšný! Získali jste {bullets} střeliva.';
$text['cs']['crime_success_money_bullets'] = 'Zločin úspěšný! Získali jste {bullets} střeliva a {amount} hotovosti.';
$text['cs']['crime_wait'] = 'Stále musíte čekat {timer} předtím, než spácháte další zločin!';
$text['cs']['crime_failed'] = 'Bohužel, zločin selhal! Zkuste to příště znovu.';
$text['cs']['crime_go_to_jail'] = 'Policie vás chytila! Jdete do vězení!';




$q = "SELECT * FROM timers where activity = 'crimes' and username = '".$userdata[0]['username']."'";
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

	$id = isset($_POST['crime']) ? $_POST['crime'] : '0';
	$id = $db->escape($id);
	
	
	if($id == 0){
		$errors[] = $text[$lang]['no_crime_selected'];
	}
	
	if(!is_numeric($id)){
		$errors[] = $text[$lang]['cheating'];
	}
	

  	$qc = "SELECT * FROM crimes where id = '".$id."' ";
	$fc = $db->query($qc)->fetch();
	if($db->affected_rows != '1')
	{	
		$errors[] = $text[$lang]['crime_doenst_exist'];
	}


	if(empty($errors))
	{
	 	$xp = rand($fc[0]['exp'],$fc[0]['maxexp']);
	 	
		$qc = "SELECT * FROM chances where username = '".$userdata[0]['username']."' and activity = 'crimes' and activity_id = '".$id."' ";
		$fchance = $db->query($qc)->fetch();
		if($db->affected_rows == '0')
		{	
			$crimec = array(
                'activity' => 'crimes',
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
				'activity' => 'crimes',
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
		
			$money = rand($fc[0]['money'],$fc[0]['maxmoney']);
			$bullets = rand($fc[0]['bullers'],$fc[0]['maxbullets']);
			
			if($bullets > 0 and $money > 0){
			
				$text[$lang]['crime_success_money_bullets'] = txt($text[$lang]['crime_success_money_bullets'],'{bullets}',number($bullets));
				$text[$lang]['crime_success_money_bullets'] = txt($text[$lang]['crime_success_money_bullets'],'{amount}',number($money));
				$success[] = $text[$lang]['crime_success_money_bullets'];
			}else{
				if($bullets > 0){
					$success[] = txt($text[$lang]['crime_success_bullets'],'{bullets}',number($bullets));
				}else{
					$success[] = txt($text[$lang]['crime_success_money'],'{amount}',number($money));
				}
			}
		}else{
		
			$randchance = rand(0,100);
			if($randchance >= $fc[0]['jailchance']){
		
				$errors[] = $text[$lang]['crime_failed'];
			}else{
			
				$errors[] = $text[$lang]['crime_go_to_jail'];
				jail($userdata[0]['username'], $fc[0]['jailtime']);
			}
		
		}
		
		
		
		$nextcrime = timetodate(time() + $fc[0]['cooldown']);
		//$nextcrime = timetodate(time() + 0);
		$qc = "SELECT * FROM timers where username = '".$userdata[0]['username']."' and activity = 'crimes'";
		$fchance = $db->query($qc)->fetch();
		if($db->affected_rows == '0')
		{	
			$timers = array(
                'activity' => 'crimes',
                'username' =>$userdata[0]['username'],
                'time' => $nextcrime,
            );
         	$timers = $db->insert('timers', $timers); 
		}else{
			$timers = array(
                'time' => $nextcrime,
           	 );
			$where = array(
				'activity' => 'crimes',
				'username' => $userdata[0]['username']
			);
			$db->where($where)->update('timers', $timers); 
		}


       
			$user = array(
                'cash' => ($userdata[0]['cash'] + $money),
                'bullets' => ($userdata[0]['bullets'] + $bullets),
                'xp' => ($userdata[0]['xp'] + $xp),
           	 );
			$where = array(
				'id' => $userdata[0]['id'],
			);
			$db->where($where)->update('users', $user);
		// print_r($db->_query);
		//$success[] = "perc = ".$perc." > rand ".$randchance." >>".$fc[0]['successexpneeded'];
     
		//$success[] = $text[$lang]['crime_success'];

	}



}


 	$q = "SELECT * FROM translations where activity = 'crimes' and lang = '".$lang."'";
	$t = $db->query($q)->fetch();


 	$q = "SELECT * FROM chances where activity = 'crimes' and username = '".$userdata[0]['username']."'";
	$chance = $db->query($q)->fetch();
	


  	$q = "SELECT * FROM crimes";
	$c = $db->query($q)->fetch();
	
	
	