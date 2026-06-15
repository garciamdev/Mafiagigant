<?php



    if(!isset($_SESSION['suid']) or $_SESSION['suid'] == ''){
        header("Location: ".BASE_URL."login/");
        exit(); 
    }

    if(!isset($userdata[0]['authority']) or $userdata[0]['authority'] != 'admin'){
      // header("Location: /");
      // exit(); 
    }
    
    $text['nl']['not_enough'] = "U heeft niet genoeg {drugs}";
$text['nl']['sold'] = "U heeft {drugs} verkocht voor € {amount}!";
$text['nl']['cheating'] = 'Probeer je de boel op te lichten?';
$text['nl']['tooless'] = 'Je moet minimaal 1 {drugs} verkopen!';
$text['nl']['sell_drugs'] = 'Verkopen';
$text['nl']['drug_prices'] = 'Prijzen';
$text['nl']['drugs_trade_title'] = 'Drughandel';
$text['nl']['drugs'] = 'Drugs';
$text['nl']['stock'] = 'Voorraad';
$text['nl']['drug_market_price'] = 'Drugsmarktprijs';
$text['nl']['sell'] = 'Verkoop drugs';
$text['nl']['bags'] = 'zakken';
$text['nl']['sell_drugs'] = 'Verkoop drugs';
$text['nl']['drug_market_prices_title'] = 'Drugsprijzen op de markt';
$text['nl']['country'] = 'Land';

$text['en']['sold'] = "You have sold {drugs} for €{amount}!";
$text['en']['cheating'] = 'Are you trying to cheat?';
$text['en']['tooless'] = 'You must sell at least 1 {drugs}!';
$text['en']['sell_drugs'] = 'Sell';
$text['en']['drug_prices'] = 'Prices';
$text['en']['drugs_trade_title'] = 'Drug Trade';
$text['en']['drugs'] = 'Drugs';
$text['en']['stock'] = 'Stock';
$text['en']['drug_market_price'] = 'Drug Market Price';
$text['en']['sell'] = 'Sell drugs';
$text['en']['bags'] = 'bags';
$text['en']['sell_drugs'] = 'Sell drugs';
$text['en']['drug_market_prices_title'] = 'Drug Prices on the Market';
$text['en']['country'] = 'Country';


$text['de']['sold'] = "Sie haben {drugs} für € {amount} verkauft!";
$text['de']['cheating'] = 'Versuchen Sie zu betrügen?';
$text['de']['tooless'] = 'Sie müssen mindestens 1 {drugs} verkaufen!';
$text['de']['sell_drugs'] = 'Verkaufen';
$text['de']['drug_prices'] = 'Preise';
$text['de']['drugs_trade_title'] = 'Drogenhandel';
$text['de']['drugs'] = 'Drogen';
$text['de']['stock'] = 'Lager';
$text['de']['drug_market_price'] = 'Drogenmarktpreis';
$text['de']['sell'] = 'Drogen verkaufen';
$text['de']['bags'] = 'Taschen';
$text['de']['sell_drugs'] = 'Drogen verkaufen';
$text['de']['drug_market_prices_title'] = 'Drogenpreise auf dem Markt';
$text['de']['country'] = 'Land';


$text['es']['sold'] = "Has vendido {drugs} por € {amount}!";
$text['es']['cheating'] = '¿Estás intentando hacer trampas?';
$text['es']['tooless'] = 'Debes vender al menos 1 {drugs}!';
$text['es']['sell_drugs'] = 'Vender';
$text['es']['drug_prices'] = 'Precios';
$text['es']['drugs_trade_title'] = 'Comercio de Drogas';
$text['es']['drugs'] = 'Drogas';
$text['es']['stock'] = 'Existencias';
$text['es']['drug_market_price'] = 'Precio en el mercado de drogas';
$text['es']['sell'] = 'Vender drogas';
$text['es']['bags'] = 'bolsas';
$text['es']['sell_drugs'] = 'Vender drogas';
$text['es']['drug_market_prices_title'] = 'Precios de las drogas en el mercado';
$text['es']['country'] = 'País';


$text['pt']['sold'] = "Você vendeu {drugs} por € {amount}!";
$text['pt']['cheating'] = 'Você está tentando trapacear?';
$text['pt']['tooless'] = 'Você deve vender pelo menos 1 {drugs}!';
$text['pt']['sell_drugs'] = 'Vender';
$text['pt']['drug_prices'] = 'Preços';
$text['pt']['drugs_trade_title'] = 'Comércio de Drogas';
$text['pt']['drugs'] = 'Drogas';
$text['pt']['stock'] = 'Estoque';
$text['pt']['drug_market_price'] = 'Preço de mercado de drogas';
$text['pt']['sell'] = 'Vender drogas';
$text['pt']['bags'] = 'sacos';
$text['pt']['sell_drugs'] = 'Vender drogas';
$text['pt']['drug_market_prices_title'] = 'Preços de drogas no mercado';
$text['pt']['country'] = 'País';


$text['fr']['sold'] = "Vous avez vendu {drugs} pour € {amount}!";
$text['fr']['cheating'] = 'Essayez-vous de tricher?';
$text['fr']['tooless'] = 'Vous devez vendre au moins 1 {drugs}!';
$text['fr']['sell_drugs'] = 'Vendre';
$text['fr']['drug_prices'] = 'Prix';
$text['fr']['drugs_trade_title'] = 'Commerce de drogues';
$text['fr']['drugs'] = 'Drogues';
$text['fr']['stock'] = 'Stock';
$text['fr']['drug_market_price'] = 'Prix du marché des drogues';
$text['fr']['sell'] = 'Vendre des drogues';
$text['fr']['bags'] = 'sacs';
$text['fr']['sell_drugs'] = 'Vendre des drogues';
$text['fr']['drug_market_prices_title'] = 'Prix des drogues sur le marché';
$text['fr']['country'] = 'Pays';

$text['cs']['sold'] = "Prodali jste {drugs} za € {amount}!";
$text['cs']['cheating'] = 'Snažíte se podvádět?';
$text['cs']['tooless'] = 'Musíte prodat alespoň 1 {drugs}!';
$text['cs']['sell_drugs'] = 'Prodat';
$text['cs']['drug_prices'] = 'Ceny';
$text['cs']['drugs_trade_title'] = 'Obchod s drogami';
$text['cs']['drugs'] = 'Drogy';
$text['cs']['stock'] = 'Sklad';
$text['cs']['drug_market_price'] = 'Cena drog na trhu';
$text['cs']['sell'] = 'Prodat drogy';
$text['cs']['bags'] = 'Tašky';
$text['cs']['sell_drugs'] = 'Prodat drogy';
$text['cs']['drug_market_prices_title'] = 'Ceny drog na trhu';
$text['cs']['country'] = 'Země';

        
$varallowed = array("prices","sell");
if(in_array($var,$varallowed)){
	$varallowed = 'yes';
}else{
	$var = '';
}

    $var = isset($var) ? $var : 'sell';
 

    
    
 	$q = "SELECT * FROM translations where activity = 'drugs' and lang = '".$lang."'";
	$td = $db->query($q)->fetch();
    
$q = "SELECT * FROM drugs order by sort asc";
$d = $db->query($q)->fetch();



if($var == 'prices'){
	$q = "SELECT * FROM countrys order by sort asc";
	$c = $db->query($q)->fetch();
	 
	$q = "SELECT * FROM drugs_prices";
	$dp = $db->query($q)->fetch();

	foreach($dp as $fdp){
		$drugsprice[$fdp[country]][$fdp[drugs]][] = $fdp['price'];
	}
}




if($var == 'sell'){





	if($_SERVER['REQUEST_METHOD'] === 'POST'){


      foreach ($d as $f) {
      
      	$sell = isset($_POST[$f['id']]) ? $_POST[$f['id']] : '';
      		 

	
	
	 if($sell > 0 AND is_numeric($sell) AND ctype_digit($sell) ){

      	//if($sell > 0){
      	
      		

			$q = "SELECT * FROM drugs_stock where username = '".$userdata[0]['username']."' and drugs = '".$f['id']."' ";
			$ds = $db->query($q)->fetch();
			$stock = $ds[0]['amount'];
		
			if($stock < $sell){
				$errors[] = txt($text[$lang]['not_enough'],"{drugs}",gettranslation($f['id'],$td));
			}
		
	
	
			if(empty($errors))
			{
				$q = "SELECT * FROM drugs_prices where country = '".$userdata[0]['country']."' and drugs = '".$f['id']."'  ";
				$dp = $db->query($q)->fetch();
				$price = $dp[0]['price'];
			
			
			

  				$qu = "SELECT * FROM users where id = '".$userdata[0]['id']."' ";
				$fu = $db->query($qu)->fetch();
			
			
			$user = array(
                'cash' => ($fu[0]['cash'] + ($sell * $price)),
           	 );
			$where = array(
				'id' => $userdata[0]['id']
			);
			$db->where($where)->update('users', $user); 
			
			
			$user = array(
                'amount' => ($stock - $sell),
           	 );
			$where = array(
				'username' => $userdata[0]['username'],
				'drugs' => $f['id'],
			);
			$db->where($where)->update('drugs_stock', $user); 
			
			
			
				$ttt = txt($text[$lang]['sold'],"{drugs}",gettranslation($f['id'],$td));
				$success[] = txt($ttt,"{amount}",number($price * $sell));

			}

      	}else{	
      		if($sell != 0){
    			$errors[] = txt($text[$lang]['tooless'],"{drugs}",gettranslation($f['id'],$td));
      		}
      	}
      
      }

	}
	
	
	
	$q = "SELECT * FROM drugs_prices where country = '".$userdata[0]['country']."' ";
	$dp = $db->query($q)->fetch();
	foreach($dp as $fdp){
		$ffdp[$fdp[drugs]][] = $fdp['price'];
	}
	$q = "SELECT * FROM drugs_stock where username = '".$userdata[0]['username']."' ";
	$ds = $db->query($q)->fetch();
	foreach($ds as $fds){
		$ffds[$fds[drugs]][] = $fds['amount'];
	}
	
	
}
