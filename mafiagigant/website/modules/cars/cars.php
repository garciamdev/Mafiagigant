<?php

    if(!isset($_SESSION['suid']) or $_SESSION['suid'] == ''){
        header("Location: ".BASE_URL."login/");
        exit(); 
    }

    if(!isset($userdata[0]['authority']) or $userdata[0]['authority'] != 'admin'){
       // header("Location: /");
       // exit(); 
    }
 

  	$q = "SELECT * FROM translations where activity = 'stealcars' and lang = '".$lang."'";
	$tsc = $db->query($q)->fetch();
  	$q = "SELECT * FROM translations where activity = 'cars' and lang = '".$lang."'";
	$tcars = $db->query($q)->fetch();
  	$q = "SELECT * FROM translations where activity = 'countrys' and lang = '".$lang."'";
	$tc = $db->query($q)->fetch();

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

 
if($var == 'race' ){

	if(!isset($userdata[0]['authority']) or $userdata[0]['authority'] != 'admin'){

		//$var = 'garage';
		//$varallowed = 'no';
    }
 
}


if($var == 'steal'){

$q = "SELECT * FROM timers where activity = 'stealcars' and username = '".$userdata[0]['username']."'";
$timer = $db->query($q)->fetch();

$now = date("Y-m-d H:i:s");
$wait = 0;
if($timer[0]['time'] >= $now){
		$wait = datetotime($timer[0]['time']) - time();
		$count_timer = '<font id="count_timer"></font>';
		$text[$lang]['crime_wait'] = txt($text[$lang]['crime_wait'],'{timer}', $count_timer);
		$errors[] = $text[$lang]['crime_wait'];
}

	$qcu = "SELECT count(id) as quantity FROM garage where  username = '".$userdata[0]['username']."' and country = '".$userdata[0]['country']."' and demage < '100'";
	$fcu = $db->query($qcu)->fetch();
	$totalcarsincountry = isset($fcu[0]['quantity']) ? $fcu[0]['quantity']  : 0;
		
		$full = 0;
	if($totalcarsincountry >= $userdata[0]['garagespots']){
	$full = 1;
			$errors[] = $text[$lang]['garage_full'];

	}

}


	if($varallowed == 'no'){
		$qcu = "SELECT count(id) as quantity FROM garage where  username = '".$userdata[0]['username']."' and country = '".$userdata[0]['country']."' and demage < '100'";
	$fcu = $db->query($qcu)->fetch();
	$totalcarsincountry = isset($fcu[0]['quantity']) ? $fcu[0]['quantity']  : 0;
		
		$nocars = 0;
		if($totalcarsincountry == 0){
					$errors[] = $text[$lang]['nocars'];
		$nocars = 1;

		}
	}
 




if($_SERVER['REQUEST_METHOD'] === 'POST'){

if($var == 'steal'){
	$id = isset($_POST['stealcars']) ? $_POST['stealcars'] : '0';
	$id = $db->escape($id);
	
	
	if($id == 0){
		$errors[] = $text[$lang]['no_crime_selected'];
	}
	
	if(!is_numeric($id)){
		$errors[] = $text[$lang]['cheating'];
	}
	

  	$qc = "SELECT * FROM stealcars where id = '".$id."' ";
	$fc = $db->query($qc)->fetch();
	if($db->affected_rows != '1')
	{	
		$errors[] = $text[$lang]['crime_doenst_exist'];
	}



	if(empty($errors))
	{
	 	$xp = rand($fc[0]['exp'],$fc[0]['maxexp']);
	 	
		$qc = "SELECT * FROM chances where username = '".$userdata[0]['username']."' and activity = 'stealcars' and activity_id = '".$id."' ";
		$fchance = $db->query($qc)->fetch();
		if($db->affected_rows == '0')
		{	
			$crimec = array(
                'activity' => 'stealcars',
                'activity_id' => $id,
                'username' =>$userdata[0]['username'],
                'xp' => $xp,
            );
         	$crimec = $db->insert('chances', $crimec); 
		}else{
			$crimec = array(
                'xp' => ($fchance[0]['xp'] + $xp),
           	 );
			$where = array(
				'activity' => 'stealcars',
				'activity_id' => $id,
				'username' => $userdata[0]['username']
			);
			$db->where($where)->update('chances', $crimec); 
		
		}






		if($fc[0]['successexpneeded'] > 0) {
			$perc = floor((getactivityxp($fc[0]['id'], $fchance) / $fc[0]['successexpneeded']) * 100);
		}else{
			$perc = 100;
		}
		if($perc < 1){ $perc = 0;}
		if($perc > 100){ $perc = 100;}
		if($perc > $fc[0]['successmaxperc']){
			$perc = $fc[0]['successmaxperc'];
		}
				
		$money = 0;
		$bullets = 0;
		$randchance = rand(0,100);
		
		if($perc >= $randchance){
		
			$demage = rand(0,70);
			
			
			
			$q = "SELECT * FROM cars where stealcars = '".$fc[0]['id']."' order by rand() limit 1";
			$fcar = $db->query($q)->fetch();
			
			
			$receive = $fcar[0]['price'] - (( $fcar[0]['price'] / 100 ) * $demage);
			
			
			$text[$lang]['crime_success'] = txt($text[$lang]['crime_success'],'{car}',gettranslation($fcar[0]['id'],$tcars));
			$success[] = txt($text[$lang]['crime_success'],'{amount}',number($receive));
					
			$success[] = "<img src='".$fcar[0]['img']."'>";
					
		
		
			$car = array(
                'car' => $fcar[0]['id'],
                'demage' => $demage,
                'country' =>$userdata[0]['country'],
                'username' =>$userdata[0]['username'],
            );
         	$carc = $db->insert('garage', $car); 
         	
         	
         	
			
			$user = array(
                'xp' => ($userdata[0]['xp'] + $xp),
           	 );
			$where = array(
				'id' => $userdata[0]['id']
			);
			$db->where($where)->update('users', $user); 
			
			
			
		}else{
		
			
			
			$randchance = rand(0,100);
			if($randchance >= $fc[0]['jailchance']){
		
				$errors[] = $text[$lang]['crime_failed'];
				
				
			$user = array(
                'xp' => ($userdata[0]['xp'] + $xp),
           	 );
			$where = array(
				'id' => $userdata[0]['id']
			);
			$db->where($where)->update('users', $user); 
			
			
			}else{
			
				$errors[] = $text[$lang]['crime_go_to_jail'];
				jail($userdata[0]['username'], $fc[0]['jailtime']);
			}
		
		}
		
		
		
		$nextcrime = timetodate(time() + $fc[0]['cooldown']);

		$qc = "SELECT * FROM timers where username = '".$userdata[0]['username']."' and activity = 'stealcars'";
		$fchance = $db->query($qc)->fetch();
		if($db->affected_rows == '0')
		{	
			$timers = array(
                'activity' => 'stealcars',
                'username' =>$userdata[0]['username'],
                'time' => $nextcrime,
            );
         	$timers = $db->insert('timers', $timers); 
		}else{
			$timers = array(
                'time' => $nextcrime,
           	 );
			$where = array(
				'activity' => 'stealcars',
				'username' => $userdata[0]['username']
			);
			$db->where($where)->update('timers', $timers); 
		}





		//$success[] = "perc = ".$perc." > rand ".$randchance." >>".$fc[0]['successexpneeded'];
		
		
		//$success[] = $text[$lang]['crime_success'];

	}

}


if($var == 'repair'){


$pcars = explode(",",$_POST['cars']);


  		$q = "SELECT * FROM garage where username = '".$userdata[0]['username']."' and country = '".$userdata[0]['country']."' and demage > 0 and demage < '100'";
		$g = $db->query($q)->fetch();
		
		$totalrepair = 0;
		foreach($g as $f){
    		if (in_array($f['id'], $pcars)) {
    	
    			$carinfo = getcarinfo($f['car']);
    			$value = round((( $carinfo[0]['price'] / 100 ) * $f['demage']) * 1.10);
    			$totalrepair = $totalrepair + $value;
    			
    		
    		
    		}	
    	}
	
	
    		if($totalrepair == 0){
    			$errors[] = $text[$lang]['no_cars'];
    		}
    		
	if(isset($_POST['repair'])){
	
	


    		
    		if($userdata[0]['cash'] <= $totalrepair){
    		$errors[] = $text[$lang]['not_enough'];
    		}
    		
    		
			if(empty($errors))
			{
			
			
					foreach($g as $f){
    		if (in_array($f['id'], $pcars)) {
    
    						
			$repair = array(
                'demage' => 0,
           	 );
			$where = array(
				'id' => $f['id']
			);
			$db->where($where)->update('garage', $repair); 
			
			
    		
    		
    		}	
    	}

			
			
			$user = array(
                'cash' => ($userdata[0]['cash'] - $totalrepair),
           	 );
			$where = array(
				'id' => $userdata[0]['id']
			);
			$db->where($where)->update('users', $user); 
			
			
			
    	
    		$success[] = $text[$lang]['repaired'];
    	
    	
			
			}
			
			
	
	}	
	if(isset($_POST['notrepair'])){
	
		$var = 'garage';
		$varallowed = 'no';
	}
	
	

}








if($var == 'dealer'){


$pcars = explode(",",$_POST['cars']);

 
  		$q = "SELECT * FROM garage where username = '".$userdata[0]['username']."' and country = '".$userdata[0]['country']."' and demage < '100' ";
		$g = $db->query($q)->fetch();
		
		$totalsell = 0;
		foreach($g as $f){
    		if (in_array($f['id'], $pcars)) {
    	
    			$carinfo = getcarinfo($f['car']);
    			$value = round( $carinfo[0]['price'] - (( $carinfo[0]['price'] / 100 ) * $f['demage']) * 1.0);
    			$totalsell = $totalsell + $value;
    			
    		
    		
    		}	
    	}
	
	
    		if($totalsell == 0){
    			$errors[] = $text[$lang]['no_cars_selected'];
    		}
    		
	if(isset($_POST['sell'])){
	
	


    		
			if(empty($errors))
			{
			
			
					foreach($g as $f){
    		if (in_array($f['id'], $pcars)) {
    
    		
		$where = array('id' => $f['id'] );
		$db->delete('garage')->where($where)->execute();

			
			
    		
    		
    		}	
    	}

			
			
			$user = array(
                'cash' => ($userdata[0]['cash'] + $totalsell),
           	 );
			$where = array(
				'id' => $userdata[0]['id']
			);
			$db->where($where)->update('users', $user); 
			
			
			
    	
    		$success[] = $text[$lang]['selldealer'];
    	
    	
			
			}
			
			
	
	}	
	if(isset($_POST['notsell'])){
	
		$var = 'garage';
		$varallowed = 'no';
	}
	

}



}


 	$q = "SELECT * FROM translations where activity = 'stealcars' and lang = '".$lang."'";
	$t = $db->query($q)->fetch();


 	$q = "SELECT * FROM chances where activity = 'stealcars' and username = '".$userdata[0]['username']."'";
	$chance = $db->query($q)->fetch();
	


  	$q = "SELECT * FROM stealcars";
	$c = $db->query($q)->fetch();
	
	

  	$q = "SELECT * FROM garage where username = '".$userdata[0]['username']."' and country = '".$userdata[0]['country']."' and demage < '100'";
	$g = $db->query($q)->fetch();
	
	
	
						function getcarinfo($id){
						global $db;
							
  						$q = "SELECT * FROM cars where id = '".$id."'  ";
						$o = $db->query($q)->fetch();
						return $o;
						}
						
						
						
		    

	
  	$q = "SELECT * FROM countrys";
	$countrys = $db->query($q)->fetch();
	$countrycount = $db->affected_rows;
	
	
	$qcu = "SELECT count(id) as quantity FROM cars";
	$fcu = $db->query($qcu)->fetch();
	$totaldifferentcars = isset($fcu[0]['quantity']) ? $fcu[0]['quantity']  : 0;
	
	$qcu = "SELECT count(distinct(car)) as quantity FROM garage where  username = '".$userdata[0]['username']."' and demage < '100' ";
	$fcu = $db->query($qcu)->fetch();
	$totalcars = isset($fcu[0]['quantity']) ? $fcu[0]['quantity']  : 0;
	
	$qcu = "SELECT count(distinct(car)) as quantity FROM garage where  username = '".$userdata[0]['username']."' and country = '".$userdata[0]['country']."' and demage < '100'";
	$fcu = $db->query($qcu)->fetch();
	$totalcarsincountry = isset($fcu[0]['quantity']) ? $fcu[0]['quantity']  : 0;
		
	

$arrcars[] = '';
foreach($countrys as $ft){
	
	$qcu = "SELECT count(id) as quantity FROM garage where country = '".$ft['id']."' and  username = '".$userdata[0]['username']."' and demage < '100'";
	$fcu = $db->query($qcu)->fetch();
	$uc = $fcu[0]['quantity']; 
	$arrcars[$ft[id]] = isset($uc) ? $uc  : 0;
}
	
	
	
	
	
	
if($var == 'race'){


    if(!isset($userdata[0]['authority']) or $userdata[0]['authority'] != 'admin'){
      // header("Location: /");
        //exit(); 
    }
 


$maxdemage = 70;
    $text['nl']['page_title_race'] = "Racen";
    $text['nl']['no_car_selected'] = "Geen auto geselecteerd!";
    $text['nl']['cheating'] = "Geen geldige auto!";
    $text['nl']['tomuchdemage'] = "Deze auto heeft teveel schade!";		
    	$text['nl']['wait'] = 'Je moet nog {timer} wachten voor dat je weer kan racen!';

$text['nl']['nocars'] = "Geen auto beschikbaar!";

$text['nl']['racestart'] = "De race gaat beginnen!";
$text['nl']['racestart1'] = "3, 2, 1, GO!";


$text['nl']['successracestart1'] = "Je start de race met overtuiging en neemt meteen de leiding!";
$text['nl']['successracestart2'] = "Vanaf het begin geef je gas en laat je de tegenstander ver achter je.";
$text['nl']['successracestart3'] = "Je begint sterk en zet de tegenstander meteen op achterstand.";
$text['nl']['successracestart4'] = "Je blijft constant versnellen en behoudt de voorsprong.";
$text['nl']['successracestart5'] = "Met behendige manoeuvres race je met een grote glimlach op je gezicht.";
$text['nl']['successracestart6'] = "Met elke bocht wordt je voorsprong groter en groter.";
$text['nl']['successracestart7'] = "Met een triomfantelijke finish behaal je de overwinning!";
$text['nl']['successracestart8'] = "Je eindigt de race met een grote glimlach op je gezicht, als winnaar van de dag!";
$text['nl']['successracestartwin'] = "Je ontvangt € {amount}";


$text['nl']['winracestart1'] = "Je hebt een sterke start, maar je auto heeft wat schade opgelopen.";
$text['nl']['winracestart2'] = "In het begin ging het gelijk op, maar je auto heeft nu wat schade.";
$text['nl']['winracestart3'] = "Je doet je best om de schade te beperken en de race te voltooien.";
$text['nl']['winracestart4'] = "Je rijdt met beschadigde auto, maar je geeft niet op.";
$text['nl']['winracestart5'] = "Je hebt de race met schade voltooid, een sterke prestatie!";
$text['nl']['winracestart6'] = "Ondanks de schade aan je auto, heb je de race toch gewonnen!";
$text['nl']['winracestartwin1'] = "Je auto heeft heeft {demage}% schade opgelopen.";
$text['nl']['winracestartwin2'] = "Je ontvangt wel € {amount}";


$text['nl']['loseracestart1'] = "Je begint de race sterk, maar wordt al snel door de politie achtervolgd.";
$text['nl']['loseracestart2'] = "De race begint goed, maar dan komt de politie achter je aan.";
$text['nl']['loseracestart3'] = "Je doet je best om te ontsnappen en de politie af te schudden.";
$text['nl']['loseracestart4'] = "De politie zit je op de hielen, maar je geeft niet zomaar op.";
$text['nl']['loseracestart5'] = "Hoewel je de race hebt verloren, ben je slim ontsnapt aan de politie!";
$text['nl']['loseracestart6'] = "Je verliest de race, maar weet te ontsnappen aan de politie. Slim gedaan!";

$text['nl']['jailracestart1'] = "Je begint de race vol goede moed!";
$text['nl']['jailracestart2'] = "Je start de race goed, en neemt de leiding.";
$text['nl']['jailracestart3'] = "De politie is getipt, en de vraag is of je de race kan afmaken";
$text['nl']['jailracestart4'] = "Helaas stond de politie al klaar.";
$text['nl']['jailracestart5'] = "De politie onderbreekt de race, en neemt je auto in beslag!";
$text['nl']['jailracestart6'] = "De politie blokkeert de weg, en neemt je auto in beslag!";
$text['nl']['jailracestartend'] = "Je auto is in beslag genomen! Je gaat ook de gevangenis in!";


 $text['nl']['race_car_repair'] = "Repareren"; 
 $text['nl']['race_car_startrace'] = "Racen";

$text['en']['page_title_race'] = "Race";
$text['en']['no_car_selected'] = "No car selected!";
$text['en']['cheating'] = "Invalid car!";
$text['en']['tomuchdemage'] = "This car has too much damage!";
$text['en']['wait'] = 'You have to wait {timer} before you can race again!';
$text['en']['nocars'] = "No cars available!";
$text['en']['racestart'] = "The race is about to begin!";
$text['en']['racestart1'] = "3, 2, 1, GO!";
$text['en']['successracestart1'] = "You start the race with confidence and immediately take the lead!";
$text['en']['successracestart2'] = "From the beginning, you accelerate and leave the opponent far behind.";
$text['en']['successracestart3'] = "You start strong and immediately put the opponent at a disadvantage.";
$text['en']['successracestart4'] = "You keep accelerating constantly and maintain the lead.";
$text['en']['successracestart5'] = "With skillful maneuvers, you race with a big smile on your face.";
$text['en']['successracestart6'] = "With every turn, your lead becomes bigger and bigger.";
$text['en']['successracestart7'] = "With a triumphant finish, you achieve victory!";
$text['en']['successracestart8'] = "You finish the race with a big smile on your face, as the winner of the day!";
$text['en']['successracestartwin'] = "You receive € {amount}";
$text['en']['winracestart1'] = "You have a strong start, but your car has suffered some damage.";
$text['en']['winracestart2'] = "In the beginning, it was neck and neck, but your car now has some damage.";
$text['en']['winracestart3'] = "You do your best to limit the damage and complete the race.";
$text['en']['winracestart4'] = "You race with a damaged car, but you don't give up.";
$text['en']['winracestart5'] = "You complete the race with damage, a strong performance!";
$text['en']['winracestart6'] = "Despite the damage to your car, you still win the race!";
$text['en']['winracestartwin1'] = "Your car has suffered {demage}% damage.";
$text['en']['winracestartwin2'] = "You still receive € {amount}";
$text['en']['loseracestart1'] = "You start the race strong, but are quickly pursued by the police.";
$text['en']['loseracestart2'] = "The race starts well, but then the police starts chasing you.";
$text['en']['loseracestart3'] = "You do your best to escape and shake off the police.";
$text['en']['loseracestart4'] = "The police is on your tail, but you don't give up easily.";
$text['en']['loseracestart5'] = "Although you lose the race, you cleverly escape from the police!";
$text['en']['loseracestart6'] = "You lose the race, but manage to escape from the police. Well done!";
$text['en']['jailracestart1'] = "You start the race with high spirits!";
$text['en']['jailracestart2'] = "You start the race well and take the lead.";
$text['en']['jailracestart3'] = "The police received a tip, and the question is whether you can finish the race.";
$text['en']['jailracestart4'] = "Unfortunately, the police was already prepared.";
$text['en']['jailracestart5'] = "The police interrupts the race and seizes your car!";
$text['en']['jailracestart6'] = "The police blocks the road and seizes your car!";
$text['en']['jailracestartend'] = "Your car has been seized! You're also going to jail!";
$text['en']['race_car_repair'] = "Repair";
$text['en']['race_car_startrace'] = "Race";


$text['de']['page_title_race'] = "Rennen";
$text['de']['no_car_selected'] = "Kein Auto ausgewählt!";
$text['de']['cheating'] = "Ungültiges Auto!";
$text['de']['tomuchdemage'] = "Dieses Auto hat zu viel Schaden!";
$text['de']['wait'] = 'Du musst noch {timer} warten, bevor du wieder rennen kannst!';
$text['de']['nocars'] = "Keine Autos verfügbar!";
$text['de']['racestart'] = "Das Rennen steht kurz bevor!";
$text['de']['racestart1'] = "3, 2, 1, LOS!";
$text['de']['successracestart1'] = "Du startest das Rennen mit Zuversicht und übernimmst sofort die Führung!";
$text['de']['successracestart2'] = "Von Anfang an beschleunigst du und lässt den Gegner weit hinter dir.";
$text['de']['successracestart3'] = "Du startest stark und setzt den Gegner sofort in die Defensive.";
$text['de']['successracestart4'] = "Du beschleunigst ständig und behältst die Führung.";
$text['de']['successracestart5'] = "Mit geschickten Manövern fährst du mit einem breiten Lächeln im Gesicht.";
$text['de']['successracestart6'] = "Mit jeder Kurve wird dein Vorsprung größer und größer.";
$text['de']['successracestart7'] = "Mit einem triumphalen Zieleinlauf erreichst du den Sieg!";
$text['de']['successracestart8'] = "Du beendest das Rennen mit einem breiten Lächeln im Gesicht als Sieger des Tages!";
$text['de']['successracestartwin'] = "Du erhältst € {amount}";
$text['de']['winracestart1'] = "Du hast einen starken Start, aber dein Auto hat einige Schäden erlitten.";
$text['de']['winracestart2'] = "Am Anfang war es ein Kopf-an-Kopf-Rennen, aber dein Auto hat jetzt einige Schäden.";
$text['de']['winracestart3'] = "Du gibst dein Bestes, um den Schaden zu begrenzen und das Rennen zu beenden.";
$text['de']['winracestart4'] = "Du fährst mit einem beschädigten Auto, gibst aber nicht auf.";
$text['de']['winracestart5'] = "Du beendest das Rennen mit Schäden, eine starke Leistung!";
$text['de']['winracestart6'] = "Trotz der Schäden an deinem Auto gewinnst du das Rennen!";
$text['de']['winracestartwin1'] = "Dein Auto hat {demage}% Schaden erlitten.";
$text['de']['winracestartwin2'] = "Du erhältst trotzdem € {amount}";
$text['de']['loseracestart1'] = "Du startest das Rennen stark, wirst aber schnell von der Polizei verfolgt.";
$text['de']['loseracestart2'] = "Das Rennen beginnt gut, aber dann beginnt die Polizei, dich zu verfolgen.";
$text['de']['loseracestart3'] = "Du gibst dein Bestes, um zu entkommen und die Polizei abzuhängen.";
$text['de']['loseracestart4'] = "Die Polizei ist dir dicht auf den Fersen, aber du gibst nicht so leicht auf.";
$text['de']['loseracestart5'] = "Obwohl du das Rennen verlierst, entkommst du geschickt der Polizei!";
$text['de']['loseracestart6'] = "Du verlierst das Rennen, schaffst es aber, der Polizei zu entkommen. Gut gemacht!";
$text['de']['jailracestart1'] = "Du startest das Rennen voller Elan!";
$text['de']['jailracestart2'] = "Du startest das Rennen gut und übernimmst die Führung.";
$text['de']['jailracestart3'] = "Die Polizei erhielt einen Hinweis, und die Frage ist, ob du das Rennen beenden kannst.";
$text['de']['jailracestart4'] = "Leider war die Polizei bereits vorbereitet.";
$text['de']['jailracestart5'] = "Die Polizei unterbricht das Rennen und beschlagnahmt dein Auto!";
$text['de']['jailracestart6'] = "Die Polizei sperrt die Straße ab und beschlagnahmt dein Auto!";
$text['de']['jailracestartend'] = "Dein Auto wurde beschlagnahmt! Du kommst auch ins Gefängnis!";
$text['de']['race_car_repair'] = "Reparieren";
$text['de']['race_car_startrace'] = "Rennen";

$text['es']['page_title_race'] = "Carreras";
$text['es']['no_car_selected'] = "Ningún coche seleccionado";
$text['es']['cheating'] = "Coche no válido";
$text['es']['tomuchdemage'] = "¡Este coche tiene demasiado daño!";
$text['es']['wait'] = 'Debes esperar {timer} antes de poder correr de nuevo';
$text['es']['nocars'] = "¡No hay coches disponibles!";
$text['es']['racestart'] = "¡La carrera está a punto de comenzar!";
$text['es']['racestart1'] = "3, 2, 1, ¡YA!";
$text['es']['successracestart1'] = "Comienzas la carrera con determinación y tomas la delantera de inmediato";
$text['es']['successracestart2'] = "Desde el principio aceleras y dejas atrás a tus oponentes";
$text['es']['successracestart3'] = "Empiezas fuerte y pones a tus oponentes en desventaja";
$text['es']['successracestart4'] = "Sigues acelerando constantemente y manteniendo la ventaja";
$text['es']['successracestart5'] = "Con maniobras hábiles, corres con una gran sonrisa en tu rostro";
$text['es']['successracestart6'] = "Con cada curva, tu ventaja crece más y más";
$text['es']['successracestart7'] = "¡Terminas la carrera triunfalmente y logras la victoria!";
$text['es']['successracestart8'] = "Terminas la carrera con una gran sonrisa en tu rostro, ¡como el ganador del día!";
$text['es']['successracestartwin'] = "Recibes € {amount}";
$text['es']['winracestart1'] = "Tienes un buen comienzo, pero tu coche ha sufrido algo de daño";
$text['es']['winracestart2'] = "Al principio ibas empatado, pero ahora tu coche tiene algo de daño";
$text['es']['winracestart3'] = "Haces todo lo posible para limitar el daño y completar la carrera";
$text['es']['winracestart4'] = "Conduces con un coche dañado, pero no te rindes";
$text['es']['winracestart5'] = "Has completado la carrera con daño, ¡un gran logro!";
$text['es']['winracestart6'] = "A pesar del daño en tu coche, ¡has ganado la carrera!";
$text['es']['winracestartwin1'] = "Tu coche ha sufrido un {demage}% de daño";
$text['es']['winracestartwin2'] = "Recibes € {amount}";
$text['es']['loseracestart1'] = "Comienzas bien la carrera, pero pronto te persigue la policía";
$text['es']['loseracestart2'] = "La carrera comienza bien, pero luego la policía te persigue";
$text['es']['loseracestart3'] = "Haces lo posible por escapar y evadir a la policía";
$text['es']['loseracestart4'] = "La policía te sigue de cerca, pero no te rindes fácilmente";
$text['es']['loseracestart5'] = "Aunque perdiste la carrera, ¡lograste escapar astutamente de la policía!";
$text['es']['loseracestart6'] = "Pierdes la carrera, ¡pero lograste escapar de la policía de manera inteligente!";
$text['es']['jailracestart1'] = "Comienzas la carrera con gran entusiasmo!";
$text['es']['jailracestart2'] = "Comienzas la carrera bien y tomas la delantera";
$text['es']['jailracestart3'] = "La policía ha sido alertada, y la pregunta es si podrás terminar la carrera";
$text['es']['jailracestart4'] = "Desafortunadamente, la policía estaba preparada";
$text['es']['jailracestart5'] = "La policía interrumpe la carrera y confisca tu coche!";
$text['es']['jailracestart6'] = "La policía bloquea el camino y confisca tu coche!";
$text['es']['jailracestartend'] = "¡Tu coche ha sido confiscado! ¡También vas a la cárcel!";
$text['es']['race_car_repair'] = "Reparar coche";
$text['es']['race_car_startrace'] = "Comenzar carrera";

$text['pt']['page_title_race'] = "Corridas";
$text['pt']['no_car_selected'] = "Nenhum carro selecionado";
$text['pt']['cheating'] = "Carro inválido";
$text['pt']['tomuchdemage'] = "Este carro está muito danificado!";
$text['pt']['wait'] = 'Você deve esperar {timer} antes de poder correr novamente';
$text['pt']['nocars'] = "Nenhum carro disponível!";
$text['pt']['racestart'] = "A corrida está prestes a começar!";
$text['pt']['racestart1'] = "3, 2, 1, VAI!";
$text['pt']['successracestart1'] = "Você começa a corrida com determinação e assume a liderança imediatamente";
$text['pt']['successracestart2'] = "Desde o início, você acelera e deixa os oponentes para trás";
$text['pt']['successracestart3'] = "Você começa forte e coloca os oponentes em desvantagem";
$text['pt']['successracestart4'] = "Continua acelerando constantemente e mantendo a liderança";
$text['pt']['successracestart5'] = "Com manobras habilidosas, você corre com um grande sorriso no rosto";
$text['pt']['successracestart6'] = "A cada curva, sua vantagem aumenta cada vez mais";
$text['pt']['successracestart7'] = "Você termina a corrida triunfalmente e conquista a vitória!";
$text['pt']['successracestart8'] = "Você termina a corrida com um grande sorriso no rosto, como o vencedor do dia!";
$text['pt']['successracestartwin'] = "Você recebe € {amount}";
$text['pt']['winracestart1'] = "Você tem um bom começo, mas seu carro sofreu algum dano";
$text['pt']['winracestart2'] = "No início, estava empatado, mas agora seu carro tem algum dano";
$text['pt']['winracestart3'] = "Você faz o possível para limitar o dano e completar a corrida";
$text['pt']['winracestart4'] = "Dirige com um carro danificado, mas não desiste";
$text['pt']['winracestart5'] = "Você completou a corrida com dano, um grande feito!";
$text['pt']['winracestart6'] = "Apesar do dano em seu carro, você venceu a corrida!";
$text['pt']['winracestartwin1'] = "Seu carro sofreu um dano de {demage}%";
$text['pt']['winracestartwin2'] = "Você recebe € {amount}";
$text['pt']['loseracestart1'] = "Você começa bem a corrida, mas logo a polícia o persegue";
$text['pt']['loseracestart2'] = "A corrida começa bem, mas depois a polícia o persegue";
$text['pt']['loseracestart3'] = "Você faz o possível para escapar e evadir a polícia";
$text['pt']['loseracestart4'] = "A polícia está atrás de você, mas você não desiste facilmente";
$text['pt']['loseracestart5'] = "Mesmo que tenha perdido a corrida, conseguiu escapar astutamente da polícia!";
$text['pt']['loseracestart6'] = "Você perde a corrida, mas consegue escapar da polícia de maneira inteligente!";
$text['pt']['jailracestart1'] = "Você começa a corrida com grande entusiasmo!";
$text['pt']['jailracestart2'] = "Começa a corrida bem e assume a liderança";
$text['pt']['jailracestart3'] = "A polícia foi alertada, e a questão é se conseguirá terminar a corrida";
$text['pt']['jailracestart4'] = "Infelizmente, a polícia estava preparada";
$text['pt']['jailracestart5'] = "A polícia interrompe a corrida e confisca seu carro!";
$text['pt']['jailracestart6'] = "A polícia bloqueia o caminho e confisca seu carro!";
$text['pt']['jailracestartend'] = "Seu carro foi confiscado! Você também vai para a prisão!";
$text['pt']['race_car_repair'] = "Reparar carro";
$text['pt']['race_car_startrace'] = "Iniciar corrida";

$text['fr']['page_title_race'] = "Course";
$text['fr']['no_car_selected'] = "Aucune voiture sélectionnée !";
$text['fr']['cheating'] = "Pas de voiture valide !";
$text['fr']['tomuchdemage'] = "Cette voiture a trop de dommages !";
$text['fr']['wait'] = 'Vous devez attendre encore {timer} pour pouvoir courir à nouveau!';
$text['fr']['nocars'] = "Aucune voiture disponible !";
$text['fr']['racestart'] = "La course va commencer !";
$text['fr']['racestart1'] = "3, 2, 1, PARTI !";
$text['fr']['successracestart1'] = "Vous démarrez la course avec conviction et prenez immédiatement la tête !";
$text['fr']['successracestart2'] = "Dès le début, vous accélérez et laissez vos adversaires loin derrière.";
$text['fr']['successracestart3'] = "Vous commencez fort et mettez immédiatement vos adversaires en difficulté.";
$text['fr']['successracestart4'] = "Vous continuez d'accélérer constamment et maintenez votre avance.";
$text['fr']['successracestart5'] = "Avec des manœuvres habiles, vous courez avec un grand sourire sur votre visage.";
$text['fr']['successracestart6'] = "À chaque virage, votre avance s'agrandit.";
$text['fr']['successracestart7'] = "Avec une arrivée triomphante, vous remportez la victoire !";
$text['fr']['successracestart8'] = "Vous terminez la course avec un grand sourire, en tant que vainqueur du jour !";
$text['fr']['successracestartwin'] = "Vous recevez € {amount}";
$text['fr']['winracestart1'] = "Vous avez un bon départ, mais votre voiture a subi des dommages.";
$text['fr']['winracestart2'] = "Au début, c'était serré, mais votre voiture est maintenant endommagée.";
$text['fr']['winracestart3'] = "Vous faites de votre mieux pour limiter les dommages et terminer la course.";
$text['fr']['winracestart4'] = "Vous conduisez une voiture endommagée, mais vous n'abandonnez pas.";
$text['fr']['winracestart5'] = "Vous avez terminé la course malgré les dommages, une performance solide !";
$text['fr']['winracestart6'] = "Malgré les dommages à votre voiture, vous avez quand même remporté la course !";
$text['fr']['winracestartwin1'] = "Votre voiture a subi {demage}% de dommages.";
$text['fr']['winracestartwin2'] = "Vous recevez quand même € {amount}";
$text['fr']['loseracestart1'] = "Vous commencez bien la course, mais la police vous poursuit rapidement.";
$text['fr']['loseracestart2'] = "La course commence bien, mais la police vous poursuit.";
$text['fr']['loseracestart3'] = "Vous faites de votre mieux pour échapper à la police.";
$text['fr']['loseracestart4'] = "La police est à vos trousses, mais vous ne vous laissez pas facilement attraper.";
$text['fr']['loseracestart5'] = "Bien que vous ayez perdu la course, vous avez réussi à échapper à la police !";
$text['fr']['loseracestart6'] = "Vous perdez la course, mais vous parvenez à échapper à la police. Bien joué !";
$text['fr']['jailracestart1'] = "Vous commencez la course avec enthousiasme !";
$text['fr']['jailracestart2'] = "Vous démarrez bien la course et prenez la tête.";
$text['fr']['jailracestart3'] = "La police a été alertée, et la question est de savoir si vous pourrez terminer la course.";
$text['fr']['jailracestart4'] = "Malheureusement, la police était déjà prête.";
$text['fr']['jailracestart5'] = "La police interrompt la course et confisque votre voiture !";
$text['fr']['jailracestart6'] = "La police bloque la route et confisque votre voiture !";
$text['fr']['jailracestartend'] = "Votre voiture a été confisquée ! Vous allez aussi en prison !";
$text['fr']['race_car_repair'] = "Réparer";
$text['fr']['race_car_startrace'] = "Course";

$text['cs']['page_title_race'] = "Závodit";
$text['cs']['no_car_selected'] = "Není vybráno žádné auto!";
$text['cs']['cheating'] = "Neplatné auto!";
$text['cs']['tomuchdemage'] = "Toto auto má příliš mnoho poškození!";
$text['cs']['wait'] = 'Musíte ještě počkat {timer}, než budete moci závodit znovu!';
$text['cs']['nocars'] = "Žádná dostupná auta!";
$text['cs']['racestart'] = "Závod začíná!";
$text['cs']['racestart1'] = "3, 2, 1, START!";
$text['cs']['successracestart1'] = "Závod začínáte s odhodláním a okamžitě se ujímáte vedení!";
$text['cs']['successracestart2'] = "Hned od začátku zrychlujete a necháváte protivníky daleko za sebou.";
$text['cs']['successracestart3'] = "Začínáte silně a okamžitě stavíte protivníky do úzkých.";
$text['cs']['successracestart4'] = "Nepřetržitě zrychlujete a udržujete svůj náskok.";
$text['cs']['successracestart5'] = "S obratnými manévry závodíte s velkým úsměvem na tváři.";
$text['cs']['successracestart6'] = "S každým zatáčením se váš náskok zvětšuje.";
$text['cs']['successracestart7'] = "Triumfálním závěrem získáváte vítězství!";
$text['cs']['successracestart8'] = "Závod dokončujete s velkým úsměvem na tváři jako vítěz dne!";
$text['cs']['successracestartwin'] = "Dostáváte € {amount}";
$text['cs']['winracestart1'] = "Máte silný start, ale vaše auto má nějaké poškození.";
$text['cs']['winracestart2'] = "Na začátku byla vyrovnaná situace, ale vaše auto má nyní nějaké poškození.";
$text['cs']['winracestart3'] = "Děláte maximum pro omezení poškození a dokončení závodu.";
$text['cs']['winracestart4'] = "Jedete s poškozeným autem, ale nevzdáváte to.";
$text['cs']['winracestart5'] = "I přes poškození jste závod dokončili, silný výkon!";
$text['cs']['winracestart6'] = "Navzdory poškozenému autu jste závod stále vyhráli!";
$text['cs']['winracestartwin1'] = "Vaše auto utrpělo {demage}% poškození.";
$text['cs']['winracestartwin2'] = "Dostáváte € {amount}";
$text['cs']['loseracestart1'] = "Závod začínáte silně, ale brzy vás pronásleduje policie.";
$text['cs']['loseracestart2'] = "Závod začíná dobře, ale pak vás policie pronásleduje.";
$text['cs']['loseracestart3'] = "Děláte maximum pro uniknutí policie.";
$text['cs']['loseracestart4'] = "Policie vás sleduje, ale nevzdáváte to tak snadno.";
$text['cs']['loseracestart5'] = "Ačkoli jste ztratili závod, bylo vám chytrým únikem od policie!";
$text['cs']['loseracestart6'] = "Ztrácíte závod, ale podařilo se vám chytře uniknout policii!";
$text['cs']['jailracestart1'] = "Závod začínáte s nadšením!";
$text['cs']['jailracestart2'] = "Závod začínáte dobře a získáváte vedení.";
$text['cs']['jailracestart3'] = "Policie byla informována a otázkou je, zda dokážete závod dokončit.";
$text['cs']['jailracestart4'] = "Bohužel, policie byla připravena.";
$text['cs']['jailracestart5'] = "Policie přerušuje závod a konfiskuje vaše auto!";
$text['cs']['jailracestart6'] = "Policie blokuje cestu a konfiskuje vaše auto!";
$text['cs']['jailracestartend'] = "Vaše auto bylo konfiskováno! Půjdete také do vězení!";
$text['cs']['race_car_repair'] = "Opravit";
$text['cs']['race_car_startrace'] = "Závodit";



	$qcu = "SELECT * FROM garage where  username = '".$userdata[0]['username']."' and country = '".$userdata[0]['country']."' and demage < 100";
	$g = $db->query($qcu)->fetch();
	$qg = $db->affected_rows;
	$totalcarsincountry = isset($qg) ? $qg  : 0;
		
		

		
$q = "SELECT * FROM timers where activity = 'race' and username = '".$userdata[0]['username']."'";
$timer = $db->query($q)->fetch();
$now = date("Y-m-d H:i:s");
$wait = 0;
if($timer[0]['time'] >= $now){
		$wait = datetotime($timer[0]['time']) - time();
		$count_timer = '<font id="count_timer"></font>';
		$text[$lang]['wait'] = txt($text[$lang]['wait'],'{timer}', $count_timer);
		$errors[] = $text[$lang]['wait'];
}



		$nocars = 0;
	if($totalcarsincountry == 0){
					$errors[] = $text[$lang]['nocars'];		$nocars = 1;

	}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
$jailtime = 120;
$racing = 1;
	$id = isset($_POST['cars']) ? $_POST['cars'] : '0';
	$id = $db->escape($id);
	
	if($id == 0){
		$errors[] = $text[$lang]['no_car_selected'];
	}
	
	if(!is_numeric($id)){
		$errors[] = $text[$lang]['cheating'];
	}
	
	
	
	$valid = 0;
	foreach($g as $f){
    		if ($f['id'] == $id) {
    			$valid = 1;
    			$carinfo = getcarinfo($f['car']);
    			$id = $f['id'];
    			
    			$carid = $f['id'];
    			
    			$demage = $f['demage'];
    			
    			if($f['demage'] > $maxdemage){
    			
		$errors[] = $text[$lang]['tomuchdemage'];
    			}
    		}	
    }
	if($valid == 0){
		$errors[] = $text[$lang]['cheating'];
	}
	

	if(empty($errors))
	{
	
	
    	
$value = $carinfo[0]['price'] - (($carinfo[0]['price'] / 100) * $damage);

$winchance = 25;

//$winchance = 0;



$success[] = $text[$lang]['racestart'];
$success[] = $text[$lang]['racestart1'];

$randchance = rand(0, 100);


	
		$nextcrime = timetodate(time() + 180);
		//$nextcrime = timetodate(time() + 0);
		$qc = "SELECT * FROM timers where username = '".$userdata[0]['username']."' and activity = 'race'";
		$fchance = $db->query($qc)->fetch();
		if($db->affected_rows == '0')
		{	
			$timers = array(
                'activity' => 'race',
                'username' =>$userdata[0]['username'],
                'time' => $nextcrime,
            );
         	$timers = $db->insert('timers', $timers); 
		}else{
			$timers = array(
                'time' => $nextcrime,
           	 );
			$where = array(
				'activity' => 'race',
				'username' => $userdata[0]['username']
			);
			$db->where($where)->update('timers', $timers); 
		}
		
		
if ($winchance >= $randchance) {







    // Speler wint de race
    $startrace = array(
        $text[$lang]['successracestart1'],
        $text[$lang]['successracestart2'],
        $text[$lang]['successracestart3'],
    );

    $midrace = array(
        $text[$lang]['successracestart4'],
        $text[$lang]['successracestart5'],
        $text[$lang]['successracestart6'],
    );

    $endrace_win = array(
        $text[$lang]['successracestart7'],
        $text[$lang]['successracestart8'],
    );

    $success[] = $startrace[array_rand($startrace, 1)];
    $success[] = $midrace[array_rand($midrace, 1)];
    $success[] = $endrace_win[array_rand($endrace_win, 1)];
    
    		
		$receive = ($value) / 100;
		$receive = round(rand(($receive * 90),($receive * 120)));
	
		
				
			$user = array(
                'cash' => ($userdata[0]['cash'] + $receive),
           	 );
			$where = array(
				'id' => $userdata[0]['id']
			);
			$db->where($where)->update('users', $user); 
			
			
			
		
        $success[] = txt($text[$lang]['successracestartwin'], "{amount}", number($receive));
			
    $losedamage = rand(0, 10); // Pas hier je eigen schadeberekening aan.

} else {

    $losechance = 40;
    //$losechance = 100;
    $randchance = rand(0, 100);

    if ($randchance >= $losechance) {

        $losedamage = rand(5, 25); // Pas hier je eigen schadeberekening aan.



        // Speler verliest de race, maar de auto heeft wat schade opgelopen
        $startrace = array(
        $text[$lang]['winracestart1'],
        $text[$lang]['winracestart2'],
        );

        $midrace = array(
        $text[$lang]['winracestart3'],
        $text[$lang]['winracestart4'],
        );

        $endrace_damage = array(
        $text[$lang]['winracestart5'],
        $text[$lang]['winracestart6'],
        );

        $success[] = $startrace[array_rand($startrace, 1)];
        $success[] = $midrace[array_rand($midrace, 1)];
        $success[] = $endrace_damage[array_rand($endrace_damage, 1)];
        
        		
		$receive = ($value) / 100;
		$receive = round(rand(($receive * 80),($receive * 120)));
			$user = array(
                'cash' => ($userdata[0]['cash'] + $receive),
           	 );
			$where = array(
				'id' => $userdata[0]['id']
			);
			$db->where($where)->update('users', $user); 
			
					$info = array( 'demage' => ($demage + $losedamage)  );
					$where = array( 'id' => $id 	);
					$db->where($where)->update('garage', $info); 
					
		
        $success[] = txt($text[$lang]['winracestartwin1'], "{demage}", number($losedamage));
        $success[] = txt($text[$lang]['winracestartwin2'], "{amount}", number($receive));

		

    } else {

        $jailchance = 40;
        //$jailchance = 100;
        $randchance = rand(0, 100);

        if ($randchance >= $jailchance) {

            $losedamage = rand(0, 10); // Pas hier je eigen schadeberekening aan.




            // Speler verliest de race en wordt door de politie achtervolgd, maar ontsnapt
            $startrace = array(
       			 $text[$lang]['loseracestart1'],
        		$text[$lang]['loseracestart2'],
            );

            $midrace = array(
       			 $text[$lang]['loseracestart3'],
        		$text[$lang]['loseracestart4'],
            );

            $endrace_jail = array(
       			 $text[$lang]['loseracestart5'],
        		$text[$lang]['loseracestart6'],
            );

            $success[] = $startrace[array_rand($startrace, 1)];
            $success[] = $midrace[array_rand($midrace, 1)];
            $success[] = $endrace_jail[array_rand($endrace_jail, 1)];

        } else {

            // Speler verliest de race en verliest zijn auto
            $losedamage = 100; // Auto wordt in beslag genomen, 100% schade.



            // Speler verliest, auto in beslag genomen door de politie
            $startrace = array(
       			$text[$lang]['jailracestart1'],
        		$text[$lang]['jailracestart2'],
            );

            $midrace = array(
       			$text[$lang]['jailracestart3'],
        		$text[$lang]['jailracestart4'],
            );

            $endrace_loss = array(
       			$text[$lang]['jailracestart5'],
        		$text[$lang]['jailracestart6'],
            );

            $success[] = $startrace[array_rand($startrace, 1)];
            $success[] = $midrace[array_rand($midrace, 1)];
            $success[] = $endrace_loss[array_rand($endrace_loss, 1)];
            
            

				//$where = array('id' => $carid);
				//$db->delete('garage')->where($where)->execute();
		
		
					$info = array( 'demage' => '100'  );
					$where = array( 'id' => $id 	);
					$db->where($where)->update('garage', $info); 
					
					
				jail($userdata[0]['username'], $jailtime);
            
        $success[] = $text[$lang]['jailracestartend'];
        }
    }
}


	
	

	
	
	
	
	
		
	
	
		$receivemoney = rand((($value /100) * 5), (($value /100) * 25));
		
		
		//$errors[] = "huidige waarde $value > Verlies $losedemage schade > ontvang $receivemoney";
		
	
	}


}



	
	
	


}
	
	
	
	
	
	
	
	
	
		
	