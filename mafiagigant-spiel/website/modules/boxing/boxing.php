<?php

    if(!isset($_SESSION['suid']) or $_SESSION['suid'] == ''){
        header("Location: ".BASE_URL."login/");
        exit(); 
    }

if($var != ''){
        header("Location: ".BASE_URL."/");
        exit(); 
}

$text['en']['boxing_club_title'] = 'Boxing club';
$text['en']['boxing_club_welcome'] = 'Welcome to the boxing club!';
$text['en']['boxing_club_description'] = 'Practice your boxing skills for 5 minutes in the gym to give your strength a boost.';
$text['en']['current_boxing_strength'] = 'Current boxing strength';
$text['en']['train_boxing_skill_instruction'] = 'Train your boxing skill? Click on the gun.';

$text['en']['boxing_wait'] = 'You have to wait {timer} before you can box again!';
$text['en']['boxing_success'] = 'Boxing session is successful! You have trained {amount} boxing power!';




$text['nl']['boxing_club_title'] = 'Boksschool';
$text['nl']['boxing_club_welcome'] = 'Welkom bij de boksschool!';
$text['nl']['boxing_club_description'] = 'Oefen je boksvaardigheden 5 minuten in de sportschool om je kracht te vergroten.';
$text['nl']['current_boxing_strength'] = 'Huidige bokskracht';
$text['nl']['train_boxing_skill_instruction'] = 'Train je boksvaardigheid? Klik op het pistool.';

	$text['nl']['boxing_wait'] = 'Je moet nog {timer} wachten voor dat je weer kan boxen!';
	$text['nl']['boxing_success'] = 'Box sessie is gelukt! je hebt {amount} box power er bij getraint!';

$text['de']['boxing_club_title'] = 'Boxclub';
$text['de']['boxing_club_welcome'] = 'Willkommen im Boxclub!';
$text['de']['boxing_club_description'] = 'Üben Sie Ihre Boxfähigkeiten 5 Minuten lang im Fitnessstudio, um Ihre Stärke zu steigern.';
$text['de']['current_boxing_strength'] = 'Aktuelle Boxstärke';
$text['de']['train_boxing_skill_instruction'] = 'Trainieren Sie Ihre Boxfähigkeiten? Klicken Sie auf die Pistole.';
$text['de']['boxing_wait'] = 'Sie müssen {timer} warten, bevor Sie erneut boxen können!';
$text['de']['boxing_success'] = 'Boxsitzung erfolgreich! Sie haben {amount} Boxkraft trainiert!';

$text['es']['boxing_club_title'] = 'Club de boxeo';
$text['es']['boxing_club_welcome'] = '¡Bienvenido al club de boxeo!';
$text['es']['boxing_club_description'] = 'Practica tus habilidades de boxeo durante 5 minutos en el gimnasio para aumentar tu fuerza.';
$text['es']['current_boxing_strength'] = 'Fuerza de boxeo actual';
$text['es']['train_boxing_skill_instruction'] = '¿Entrenar tu habilidad de boxeo? Haz clic en la pistola.';
$text['es']['boxing_wait'] = 'Debes esperar {timer} antes de poder boxear nuevamente.';
$text['es']['boxing_success'] = '¡La sesión de boxeo ha sido exitosa! Has entrenado {amount} de poder de boxeo.';

$text['pt']['boxing_club_title'] = 'Clube de Boxe';
$text['pt']['boxing_club_welcome'] = 'Bem-vindo ao clube de boxe!';
$text['pt']['boxing_club_description'] = 'Pratique suas habilidades de boxe por 5 minutos na academia para aumentar sua força.';
$text['pt']['current_boxing_strength'] = 'Força de boxe atual';
$text['pt']['train_boxing_skill_instruction'] = 'Treinar sua habilidade de boxe? Clique na pistola.';
$text['pt']['boxing_wait'] = 'Você precisa esperar {timer} antes de poder boxear novamente!';
$text['pt']['boxing_success'] = 'Sessão de boxe bem-sucedida! Você treinou {amount} de poder de boxe!';

$text['fr']['boxing_club_title'] = 'Club de boxe';
$text['fr']['boxing_club_welcome'] = 'Bienvenue au club de boxe !';
$text['fr']['boxing_club_description'] = 'Pratiquez vos compétences en boxe pendant 5 minutes à la salle de sport pour renforcer votre force.';
$text['fr']['current_boxing_strength'] = 'Force de boxe actuelle';
$text['fr']['train_boxing_skill_instruction'] = 'Entraînez votre compétence en boxe ? Cliquez sur le pistolet.';
$text['fr']['boxing_wait'] = 'Vous devez attendre {timer} avant de pouvoir boxer à nouveau !';
$text['fr']['boxing_success'] = 'La séance de boxe a réussi ! Vous avez entraîné {amount} de puissance de boxe !';


$text['cs']['boxing_club_title'] = 'Box klub';
$text['cs']['boxing_club_welcome'] = 'Vítejte v box klubu!';
$text['cs']['boxing_club_description'] = 'Cvičte své boxerské dovednosti po dobu 5 minut ve fitcentru a posilte svou sílu.';
$text['cs']['current_boxing_strength'] = 'Aktuální síla boxu';
$text['cs']['train_boxing_skill_instruction'] = 'Trénovat své boxerské dovednosti? Klikněte na pistoli.';
$text['cs']['boxing_wait'] = 'Musíte počkat {timer} než budete moci znovu boxovat!';
$text['cs']['boxing_success'] = 'Trénink boxu byl úspěšný! Natrénovali jste {amount} síly boxu!';






$q = "SELECT * FROM timers where activity = 'boxing' and username = '".$userdata[0]['username']."'";
$timer = $db->query($q)->fetch();

$now = date("Y-m-d H:i:s");
$wait = 0;
if($timer[0]['time'] >= $now){
		$wait = datetotime($timer[0]['time']) - time();
		$count_timer = '<font id="count_timer"></font>';
		$text[$lang]['boxing_wait'] = txt($text[$lang]['boxing_wait'],'{timer}', $count_timer);
		$errors[] = $text[$lang]['boxing_wait'];
}



if($_SERVER['REQUEST_METHOD'] === 'POST'){




	if(empty($errors))
	{
	 	$boxpower = rand(1,5);
	 	$boxcooldown = 300;
	 	
	 			
		$nextbox = timetodate(time() + $boxcooldown);
		$qc = "SELECT * FROM timers where username = '".$userdata[0]['username']."' and activity = 'boxing'";
		$fchance = $db->query($qc)->fetch();
		if($db->affected_rows == '0')
		{	
			$timers = array(
                'activity' => 'boxing',
                'username' =>$userdata[0]['username'],
                'time' => $nextbox,
            );
         	$timers = $db->insert('timers', $timers); 
		}else{
			$timers = array(
                'time' => $nextbox,
           	 );
			$where = array(
				'activity' => 'boxing',
				'username' => $userdata[0]['username']
			);
			$db->where($where)->update('timers', $timers); 
		}


	 	
	 	

			$user = array(
                'box_power' => ($userdata[0]['box_power'] + $boxpower),
           	 );
			$where = array(
				'id' => $userdata[0]['id']
			);
			$db->where($where)->update('users', $user); 
			
			
			
				$text[$lang]['boxing_success'] = txt($text[$lang]['boxing_success'],'{amount}',number($boxpower));
				$success[] = $text[$lang]['boxing_success'];
		
					
			
	 	
	}

}


