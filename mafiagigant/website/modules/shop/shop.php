<?php



    if(!isset($_SESSION['suid']) or $_SESSION['suid'] == ''){
        header("Location: ".BASE_URL."login/");
        exit(); 
    }

    if(!isset($userdata[0]['authority']) or $userdata[0]['authority'] != 'admin'){
      // header("Location: /");
       //exit(); 
    }
     
$text['nl']['shop_title'] = 'Winkel';
$text['nl']['choose_shop'] = 'Kies een winkel:';
$text['nl']['weapons'] = 'Wapens';
$text['nl']['protection'] = 'Bescherming';
$text['nl']['title_weapon'] = "Wapens";
$text['nl']['title_protection'] = "Bescherming";
$text['nl']['attack'] = 'Aanval';
$text['nl']['defense'] = 'Verdediging';
$text['nl']['price'] = 'Prijs';
$text['nl']['buy'] = 'Kopen:';
$text['nl']['pay_by_bank'] = 'Betalen via de bank';
$text['nl']['weapon_not_exist'] = "Dit wapen bestaat niet!";
$text['nl']['noweapon_selected'] = "Geen wapen geselecteerd";
$text['nl']['cheating'] = "Enkel getallen zijn toegestaan!";
$text['nl']['notenough_cash'] = "Je hebt niet genoeg cash!";
$text['nl']['minimum'] = "Je moet het item minimaal 1x kopen!";
$text['nl']['notenough_bank'] = "Je hebt niet genoeg geld op de bank staan!!";
$text['nl']['bought'] = "Je hebt het item succesvol gekocht!";

$text['en']['shop_title'] = 'Shop';
$text['en']['choose_shop'] = 'Choose a shop:';
$text['en']['weapons'] = 'Weapons';
$text['en']['protection'] = 'Protection';
$text['en']['title_weapon'] = "Weapons";
$text['en']['title_protection'] = "Protection";
$text['en']['attack'] = 'Attack';
$text['en']['defense'] = 'Defense';
$text['en']['price'] = 'Price';
$text['en']['buy'] = 'Buy:';
$text['en']['pay_by_bank'] = 'Pay by bank';
$text['en']['weapon_not_exist'] = "This weapon does not exist!";
$text['en']['noweapon_selected'] = "No weapon selected";
$text['en']['cheating'] = "Only numbers are allowed!";
$text['en']['notenough_cash'] = "You don't have enough cash!";
$text['en']['minimum'] = "You must buy the item at least 1 time!";
$text['en']['notenough_bank'] = "You don't have enough money in the bank!!";
$text['en']['bought'] = "You have successfully bought the item!";

$text['de']['shop_title'] = 'Geschäft';
$text['de']['choose_shop'] = 'Wähle ein Geschäft:';
$text['de']['weapons'] = 'Waffen';
$text['de']['protection'] = 'Schutz';
$text['de']['title_weapon'] = "Waffen";
$text['de']['title_protection'] = "Schutz";
$text['de']['attack'] = 'Angriff';
$text['de']['defense'] = 'Verteidigung';
$text['de']['price'] = 'Preis';
$text['de']['buy'] = 'Kaufen:';
$text['de']['pay_by_bank'] = 'Mit der Bank bezahlen';
$text['de']['weapon_not_exist'] = "Diese Waffe existiert nicht!";
$text['de']['noweapon_selected'] = "Keine Waffe ausgewählt";
$text['de']['cheating'] = "Nur Zahlen sind erlaubt!";
$text['de']['notenough_cash'] = "Du hast nicht genug Bargeld!";
$text['de']['minimum'] = "Du musst den Artikel mindestens 1 Mal kaufen!";
$text['de']['notenough_bank'] = "Du hast nicht genug Geld auf der Bank!!";
$text['de']['bought'] = "Du hast den Artikel erfolgreich gekauft!";

$text['es']['shop_title'] = 'Tienda';
$text['es']['choose_shop'] = 'Elige una tienda:';
$text['es']['weapons'] = 'Armas';
$text['es']['protection'] = 'Protección';
$text['es']['title_weapon'] = "Armas";
$text['es']['title_protection'] = "Protección";
$text['es']['attack'] = 'Ataque';
$text['es']['defense'] = 'Defensa';
$text['es']['price'] = 'Precio';
$text['es']['buy'] = 'Comprar:';
$text['es']['pay_by_bank'] = 'Pagar por el banco';
$text['es']['weapon_not_exist'] = "Esta arma no existe!";
$text['es']['noweapon_selected'] = "Ninguna arma seleccionada";
$text['es']['cheating'] = "Solo se permiten números!";
$text['es']['notenough_cash'] = "No tienes suficiente efectivo!";
$text['es']['minimum'] = "Debes comprar el artículo al menos 1 vez!";
$text['es']['notenough_bank'] = "No tienes suficiente dinero en el banco!!";
$text['es']['bought'] = "Has comprado el artículo con éxito!";

$text['pt']['shop_title'] = 'Loja';
$text['pt']['choose_shop'] = 'Escolha uma loja:';
$text['pt']['weapons'] = 'Armas';
$text['pt']['protection'] = 'Proteção';
$text['pt']['title_weapon'] = "Armas";
$text['pt']['title_protection'] = "Proteção";
$text['pt']['attack'] = 'Ataque';
$text['pt']['defense'] = 'Defesa';
$text['pt']['price'] = 'Preço';
$text['pt']['buy'] = 'Comprar:'; 
$text['pt']['pay_by_bank'] = 'Pagar pelo banco';
$text['pt']['weapon_not_exist'] = "Esta arma não existe!";
$text['pt']['noweapon_selected'] = "Nenhuma arma selecionada";
$text['pt']['cheating'] = "Apenas números são permitidos!";
$text['pt']['notenough_cash'] = "Você não tem dinheiro suficiente!";
$text['pt']['minimum'] = "Você deve comprar o item pelo menos 1 vez!";
$text['pt']['notenough_bank'] = "Você não tem dinheiro suficiente no banco!!";
$text['pt']['bought'] = "Você comprou o item com sucesso!";

$text['fr']['shop_title'] = 'Boutique';
$text['fr']['choose_shop'] = 'Choisir une boutique:';
$text['fr']['weapons'] = 'Armes';
$text['fr']['protection'] = 'Protection';
$text['fr']['title_weapon'] = "Armes";
$text['fr']['title_protection'] = "Protection";
$text['fr']['attack'] = 'Attaque';
$text['fr']['defense'] = 'Défense';
$text['fr']['price'] = 'Prix';
$text['fr']['buy'] = 'Acheter:';
$text['fr']['pay_by_bank'] = 'Payer par la banque';
$text['fr']['weapon_not_exist'] = "Cette arme n'existe pas!";
$text['fr']['noweapon_selected'] = "Aucune arme sélectionnée";
$text['fr']['cheating'] = "Seuls les chiffres sont autorisés!";
$text['fr']['notenough_cash'] = "Vous n'avez pas assez d'argent!";
$text['fr']['minimum'] = "Vous devez acheter l'article au moins 1 fois!";
$text['fr']['notenough_bank'] = "Vous n'avez pas assez d'argent à la banque!!";
$text['fr']['bought'] = "Vous avez acheté l'article avec succès!";

$text['cs']['shop_title'] = 'Obchod';
$text['cs']['choose_shop'] = 'Vyberte obchod:';
$text['cs']['weapons'] = 'Zbraně';
$text['cs']['protection'] = 'Ochrana';
$text['cs']['title_weapon'] = "Zbraně";
$text['cs']['title_protection'] = "Ochrana";
$text['cs']['attack'] = 'Útok';
$text['cs']['defense'] = 'Obrana';
$text['cs']['price'] = 'Cena';
$text['cs']['buy'] = 'Koupit:';
$text['cs']['pay_by_bank'] = 'Platba přes banku';
$text['cs']['weapon_not_exist'] = "Tato zbraň neexistuje!";
$text['cs']['noweapon_selected'] = "Nevybrali jste žádnou zbraň";
$text['cs']['cheating'] = "Povoleny jsou pouze čísla!";
$text['cs']['notenough_cash'] = "Nemáte dostatek hotovosti!";
$text['cs']['minimum'] = "Měli byste zakoupit položku alespoň 1krát!";
$text['cs']['notenough_bank'] = "Nemáte dostatek peněz na účtu!!";
$text['cs']['bought'] = "Úspěšně jste zakoupili položku!";


if($var == 'weapons'){



  	$q = "SELECT * FROM translations where activity = 'shop_title' and lang = '".$lang."'";
	$tt = $db->query($q)->fetch();
  	$q = "SELECT * FROM translations where activity = 'shop_description' and lang = '".$lang."'";
	$td = $db->query($q)->fetch();

  	$q = "SELECT * FROM shop where category = 'attack'";
	$c = $db->query($q)->fetch();


  	$q = "SELECT * FROM languages";
	$l = $db->query($q)->fetch();
	
	


if($_SERVER['REQUEST_METHOD'] === 'POST'){

	$id = isset($_POST['buy']) ? $_POST['buy'] : '0';
	$id = $db->escape($id);
	$amount = isset($_POST['amount']) ? $_POST['amount'] : '0';
	$amount = $db->escape($amount);
	
	
	if($id == 0){
		$errors[] = $text[$lang]['noweapon_selected'];
	}
	
	if(!is_numeric($amount)){
		$errors[] = $text[$lang]['cheating'];
	}
if($amount < 1){
		$errors[] = $text[$lang]['minimum'];

}
	

  	$qc = "SELECT * FROM shop where category ='attack' and id = '".$id."' ";
	$fc = $db->query($qc)->fetch();
	if($db->affected_rows != '1')
	{	
		$errors[] = $text[$lang]['weapon_not_exist'];
	}



  	$qu = "SELECT * FROM users where id = '".$userdata[0]['id']."' ";
	$fu = $db->query($qu)->fetch();
	
 	if($_POST['cash'] != ''){
 		if($fu[0]['cash'] < ($fc[0]['price'] * $amount)){
 			
			$errors[] = $text[$lang]['notenough_cash'];
 		}
 		
 	}
 	if($_POST['bank'] != ''){
 	 		if($fu[0]['bank'] < ($fc[0]['price'] * $amount)){
 			
			$errors[] = $text[$lang]['notenough_bank'];
 		}
 		
 	}

	if(empty($errors))
	{
	
	$totalprice = $fc[0]['price'] * $amount;
		$totalatt = $fc[0]['att'] * $amount;
		$totaldeff = $fc[0]['deff'] * $amount;
	 	if($_POST['cash'] != ''){
 		
 			$user = array(
                'cash' => ($fu[0]['cash'] - $totalprice),
                'att_power' => ($fu[0]['att_power'] + $totalatt),
                'deff_power' => ($fu[0]['deff_power'] + $totaldeff),
           	 );
			$where = array(
				'id' => $userdata[0]['id']
			);
			$db->where($where)->update('users', $user); 
			
			
			$success[] = $text[$lang]['bought'];

 		}
		if($_POST['bank'] != ''){
		
		
 			$user = array(
                'bank' => ($fu[0]['bank'] - $totalprice),
                'att_power' => ($fu[0]['att_power'] + $totalatt),
                'deff_power' => ($fu[0]['deff_power'] + $totaldeff),
           	 );
			$where = array(
				'id' => $userdata[0]['id']
			);
			$db->where($where)->update('users', $user); 
			
	 		$success[] = $text[$lang]['bought'];


		}
	
	
	}
}

}else   
    
if($var == 'protection'){

 

  	$q = "SELECT * FROM translations where activity = 'shop_title' and lang = '".$lang."'";
	$tt = $db->query($q)->fetch();
  	$q = "SELECT * FROM translations where activity = 'shop_description' and lang = '".$lang."'";
	$td = $db->query($q)->fetch();

  	$q = "SELECT * FROM shop where category = 'defence'";
	$c = $db->query($q)->fetch();


  	$q = "SELECT * FROM languages";
	$l = $db->query($q)->fetch();
	
	



if($_SERVER['REQUEST_METHOD'] === 'POST'){
print_r($_POST);
	$id = isset($_POST['buy']) ? $_POST['buy'] : '0';
	$id = $db->escape($id);
	$amount = isset($_POST['amount']) ? $_POST['amount'] : '0';
	$amount = $db->escape($amount);
	
	
	if($id == 0){
		$errors[] = $text[$lang]['noweapon_selected'];
	}
	
	if(!is_numeric($amount)){
		$errors[] = $text[$lang]['cheating'];
	}
	
if($amount < 1){
		$errors[] = $text[$lang]['minimum'];

}
  	$qc = "SELECT * FROM shop where category ='defence' and id = '".$id."' ";
	$fc = $db->query($qc)->fetch();
	if($db->affected_rows != '1')
	{	
		$errors[] = $text[$lang]['weapon_not_exist'];
	}



  	$qu = "SELECT * FROM users where id = '".$userdata[0]['id']."' ";
	$fu = $db->query($qu)->fetch();
	
 	if($_POST['cash'] != ''){
 		if($fu[0]['cash'] < ($fc[0]['price'] * $amount)){
 			
			$errors[] = $text[$lang]['notenough_cash'];
 		}
 		
 	}
 	if($_POST['bank'] != ''){
 	 		if($fu[0]['bank'] < ($fc[0]['price'] * $amount)){
 			
			$errors[] = $text[$lang]['notenough_bank'];
 		}
 		
 	}

	if(empty($errors))
	{
		$totalprice = $fc[0]['price'] * $amount;
		$totalatt = $fc[0]['att'] * $amount;
		$totaldeff = $fc[0]['deff'] * $amount;
	 	if($_POST['cash'] != ''){
 		
 			$user = array(
                'cash' => ($fu[0]['cash'] - $totalprice),
                'att_power' => ($fu[0]['att_power'] + $totalatt),
                'deff_power' => ($fu[0]['deff_power'] + $totaldeff),
           	 );
			$where = array(
				'id' => $userdata[0]['id']
			);
			$db->where($where)->update('users', $user); 
			
			
			$success[] = $text[$lang]['bought'];

 		}
		if($_POST['bank'] != ''){
		
		
 			$user = array(
                'bank' => ($fu[0]['bank'] - $totalprice),
                'att_power' => ($fu[0]['att_power'] + $totalatt),
                'deff_power' => ($fu[0]['deff_power'] + $totaldeff),
           	 );
			$where = array(
				'id' => $userdata[0]['id']
			);
			$db->where($where)->update('users', $user); 
			
	 		$success[] = $text[$lang]['bought'];


		}
	
	}
}

}else{


}