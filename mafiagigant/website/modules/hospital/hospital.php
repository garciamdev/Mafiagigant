<?php


    if(!isset($_SESSION['suid']) or $_SESSION['suid'] == ''){
        header("Location: ".BASE_URL."login/");
        exit(); 
    }

$objectprice = 500;
$minprice = 250;
$maxprice = 750;
$healwithoutowner = "no";

$owner = '';
$price = 500;

$q = "SELECT * FROM objects where object = 'hospital' and country = '".$userdata[0]['country']."' ";
$o = $db->query($q)->fetch();
if($db->affected_rows > 0){
	
$owner = $o[0]['username'];
$price = $o[0]['price'];
$earnings = $o[0]['earnings'];
}
		

$text['nl']['page_title'] = "Ziekenhuis kopen";
$text['nl']['page_content'] = "Ziekenhuis in {country} is tekoop.";
$text['nl']['buy_text'] = "Koop ziekenhuis voor {amount} credits.";
$text['nl']['revenue_text'] = "Koop ziekenhuis voor {amount} credits.";
$text['nl']['text1'] = "Nadat je het ziekenhuis hebt gekocht, zul je alle inkomsten daaruit ontvangen!";
$text['nl']['text2'] = "Je bent de eigenaar voor altijd... tenzij je sterft.";
$text['nl']['purchase_button'] = "Betaal {amount} credits";
$text['nl']['cheating'] = "Enkel getallen zijn toegestaan!";
$text['nl']['minimum'] = "Je moet het item minimaal 1% kopen!";
$text['nl']['maximum'] = "Je kan niet meer dan 100% gezondheid hebben!";
$text['nl']['notenough_cash'] = "Je hebt niet genoeg cash!";
$text['nl']['bought'] = "Je hebt je gezondheid aangevuld!";
$text['nl']['not_enough_credits'] = "Je hebt niet voldoende credits om dit object te kopen!";
$text['nl']['already_owner'] = "Dit object heeft al een eigenaar!";
$text['nl']['purchase_object'] = "Je hebt het object gekocht!";
$text['nl']['no_owner'] = "Dit object heeft nog geen eigenaar!";
$text['nl']['page_title_prison'] = "Ziekenhuis";
$text['nl']['profit_hospital'] = "Winst met deze ziekenhuis";
$text['nl']['settings'] = "Instellingen";
$text['nl']['healprice'] = "Prijs per %";
$text['nl']['minprice'] = "min. {minprice}";
$text['nl']['maxprice'] = "max. {maxprice}";
$text['nl']['price_to_low'] = 'Minimale prijs per seconde is € {minprice}';
$text['nl']['price_to_high'] = 'Maximale prijs per seconde is € {maxprice}';
$text['nl']['price_changes'] = 'De prijs per % is nu € {price}';
$text['nl']['save_setting'] = "Opslaan";
$text['nl']['hospital_title'] = 'Ziekenhuis';
$text['nl']['hospital'] = 'Ziekenhuis';
$text['nl']['owner'] = 'Eigenaar';
$text['nl']['price_per_percent'] = 'Prijs per procent';
$text['nl']['welcome_message'] = 'Welkom in het ziekenhuis, wat kunnen we voor je doen?';
$text['nl']['your_health'] = 'Je gezondheid';
$text['nl']['buy_extra_health'] = 'Koop extra gezondheid';
$text['nl']['captcha'] = 'Wil je gezondheid erbij kopen? Klik op het groene vinkje!!';

$text['en']['page_title'] = "Buy Hospital";
$text['en']['page_content'] = "Hospital in {country} is for sale.";
$text['en']['buy_text'] = "Buy hospital for {amount} credits.";
$text['en']['revenue_text'] = "Buy hospital for {amount} credits.";
$text['en']['text1'] = "After you have bought the hospital, you will receive all the income from it!";
$text['en']['text2'] = "You are the owner forever... unless you die.";
$text['en']['purchase_button'] = "Pay {amount} credits";
$text['en']['cheating'] = "Only numbers are allowed!";
$text['en']['minimum'] = "You must buy the item for at least 1%!";
$text['en']['maximum'] = "You cannot have more than 100% health!";
$text['en']['notenough_cash'] = "You do not have enough cash!";
$text['en']['bought'] = "You have replenished your health!";
$text['en']['not_enough_credits'] = "You do not have enough credits to buy this item!";
$text['en']['already_owner'] = "This item already has an owner!";
$text['en']['purchase_object'] = "You have bought the item!";
$text['en']['no_owner'] = "This item does not have an owner yet!";
$text['en']['page_title_prison'] = "Hospital";
$text['en']['profit_hospital'] = "Profit with this hospital";
$text['en']['settings'] = "Settings";
$text['en']['healprice'] = "Price per %";
$text['en']['minprice'] = "min. {minprice}";
$text['en']['maxprice'] = "max. {maxprice}";
$text['en']['price_to_low'] = 'Minimum price per second is € {minprice}';
$text['en']['price_to_high'] = 'Maximum price per second is € {maxprice}';
$text['en']['price_changes'] = 'The price per % is now € {price}';
$text['en']['save_setting'] = "Save";
$text['en']['hospital_title'] = 'Hospital';
$text['en']['hospital'] = 'Hospital';
$text['en']['owner'] = 'Owner';
$text['en']['price_per_percent'] = 'Price per percent';
$text['en']['welcome_message'] = 'Welcome to the hospital, what can we do for you?';
$text['en']['your_health'] = 'Your health';
$text['en']['buy_extra_health'] = 'Buy extra health';
$text['en']['captcha'] = 'Do you want to buy health? Click on the green checkmark!';


$text['de']['page_title'] = "Krankenhaus kaufen";
$text['de']['page_content'] = "Krankenhaus in {country} steht zum Verkauf.";
$text['de']['buy_text'] = "Kaufe Krankenhaus für {amount} Credits.";
$text['de']['revenue_text'] = "Kaufe Krankenhaus für {amount} Credits.";
$text['de']['text1'] = "Nachdem du das Krankenhaus gekauft hast, erhältst du alle Einnahmen daraus!";
$text['de']['text2'] = "Du bist der Besitzer für immer... es sei denn, du stirbst.";
$text['de']['purchase_button'] = "Bezahle {amount} Credits";
$text['de']['cheating'] = "Nur Zahlen sind erlaubt!";
$text['de']['minimum'] = "Du musst den Artikel mindestens um 1% kaufen!";
$text['de']['maximum'] = "Du kannst nicht mehr als 100% Gesundheit haben!";
$text['de']['notenough_cash'] = "Du hast nicht genug Bargeld!";
$text['de']['bought'] = "Du hast deine Gesundheit aufgefüllt!";
$text['de']['not_enough_credits'] = "Du hast nicht genug Credits, um diesen Artikel zu kaufen!";
$text['de']['already_owner'] = "Dieser Artikel hat bereits einen Besitzer!";
$text['de']['purchase_object'] = "Du hast den Artikel gekauft!";
$text['de']['no_owner'] = "Dieser Artikel hat noch keinen Besitzer!";
$text['de']['page_title_prison'] = "Krankenhaus";
$text['de']['profit_hospital'] = "Gewinn mit diesem Krankenhaus";
$text['de']['settings'] = "Einstellungen";
$text['de']['healprice'] = "Preis pro %";
$text['de']['minprice'] = "min. {minprice}";
$text['de']['maxprice'] = "max. {maxprice}";
$text['de']['price_to_low'] = 'Mindestpreis pro Sekunde beträgt € {minprice}';
$text['de']['price_to_high'] = 'Höchstpreis pro Sekunde beträgt € {maxprice}';
$text['de']['price_changes'] = 'Der Preis pro % beträgt jetzt € {price}';
$text['de']['save_setting'] = "Speichern";
$text['de']['hospital_title'] = 'Krankenhaus';
$text['de']['hospital'] = 'Krankenhaus';
$text['de']['owner'] = 'Besitzer';
$text['de']['price_per_percent'] = 'Preis pro Prozent';
$text['de']['welcome_message'] = 'Willkommen im Krankenhaus, was können wir für dich tun?';
$text['de']['your_health'] = 'Deine Gesundheit';
$text['de']['buy_extra_health'] = 'Kaufe zusätzliche Gesundheit';
$text['de']['captcha'] = 'Möchtest du Gesundheit kaufen? Klicke auf den Button!';


$text['es']['page_title'] = "Comprar Hospital";
$text['es']['page_content'] = "Hospital en {country} está en venta.";
$text['es']['buy_text'] = "Compra el hospital por {amount} créditos.";
$text['es']['revenue_text'] = "Compra el hospital por {amount} créditos.";
$text['es']['text1'] = "Después de comprar el hospital, ¡recibirás todos los ingresos de él!";
$text['es']['text2'] = "Eres el dueño para siempre... a menos que mueras.";
$text['es']['purchase_button'] = "Paga {amount} créditos";
$text['es']['cheating'] = "¡Solo se permiten números!";
$text['es']['minimum'] = "Debes comprar el artículo por al menos un 1%.";
$text['es']['maximum'] = "No puedes tener más del 100% de salud.";
$text['es']['notenough_cash'] = "No tienes suficiente efectivo.";
$text['es']['bought'] = "Has repuesto tu salud.";
$text['es']['not_enough_credits'] = "No tienes suficientes créditos para comprar este artículo.";
$text['es']['already_owner'] = "Este artículo ya tiene un propietario.";
$text['es']['purchase_object'] = "Has comprado el artículo.";
$text['es']['no_owner'] = "Este artículo aún no tiene propietario.";
$text['es']['page_title_prison'] = "Hospital";
$text['es']['profit_hospital'] = "Beneficio con este hospital";
$text['es']['settings'] = "Ajustes";
$text['es']['healprice'] = "Precio por %";
$text['es']['minprice'] = "mín. {minprice}";
$text['es']['maxprice'] = "máx. {maxprice}";
$text['es']['price_to_low'] = 'El precio mínimo por segundo es de € {minprice}';
$text['es']['price_to_high'] = 'El precio máximo por segundo es de € {maxprice}';
$text['es']['price_changes'] = 'El precio por % es ahora € {price}';
$text['es']['save_setting'] = "Guardar";
$text['es']['hospital_title'] = 'Hospital';
$text['es']['hospital'] = 'Hospital';
$text['es']['owner'] = 'Dueño';
$text['es']['price_per_percent'] = 'Precio por porcentaje';
$text['es']['welcome_message'] = 'Bienvenido al hospital, ¿en qué podemos ayudarte?';
$text['es']['your_health'] = 'Tu salud';
$text['es']['buy_extra_health'] = 'Compra salud adicional';
$text['es']['captcha'] = '¿Quieres comprar salud? ¡Haz clic en la marca de verificación verde!';


$text['pt']['page_title'] = "Comprar Hospital";
$text['pt']['page_content'] = "Hospital em {country} está à venda.";
$text['pt']['buy_text'] = "Compre o hospital por {amount} créditos.";
$text['pt']['revenue_text'] = "Compre o hospital por {amount} créditos.";
$text['pt']['text1'] = "Depois de comprar o hospital, você receberá todas as receitas dele!";
$text['pt']['text2'] = "Você é o dono para sempre... a menos que morra.";
$text['pt']['purchase_button'] = "Pague {amount} créditos";
$text['pt']['cheating'] = "Apenas números são permitidos!";
$text['pt']['minimum'] = "Você deve comprar o item por pelo menos 1%!";
$text['pt']['maximum'] = "Você não pode ter mais de 100% de saúde!";
$text['pt']['notenough_cash'] = "Você não tem dinheiro suficiente!";
$text['pt']['bought'] = "Você reabasteceu sua saúde!";
$text['pt']['not_enough_credits'] = "Você não tem créditos suficientes para comprar este item!";
$text['pt']['already_owner'] = "Este item já tem um dono!";
$text['pt']['purchase_object'] = "Você comprou o item!";
$text['pt']['no_owner'] = "Este item ainda não tem um dono!";
$text['pt']['page_title_prison'] = "Hospital";
$text['pt']['profit_hospital'] = "Lucro com este hospital";
$text['pt']['settings'] = "Configurações";
$text['pt']['healprice'] = "Preço por %";
$text['pt']['minprice'] = "mín. {minprice}";
$text['pt']['maxprice'] = "máx. {maxprice}";
$text['pt']['price_to_low'] = 'O preço mínimo por segundo é € {minprice}';
$text['pt']['price_to_high'] = 'O preço máximo por segundo é € {maxprice}';
$text['pt']['price_changes'] = 'O preço por % agora é € {price}';
$text['pt']['save_setting'] = "Salvar";
$text['pt']['hospital_title'] = 'Hospital';
$text['pt']['hospital'] = 'Hospital';
$text['pt']['owner'] = 'Dono';
$text['pt']['price_per_percent'] = 'Preço por porcentagem';
$text['pt']['welcome_message'] = 'Bem-vindo ao hospital, o que podemos fazer por você?';
$text['pt']['your_health'] = 'Sua saúde';
$text['pt']['buy_extra_health'] = 'Compre saúde adicional';
$text['pt']['captcha'] = 'Quer comprar saúde? Clique na marca de verificação verde!';


$text['fr']['page_title'] = "Acheter Hôpital";
$text['fr']['page_content'] = "L'hôpital en {country} est à vendre.";
$text['fr']['buy_text'] = "Achetez l'hôpital pour {amount} crédits.";
$text['fr']['revenue_text'] = "Achetez l'hôpital pour {amount} crédits.";
$text['fr']['text1'] = "Après avoir acheté l'hôpital, vous recevrez tous les revenus qui en découlent !";
$text['fr']['text2'] = "Vous êtes le propriétaire à vie... à moins de mourir.";
$text['fr']['purchase_button'] = "Payez {amount} crédits";
$text['fr']['cheating'] = "Seuls les chiffres sont autorisés !";
$text['fr']['minimum'] = "Vous devez acheter l'article pour au moins 1% !";
$text['fr']['maximum'] = "Vous ne pouvez pas avoir plus de 100% de santé !";
$text['fr']['notenough_cash'] = "Vous n'avez pas assez d'argent !";
$text['fr']['bought'] = "Vous avez reconstitué votre santé !";
$text['fr']['not_enough_credits'] = "Vous n'avez pas suffisamment de crédits pour acheter cet article !";
$text['fr']['already_owner'] = "Cet article a déjà un propriétaire !";
$text['fr']['purchase_object'] = "Vous avez acheté l'article !";
$text['fr']['no_owner'] = "Cet article n'a pas encore de propriétaire !";
$text['fr']['page_title_prison'] = "Hôpital";
$text['fr']['profit_hospital'] = "Profit avec cet hôpital";
$text['fr']['settings'] = "Paramètres";
$text['fr']['healprice'] = "Prix par %";
$text['fr']['minprice'] = "min. {minprice}";
$text['fr']['maxprice'] = "max. {maxprice}";
$text['fr']['price_to_low'] = 'Le prix minimum par seconde est de € {minprice}';
$text['fr']['price_to_high'] = 'Le prix maximum par seconde est de € {maxprice}';
$text['fr']['price_changes'] = 'Le prix par % est maintenant de € {price}';
$text['fr']['save_setting'] = "Enregistrer";
$text['fr']['hospital_title'] = 'Hôpital';
$text['fr']['hospital'] = 'Hôpital';
$text['fr']['owner'] = 'Propriétaire';
$text['fr']['price_per_percent'] = 'Prix par pourcentage';
$text['fr']['welcome_message'] = "Bienvenue à l'hôpital, que pouvons-nous faire pour vous ?";
$text['fr']['your_health'] = 'Votre santé';
$text['fr']['buy_extra_health'] = 'Achetez une santé supplémentaire';
$text['fr']['captcha'] = 'Voulez-vous acheter de la santé ? Cliquez sur la coche verte !';

$text['cs']['page_title'] = "Koupit nemocnici";
$text['cs']['page_content'] = "Nemocnice v {country} je na prodej.";
$text['cs']['buy_text'] = "Kupte nemocnici za {amount} kreditů.";
$text['cs']['revenue_text'] = "Kupte nemocnici za {amount} kreditů.";
$text['cs']['text1'] = "Po zakoupení nemocnice budete dostávat veškerý příjem z ní!";
$text['cs']['text2'] = "Jste majitelem navždy... pokud neskončíte mrtví.";
$text['cs']['purchase_button'] = "Zaplatit {amount} kreditů";
$text['cs']['cheating'] = "Povoleny jsou pouze čísla!";
$text['cs']['minimum'] = "Musíte koupit položku minimálně za 1%!";
$text['cs']['maximum'] = "Nemůžete mít více než 100% zdraví!";
$text['cs']['notenough_cash'] = "Nemáte dostatek hotovosti!";
$text['cs']['bought'] = "Doplnili jste své zdraví!";
$text['cs']['not_enough_credits'] = "Nemáte dostatek kreditů na zakoupení této položky!";
$text['cs']['already_owner'] = "Tato položka již má majitele!";
$text['cs']['purchase_object'] = "Zakoupili jste položku!";
$text['cs']['no_owner'] = "Tato položka zatím nemá majitele!";
$text['cs']['page_title_prison'] = "Nemocnice";
$text['cs']['profit_hospital'] = "Zisk s touto nemocnicí";
$text['cs']['settings'] = "Nastavení";
$text['cs']['healprice'] = "Cena za %";
$text['cs']['minprice'] = "min. {minprice}";
$text['cs']['maxprice'] = "max. {maxprice}";
$text['cs']['price_to_low'] = 'Minimální cena za sekundu je € {minprice}';
$text['cs']['price_to_high'] = 'Maximální cena za sekundu je € {maxprice}';
$text['cs']['price_changes'] = 'Cena za % nyní činí € {price}';
$text['cs']['save_setting'] = "Uložit";
$text['cs']['hospital_title'] = 'Nemocnice';
$text['cs']['hospital'] = 'Nemocnice';
$text['cs']['owner'] = 'Majitel';
$text['cs']['price_per_percent'] = 'Cena za procenta';
$text['cs']['welcome_message'] = 'Vítejte v nemocnici, co pro vás můžeme udělat?';
$text['cs']['your_health'] = 'Vaše zdraví';
$text['cs']['buy_extra_health'] = 'Koupit další zdraví';
$text['cs']['captcha'] = 'Chcete koupit zdraví? Klikněte na zelenou zaškrtávátko!';



if($_SERVER['REQUEST_METHOD'] === 'POST'){

	$buyy = isset($_POST['buy']) ? $_POST['buy'] : '0';
	$buyy = $db->escape($buyy);
	
	if($buyy == 1){
				if($owner == $userdata[0]['username']){

			$price = isset($_POST['price']) ? $_POST['price'] : $min;
			$price = $db->escape($price);
	
	
			if(!is_numeric($price)){
				$errorss[] = $text[$lang]['cheating'];
			}
			if($price < $minprice){
				$errorss[] = txt($text[$lang]['price_to_low'],"{minprice}",number($minprice));
			}
			if($price > $maxprice){
				$errorss[] = txt($text[$lang]['price_to_high'],"{maxprice}",number($maxprice));
			}
	
	 

			if(empty($errorss))
			{
			
			
				$update = array(   'price' =>  $price	 );
				$where = array( 'username' => $userdata[0]['username'], 'country' => $userdata[0]['country'], 'object' => 'hospital'	);
				$db->where($where)->update('objects', $update); 
							$successs[] = txt($text[$lang]['price_changes'],"{price}",number($price));

			}
				
				
						
				}else{
				
				
  		$q = "SELECT * FROM objects where object = 'hospital' and country = '".$userdata[0]['country']."' ";
		$o = $db->query($q)->fetch();
		if($db->affected_rows > 0){
			$errorss[] = $text[$lang]['already_owner'];
		}
		
		if($userdata[0]['credits'] < $objectprice){
			$errorss[] = $text[$lang]['not_enough_credits'];
		
		}
		
		if(empty($errorss))
		{
		 
					
			$insert = array(
                'object' => 'hospital',
                'username' => $userdata[0]['username'],
                'price' => $price,
                'country' => $userdata[0]['country'],
                'earnings' => 0,
            );
         	$insert = $db->insert('objects', $insert); 
         	
         	
				$update = array(   'credits' => ($userdata[0]['credits'] - $objectprice)	 );
				$where = array( 'username' => $userdata[0]['username'] 	);
				$db->where($where)->update('users', $update); 
				
				$successs[] = $text[$lang]['purchase_object'];
		
		
		
		}
		
		
				}
		
	}else{
	
		$buyhealth = isset($_POST['health']) ? $_POST['health'] : '0';
		$buyhealth = $db->escape($buyhealth);
	
		if(!is_numeric($buyhealth)){
			$errors[] = $text[$lang]['cheating'];
		}
		if($buyhealth < 1){
			$errors[] = $text[$lang]['minimum'];
		}
		if(($buyhealth + $userdata[0]['health']) > 100){
			$errors[] = $text[$lang]['maximum'];
		}
		
		
				if($owner == ''){
			$errors[] = $text[$lang]['no_owner'];
				
				}
		$qu = "SELECT * FROM users where id = '".$userdata[0]['id']."' ";
		$fu = $db->query($qu)->fetch();
	
 	
 		if($fu[0]['cash'] < ($buyhealth * $price)){
 			
			$errors[] = $text[$lang]['notenough_cash'];
 		}
 		
 
 		if(empty($errors))
		{
	
			$totalprice = $buyhealth * $price;
	 	
 		
 			$user = array(
                'cash' => ($fu[0]['cash'] - $totalprice),
                'health' => ($fu[0]['health'] + $buyhealth),
           	 );
			$where = array(
				'id' => $userdata[0]['id']
			);
			$db->where($where)->update('users', $user); 
			
				if($owner != ''){
					$qu = "update users set bank = bank + ".$totalprice." where username = '".$owner."'  ";
					$db->query($qu)->execute() ;
					$qu = "update objects set earnings = earnings + ".$totalprice." where username = '".$owner."' and  country = '".$userdata[0]['country']."' and object = 'hospital' ";
					$db->query($qu)->execute() ;
				}
			
			$success[] = $text[$lang]['bought'];

 		}
		
		
	
	}
	
}



$q = "SELECT * FROM objects where object = 'hospital' and country = '".$userdata[0]['country']."' ";
$o = $db->query($q)->fetch();
if($db->affected_rows > 0){
	
$owner = $o[0]['username'];
$price = $o[0]['price'];
$earnings = $o[0]['earnings'];
}
	
		