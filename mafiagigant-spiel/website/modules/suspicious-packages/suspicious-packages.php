<?php



    if(!isset($_SESSION['suid']) or $_SESSION['suid'] == ''){
        header("Location: ".BASE_URL."login/");
        exit(); 
    }

    if(!isset($userdata[0]['authority']) or $userdata[0]['authority'] != 'admin'){
     //  header("Location: /");
     //  exit(); 
    }
    
    
    $text['nl']['suspiciouspackages_Title'] = 'Verdachte pakketjes!';
$text['nl']['suspiciouspackages_message'] = 'Ga opzoek naar verdachte pakketjes!';
$text['nl']['suspiciouspackages_searching'] = 'Je begint met zoeken...';
$text['nl']['captcha'] = 'Verdachte pakketjes zoeken? Klik op het groene vinkje!!';
$text['nl']['wait'] = 'Je moet nog {timer} wachten voor dat je weer pakketjes kan zoeken!';
$text['nl']['wrong_country'] = 'Je kan verdachte pakketjes enkel in {country} zoeken!';
 
  
$text['nl']['found_money'] = '€ {amount} contant geld';
$text['nl']['found_credits'] = '{amount} credits';
$text['nl']['found_bullets'] = '{amount} kogels';
    
    
    $text['en']['suspiciouspackages_Title'] = 'Suspicious Packages!';
$text['en']['suspiciouspackages_message'] = 'Search for suspicious packages!';
$text['en']['suspiciouspackages_searching'] = 'You start searching...';
$text['en']['captcha'] = 'Looking for suspicious packages? Click the green checkmark!!';
$text['en']['wait'] = 'You need to wait {timer} before you can search for packages again!';
$text['en']['wrong_country'] = 'You can only search for suspicious packages in {country}!';

$text['en']['found_money'] = '€ {amount} in cash';
$text['en']['found_credits'] = '{amount} credits';
$text['en']['found_bullets'] = '{amount} bullets';


$text['de']['suspiciouspackages_Title'] = 'Verdächtige Pakete!';
$text['de']['suspiciouspackages_message'] = 'Suche nach verdächtigen Paketen!';
$text['de']['suspiciouspackages_searching'] = 'Du beginnst mit der Suche...';
$text['de']['captcha'] = 'Auf der Suche nach verdächtigen Paketen? Klicke auf den Button!!';
$text['de']['wait'] = 'Du musst noch {timer} warten, bevor du erneut nach Paketen suchen kannst!';
$text['de']['wrong_country'] = 'Du kannst nur in {country} nach verdächtigen Paketen suchen!';

$text['de']['found_money'] = '€ {amount} Bargeld';
$text['de']['found_credits'] = '{amount} Credits';
$text['de']['found_bullets'] = '{amount} Kugeln';

$text['es']['suspiciouspackages_Title'] = 'Paquetes sospechosos!';
$text['es']['suspiciouspackages_message'] = '¡Busca paquetes sospechosos!';
$text['es']['suspiciouspackages_searching'] = 'Comienzas a buscar...';
$text['es']['captcha'] = '¿Buscando paquetes sospechosos? ¡Haz clic en la marca de verificación verde!';
$text['es']['wait'] = 'Debes esperar {timer} antes de poder buscar paquetes nuevamente!';
$text['es']['wrong_country'] = '¡Solo puedes buscar paquetes sospechosos en {country}!';

$text['es']['found_money'] = '€ {amount} en efectivo';
$text['es']['found_credits'] = '{amount} créditos';
$text['es']['found_bullets'] = '{amount} balas';

$text['pt']['suspiciouspackages_Title'] = 'Pacotes suspeitos!';
$text['pt']['suspiciouspackages_message'] = 'Procure por pacotes suspeitos!';
$text['pt']['suspiciouspackages_searching'] = 'Você começa a procurar...';
$text['pt']['captcha'] = 'Procurando por pacotes suspeitos? Clique na marca de seleção verde!';
$text['pt']['wait'] = 'Você precisa esperar {timer} antes de poder procurar pacotes novamente!';
$text['pt']['wrong_country'] = 'Você só pode procurar por pacotes suspeitos em {country}!';

$text['pt']['found_money'] = '€ {amount} em dinheiro';
$text['pt']['found_credits'] = '{amount} créditos';
$text['pt']['found_bullets'] = '{amount} balas';


$text['fr']['suspiciouspackages_Title'] = 'Colis suspects!';
$text['fr']['suspiciouspackages_message'] = 'Recherchez des colis suspects!';
$text['fr']['suspiciouspackages_searching'] = 'Vous commencez à chercher...';
$text['fr']['captcha'] = 'À la recherche de colis suspects ? Cliquez sur la coche verte !';
$text['fr']['wait'] = 'Vous devez attendre {timer} avant de pouvoir rechercher à nouveau des colis !';
$text['fr']['wrong_country'] = 'Vous ne pouvez rechercher des colis suspects qu\'en {country} !';

$text['fr']['found_money'] = '€ {amount} en espèces';
$text['fr']['found_credits'] = '{amount} crédits';
$text['fr']['found_bullets'] = '{amount} balles';

$text['cs']['suspiciouspackages_Title'] = 'Podezřelé balíčky!';
$text['cs']['suspiciouspackages_message'] = 'Hledat podezřelé balíčky!';
$text['cs']['suspiciouspackages_searching'] = 'Začínáte hledat...';
$text['cs']['captcha'] = 'Hledáte podezřelé balíčky? Klepněte na zelenou značku zaškrtnutí!';
$text['cs']['wait'] = 'Musíte počkat {timer} než budete moci znovu hledat balíčky!';
$text['cs']['wrong_country'] = 'Podezřelé balíčky můžete hledat pouze v {country}!';

$text['cs']['found_money'] = '€ {amount} hotově';
$text['cs']['found_credits'] = '{amount} kreditů';
$text['cs']['found_bullets'] = '{amount} střel';

  	$q = "SELECT * FROM suspiciouspackages";
	$c = $db->query($q)->fetch();
	
	if($c[0]['country'] != 0){
		if( $c[0]['country'] != $userdata[0]['country']){
			$errors[] = txt($text[$lang]['wrong_country'],'{country}', getcountry($c[0]['country']));
		}
	}
    
$q = "SELECT * FROM timers where activity = 'suspiciouspackages' and username = '".$userdata[0]['username']."'";
$timer = $db->query($q)->fetch();

$now = date("Y-m-d H:i:s");
$wait = 0;
if($timer[0]['time'] >= $now){
		$wait = datetotime($timer[0]['time']) - time();
		$count_timer = '<font id="count_timer"></font>';
		$errors[] = txt($text[$lang]['wait'],'{timer}', $count_timer);
}


if($_SERVER['REQUEST_METHOD'] === 'POST'){
	if(empty($errors))
	{

	
		$rand = rand(1,$c[0]['quantity']);

	$totalmoney = 0;
	$totalbullets = 0;
	$totalcredits = 0;		
	$totalxp = rand($c[0]['exp'],$c[0]['maxexp']); 
		
		$i = 1;
		//$rand = 10;
while ($i <= $rand) {

		$randitem = rand(1,12);
		if($randitem <= 5) { $money = rand($c[0]['money'],$c[0]['maxmoney']); 
			$totalmoney = $totalmoney + $money;
		$success[] = txt($text[$lang]['found_money'],"{amount}",number($money));
		}
		if($randitem >= 6 and $randitem <= 9) { $bullets = rand($c[0]['bullets'],$c[0]['maxbullets']); 
		$totalbullets = $totalbullets + $bullets;
		$success[] = txt($text[$lang]['found_bullets'],"{amount}",number($bullets));
		}
		if($randitem >= 10 ) { $credits = rand($c[0]['credits'],$c[0]['maxcredits']);
		$totalcredits = $totalcredits + $credits;
		$success[] = txt($text[$lang]['found_credits'],"{amount}",number($credits));
		 }
		
		
		
		

			 
				
     $i++;  /* the printed value would be
                   $i before the increment
                   (post-increment) */
}

	$qu = "SELECT * FROM users where id = '".$userdata[0]['id']."' ";
	$fu = $db->query($qu)->fetch();

 			$user = array(
                'cash' => ($fu[0]['cash'] + $totalmoney),
                'bullets' => ($fu[0]['bullets'] + $totalbullets),
                'credits' => ($fu[0]['credits'] + $totalcredits),
                'xp' => ($fu[0]['xp'] + $totalxp),
           	 );
			$where = array(
				'id' => $userdata[0]['id']
			);
			$db->where($where)->update('users', $user); 
			
			
		$nexttime = timetodate(time() + $c[0]['cooldown']);
		$qc = "SELECT * FROM timers where username = '".$userdata[0]['username']."' and activity = 'suspiciouspackages'";
		$fchance = $db->query($qc)->fetch();
		if($db->affected_rows == '0')
		{	
			$timers = array(
                'activity' => 'suspiciouspackages',
                'username' =>$userdata[0]['username'],
                'time' => $nexttime,
            );
         	$timers = $db->insert('timers', $timers); 
		}else{
			$timers = array(
                'time' => $nexttime,
           	 );
			$where = array(
				'activity' => 'suspiciouspackages',
				'username' => $userdata[0]['username']
			);
			$db->where($where)->update('timers', $timers); 
		}

			 
		
	}
}