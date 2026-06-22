<?php


    if(!isset($_SESSION['suid']) or $_SESSION['suid'] == ''){
        header("Location: ".BASE_URL."login/");
        exit(); 
    }
    

    if(!isset($userdata[0]['authority']) or $userdata[0]['authority'] != 'admin'){ 
     $noaccess = 0;
    }

$objectprice = 500;
$minprice = 100;
$maxprice = 50000;
$producebase = 1000;
$produceperlvlmin = 100;
$produceperlvlmax = 200;
$producingduration = 7200; //2 hours
$healwithoutowner = "no";

$owner = '';
$price = 5000;
$stock = 0;
$timer = date("Y-m-d H:i:s");
 
 
 $now = date("Y-m-d H:i:s");
//add bullets to bulletfactory
$qu = "update objects_bulletfactory set amount = amount + addbullets, addbullets = 0 where time < '".$now."' and addbullets > 0 ";
$db->query($qu)->execute() ;



$q = "SELECT * FROM objects where object = 'bulletfactory' and country = '".$userdata[0]['country']."' ";
$o = $db->query($q)->fetch();
if($db->affected_rows > 0){
	
$objectid = $o[0]['id'];
$owner = $o[0]['username'];
$price = $o[0]['price'];
$earnings = $o[0]['earnings'];

	$q = "SELECT * FROM objects_bulletfactory where object = '".$o[0]['id']."'  ";
	$os = $db->query($q)->fetch();
	if($db->affected_rows > 0){
		$stock = $os[0]['amount'];
		$timer = $os[0]['time'];
	}
}
		

$text['nl']['page_title'] = "Kogelfabriek kopen";
$text['nl']['page_content'] = "Kogelfabriek in {country} is tekoop.";
$text['nl']['buy_text'] = "Koop een kogelfabriek voor {amount} credits.";
$text['nl']['revenue_text'] = "Koop een kogelfabriek voor {amount} credits.";
$text['nl']['text1'] = "Nadat je het kogelfabriek hebt gekocht, zul je alle inkomsten daaruit ontvangen!";
$text['nl']['text2'] = "Je bent de eigenaar voor altijd... tenzij je sterft.";
$text['nl']['purchase_button'] = "Betaal {amount} credits";
$text['nl']['cheating'] = "Enkel getallen zijn toegestaan!";
$text['nl']['minimum'] = "Je moet het item minimaal 1x kopen!";
$text['nl']['maximum'] = "Je kan niet meer dan het maximimum aantal kopen!";
$text['nl']['notenough_cash'] = "Je hebt niet genoeg cash!";
$text['nl']['bought'] = "Je hebt de kogels gekocht";
$text['nl']['not_enough_credits'] = "Je hebt niet voldoende credits om dit object te kopen!";
$text['nl']['already_owner'] = "Dit object heeft al een eigenaar!";
$text['nl']['purchase_object'] = "Je hebt het object gekocht!";
$text['nl']['no_owner'] = "Dit object heeft nog geen eigenaar!";
$text['nl']['page_title_prison'] = "Kogelfabriek";
$text['nl']['profit_hospital'] = "Winst met deze kogelfabriek";
$text['nl']['settings'] = "Instellingen";
$text['nl']['healprice'] = "Prijs per kogel";
$text['nl']['minprice'] = "min. {minprice}";
$text['nl']['maxprice'] = "max. {maxprice}";
$text['nl']['price_to_low'] = 'Minimale prijs per seconde is € {minprice}';
$text['nl']['price_to_high'] = 'Maximale prijs per seconde is € {maxprice}';
$text['nl']['price_changes'] = 'De prijs per kogel is nu € {price}';
$text['nl']['save_setting'] = "Opslaan";
$text['nl']['hospital_title'] = 'Kogelfabriek';
$text['nl']['hospital'] = 'Kogelfabriek';
$text['nl']['owner'] = 'Eigenaar';
$text['nl']['price_per_percent'] = 'Prijs per kogel';
$text['nl']['welcome_message'] = 'Welkom in de kogelfabriek, wat kunnen we voor je doen?';
$text['nl']['your_health'] = 'Beschikbare kogels';
$text['nl']['buy_extra_health'] = 'Kogels kopen';
$text['nl']['captcha'] = 'Kopen';
$text['nl']['buyownstock'] = 'Je kan je eigen voorraad niet opkopen!';
$text['nl']['production_started'] = 'De kogelproductie is gestart!';
 	$text['nl']['wait'] = 'Je moet nog {timer} wachten voor dat je weer kogels kan produceren!';
      $text['nl']['procude'] = "Produceren";
      $text['nl']['startprocude'] = "Begin je productie!";
      $text['nl']['startprocudebtn'] = "Start productie!";
      
      $text['en']['page_title'] = "Buy Bullet Factory";
$text['en']['page_content'] = "Bullet factory in {country} is for sale.";
$text['en']['buy_text'] = "Buy a bullet factory for {amount} credits.";
$text['en']['revenue_text'] = "Buy a bullet factory for {amount} credits.";
$text['en']['text1'] = "After purchasing the bullet factory, you will receive all the income from it!";
$text['en']['text2'] = "You are the owner forever... unless you die.";
$text['en']['purchase_button'] = "Pay {amount} credits";
$text['en']['cheating'] = "Only numbers are allowed!";
$text['en']['minimum'] = "You must buy the item at least once!";
$text['en']['maximum'] = "You cannot buy more than the maximum amount!";
$text['en']['notenough_cash'] = "You do not have enough cash!";
$text['en']['bought'] = "You have bought the bullets";
$text['en']['not_enough_credits'] = "You do not have enough credits to buy this object!";
$text['en']['already_owner'] = "This object already has an owner!";
$text['en']['purchase_object'] = "You have purchased the object!";
$text['en']['no_owner'] = "This object does not have an owner yet!";
$text['en']['page_title_prison'] = "Bullet Factory";
$text['en']['profit_hospital'] = "Profit with this bullet factory";
$text['en']['settings'] = "Settings";
$text['en']['healprice'] = "Price per bullet";
$text['en']['minprice'] = "min. {minprice}";
$text['en']['maxprice'] = "max. {maxprice}";
$text['en']['price_to_low'] = 'Minimum price per bullet is € {minprice}';
$text['en']['price_to_high'] = 'Maximum price per bullet is € {maxprice}';
$text['en']['price_changes'] = 'The price per bullet is now € {price}';
$text['en']['save_setting'] = "Save";
$text['en']['hospital_title'] = 'Bullet Factory';
$text['en']['hospital'] = 'Bullet Factory';
$text['en']['owner'] = 'Owner';
$text['en']['price_per_percent'] = 'Price per bullet';
$text['en']['welcome_message'] = 'Welcome to the bullet factory, what can we do for you?';
$text['en']['your_health'] = 'Available bullets';
$text['en']['buy_extra_health'] = 'Buy bullets';
$text['en']['captcha'] = 'Buy';
$text['en']['buyownstock'] = 'You cannot buy your own stock!';
$text['en']['production_started'] = 'Bullet production has started!';
$text['en']['wait'] = 'You have to wait {timer} before you can produce bullets again!';
$text['en']['procude'] = "Produce";
$text['en']['startprocude'] = "Start your production!";
$text['en']['startprocudebtn'] = "Start production!";

$text['de']['page_title'] = "Kugelfabrik kaufen";
$text['de']['page_content'] = "Die Kugelfabrik in {country} steht zum Verkauf.";
$text['de']['buy_text'] = "Kaufe eine Kugelfabrik für {amount} Credits.";
$text['de']['revenue_text'] = "Kaufe eine Kugelfabrik für {amount} Credits.";
$text['de']['text1'] = "Nach dem Kauf der Kugelfabrik erhalten Sie alle Einnahmen daraus!";
$text['de']['text2'] = "Du bist der Eigentümer für immer... es sei denn, du stirbst.";
$text['de']['purchase_button'] = "Zahle {amount} Credits";
$text['de']['cheating'] = "Nur Zahlen sind erlaubt!";
$text['de']['minimum'] = "Du musst den Gegenstand mindestens einmal kaufen!";
$text['de']['maximum'] = "Du kannst nicht mehr als die maximale Anzahl kaufen!";
$text['de']['notenough_cash'] = "Du hast nicht genug Bargeld!";
$text['de']['bought'] = "Du hast die Kugeln gekauft";
$text['de']['not_enough_credits'] = "Du hast nicht genügend Credits, um dieses Objekt zu kaufen!";
$text['de']['already_owner'] = "Dieses Objekt hat bereits einen Besitzer!";
$text['de']['purchase_object'] = "Du hast das Objekt gekauft!";
$text['de']['no_owner'] = "Dieses Objekt hat noch keinen Besitzer!";
$text['de']['page_title_prison'] = "Kugelfabrik";
$text['de']['profit_hospital'] = "Gewinn mit dieser Kugelfabrik";
$text['de']['settings'] = "Einstellungen";
$text['de']['healprice'] = "Preis pro Kugel";
$text['de']['minprice'] = "min. {minprice}";
$text['de']['maxprice'] = "max. {maxprice}";
$text['de']['price_to_low'] = 'Der minimale Preis pro Kugel beträgt € {minprice}';
$text['de']['price_to_high'] = 'Der maximale Preis pro Kugel beträgt € {maxprice}';
$text['de']['price_changes'] = 'Der Preis pro Kugel beträgt jetzt € {price}';
$text['de']['save_setting'] = "Speichern";
$text['de']['hospital_title'] = 'Kugelfabrik';
$text['de']['hospital'] = 'Kugelfabrik';
$text['de']['owner'] = 'Besitzer';
$text['de']['price_per_percent'] = 'Preis pro Kugel';
$text['de']['welcome_message'] = 'Willkommen in der Kugelfabrik, was können wir für dich tun?';
$text['de']['your_health'] = 'Verfügbare Kugeln';
$text['de']['buy_extra_health'] = 'Kugeln kaufen';
$text['de']['captcha'] = 'Kaufen';
$text['de']['buyownstock'] = 'Du kannst deinen eigenen Bestand nicht kaufen!';
$text['de']['production_started'] = 'Die Kugelproduktion hat begonnen!';
$text['de']['wait'] = 'Du musst noch {timer} warten, bevor du wieder Kugeln produzieren kannst!';
$text['de']['procude'] = "Produzieren";
$text['de']['startprocude'] = "Starte deine Produktion!";
$text['de']['startprocudebtn'] = "Produktion starten!";

$text['es']['page_title'] = "Comprar Fábrica de Balas";
$text['es']['page_content'] = "La fábrica de balas en {country} está en venta.";
$text['es']['buy_text'] = "Compra una fábrica de balas por {amount} créditos.";
$text['es']['revenue_text'] = "Compra una fábrica de balas por {amount} créditos.";
$text['es']['text1'] = "¡Después de comprar la fábrica de balas, recibirás todos los ingresos de ella!";
$text['es']['text2'] = "Eres el propietario para siempre... a menos que mueras.";
$text['es']['purchase_button'] = "Paga {amount} créditos";
$text['es']['cheating'] = "¡Solo se permiten números!";
$text['es']['minimum'] = "¡Debes comprar el artículo al menos una vez!";
$text['es']['maximum'] = "No puedes comprar más que la cantidad máxima.";
$text['es']['notenough_cash'] = "¡No tienes suficiente efectivo!";
$text['es']['bought'] = "Has comprado las balas";
$text['es']['not_enough_credits'] = "No tienes suficientes créditos para comprar este objeto.";
$text['es']['already_owner'] = "Este objeto ya tiene un propietario.";
$text['es']['purchase_object'] = "Has comprado el objeto.";
$text['es']['no_owner'] = "Este objeto aún no tiene propietario.";
$text['es']['page_title_prison'] = "Fábrica de Balas";
$text['es']['profit_hospital'] = "Beneficios con esta fábrica de balas";
$text['es']['settings'] = "Ajustes";
$text['es']['healprice'] = "Precio por bala";
$text['es']['minprice'] = "mín. {minprice}";
$text['es']['maxprice'] = "máx. {maxprice}";
$text['es']['price_to_low'] = 'El precio mínimo por bala es de € {minprice}';
$text['es']['price_to_high'] = 'El precio máximo por bala es de € {maxprice}';
$text['es']['price_changes'] = 'El precio por bala es ahora de € {price}';
$text['es']['save_setting'] = "Guardar";
$text['es']['hospital_title'] = 'Fábrica de Balas';
$text['es']['hospital'] = 'Fábrica de Balas';
$text['es']['owner'] = 'Propietario';
$text['es']['price_per_percent'] = 'Precio por bala';
$text['es']['welcome_message'] = 'Bienvenido a la fábrica de balas, ¿en qué podemos ayudarte?';
$text['es']['your_health'] = 'Balas disponibles';
$text['es']['buy_extra_health'] = 'Comprar balas';
$text['es']['captcha'] = 'Comprar';
$text['es']['buyownstock'] = '¡No puedes comprar tu propio stock!';
$text['es']['production_started'] = '¡La producción de balas ha comenzado!';
$text['es']['wait'] = 'Debes esperar {timer} antes de que puedas volver a producir balas.';
$text['es']['procude'] = "Producir";
$text['es']['startprocude'] = "¡Comienza tu producción!";
$text['es']['startprocudebtn'] = "Iniciar producción!";

$text['pt']['page_title'] = "Comprar Fábrica de Balas";
$text['pt']['page_content'] = "A fábrica de balas em {country} está à venda.";
$text['pt']['buy_text'] = "Compre uma fábrica de balas por {amount} créditos.";
$text['pt']['revenue_text'] = "Compre uma fábrica de balas por {amount} créditos.";
$text['pt']['text1'] = "Após a compra da fábrica de balas, você receberá todos os rendimentos dela!";
$text['pt']['text2'] = "Você é o proprietário para sempre... a menos que morra.";
$text['pt']['purchase_button'] = "Pague {amount} créditos";
$text['pt']['cheating'] = "Apenas números são permitidos!";
$text['pt']['minimum'] = "Você deve comprar o item pelo menos uma vez!";
$text['pt']['maximum'] = "Você não pode comprar mais do que a quantidade máxima!";
$text['pt']['notenough_cash'] = "Você não tem dinheiro suficiente!";
$text['pt']['bought'] = "Você comprou as balas";
$text['pt']['not_enough_credits'] = "Você não tem créditos suficientes para comprar este objeto!";
$text['pt']['already_owner'] = "Este objeto já tem um proprietário!";
$text['pt']['purchase_object'] = "Você comprou o objeto!";
$text['pt']['no_owner'] = "Este objeto ainda não tem proprietário!";
$text['pt']['page_title_prison'] = "Fábrica de Balas";
$text['pt']['profit_hospital'] = "Lucro com esta fábrica de balas";
$text['pt']['settings'] = "Confinews_descriptiongurações";
$text['pt']['healprice'] = "Preço por bala";
$text['pt']['minprice'] = "min. {minprice}";
$text['pt']['maxprice'] = "máx. {maxprice}";
$text['pt']['price_to_low'] = 'O preço mínimo por bala é de € {minprice}';
$text['pt']['price_to_high'] = 'O preço máximo por bala é de € {maxprice}';
$text['pt']['price_changes'] = 'O preço por bala agora é de € {price}';
$text['pt']['save_setting'] = "Salvar";
$text['pt']['hospital_title'] = 'Fábrica de Balas';
$text['pt']['hospital'] = 'Fábrica de Balas';
$text['pt']['owner'] = 'Proprietário';
$text['pt']['price_per_percent'] = 'Preço por bala';
$text['pt']['welcome_message'] = 'Bem-vindo à fábrica de balas, o que podemos fazer por você?';
$text['pt']['your_health'] = 'Balas disponíveis';
$text['pt']['buy_extra_health'] = 'Comprar balas';
$text['pt']['captcha'] = 'Comprar';
$text['pt']['buyownstock'] = 'Você não pode comprar seu próprio estoque!';
$text['pt']['production_started'] = 'A produção de balas começou!';
$text['pt']['wait'] = 'Você precisa esperar {timer} antes de poder produzir balas novamente!';
$text['pt']['procude'] = "Produzir";
$text['pt']['startprocude'] = "Inicie sua produção!";
$text['pt']['startprocudebtn'] = "Iniciar produção!";


$text['fr']['page_title'] = "Acheter une usine de balles";
$text['fr']['page_content'] = "L'usine de balles en {country} est en vente.";
$text['fr']['buy_text'] = "Achetez une usine de balles pour {amount} crédits.";
$text['fr']['revenue_text'] = "Achetez une usine de balles pour {amount} crédits.";
$text['fr']['text1'] = "Après avoir acheté l'usine de balles, vous recevrez tous les revenus qui en découlent !";
$text['fr']['text2'] = "Vous en serez le propriétaire pour toujours... à moins que vous ne décédiez.";
$text['fr']['purchase_button'] = "Payez {amount} crédits";
$text['fr']['cheating'] = "Seuls les chiffres sont autorisés !";
$text['fr']['minimum'] = "Vous devez acheter l'objet au moins 1 fois !";
$text['fr']['maximum'] = "Vous ne pouvez pas en acheter plus que la quantité maximale !";
$text['fr']['notenough_cash'] = "Vous n'avez pas assez d'argent !";
$text['fr']['bought'] = "Vous avez acheté l'usine de balles";
$text['fr']['not_enough_credits'] = "Vous n'avez pas suffisamment de crédits pour acheter cet objet !";
$text['fr']['already_owner'] = "Cet objet a déjà un propriétaire !";
$text['fr']['purchase_object'] = "Vous avez acheté l'objet !";
$text['fr']['no_owner'] = "Cet objet n'a pas encore de propriétaire !";
$text['fr']['page_title_prison'] = "Usine de balles";
$text['fr']['profit_hospital'] = "Bénéfice avec cette usine de balles";
$text['fr']['settings'] = "Paramètres";
$text['fr']['healprice'] = "Prix par balle";
$text['fr']['minprice'] = "min. {minprice}";
$text['fr']['maxprice'] = "max. {maxprice}";
$text['fr']['price_to_low'] = 'Le prix minimum par seconde est de € {minprice}';
$text['fr']['price_to_high'] = 'Le prix maximum par seconde est de € {maxprice}';
$text['fr']['price_changes'] = 'Le prix par balle est maintenant de € {price}';
$text['fr']['save_setting'] = "Enregistrer";
$text['fr']['hospital_title'] = 'Usine de balles';
$text['fr']['hospital'] = 'Usine de balles';
$text['fr']['owner'] = 'Propriétaire';
$text['fr']['price_per_percent'] = 'Prix par balle';
$text['fr']['welcome_message'] = "Bienvenue dans l'usine de balles, que pouvons-nous faire pour vous ?";
$text['fr']['your_health'] = 'Balles disponibles';
$text['fr']['buy_extra_health'] = 'Acheter des balles';
$text['fr']['captcha'] = 'Acheter';
$text['fr']['buyownstock'] = 'Vous ne pouvez pas acheter votre propre stock !';
$text['fr']['production_started'] = 'La production de balles a commencé !';
$text['fr']['wait'] = 'Vous devez attendre encore {timer} avant de pouvoir produire à nouveau des balles !';
$text['fr']['procude'] = "Produire";
$text['fr']['startprocude'] = "Commencez votre production !";
$text['fr']['startprocudebtn'] = "Lancer la production !";


$text['cs']['page_title'] = "Koupit továrnu na střelivo";
$text['cs']['page_content'] = "Továrna na střelivo v {country} je na prodej.";
$text['cs']['buy_text'] = "Kupte si továrnu na střelivo za {amount} kreditů.";
$text['cs']['revenue_text'] = "Kupte si továrnu na střelivo za {amount} kreditů.";
$text['cs']['text1'] = "Po zakoupení továrny na střelivo obdržíte veškeré příjmy z ní!";
$text['cs']['text2'] = "Budete majitelem navždy... pokud nezemřete.";
$text['cs']['purchase_button'] = "Zaplatit {amount} kreditů";
$text['cs']['cheating'] = "Povoleny jsou pouze čísla!";
$text['cs']['minimum'] = "Musíte zakoupit položku alespoň 1krát!";
$text['cs']['maximum'] = "Nemůžete koupit více než maximální počet!";
$text['cs']['notenough_cash'] = "Nemáte dostatek hotovosti!";
$text['cs']['bought'] = "Zakoupili jste továrnu na střelivo";
$text['cs']['not_enough_credits'] = "Nemáte dostatek kreditů k zakoupení této položky!";
$text['cs']['already_owner'] = "Tato položka má již majitele!";
$text['cs']['purchase_object'] = "Zakoupili jste položku!";
$text['cs']['no_owner'] = "Tato položka zatím nemá majitele!";
$text['cs']['page_title_prison'] = "Továrna na střelivo";
$text['cs']['profit_hospital'] = "Výnos s touto továrnou na střelivo";
$text['cs']['settings'] = "Nastavení";
$text['cs']['healprice'] = "Cena za střelu";
$text['cs']['minprice'] = "min. {minprice}";
$text['cs']['maxprice'] = "max. {maxprice}";
$text['cs']['price_to_low'] = 'Minimální cena za sekundu je € {minprice}';
$text['cs']['price_to_high'] = 'Maximální cena za sekundu je € {maxprice}';
$text['cs']['price_changes'] = 'Cena za střelu je nyní € {price}';
$text['cs']['save_setting'] = "Uložit";
$text['cs']['hospital_title'] = 'Továrna na střelivo';
$text['cs']['hospital'] = 'Továrna na střelivo';
$text['cs']['owner'] = 'Vlastník';
$text['cs']['price_per_percent'] = 'Cena za střelu';
$text['cs']['welcome_message'] = 'Vítejte v továrně na střelivo, co pro vás můžeme udělat?';
$text['cs']['your_health'] = 'Dostupné střely';
$text['cs']['buy_extra_health'] = 'Koupit střely';
$text['cs']['captcha'] = 'Koupit';
$text['cs']['buyownstock'] = 'Nemůžete si koupit svůj vlastní sklad!';
$text['cs']['production_started'] = 'Výroba střeliva začala!';
$text['cs']['wait'] = 'Musíte počkat ještě {timer} než budete moci znovu vyrábět střelivo!';
$text['cs']['procude'] = "Vyrábět";
$text['cs']['startprocude'] = "Začněte s výrobou!";
$text['cs']['startprocudebtn'] = "Spustit výrobu!";

$now = date("Y-m-d H:i:s");
$wait = 0;


		if($timer > $now){
			$wait = datetotime($timer) - time();
			$count_timer = '<font id="count_timer"></font>';
		}
	
if($_SERVER['REQUEST_METHOD'] === 'POST'){


	$buyy = isset($_POST['buy']) ? $_POST['buy'] : '0';
	$buyy = $db->escape($buyy);
	
	if($buyy == 1){
				if($owner == $userdata[0]['username']){

			$price = isset($_POST['price']) ? $_POST['price'] : $min;
			$price = $db->escape($price);
			
			
	$produce = isset($_POST['produce']) ? $_POST['produce'] : '';
	$produce = $db->escape($produce);
	
	if($produce != ''){ 
	
	

		if($timer > $now){
			$errorss[] = txt($text[$lang]['wait'],'{timer}', $count_timer);
		}
	
	
			if(empty($errorss))
			{
			
			
			
$ranglvl = ranklvl($userdata[0]['username']);
$producing = rand(($produceperlvlmin * $ranglvl),($produceperlvlmax * $ranglvl)) + $producebase;
			
		$nextcrime = timetodate(time() + $producingduration);
		$qc = "SELECT * FROM objects_bulletfactory where object = '".$objectid."' ";
		$fchance = $db->query($qc)->fetch();
		if($db->affected_rows == '0')
		{	
			$timers = array(
                'object' => $objectid,
                'amount' => '0',
                'addbullets' => $producing,
                'time' => $nextcrime,
            );
         	$timers = $db->insert('objects_bulletfactory', $timers); 
		}else{
			$timers = array(
                'addbullets' => $producing,
                'time' => $nextcrime,
           	 );
			$where = array(
				'object' => $objectid,
			);
			$db->where($where)->update('objects_bulletfactory', $timers); 
		}
	
	
	
	
				$successs[] = $text[$lang]['production_started'];

			
			}
	
	}else{
	
	
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
				$where = array( 'username' => $userdata[0]['username'], 'country' => $userdata[0]['country'], 'object' => 'bulletfactory'	);
				$db->where($where)->update('objects', $update); 
							$successs[] = txt($text[$lang]['price_changes'],"{price}",number($price));

			}
				
	}
						
				}else{
				
				
  		$q = "SELECT * FROM objects where object = 'bulletfactory' and country = '".$userdata[0]['country']."' ";
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
                'object' => 'bulletfactory',
                'username' => $userdata[0]['username'],
                'price' => $price,
                'country' => $userdata[0]['country'],
                'earnings' => 0,
            );
         	$insert = $db->insert('objects', $insert); 
         	
         	
			$insert = array(
                'object' => $insert,
            );
         	$insert = $db->insert('objects_bulletfactory', $insert); 
         	
         	
         	
         	
				$update = array(   'credits' => ($userdata[0]['credits'] - $objectprice)	 );
				$where = array( 'username' => $userdata[0]['username'] 	);
				$db->where($where)->update('users', $update); 
				
				$successs[] = $text[$lang]['purchase_object'];
		
		
		
		}
		
		
				}
		
	}else{
	
		$buybullets = isset($_POST['bullets']) ? $_POST['bullets'] : '0';
		$buybullets = $db->escape($buybullets);
	
		if(!is_numeric($buybullets)){
			$errors[] = $text[$lang]['cheating'];
		}
		if($buybullets < 1){
			$errors[] = $text[$lang]['minimum'];
		}
		if($buybullets > $stock){
			$errors[] = $text[$lang]['maximum'];
		}
		
		
				if($owner == ''){
			$errors[] = $text[$lang]['no_owner'];
				
				}
				if($owner == $userdata[0]['username']){
			$errors[] = $text[$lang]['buyownstock'];
				
				}
		$qu = "SELECT * FROM users where id = '".$userdata[0]['id']."' ";
		$fu = $db->query($qu)->fetch();
	
 	
 		if($fu[0]['cash'] < ($buybullets * $price)){
 			
			$errors[] = $text[$lang]['notenough_cash'];
 		}
 		
 
 		if(empty($errors))
		{
	
			$totalprice = $buybullets * $price;
	 	
 		
 			$user = array(
                'cash' => ($fu[0]['cash'] - $totalprice),
                'bullets' => ($fu[0]['bullets'] + $buybullets),
           	 );
			$where = array(
				'id' => $userdata[0]['id']
			);
			$db->where($where)->update('users', $user); 
			
				if($owner != ''){
					$qu = "update users set bank = bank + ".$totalprice." where username = '".$owner."'  ";
					$db->query($qu)->execute() ;
					$qu = "update objects set earnings = earnings + ".$totalprice." where username = '".$owner."' and  country = '".$userdata[0]['country']."' and object = 'bulletfactory' ";
					$db->query($qu)->execute() ;
					$qu = "update objects_bulletfactory set amount = amount - ".$buybullets." where object = '".$objectid."'  ";
					$db->query($qu)->execute() ;
				}
			
			$success[] = $text[$lang]['bought'];

 		}
		
		
	
	}
	
}



$q = "SELECT * FROM objects where object = 'bulletfactory' and country = '".$userdata[0]['country']."' ";
$o = $db->query($q)->fetch();
if($db->affected_rows > 0){
	
$owner = $o[0]['username'];
$price = $o[0]['price'];
$earnings = $o[0]['earnings'];

	$q = "SELECT * FROM objects_bulletfactory where object = '".$o[0]['id']."'  ";
	$os = $db->query($q)->fetch();
	if($db->affected_rows > 0){
		$stock = $os[0]['amount'];
	}
	
}
	
		