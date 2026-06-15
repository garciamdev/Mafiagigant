<?php

    if(!isset($_SESSION['suid']) or $_SESSION['suid'] == ''){
        header("Location: ".BASE_URL."login/");
        exit(); 
    }

    if(!isset($userdata[0]['authority']) or $userdata[0]['authority'] != 'admin'){ 
    //$noaccess = 1;
    }
 
 
 
 
$text['nl']['page_title'] = 'Auto stelen';
$text['nl']['table_crimes'] = 'Overval';
$text['nl']['table_country'] = 'Land';
$text['nl']['table_chance'] = 'Kans';
$text['nl']['garage_full'] = 'Je garage is vol!';
$text['nl']['captcha'] = 'Deze auto stelen? Klik op het groene vinkje!!';
	$text['nl']['crime_wait'] = 'Je moet nog {timer} wachten voor dat je weer een auto kan stelen!';
	$text['nl']['no_crime_selected'] = 'Geen auto stelen geselecteerd';
	$text['nl']['cheating'] = 'Probeer je de boel op te lichten?';
	$text['nl']['crime_doenst_exist'] = 'U probeert een auto te stelen die niet bestaat!';
	$text['nl']['crime_success'] = 'Auto stelen is gelukt! je hebt hiermee een {car} gestolen met een waarde van € {amount}.';
		$text['nl']['crime_failed'] = 'Helaas heb je geen auto kunnen stelen!';
			$text['nl']['crime_go_to_jail'] = 'Je bent gepakt door de politie! Je gaat naar de gevangenis!';
$text['nl']['page_title_garage'] = 'Garage';
$text['nl']['page_title_garage_in'] = 'Garage in {country}';
$text['nl']['text_garage'] = "In elke garage is ruimte voor {amount} auto's.";
$text['nl']['table_garage'] = 'Garage';
$text['nl']['table_garageamount'] = "Aantal auto's";
$text['nl']['text_garage_totaldifferentcars'] = "Verschillende auto's in het spel:";
$text['nl']['text_garage_totalpossession'] = "Verschillende auto's in bezit:";
$text['nl']['text_garage_incountry'] = "Verschillende auto's in {country}:";
$text['nl']['text_repair'] = "Weet je zeker dat je deze auto's wilt repareren?";
$text['nl']['page_title_repair'] = "Auto's repareren";
    $text['nl']['not_enough'] = "U heeft niet genoeg cash!";
    $text['nl']['repaired'] = "De auto's zijn gerepareerd!";
    $text['nl']['no_cars'] = "Deze auto heeft geen schade!";
    $text['nl']['no_cars_selected'] = "Geen auto's geselecteerd!";
    $text['nl']['nocars'] = "Je hebt nog geen auto's";
    $text['nl']['selldealer'] = "De auto's zijn verkocht!";
              $text['nl']['table_car'] = "Auto";
              $text['nl']['table_newprice'] = "Nieuw prijs";
              $text['nl']['table_demage'] = "Schade";
              $text['nl']['table_repaircost'] = "Reparatieksoten";
$text['nl']['page_title_sell'] = "Auto's verkopen";
$text['nl']['table_sellcar'] = "Waarde";
$text['nl']['table_sellcar_total'] = "Totaal";
$text['nl']['buttonyes'] = "Ja";
$text['nl']['buttonno'] = "Nee";
$text['nl']['text_sell'] = "Weet je zeker dat je deze auto's wilt verkopen?";
            $text['nl']['topmenu_cars_stealcars'] = 'Auto stelen';
$text['nl']['topmenu_cars_garage'] = 'Garage';
$text['nl']['garage_bottom_selectall'] = "Geselecteerde auto's";
$text['nl']['garage_bottom_repair'] = "Repareren";
$text['nl']['garage_bottom_selldealer'] = "Verkopen aan dealer";
$text['nl']['garage_carinfo_value'] = "Waarde";
$text['nl']['garage_carinfo_demage'] = "Schade";
$text['nl']['garage_carinfo_newprice'] = "Nieuwwaarde";
  
  
  $text['en']['page_title'] = 'Steal Car';
$text['en']['table_crimes'] = 'Robbery';
$text['en']['table_country'] = 'Country';
$text['en']['table_chance'] = 'Chance';
$text['en']['garage_full'] = 'Your garage is full!';
$text['en']['captcha'] = 'Steal this car? Click the green checkmark!';
$text['en']['crime_wait'] = 'You have to wait for {timer} before you can steal another car!';
$text['en']['no_crime_selected'] = 'No car selected to steal';
$text['en']['cheating'] = 'Are you trying to cheat?';
$text['en']['crime_doenst_exist'] = "You are trying to steal a car that doesn't exist!";
$text['en']['crime_success'] = "Car theft successful! You have stolen a {car} with a value of € {amount}.";
$text['en']['crime_failed'] = "Unfortunately, you couldn't steal a car!";
$text['en']['crime_go_to_jail'] = "You've been caught by the police! You're going to jail!";
$text['en']['page_title_garage'] = 'Garage';
$text['en']['page_title_garage_in'] = 'Garage in {country}';
$text['en']['text_garage'] = "Each garage can hold {amount} cars.";
$text['en']['table_garage'] = 'Garage';
$text['en']['table_garageamount'] = "Number of cars";
$text['en']['text_garage_totaldifferentcars'] = "Different cars in the game:";
$text['en']['text_garage_totalpossession'] = "Different cars owned:";
$text['en']['text_garage_incountry'] = "Different cars in {country}:";
$text['en']['text_repair'] = "Are you sure you want to repair these cars?";
$text['en']['page_title_repair'] = "Repair Cars";
$text['en']['not_enough'] = "You don't have enough cash!";
$text['en']['repaired'] = "The cars have been repaired!";
$text['en']['no_cars'] = "This car has no damage!";
$text['en']['no_cars_selected'] = "No cars selected!";
$text['en']['nocars'] = "You don't have any cars yet";
$text['en']['selldealer'] = "The cars have been sold!";
$text['en']['table_car'] = "Car";
$text['en']['table_newprice'] = "New price";
$text['en']['table_demage'] = "Damage";
$text['en']['table_repaircost'] = "Repair Costs";
$text['en']['page_title_sell'] = "Sell Cars";
$text['en']['table_sellcar'] = "Value";
$text['en']['table_sellcar_total'] = "Total";
$text['en']['buttonyes'] = "Yes";
$text['en']['buttonno'] = "No";
$text['en']['text_sell'] = "Are you sure you want to sell these cars?";
$text['en']['topmenu_cars_stealcars'] = 'Steal Car';
$text['en']['topmenu_cars_garage'] = 'Garage';
$text['en']['garage_bottom_selectall'] = "Selected cars";
$text['en']['garage_bottom_repair'] = "Repair";
$text['en']['garage_bottom_selldealer'] = "Sell to dealer";
$text['en']['garage_carinfo_value'] = "Value";
$text['en']['garage_carinfo_demage'] = "Damage";
$text['en']['garage_carinfo_newprice'] = "New Value";

  
  $text['de']['page_title'] = 'Auto stehlen';
$text['de']['table_crimes'] = 'Überfall';
$text['de']['table_country'] = 'Land';
$text['de']['table_chance'] = 'Chance';
$text['de']['garage_full'] = 'Deine Garage ist voll!';
$text['de']['captcha'] = 'Dieses Auto stehlen? Klicke auf das grüne Häkchen!';
$text['de']['crime_wait'] = 'Du musst noch {timer} warten, bevor du ein weiteres Auto stehlen kannst!';
$text['de']['no_crime_selected'] = 'Kein Auto zum Stehlen ausgewählt';
$text['de']['cheating'] = 'Versuchst du zu schummeln?';
$text['de']['crime_doenst_exist'] = 'Du versuchst, ein Auto zu stehlen, das nicht existiert!';
$text['de']['crime_success'] = 'Autodiebstahl erfolgreich! Du hast ein {car} im Wert von € {amount} gestohlen.';
$text['de']['crime_failed'] = 'Leider konntest du kein Auto stehlen!';
$text['de']['crime_go_to_jail'] = 'Du wurdest von der Polizei erwischt! Du gehst ins Gefängnis!';
$text['de']['page_title_garage'] = 'Garage';
$text['de']['page_title_garage_in'] = 'Garage in {country}';
$text['de']['text_garage'] = 'In jeder Garage ist Platz für {amount} Autos.';
$text['de']['table_garage'] = 'Garage';
$text['de']['table_garageamount'] = 'Anzahl der Autos';
$text['de']['text_garage_totaldifferentcars'] = 'Unterschiedliche Autos im Spiel:';
$text['de']['text_garage_totalpossession'] = 'Unterschiedliche Autos im Besitz:';
$text['de']['text_garage_incountry'] = 'Unterschiedliche Autos in {country}:';
$text['de']['text_repair'] = 'Bist du sicher, dass du diese Autos reparieren möchtest?';
$text['de']['page_title_repair'] = 'Autos reparieren';
$text['de']['not_enough'] = 'Du hast nicht genug Bargeld!';
$text['de']['repaired'] = 'Die Autos wurden repariert!';
$text['de']['no_cars'] = 'Dieses Auto hat keinen Schaden!';
$text['de']['no_cars_selected'] = 'Keine Autos ausgewählt!';
$text['de']['nocars'] = 'Du hast noch keine Autos';
$text['de']['selldealer'] = 'Die Autos wurden verkauft!';
$text['de']['table_car'] = 'Auto';
$text['de']['table_newprice'] = 'Neuer Preis';
$text['de']['table_demage'] = 'Schaden';
$text['de']['table_repaircost'] = 'Reparaturkosten';
$text['de']['page_title_sell'] = 'Autos verkaufen';
$text['de']['table_sellcar'] = 'Wert';
$text['de']['table_sellcar_total'] = 'Gesamt';
$text['de']['buttonyes'] = 'Ja';
$text['de']['buttonno'] = 'Nein';
$text['de']['text_sell'] = 'Bist du sicher, dass du diese Autos verkaufen möchtest?';
$text['de']['topmenu_cars_stealcars'] = 'Auto stehlen';
$text['de']['topmenu_cars_garage'] = 'Garage';
$text['de']['garage_bottom_selectall'] = 'Ausgewählte Autos';
$text['de']['garage_bottom_repair'] = 'Reparieren';
$text['de']['garage_bottom_selldealer'] = 'An Händler verkaufen';
$text['de']['garage_carinfo_value'] = 'Wert';
$text['de']['garage_carinfo_demage'] = 'Schaden';
$text['de']['garage_carinfo_newprice'] = 'Neuer Wert';

$text['es']['page_title'] = 'Robo de autos';
$text['es']['table_crimes'] = 'Asalto';
$text['es']['table_country'] = 'País';
$text['es']['table_chance'] = 'Oportunidad';
$text['es']['garage_full'] = '¡Tu garaje está lleno!';
$text['es']['captcha'] = '¿Robar este auto? ¡Haz clic en la marca de verificación verde!';
$text['es']['crime_wait'] = 'Debes esperar {timer} más antes de poder robar otro auto';
$text['es']['no_crime_selected'] = 'No se ha seleccionado ningún robo de auto';
$text['es']['cheating'] = '¿Estás intentando hacer trampas?';
$text['es']['crime_doenst_exist'] = 'Estás intentando robar un auto que no existe';
$text['es']['crime_success'] = '¡Robo de auto exitoso! Has robado un {car} con un valor de € {amount}';
$text['es']['crime_failed'] = '¡Lamentablemente, no pudiste robar un auto!';
$text['es']['crime_go_to_jail'] = '¡La policía te ha atrapado! Vas a la cárcel';
$text['es']['page_title_garage'] = 'Garaje';
$text['es']['page_title_garage_in'] = 'Garaje en {country}';
$text['es']['text_garage'] = "Cada garaje tiene espacio para {amount} autos";
$text['es']['table_garage'] = 'Garaje';
$text['es']['table_garageamount'] = 'Número de autos';
$text['es']['text_garage_totaldifferentcars'] = 'Diferentes autos en el juego';
$text['es']['text_garage_totalpossession'] = 'Diferentes autos en posesión';
$text['es']['text_garage_incountry'] = 'Diferentes autos en {country}';
$text['es']['text_repair'] = '¿Estás seguro de que quieres reparar estos autos?';
$text['es']['page_title_repair'] = 'Reparar Autos';
$text['es']['not_enough'] = '¡No tienes suficiente efectivo!';
$text['es']['repaired'] = '¡Los autos han sido reparados!';
$text['es']['no_cars'] = '¡Este auto no tiene daños!';
$text['es']['no_cars_selected'] = '¡No se han seleccionado autos!';
$text['es']['nocars'] = 'Todavía no tienes autos';
$text['es']['selldealer'] = '¡Los autos han sido vendidos!';
$text['es']['table_car'] = 'Auto';
$text['es']['table_newprice'] = 'Nuevo precio';
$text['es']['table_demage'] = 'Daño';
$text['es']['table_repaircost'] = 'Costo de reparación';
$text['es']['page_title_sell'] = 'Vender Autos';
$text['es']['table_sellcar'] = 'Valor';
$text['es']['table_sellcar_total'] = 'Total';
$text['es']['buttonyes'] = 'Sí';
$text['es']['buttonno'] = 'No';
$text['es']['text_sell'] = '¿Estás seguro de que quieres vender estos autos?';
$text['es']['topmenu_cars_stealcars'] = 'Robo de autos';
$text['es']['topmenu_cars_garage'] = 'Garaje';
$text['es']['garage_bottom_selectall'] = 'Autos seleccionados';
$text['es']['garage_bottom_repair'] = 'Reparar';
$text['es']['garage_bottom_selldealer'] = 'Vender al concesionario';
$text['es']['garage_carinfo_value'] = 'Valor';
$text['es']['garage_carinfo_demage'] = 'Daño';
$text['es']['garage_carinfo_newprice'] = 'Nuevo Valor';

$text['pt']['page_title'] = 'Roubar Carro';
$text['pt']['table_crimes'] = 'Assalto';
$text['pt']['table_country'] = 'País';
$text['pt']['table_chance'] = 'Chance';
$text['pt']['garage_full'] = 'Sua garagem está cheia!';
$text['pt']['captcha'] = 'Roubar este carro? Clique na marca de seleção verde!';
$text['pt']['crime_wait'] = 'Você precisa esperar {timer} antes de roubar outro carro!';
$text['pt']['no_crime_selected'] = 'Nenhum carro selecionado para roubo';
$text['pt']['cheating'] = 'Você está tentando trapacear?';
$text['pt']['crime_doesnt_exist'] = 'Você está tentando roubar um carro que não existe!';
$text['pt']['crime_success'] = 'Roubo de carro bem-sucedido! Você roubou um {car} no valor de € {amount}.';
$text['pt']['crime_failed'] = 'Infelizmente, você não conseguiu roubar um carro!';
$text['pt']['crime_go_to_jail'] = 'Você foi pego pela polícia! Vai para a prisão!';
$text['pt']['page_title_garage'] = 'Garagem';
$text['pt']['page_title_garage_in'] = 'Garagem em {country}';
$text['pt']['text_garage'] = "Cada garagem tem espaço para {amount} carros.";
$text['pt']['table_garage'] = 'Garagem';
$text['pt']['table_garageamount'] = "Quantidade de Carros";
$text['pt']['text_garage_totaldifferentcars'] = "Diferentes carros no jogo:";
$text['pt']['text_garage_totalpossession'] = "Diferentes carros em posse:";
$text['pt']['text_garage_incountry'] = "Diferentes carros em {country}:";
$text['pt']['text_repair'] = "Tem certeza de que deseja consertar esses carros?";
$text['pt']['page_title_repair'] = "Consertar Carros";
$text['pt']['not_enough'] = "Você não tem dinheiro suficiente!";
$text['pt']['repaired'] = "Os carros foram consertados!";
$text['pt']['no_cars'] = "Este carro não tem danos!";
$text['pt']['no_cars_selected'] = "Nenhum carro selecionado!";
$text['pt']['no_cars'] = "Você ainda não possui carros";
$text['pt']['selldealer'] = "Os carros foram vendidos!";
$text['pt']['table_car'] = "Carro";
$text['pt']['table_newprice'] = "Novo Preço";
$text['pt']['table_damage'] = "Danos";
$text['pt']['table_repaircost'] = "Custo de Reparo";
$text['pt']['page_title_sell'] = "Vender Carros";
$text['pt']['table_sellcar'] = "Valor";
$text['pt']['table_sellcar_total'] = "Total";
$text['pt']['buttonyes'] = "Sim";
$text['pt']['buttonno'] = "Não";
$text['pt']['text_sell'] = "Tem certeza de que deseja vender esses carros?";
$text['pt']['topmenu_cars_stealcars'] = 'Roubar Carros';
$text['pt']['topmenu_cars_garage'] = 'Garagem';
$text['pt']['garage_bottom_selectall'] = "Selecionar Carros";
$text['pt']['garage_bottom_repair'] = "Consertar";
$text['pt']['garage_bottom_selldealer'] = "Vender ao Revendedor";
$text['pt']['garage_carinfo_value'] = "Valor";
$text['pt']['garage_carinfo_damage'] = "Danos";
$text['pt']['garage_carinfo_newprice'] = "Novo Valor";

$text['fr']['page_title'] = 'Vol de Voiture';
$text['fr']['table_crimes'] = 'Attaque';
$text['fr']['table_country'] = 'Pays';
$text['fr']['table_chance'] = 'Chance';
$text['fr']['garage_full'] = 'Votre garage est plein !';
$text['fr']['captcha'] = 'Vol de cette voiture ? Cliquez sur la coche verte !';
$text['fr']['crime_wait'] = 'Vous devez attendre encore {timer} avant de voler une autre voiture !';
$text['fr']['no_crime_selected'] = 'Aucune voiture sélectionnée pour voler';
$text['fr']['cheating'] = 'Essayez-vous de tricher ?';
$text['fr']['crime_doesnt_exist'] = "Vous essayez de voler une voiture qui n'existe pas !";
$text['fr']['crime_success'] = "Vol de voiture réussi ! Vous avez volé une {car} d'une valeur de € {amount}.";
$text['fr']['crime_failed'] = "Malheureusement, vous n'avez pas réussi à voler de voiture !";
$text['fr']['crime_go_to_jail'] = 'Vous avez été attrapé par la police ! Vous allez en prison !';
$text['fr']['page_title_garage'] = 'Garage';
$text['fr']['page_title_garage_in'] = 'Garage en {country}';
$text['fr']['text_garage'] = "Chaque garage peut contenir {amount} voitures.";
$text['fr']['table_garage'] = 'Garage';
$text['fr']['table_garageamount'] = "Nombre de Voitures";
$text['fr']['text_garage_totaldifferentcars'] = "Différentes voitures dans le jeu :";
$text['fr']['text_garage_totalpossession'] = "Différentes voitures en possession :";
$text['fr']['text_garage_incountry'] = "Différentes voitures en {country} :";
$text['fr']['text_repair'] = "Êtes-vous sûr de vouloir réparer ces voitures ?";
$text['fr']['page_title_repair'] = "Réparer les Voitures";
$text['fr']['not_enough'] = "Vous n'avez pas assez d'argent !";
$text['fr']['repaired'] = "Les voitures ont été réparées !";
$text['fr']['no_cars'] = "Cette voiture n'a pas de dommages !";
$text['fr']['no_cars_selected'] = "Aucune voiture sélectionnée !";
$text['fr']['nocars'] = "Vous n'avez pas encore de voitures";
$text['fr']['selldealer'] = "Les voitures ont été vendues !";
$text['fr']['table_car'] = "Voiture";
$text['fr']['table_newprice'] = "Nouveau Prix";
$text['fr']['table_demage'] = "Dommage";
$text['fr']['table_repaircost'] = "Coût de Réparation";
$text['fr']['page_title_sell'] = "Vente de Voitures";
$text['fr']['table_sellcar'] = "Valeur";
$text['fr']['table_sellcar_total'] = "Total";
$text['fr']['buttonyes'] = "Oui";
$text['fr']['buttonno'] = "Non";
$text['fr']['text_sell'] = "Êtes-vous sûr de vouloir vendre ces voitures ?";
$text['fr']['topmenu_cars_stealcars'] = 'Vol de Voitures';
$text['fr']['topmenu_cars_garage'] = 'Garage';
$text['fr']['garage_bottom_selectall'] = "Sélectionner les Voitures";
$text['fr']['garage_bottom_repair'] = "Réparer";
$text['fr']['garage_bottom_selldealer'] = "Vendre au Revendeur";
$text['fr']['garage_carinfo_value'] = "Valeur";
$text['fr']['garage_carinfo_damage'] = "Dommage";
$text['fr']['garage_carinfo_newprice'] = "Nouvelle Valeur";

  
  
  
  
  $text['cs']['page_title'] = 'Krádež Auta';
$text['cs']['table_crimes'] = 'Útok';
$text['cs']['table_country'] = 'Země';
$text['cs']['table_chance'] = 'Šance';
$text['cs']['garage_full'] = 'Vaše garáž je plná!';
$text['cs']['captcha'] = 'Krast tohle auto? Klikněte na zelenou fajfku!';
$text['cs']['crime_wait'] = 'Musíte počkat ještě {timer} než budete moct ukrást další auto!';
$text['cs']['no_crime_selected'] = 'Nevybrali jste žádné auto k odcizení';
$text['cs']['cheating'] = 'Snažíte se podvádět?';
$text['cs']['crime_doesnt_exist'] = 'Snažíte se ukrást auto, které neexistuje!';
$text['cs']['crime_success'] = 'Krádež auta byla úspěšná! Ukradli jste {car} v hodnotě € {amount}.';
$text['cs']['crime_failed'] = 'Bohužel se vám nepodařilo ukrást auto!';
$text['cs']['crime_go_to_jail'] = 'Policie vás chytila! Jdete do vězení!';
$text['cs']['page_title_garage'] = 'Garáž';
$text['cs']['page_title_garage_in'] = 'Garáž v {country}';
$text['cs']['text_garage'] = "V každé garáži je místo pro {amount} auta.";
$text['cs']['table_garage'] = 'Garáž';
$text['cs']['table_garageamount'] = "Počet aut";
$text['cs']['text_garage_totaldifferentcars'] = "Různá auta ve hře:";
$text['cs']['text_garage_totalpossession'] = "Různá auta v majetku:";
$text['cs']['text_garage_incountry'] = "Různá auta v {country}:";
$text['cs']['text_repair'] = "Jste si jistí, že chcete tato auta opravit?";
$text['cs']['page_title_repair'] = "Opravit Auta";
$text['cs']['not_enough'] = "Nemáte dostatek hotovosti!";
$text['cs']['repaired'] = "Auta byla opravena!";
$text['cs']['no_cars'] = "Toto auto není poškozené!";
$text['cs']['no_cars_selected'] = "Nevybrali jste žádná auta!";
$text['cs']['nocars'] = "Zatím nemáte žádná auta";
$text['cs']['selldealer'] = "Auta byla prodána!";
$text['cs']['table_car'] = "Auto";
$text['cs']['table_newprice'] = "Nová Cena";
$text['cs']['table_damage'] = "Poškození";
$text['cs']['table_repaircost'] = "Náklady na Opravu";
$text['cs']['page_title_sell'] = "Prodej Aut";
$text['cs']['table_sellcar'] = "Hodnota";
$text['cs']['table_sellcar_total'] = "Celkem";
$text['cs']['buttonyes'] = "Ano";
$text['cs']['buttonno'] = "Ne";
$text['cs']['text_sell'] = "Jste si jistí, že chcete tato auta prodat?";
$text['cs']['topmenu_cars_stealcars'] = 'Krádež Aut';
$text['cs']['topmenu_cars_garage'] = 'Garáž';
$text['cs']['garage_bottom_selectall'] = "Vybrat Auta";
$text['cs']['garage_bottom_repair'] = "Opravit";
$text['cs']['garage_bottom_selldealer'] = "Prodat Obchodníkovi";
$text['cs']['garage_carinfo_value'] = "Hodnota";
$text['cs']['garage_carinfo_damage'] = "Poškození";
$text['cs']['garage_carinfo_newprice'] = "Nová Hodnota";

  
  
  
  $text[$lang]['text_garage_incountry'] = txt($text[$lang]['text_garage_incountry'],"{country}",getcountry($userdata[0]['country']));




$varallowed = array("steal","garage","repair","dealer","race");
if(in_array($var,$varallowed)){
	$varallowed = 'yes';
}else{
	$varallowed = 'no';
}


 
if($var == 'repair' or $var == 'dealer'){
	if(!isset($_POST['cars'])){
		$var = 'garage';
		$varallowed = 'no';
	}
	
}

 
 
	if($var == 'steal'){
 		require_once('steal.php');
 	}
 
 
	if($var == 'race'){
 		require_once('race.php');
 	}
 	
 	
 	if($var =='dealer'){
 		require_once('garage.php');
 	}
 	
 	if($var =='repair'){
 		require_once('garage.php');
 	}
 	if($var =='garage'){
 		require_once('garage.php');
 	}