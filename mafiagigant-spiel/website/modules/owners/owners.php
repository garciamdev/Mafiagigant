<?php

    if(!isset($_SESSION['suid']) or $_SESSION['suid'] == ''){
        header("Location: ".BASE_URL."login/");
        exit(); 
    }


$text['nl']['property_title'] = 'Eigendomsoverzicht';
$text['nl']['property_description'] = 'Hier kunt u bekijken wie welke eigendommen bezit in het spel. Ze zijn gecategoriseerd per land!';
$text['nl']['owner'] = 'Eigenaar';
$text['nl']['profits_losses'] = 'Winsten / Verliezen';
$text['nl']['no_owner'] = 'Geen Eigenaar';
$text['nl']['prison'] = 'Gevangenis';


$text['en']['property_title'] = 'Property Overview';
$text['en']['property_description'] = 'Here you can view who owns what properties in the game. They are categorized per country!';
$text['en']['owner'] = 'Owner';
$text['en']['profits_losses'] = 'Profits / Losses';
$text['en']['no_owner'] = 'No Owner';
$text['en']['prison'] = 'Prison';



$text['de']['property_title'] = 'Immobilienübersicht';
$text['de']['property_description'] = 'Hier können Sie sehen, wer welche Immobilien im Spiel besitzt. Sie sind nach Ländern kategorisiert!';
$text['de']['owner'] = 'Besitzer';
$text['de']['profits_losses'] = 'Gewinne / Verluste';
$text['de']['no_owner'] = 'Kein Besitzer';
$text['de']['prison'] = 'Gefängnis';

$text['es']['property_title'] = 'Resumen de Propiedades';
$text['es']['property_description'] = 'Aquí puedes ver quién posee qué propiedades en el juego. ¡Están categorizadas por país!';
$text['es']['owner'] = 'Propietario';
$text['es']['profits_losses'] = 'Ganancias / Pérdidas';
$text['es']['no_owner'] = 'Sin Propietario';
$text['es']['prison'] = 'Prisión';

$text['pt']['property_title'] = 'Visão Geral de Propriedades';
$text['pt']['property_description'] = 'Aqui você pode ver quem possui quais propriedades no jogo. Elas são categorizadas por país!';
$text['pt']['owner'] = 'Proprietário';
$text['pt']['profits_losses'] = 'Lucros / Perdas';
$text['pt']['no_owner'] = 'Sem Proprietário';
$text['pt']['prison'] = 'Prisão';

$text['fr']['property_title'] = "Vue d'ensemble des propriétés";
$text['fr']['property_description'] = 'Ici, vous pouvez voir qui possède quelles propriétés dans le jeu. Elles sont catégorisées par pays!';
$text['fr']['owner'] = 'Propriétaire';
$text['fr']['profits_losses'] = 'Bénéfices / Pertes';
$text['fr']['no_owner'] = 'Pas de Propriétaire';
$text['fr']['prison'] = 'Prison';

$text['cs']['property_title'] = 'Přehled majetku';
$text['cs']['property_description'] = 'Zde můžete zjistit, kdo vlastní jaký majetek ve hře. Jsou kategorizovány podle země!';
$text['cs']['owner'] = 'Vlastník';
$text['cs']['profits_losses'] = 'Zisky / Ztráty';
$text['cs']['no_owner'] = 'Žádný Vlastník';
$text['cs']['prison'] = 'Vězení';

$text['nl']['hospital'] = 'Ziekenhuis';
$text['en']['hospital'] = 'Hospital';
$text['de']['hospital'] = 'Krankenhaus';
$text['es']['hospital'] = 'Hospital';
$text['pt']['hospital'] = 'Hospital';
$text['fr']['hospital'] = 'Hôpital';
$text['cs']['hospital'] = 'Nemocnice';





$text['nl']['bulletfactory'] = 'Kogelfabriek';


$q = "SELECT * FROM objects where object = 'jail' ";
$jail = $db->query($q)->fetch();



$q = "SELECT * FROM objects where object = 'hospital' ";
$hospital = $db->query($q)->fetch();

$q = "SELECT * FROM objects where object = 'bulletfactory' ";
$bulletfactory = $db->query($q)->fetch();




  	$q = "SELECT * FROM countrys";
	$c = $db->query($q)->fetch();




 
						function getobjectownerss($id, $string){
   
   
							foreach($string as $f){
								if($f['activity_id'] == $id ){
									$translation = !empty($f['content']) ? $f['content'] : $translation;
								}
							}
							
							$translation = isset($translation) ? $translation : 'no translation yet!';
							return $translation;
							
							
						}
						