<?php



    if(!isset($_SESSION['suid']) or $_SESSION['suid'] == ''){
        header("Location: ".BASE_URL."login/");
        exit(); 
    }

    if(!isset($userdata[0]['authority']) or $userdata[0]['authority'] != 'admin'){
        //header("Location: /");
       //exit(); 
    }
    
$text['en']['exchange_office_title'] = "Exchange office";
$text['en']['exchange_description'] = "You can spend your credits here. At the moment, you have {credits} credits. Do you need more? <a href='buycredits'>Order more credits here!</a>";
$text['en']['order_more_credits_link'] = "Order more credits here!";
$text['en']['item'] = "Item";
$text['en']['credits'] = "Credits";
$text['en']['buy_now'] = "Buy now!";
$text['en']['no_selected'] = "You have nothing selected!";
$text['en']['doesnt_exist'] = "You are trying to purchase an item that does not exist!";
$text['en']['cheating'] = "Are you trying to cheat?";
$text['en']['not_enough_credits'] = "You don't have enough credits to purchase this item!";
$text['en']['success'] = "You have bought: {item}";


// Dutch
$text['nl']['exchange_office_title'] = "Wisselkantoor";
$text['nl']['exchange_description'] = "Hier kun je je credits besteden. Op dit moment heb je {credits} credits. Heb je er meer nodig? <a href='buycredits'>Bestel hier meer credits!</a>";
$text['nl']['order_more_credits_link'] = "Bestel hier meer credits!";
$text['nl']['item'] = "Item";
$text['nl']['credits'] = "Credits";
$text['nl']['buy_now'] = "Koop nu!";
$text['nl']['no_selected'] = "Je hebt niets geselecteerd!";
$text['nl']['doesnt_exist'] = "Je probeert een item te kopen dat niet bestaat!";
$text['nl']['cheating'] = 'Probeer je vals te spelen?';
$text['nl']['not_enough_credits'] = 'Je hebt niet genoeg credits om dit item te kopen!';
$text['nl']['success'] = 'Je hebt gekocht: {item}';

// German
$text['de']['exchange_office_title'] = "Wechselstube";
$text['de']['exchange_description'] = "Hier können Sie Ihre Credits ausgeben. Im Moment haben Sie {credits} Credits. Benötigen Sie mehr? <a href='buycredits'>Bestellen Sie hier mehr Credits!</a>";
$text['de']['order_more_credits_link'] = "Bestellen Sie hier mehr Credits!";
$text['de']['item'] = "Artikel";
$text['de']['credits'] = "Credits";
$text['de']['buy_now'] = "Jetzt kaufen!";
$text['de']['no_selected'] = "Sie haben nichts ausgewählt!";
$text['de']['doesnt_exist'] = "Sie versuchen, einen Artikel zu kaufen, der nicht existiert!";
$text['de']['cheating'] = 'Versuchen Sie zu schummeln?';
$text['de']['not_enough_credits'] = 'Sie haben nicht genug Credits, um diesen Artikel zu kaufen!';
$text['de']['success'] = 'Sie haben gekauft: {item}';

// Spanish
$text['es']['exchange_office_title'] = "Oficina de cambio";
$text['es']['exchange_description'] = "Puede gastar sus créditos aquí. En este momento tiene {credits} créditos. ¿Necesita más? <a href='buycredits'>¡Ordene más créditos aquí!</a>";
$text['es']['order_more_credits_link'] = "Ordene más créditos aquí!";
$text['es']['item'] = "Artículo";
$text['es']['credits'] = "Créditos";
$text['es']['buy_now'] = "¡Comprar ahora!";
$text['es']['no_selected'] = "¡No ha seleccionado nada!";
$text['es']['doesnt_exist'] = "Está intentando comprar un artículo que no existe!";
$text['es']['cheating'] = '¿Está intentando hacer trampa?';
$text['es']['not_enough_credits'] = 'No tiene suficientes créditos para comprar este artículo!';
$text['es']['success'] = 'Ha comprado: {item}';

// Portuguese
$text['pt']['exchange_office_title'] = "Casa de câmbio";
$text['pt']['exchange_description'] = "Você pode gastar seus créditos aqui. No momento, você tem {credits} créditos. Precisa de mais? <a href='buycredits'>Compre mais créditos aqui!</a>";
$text['pt']['order_more_credits_link'] = "Compre mais créditos aqui!";
$text['pt']['item'] = "Item";
$text['pt']['credits'] = "Créditos";
$text['pt']['buy_now'] = "Compre agora!";
$text['pt']['no_selected'] = "Você não selecionou nada!";
$text['pt']['doesnt_exist'] = "Você está tentando comprar um item que não existe!";
$text['pt']['cheating'] = 'Você está tentando trapacear?';
$text['pt']['not_enough_credits'] = 'Você não tem créditos suficientes para comprar este item!';
$text['pt']['success'] = 'Você comprou: {item}';

// French
$text['fr']['exchange_office_title'] = "Bureau de change";
$text['fr']['exchange_description'] = "Vous pouvez dépenser vos crédits ici. Pour l'instant, vous avez {credits} crédits. En avez-vous besoin de plus? <a href='buycredits'>Commandez plus de crédits ici!</a>";
$text['fr']['order_more_credits_link'] = "Commandez plus de crédits ici!";
$text['fr']['item'] = "Article";
$text['fr']['credits'] = "Crédits";
$text['fr']['buy_now'] = "Acheter maintenant !";
$text['fr']['no_selected'] = "Vous n'avez rien sélectionné !";
$text['fr']['doesnt_exist'] = "Vous essayez d'acheter un article qui n'existe pas !";
$text['fr']['cheating'] = 'Essayez-vous de tricher ?';
$text['fr']['not_enough_credits'] = "Vous n'avez pas assez de crédits pour acheter cet article !";
$text['fr']['success'] = 'Vous avez acheté : {item}';

// Czech
$text['cs']['exchange_office_title'] = "Směnárna";
$text['cs']['exchange_description'] = "Zde můžete utratit své kredity. Momentálně máte {credits} kreditů. Potřebujete více? <a href='buycredits'>Objednejte si více kreditů zde!</a>";
$text['cs']['order_more_credits_link'] = "Objednejte si více kreditů zde!";
$text['cs']['item'] = "Položka";
$text['cs']['credits'] = "Kredity";
$text['cs']['buy_now'] = "Koupit nyní!";
$text['cs']['no_selected'] = "Nemáte vybráno!";
$text['cs']['doesnt_exist'] = "Snažíte se koupit položku, která neexistuje!";
$text['cs']['cheating'] = 'Snažíte se podvádět?';
$text['cs']['not_enough_credits'] = 'Nemáte dostatek kreditů na zakoupení této položky!';
$text['cs']['success'] = 'Zakoupil jste: {item}';
 
	
	
	
$text['nl']['already_safe'] = 'Je hebt al een kluis!';


 	$q = "SELECT * FROM translations where activity = 'exchangeoffice' and lang = '".$lang."'";
	$t = $db->query($q)->fetch();


if($_SERVER['REQUEST_METHOD'] === 'POST'){
		
		$id = isset($_POST['exchange']) ? $_POST['exchange'] : '0';
		$id = $db->escape($id);
		 

	if($id == 0){
		$errors[] = $text[$lang]['no_selected'];
	}
	
	if(!is_numeric($id)){
		$errors[] = $text[$lang]['cheating'];
	}
	

  	$qc = "SELECT * FROM exchangeoffice where id = '".$id."' ";
	$fc = $db->query($qc)->fetch();
	if($db->affected_rows != '1')
	{	
		$errors[] = $text[$lang]['doesnt_exist'];
	}else{
	
		if($userdata[0]['credits'] < $fc[0]['price'])
		{
			$errors[] = $text[$lang]['not_enough_credits'];
		}
	
				
			if($fc[0]['dbfield'] == 'safe'){
				if($userdata[0]['safeactive'] != 0){
				
			$errors[] = $text[$lang]['already_safe'];
				}
			}
			
	}


	
		
 		if(empty($errors))
		{
		
			if($fc[0]['dbfield'] == 'money'){
				$user = array( 'bank' => ($userdata[0]['bank'] + $fc[0]['value']), 'credits' => ($userdata[0]['credits'] - $fc[0]['price']));
				$where = array('id' => $userdata[0]['id']);
				$db->where($where)->update('users', $user); 
			}
			
			if($fc[0]['dbfield'] == 'safe'){
				$user = array( 'safeactive' => 1, 'credits' => ($userdata[0]['credits'] - $fc[0]['price']));
				$where = array('id' => $userdata[0]['id']);
				$db->where($where)->update('users', $user); 
			}
			
			if($fc[0]['dbfield'] == 'health'){
				if(($userdata[0]['health'] + $fc[0]['value']) > 100){ $newhealth = '100'; }else{ $newhealth = $userdata[0]['health'] + $fc[0]['value'];}
				$user = array( 'health' => $newhealth, 'credits' => ($userdata[0]['credits'] - $fc[0]['price']));
				$where = array('id' => $userdata[0]['id']);
				$db->where($where)->update('users', $user); 
			}
						
			if($fc[0]['dbfield'] == 'breakout'){
				$user = array( 'breakoutpoints' => ($userdata[0]['breakoutpoints'] + $fc[0]['value']), 'credits' => ($userdata[0]['credits'] - $fc[0]['price']));
				$where = array('id' => $userdata[0]['id']);
				$db->where($where)->update('users', $user); 
			}
			
			if($fc[0]['dbfield'] == 'garagespots'){
				$user = array( 'garagespots' => ($userdata[0]['garagespots'] + $fc[0]['value']), 'credits' => ($userdata[0]['credits'] - $fc[0]['price']));
				$where = array('id' => $userdata[0]['id']);
				$db->where($where)->update('users', $user); 
			}
	
			$text[$lang]['success'] = txt($text[$lang]['success'],'{item}', gettranslation($fc[0]['id'],$t));
			$success[] = txt($text[$lang]['success'],'{amount}', number($fc[0]['value']));
		}
	

}






  	$q = "SELECT * FROM exchangeoffice order by sort asc";
	$c = $db->query($q)->fetch();
	