<?php

    if(!isset($_SESSION['suid']) or $_SESSION['suid'] == ''){
        header("Location: ".BASE_URL."login/");
        exit(); 
    }

    if(!isset($userdata[0]['authority']) or $userdata[0]['authority'] != 'admin'){ 
     $noaccess = 0;
    }
 
 
  	$q = "SELECT * FROM translations where activity = 'stockexchange' and lang = '".$lang."'";
	$t = $db->query($q)->fetch();
 
  	$q = "SELECT * FROM translations where activity = 'countrys' and lang = '".$lang."'";
	$tc = $db->query($q)->fetch();
 
 
  	$q = "SELECT * FROM stockexchange order by sort asc";
	$c = $db->query($q)->fetch();

	
	$q = "SELECT * FROM stockexchange_stock where username = '".$userdata[0]['username']."' ";
	$ds = $db->query($q)->fetch();
	foreach($ds as $fds){
		$ffds[$fds['stock']][] = $fds['amount'];
	}
	
	
	
  	$q = "SELECT * FROM stockexchange_settings ";
	$settings = $db->query($q)->fetch();
	
	
	
$text['nl']['page_title'] = 'Beurs';
$text['nl']['no_selected'] = "Selecteer een geldig aandeel";
$text['nl']['cheating'] = "Probeer je vals te spelen?";
$text['nl']['error_number'] = "Alleen positieve getallen zijn toegestaan!";
$text['nl']['not_enough_cash'] = "Je hebt niet genoeg cash";
$text['nl']['not_enough_stock'] = "Je hebt niet genoeg aandelen";
$text['nl']['succes_buy'] = "Je hebt {quantity} {stock} gekocht voor {totalprice}";
$text['nl']['succes_sell'] = "Je hebt {quantity} {stock} verkocht voor {totalprice}";
$text['nl']['maxquantity'] = "Je mag maximaal {maxquantity} per aandeel bezitten";
$text['nl']['only_incountry'] = 'Je kan enkel aandelen verhandelen in {country}!';
$text['nl']['stock_title'] = 'Beurs';
$text['nl']['stock_generaltext'] = "Welkom op de beurs!<br /><br />Dagelijks worden hier  miljoenen aandelen verhandeld. Met welk bedrijf gaat het goed? En met welke juist niet? Wanneer jij handig bent met aandelen kun je hier uitstekend gebruik van maken.";
$text['nl']['stock_title_exchange'] = "Aandelen verhandelen";
$text['nl']['stock_exchangetext'] = "Koop en verkoop hier je aandelen wanneer jij denkt dat het een geschikt moment is.";
$text['nl']['stock_exchangetextcorrupt'] = "Let op: De corrupte beursmakelaar rekent {commission}% aan kosten per transatie.";
$text['nl']['stock_exchangetextmax'] = "Maximum aandelen per bedrijf is {maxquantity}.";
$text['nl']['share'] = 'Aandeel';
$text['nl']['amount'] = 'Aantal';
$text['nl']['buy'] = 'Kopen';
$text['nl']['sell'] = 'Verkopen';
$text['nl']['stock_title_market'] = 'Aandelenkoersen';
$text['nl']['stock_title_market_text'] = 'Koersen zijn LIVE en worden elke 5 minuten bijgewerkt.';
$text['nl']['stock'] = "Aandeel";
$text['nl']['price'] = "Koers";
$text['nl']['currentstock'] = "In bezit";


$text['en']['page_title'] = 'Stock Exchange';
$text['en']['no_selected'] = "Select a valid stock";
$text['en']['cheating'] = "Are you trying to cheat?";
$text['en']['error_number'] = "Only positive numbers are allowed!";
$text['en']['not_enough_cash'] = "You don't have enough cash";
$text['en']['not_enough_stock'] = "You don't have enough stocks";
$text['en']['success_buy'] = "You have bought {quantity} {stock} for {totalprice}";
$text['en']['success_sell'] = "You have sold {quantity} {stock} for {totalprice}";
$text['en']['maxquantity'] = "You can have a maximum of {maxquantity} per stock";
$text['en']['only_incountry'] = 'You can only trade stocks in {country}!';
$text['en']['stock_title'] = 'Stock Exchange';
$text['en']['stock_generaltext'] = "Welcome to the stock exchange!<br /><br />Millions of shares are traded here daily. Which company is doing well? And which one isn't? If you are savvy with stocks, you can make the most of it here.";
$text['en']['stock_title_exchange'] = "Trade Stocks";
$text['en']['stock_exchangetext'] = "Buy and sell your stocks here when you think it's the right time.";
$text['en']['stock_exchangetextcorrupt'] = "Please note: The corrupt stockbroker charges a {commission}% fee per transaction.";
$text['en']['stock_exchangetextmax'] = "The maximum stocks per company are {maxquantity}.";
$text['en']['share'] = 'Stock';
$text['en']['amount'] = 'Quantity';
$text['en']['buy'] = 'Buy';
$text['en']['sell'] = 'Sell';
$text['en']['stock_title_market'] = 'Stock Prices';
$text['en']['stock_title_market_text'] = 'Prices are LIVE and updated every 5 minutes.';
$text['en']['stock'] = "Stock";
$text['en']['price'] = "Price";
$text['en']['currentstock'] = "Owned";


$text['de']['page_title'] = 'Börse';
$text['de']['no_selected'] = "Wählen Sie eine gültige Aktie aus";
$text['de']['cheating'] = "Versuchst du zu schummeln?";
$text['de']['error_number'] = "Nur positive Zahlen sind erlaubt!";
$text['de']['not_enough_cash'] = "Du hast nicht genug Bargeld";
$text['de']['not_enough_stock'] = "Du hast nicht genug Aktien";
$text['de']['success_buy'] = "Du hast {quantity} {stock} für {totalprice} gekauft";
$text['de']['success_sell'] = "Du hast {quantity} {stock} für {totalprice} verkauft";
$text['de']['maxquantity'] = "Du kannst maximal {maxquantity} pro Aktie besitzen";
$text['de']['only_incountry'] = 'Du kannst nur Aktien in {country} handeln!';
$text['de']['stock_title'] = 'Börse';
$text['de']['stock_generaltext'] = "Willkommen an der Börse!<br /><br />Hier werden täglich Millionen von Aktien gehandelt. Welches Unternehmen steht gut da? Und welches nicht? Wenn Sie sich mit Aktien auskennen, können Sie hier das Beste daraus machen.";
$text['de']['stock_title_exchange'] = "Aktienhandel";
$text['de']['stock_exchangetext'] = "Kaufen und verkaufen Sie hier Ihre Aktien, wenn Sie denken, dass es der richtige Zeitpunkt ist.";
$text['de']['stock_exchangetextcorrupt'] = "Bitte beachten Sie: Der korrupte Börsenmakler berechnet eine Gebühr von {commission}% pro Transaktion.";
$text['de']['stock_exchangetextmax'] = "Die maximale Anzahl von Aktien pro Unternehmen beträgt {maxquantity}.";
$text['de']['share'] = 'Aktie';
$text['de']['amount'] = 'Menge';
$text['de']['buy'] = 'Kaufen';
$text['de']['sell'] = 'Verkaufen';
$text['de']['stock_title_market'] = 'Aktienkurse';
$text['de']['stock_title_market_text'] = 'Die Kurse sind LIVE und werden alle 5 Minuten aktualisiert.';
$text['de']['stock'] = "Aktie";
$text['de']['price'] = "Kurs";
$text['de']['currentstock'] = "Im Besitz";

$text['es']['page_title'] = 'Bolsa de Valores';
$text['es']['no_selected'] = "Selecciona una acción válida";
$text['es']['cheating'] = "¿Estás intentando hacer trampa?";
$text['es']['error_number'] = "Solo se permiten números positivos.";
$text['es']['not_enough_cash'] = "No tienes suficiente efectivo.";
$text['es']['not_enough_stock'] = "No tienes suficientes acciones.";
$text['es']['success_buy'] = "Has comprado {quantity} acciones de {stock} por un total de {totalprice}.";
$text['es']['success_sell'] = "Has vendido {quantity} acciones de {stock} por un total de {totalprice}.";
$text['es']['maxquantity'] = "Puedes tener un máximo de {maxquantity} por acción.";
$text['es']['only_incountry'] = 'Solo puedes comerciar con acciones en {country}.';
$text['es']['stock_title'] = 'Bolsa de Valores';
$text['es']['stock_generaltext'] = "¡Bienvenido a la bolsa de valores!<br /><br />Aquí se negocian millones de acciones a diario. ¿Qué empresa va bien? ¿Y cuál no? Si tienes experiencia con acciones, aquí puedes sacarle el máximo provecho.";
$text['es']['stock_title_exchange'] = "Comercio de Acciones";
$text['es']['stock_exchangetext'] = "Compra y vende tus acciones aquí cuando consideres que es el momento adecuado.";
$text['es']['stock_exchangetextcorrupt'] = "Ten en cuenta: El corredor de bolsa corrupto cobra una comisión del {commission}% por transacción.";
$text['es']['stock_exchangetextmax'] = "El máximo de acciones por empresa es {maxquantity}.";
$text['es']['share'] = 'Acción';
$text['es']['amount'] = 'Cantidad';
$text['es']['buy'] = 'Comprar';
$text['es']['sell'] = 'Vender';
$text['es']['stock_title_market'] = 'Cotizaciones de Acciones';
$text['es']['stock_title_market_text'] = 'Las cotizaciones son EN VIVO y se actualizan cada 5 minutos.';
$text['es']['stock'] = "Acción";
$text['es']['price'] = "Precio";
$text['es']['currentstock'] = "En posesión";





$text['pt']['page_title'] = 'Bolsa de Valores';
$text['pt']['no_selected'] = "Selecione uma ação válida";
$text['pt']['cheating'] = "Você está tentando trapacear?";
$text['pt']['error_number'] = "Apenas números positivos são permitidos!";
$text['pt']['not_enough_cash'] = "Você não tem dinheiro suficiente";
$text['pt']['not_enough_stock'] = "Você não possui ações suficientes";
$text['pt']['succes_buy'] = "Você comprou {quantity} ações de {stock} por {totalprice}";
$text['pt']['succes_sell'] = "Você vendeu {quantity} ações de {stock} por {totalprice}";
$text['pt']['maxquantity'] = "Você pode possuir no máximo {maxquantity} ações por empresa";
$text['pt']['only_incountry'] = 'Você só pode negociar ações em {country}!';
$text['pt']['stock_title'] = 'Bolsa de Valores';
$text['pt']['stock_generaltext'] = "Bem-vindo à bolsa de valores!<br /><br />Todos os dias, milhões de ações são negociadas aqui. Qual empresa está se saindo bem? E qual não está? Se você for hábil com ações, pode se dar muito bem aqui.";
$text['pt']['stock_title_exchange'] = "Negociar Ações";
$text['pt']['stock_exchangetext'] = "Compre e venda ações quando achar o momento certo.";
$text['pt']['stock_exchangetextcorrupt'] = "Atenção: O corretor corrupto da bolsa cobra {commission}% de taxas por transação.";
$text['pt']['stock_exchangetextmax'] = "O máximo de ações por empresa é {maxquantity}.";
$text['pt']['share'] = 'Ação';
$text['pt']['amount'] = 'Quantidade';
$text['pt']['buy'] = 'Comprar';
$text['pt']['sell'] = 'Vender';
$text['pt']['stock_title_market'] = 'Cotações das Ações';
$text['pt']['stock_title_market_text'] = 'As cotações são AO VIVO e são atualizadas a cada 5 minutos.';
$text['pt']['stock'] = "Ação";
$text['pt']['price'] = "Cotação";
$text['pt']['currentstock'] = "Em Posse";



$text['fr']['page_title'] = 'Bourse';
$text['fr']['no_selected'] = "Sélectionnez une action valide";
$text['fr']['cheating'] = "Essaye-tu de tricher ?";
$text['fr']['error_number'] = "Seuls les nombres positifs sont autorisés !";
$text['fr']['not_enough_cash'] = "Vous n'avez pas assez d'argent";
$text['fr']['not_enough_stock'] = "Vous n'avez pas assez d'actions";
$text['fr']['succes_buy'] = "Vous avez acheté {quantity} actions de {stock} pour {totalprice}";
$text['fr']['succes_sell'] = "Vous avez vendu {quantity} actions de {stock} pour {totalprice}";
$text['fr']['maxquantity'] = "Vous pouvez posséder au maximum {maxquantity} actions par entreprise";
$text['fr']['only_incountry'] = "Vous ne pouvez échanger des actions qu'en {country} !";
$text['fr']['stock_title'] = 'Bourse';
$text['fr']['stock_generaltext'] = "Bienvenue à la bourse !<br /><br />Chaque jour, des millions d'actions sont échangées ici. Quelle entreprise se porte bien ? Et laquelle ne va pas bien ? Si vous êtes habile avec les actions, vous pouvez très bien vous en sortir ici.";
$text['fr']['stock_title_exchange'] = "Échanger des Actions";
$text['fr']['stock_exchangetext'] = "Achetez et vendez des actions quand vous le jugez opportun.";
$text['fr']['stock_exchangetextcorrupt'] = "Attention : Le courtier corrompu de la bourse facture {commission}% de frais par transaction.";
$text['fr']['stock_exchangetextmax'] = "Le maximum d'actions par entreprise est de {maxquantity}.";
$text['fr']['share'] = 'Action';
$text['fr']['amount'] = 'Quantité';
$text['fr']['buy'] = 'Acheter';
$text['fr']['sell'] = 'Vendre';
$text['fr']['stock_title_market'] = 'Cours des Actions';
$text['fr']['stock_title_market_text'] = 'Les cours sont EN DIRECT et sont mis à jour toutes les 5 minutes.';
$text['fr']['stock'] = "Action";
$text['fr']['price'] = "Cours";
$text['fr']['currentstock'] = "En Possession";

$text['cs']['page_title'] = 'Burza';
$text['cs']['no_selected'] = "Vyberte platný podíl";
$text['cs']['cheating'] = "Snažíte se podvádět?";
$text['cs']['error_number'] = "Povoleny jsou pouze kladné čísla!";
$text['cs']['not_enough_cash'] = "Nemáte dostatek hotovosti";
$text['cs']['not_enough_stock'] = "Nemáte dostatek akcií";
$text['cs']['succes_buy'] = "Koupil jste {quantity} akcií {stock} za {totalprice}";
$text['cs']['succes_sell'] = "Prodali jste {quantity} akcií {stock} za {totalprice}";
$text['cs']['maxquantity'] = "Můžete vlastnit maximálně {maxquantity} akcií na společnost";
$text['cs']['only_incountry'] = 'Můžete obchodovat s akciemi pouze v {country}!';
$text['cs']['stock_title'] = 'Burza';
$text['cs']['stock_generaltext'] = "Vítejte na burze!<br /><br />Každý den se zde obchoduje s miliony akcií. Jaká firma je úspěšná? A jaká nikoli? Pokud jste zruční s akciemi, můžete si tady dobře vedle.";
$text['cs']['stock_title_exchange'] = "Obchodovat s Akciemi";
$text['cs']['stock_exchangetext'] = "Kupte a prodejte akcie, když si myslíte, že je to vhodný okamžik.";
$text['cs']['stock_exchangetextcorrupt'] = "Upozornění: Zkorumpovaný makléř na burze účtuje {commission}% poplatků za transakci.";
$text['cs']['stock_exchangetextmax'] = "Maximum akcií na společnost je {maxquantity}.";
$text['cs']['share'] = 'Podíl';
$text['cs']['amount'] = 'Množství';
$text['cs']['buy'] = 'Koupit';
$text['cs']['sell'] = 'Prodat';
$text['cs']['stock_title_market'] = 'Ceny Akcií';
$text['cs']['stock_title_market_text'] = 'Ceny jsou ŽIVÉ a aktualizují se každých 5 minut.';
$text['cs']['stock'] = "Akcie";
$text['cs']['price'] = "Cena";
$text['cs']['currentstock'] = "V držbě";


$text[$lang]['stock_exchangetextcorrupt'] = txt($text[$lang]['stock_exchangetextcorrupt'],"{commission}",$settings[0]['commission']);
$text[$lang]['stock_exchangetextmax'] = txt($text[$lang]['stock_exchangetextmax'],"{maxquantity}",number($settings[0]['maxquantity']));

			$incountry = 0;

	if($settings[0]['country'] != 0){
		if($userdata[0]['country'] != $fc[0]['country']){
			$incountry = 1;
			$errors[] = txt($text[$lang]['only_incountry'],"{country}",getcountry($settings[0]['country'],$tc));
		}
	}
	
	
	
if($_SERVER['REQUEST_METHOD'] === 'POST'){

	$id = isset($_POST['stock']) ? $_POST['stock'] : '0';
	$id = $db->escape($id);
	
	
	if($id == 0){
		$errors[] = $text[$lang]['no_selected'];
	}
	
	if(!is_numeric($id)){
		$errors[] = $text[$lang]['cheating'];
	}
	

  	$qc = "SELECT * FROM stockexchange where id = '".$id."' ";
	$fc = $db->query($qc)->fetch();
	if($db->affected_rows != '1')
	{	
		$errors[] = $text[$lang]['no_selected'];
	}


	$amount = isset($_POST['amount']) ? $_POST['amount'] : '1';
	$amount = $db->escape($amount);
	if($amount > 0 AND is_numeric($amount) AND ctype_digit($amount) ){
	}else{
		if($amount == 0){
		$errors[] = $text[$lang]['error_number'];
		}else{
		$errors[] = $text[$lang]['cheating'];
		}
	}

    

	if(empty($errors))
	{


		if(isset($_POST['buy'])){			

			$price = $fc[0]['price'] * $amount;
			$price = round($price + (($price / 100) * $settings[0]['commission']));
			if($userdata[0]['cash'] < $price){
				$errors[] = $text[$lang]['not_enough_cash'];
			}
			
			if(($ffds[$fc[0]['id']][0] + $amount) > $settings[0]['maxquantity']){
			
				$errors[] = txt($text[$lang]['maxquantity'],'{maxquantity}',number($settings[0]['maxquantity']));
			}
			
			if(empty($errors))
			{
				
				
			$q = "SELECT * FROM stockexchange_stock where stock = '".$fc[0]['id']."' and username = '".$userdata[0]['username']."'";
			$ss = $db->query($q)->fetch();
			if($db->affected_rows == '0'){	
	
		
			$drugs = array(
                'stock' => $fc[0]['id'],
                'username' => $userdata[0]['username'],
                'amount' => $amount,
            );
         	$drugs = $db->insert('stockexchange_stock', $drugs); 



			}else{
				$drugs = array(   'amount' => ($ss[0]['amount'] + $amount),	);
				$where = array(
                'stock' => $fc[0]['id'],
                'username' => $userdata[0]['username'],
				);
				$db->where($where)->update('stockexchange_stock', $drugs); 

			
			}
			
			
			$user = array(
                'cash' => ($userdata[0]['cash'] - $price),
           	 );
			$where = array(
				'id' => $userdata[0]['id']
			);
			$db->where($where)->update('users', $user); 
			
			
			
			
		 	$text[$lang]['succes_buy'] = txt($text[$lang]['succes_buy'],'{quantity}',number($amount));
			$text[$lang]['succes_buy'] = txt($text[$lang]['succes_buy'],'{stock}', gettranslation($fc[0]['id'], $t));
			$success[] = txt($text[$lang]['succes_buy'],'{totalprice}',number($price));
			
		
		
			}
		
		
		

		}
		

		if(isset($_POST['sell'])){			
		
			$price = $fc[0]['price'] * $amount;
			$price = round($price - (($price / 100) * $settings[0]['commission']));

			
			if(($ffds[$fc[0]['id']][0] - $amount) < 0){
			
				$errors[] = $text[$lang]['not_enough_stock'];
			}
			
			if(empty($errors))
			{
				
			$q = "SELECT * FROM stockexchange_stock where stock = '".$fc[0]['id']."' and username = '".$userdata[0]['username']."'";
			$ss = $db->query($q)->fetch();
				$drugs = array(   'amount' => ($ss[0]['amount'] - $amount),	);
				$where = array(
                'stock' => $fc[0]['id'],
                'username' => $userdata[0]['username'],
				);
				$db->where($where)->update('stockexchange_stock', $drugs); 

			
			$user = array(
                'cash' => ($userdata[0]['cash'] + $price),
           	 );
			$where = array(
				'id' => $userdata[0]['id']
			);
			$db->where($where)->update('users', $user); 
			
		 	$text[$lang]['succes_sell'] = txt($text[$lang]['succes_sell'],'{quantity}',number($amount));
			$text[$lang]['succes_sell'] = txt($text[$lang]['succes_sell'],'{stock}', gettranslation($fc[0]['id'], $t));
			$success[] = txt($text[$lang]['succes_sell'],'{totalprice}',number($price));
			
			
			
			}
		}
		


		if(isset($_POST['ukjredfv'])){			

		
		

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
                'cash' => ($userdata[0]['cash'] + $receive),
                'xp' => ($userdata[0]['xp'] + $xp),
           	 );
			$where = array(
				'id' => $userdata[0]['id']
			);
			$db->where($where)->update('users', $user); 
			
			$success[] = txt($text[$lang]['crime_success_money'],'{amount}',number($receive));

		}
			
	}


}
 


	 
$ffds = [];
	$q = "SELECT * FROM stockexchange_stock where username = '".$userdata[0]['username']."' ";
	$ds = $db->query($q)->fetch();
	foreach($ds as $fds){
		$ffds[$fds['stock']][] = $fds['amount'];
	}