<?php

    if(!isset($_SESSION['suid']) or $_SESSION['suid'] == ''){
        header("Location: ".BASE_URL."login/");
        exit(); 
    }

$text['nl']['Gym_Title'] = 'Sportschool';
$text['nl']['Welcome_Message'] = 'Welkom in de sportschool!';
$text['nl']['Boost_Message'] = 'Hier kun je je vorm en vaardigheid verbeteren. Dit geeft je een kleine extra boost in kracht!';
$text['nl']['Sport_Selection_Title'] = 'Welke sport wil je spelen?';
$text['nl']['Basketball'] = 'Basketbal';
$text['nl']['Golf'] = 'Golf';
$text['nl']['Tennis'] = 'Tennis';
$text['nl']['Soccer'] = 'Voetbal';
$text['nl']['captcha'] = 'Deze misdaad plegen? Klik op het groene vinkje!!';

$text['en']['Gym_Title'] = 'Gym';
$text['en']['Welcome_Message'] = 'Welcome to the gym!';
$text['en']['Boost_Message'] = 'Here you can improve your shape and skill. This gives you a little extra boost in strength!';
$text['en']['Sport_Selection_Title'] = 'Which sport would you like to play?';
$text['en']['Basketball'] = 'Basketball';
$text['en']['Golf'] = 'Golf';
$text['en']['Tennis'] = 'Tennis';
$text['en']['Soccer'] = 'Soccer';
$text['en']['captcha'] = 'Commit this crime? Click on the green checkmark!!';

$text['de']['Gym_Title'] = 'Fitnessstudio';
$text['de']['Welcome_Message'] = 'Willkommen im Fitnessstudio!';
$text['de']['Boost_Message'] = 'Hier kannst du deine Form und Fähigkeiten verbessern. Das gibt dir einen kleinen Extra-Schub in der Stärke!';
$text['de']['Sport_Selection_Title'] = 'Welchen Sport möchtest du spielen?';
$text['de']['Basketball'] = 'Basketball';
$text['de']['Golf'] = 'Golf';
$text['de']['Tennis'] = 'Tennis';
$text['de']['Soccer'] = 'Fußball';
$text['de']['captcha'] = 'Diese Straftat begehen? Klicke auf das grüne Häkchen!!';

$text['es']['Gym_Title'] = 'Gimnasio';
$text['es']['Welcome_Message'] = '¡Bienvenido al gimnasio!';
$text['es']['Boost_Message'] = 'Aquí puedes mejorar tu forma y habilidad. ¡Esto te da un pequeño impulso extra en fuerza!';
$text['es']['Sport_Selection_Title'] = '¿Qué deporte te gustaría practicar?';
$text['es']['Basketball'] = 'Baloncesto';
$text['es']['Golf'] = 'Golf';
$text['es']['Tennis'] = 'Tenis';
$text['es']['Soccer'] = 'Fútbol';
$text['es']['captcha'] = '¿Cometer este crimen? ¡Haz clic en la marca de verificación verde!!';

$text['pt']['Gym_Title'] = 'Academia';
$text['pt']['Welcome_Message'] = 'Bem-vindo à academia!';
$text['pt']['Boost_Message'] = 'Aqui você pode melhorar sua forma e habilidade. Isso lhe dá um pequeno impulso extra na força!';
$text['pt']['Sport_Selection_Title'] = 'Qual esporte você gostaria de jogar?';
$text['pt']['Basketball'] = 'Basquete';
$text['pt']['Golf'] = 'Golfe';
$text['pt']['Tennis'] = 'Tênis';
$text['pt']['Soccer'] = 'Futebol';
$text['pt']['captcha'] = 'Cometer esse crime? Clique na marca de verificação verde!!';

$text['fr']['Gym_Title'] = 'Gymnase';
$text['fr']['Welcome_Message'] = 'Bienvenue au gymnase !';
$text['fr']['Boost_Message'] = 'Ici, vous pouvez améliorer votre forme et vos compétences. Cela vous donne un petit coup de pouce supplémentaire en force !';
$text['fr']['Sport_Selection_Title'] = 'Quel sport aimeriez-vous pratiquer ?';
$text['fr']['Basketball'] = 'Basket-ball';
$text['fr']['Golf'] = 'Golf';
$text['fr']['Tennis'] = 'Tennis';
$text['fr']['Soccer'] = 'Football';
$text['fr']['captcha'] = 'Commettre ce crime ? Cliquez sur la coche verte !!';

$text['cs']['Gym_Title'] = 'Posilovna';
$text['cs']['Welcome_Message'] = 'Vítejte v posilovně!';
$text['cs']['Boost_Message'] = 'Zde můžete zlepšit svou kondici a dovednosti. To vám dá malý extra náskok ve síle!';
$text['cs']['Sport_Selection_Title'] = 'Který sport byste chtěli hrát?';
$text['cs']['Basketball'] = 'Basketbal';
$text['cs']['Golf'] = 'Golf';
$text['cs']['Tennis'] = 'Tenis';
$text['cs']['Soccer'] = 'Fotbal';
$text['cs']['captcha'] = 'Spáchat tuto zločinnost? Klikněte na zelenou fajfku!!';



$text['en']['gym_wait'] = 'You have to wait {timer} before you can sport again!';
$text['en']['gym_success_att'] = 'Gym session is successful! You have trained {att} attack power!';
$text['en']['gym_success_deff'] = 'gym session is successful! You have trained {deff} deffence power!';
$text['en']['gym_success_attdeff'] = 'gym session is successful! You have trained {att} attack and {deff} deffence power!';
$text['en']['no_sport'] = 'You have to select a sport!';

$text['nl']['gym_wait'] = 'Je moet {timer} wachten voordat je weer kunt sporten!';
$text['de']['gym_wait'] = 'Du musst {timer} warten, bevor du wieder Sport treiben kannst!';
$text['es']['gym_wait'] = 'Debes esperar {timer} antes de que puedas hacer deporte nuevamente!';
$text['pt']['gym_wait'] = 'Você precisa esperar {timer} antes de poder fazer esportes novamente!';
$text['fr']['gym_wait'] = 'Vous devez attendre {timer} avant de pouvoir refaire du sport !';
$text['cs']['gym_wait'] = 'Musíte počkat {timer}, než budete moci znovu sportovat!';


$text['nl']['gym_success_att'] = 'Sportschoolsessie is geslaagd! Je hebt {att} aanvalskracht getraind!';
$text['de']['gym_success_att'] = 'Das Training im Fitnessstudio war erfolgreich! Du hast {att} Angriffskraft trainiert!';
$text['es']['gym_success_att'] = '¡La sesión de gimnasio fue exitosa! Has entrenado {att} potencia de ataque!';
$text['pt']['gym_success_att'] = 'Sessão de academia bem-sucedida! Você treinou {att} poder de ataque!';
$text['fr']['gym_success_att'] = 'La session de gymnase est réussie ! Vous avez entraîné {att} de puissance d\'attaque!';
$text['cs']['gym_success_att'] = 'Posilovna byla úspěšná! Trénovali jste {att} útokovou sílu!';

$text['nl']['gym_success_deff'] = 'Sportschoolsessie is geslaagd! Je hebt {deff} verdedigingskracht getraind!';
$text['de']['gym_success_deff'] = 'Das Training im Fitnessstudio war erfolgreich! Du hast {deff} Verteidigungskraft trainiert!';
$text['es']['gym_success_deff'] = '¡La sesión de gimnasio fue exitosa! Has entrenado {deff} potencia de defensa!';
$text['pt']['gym_success_deff'] = 'Sessão de academia bem-sucedida! Você treinou {deff} poder de defesa!';
$text['fr']['gym_success_deff'] = 'La session de gymnase est réussie ! Vous avez entraîné {deff} de puissance de défense!';
$text['cs']['gym_success_deff'] = 'Posilovna byla úspěšná! Trénovali jste {deff} obrannou sílu!';

$text['nl']['gym_success_attdeff'] = 'Sportschoolsessie is geslaagd! Je hebt {att} aanvalskracht en {deff} verdedigingskracht getraind!';
$text['de']['gym_success_attdeff'] = 'Das Training im Fitnessstudio war erfolgreich! Du hast {att} Angriffskraft und {deff} Verteidigungskraft trainiert!';
$text['es']['gym_success_attdeff'] = '¡La sesión de gimnasio fue exitosa! Has entrenado {att} potencia de ataque y {deff} potencia de defensa!';
$text['pt']['gym_success_attdeff'] = 'Sessão de academia bem-sucedida! Você treinou {att} poder de ataque e {deff} poder de defesa!';
$text['fr']['gym_success_attdeff'] = 'La session de gymnase est réussie ! Vous avez entraîné {att} de puissance d\'attaque et {deff} de puissance de défense!';
$text['cs']['gym_success_attdeff'] = 'Posilovna byla úspěšná! Trénovali jste {att} útokovou sílu a {deff} obrannou sílu!';

$text['nl']['no_sport'] = 'Je moet een sport selecteren!';
$text['de']['no_sport'] = 'Du musst eine Sportart auswählen!';
$text['es']['no_sport'] = '¡Debes seleccionar un deporte!';
$text['pt']['no_sport'] = 'Você precisa selecionar um esporte!';
$text['fr']['no_sport'] = 'Vous devez sélectionner un sport!';
$text['cs']['no_sport'] = 'Musíte vybrat sport!';

$q = "SELECT * FROM timers where activity = 'gym' and username = '".$userdata[0]['username']."'";
$timer = $db->query($q)->fetch();

$now = date("Y-m-d H:i:s");
$wait = 0;
if($timer[0]['time'] >= $now){
		$wait = datetotime($timer[0]['time']) - time();
		$count_timer = '<font id="count_timer"></font>';
		$text[$lang]['gym_wait'] = txt($text[$lang]['gym_wait'],'{timer}', $count_timer);
		$errors[] = $text[$lang]['gym_wait'];
}



if($_SERVER['REQUEST_METHOD'] === 'POST'){
	
		
	if(!isset($_POST['sport'])){
				$errors[] = $text[$lang]['no_sport'];

	}

	if(empty($errors))
	{
		
			
				
				
				
		$att = 0;
		$deff = 0;
	 	$rand = rand(1,3);
	 	$extra = rand(10,150);
	 	if($rand == 1){
	 		$att = rand(500,3000);
	 		$att = $att + (($att / 100 ) * $extra);
			$text[$lang]['gym_success_att'] = txt($text[$lang]['gym_success_att'],'{att}',number($att));
			$success[] = $text[$lang]['gym_success_att'];
	 	}
		if($rand == 2){
	 		$deff = rand(500,3000);
	 		$deff = $deff + (($deff / 100 ) * $extra);
			$text[$lang]['gym_success_deff'] = txt($text[$lang]['gym_success_deff'],'{deff}',number($deff));
			$success[] = $text[$lang]['gym_success_deff'];
	 	}
	 	if($rand == 3){
	 		$att = rand(250,2000);
	 		$att = $att + (($att / 100 ) * $extra);
	 		$deff = rand(250,2000);
	 		$deff = $deff + (($deff / 100 ) * $extra);
			$text[$lang]['gym_success_attdeff'] = txt($text[$lang]['gym_success_attdeff'],'{att}',number($att));
			$text[$lang]['gym_success_attdeff'] = txt($text[$lang]['gym_success_attdeff'],'{deff}',number($deff));
			$success[] = $text[$lang]['gym_success_attdeff'];
	 	}
	 	
	 	
	 	$cooldown = 10800;
	 	
	 			
		$nexttime = timetodate(time() + $cooldown);
		$qc = "SELECT * FROM timers where username = '".$userdata[0]['username']."' and activity = 'gym'";
		$fchance = $db->query($qc)->fetch();
		if($db->affected_rows == '0')
		{	
			$timers = array(
                'activity' => 'gym',
                'username' =>$userdata[0]['username'],
                'time' => $nexttime,
            );
         	$timers = $db->insert('timers', $timers); 
		}else{
			$timers = array(
                'time' => $nexttime,
           	 );
			$where = array(
				'activity' => 'gym',
				'username' => $userdata[0]['username']
			);
			$db->where($where)->update('timers', $timers); 
		}


	 	
				

			$user = array(
                'att_power' => ($userdata[0]['att_power'] + $att),
                'deff_power' => ($userdata[0]['deff_power'] + $deff),
           	 );
			$where = array(
				'id' => $userdata[0]['id']
			);
			$db->where($where)->update('users', $user); 
			
			
		
		
					
			
	 	
	}

}


