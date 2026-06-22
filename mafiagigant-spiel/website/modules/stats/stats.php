<?php


   if(!isset($_SESSION['suid']) or $_SESSION['suid'] == ''){
        header("Location: ".BASE_URL."login/");
        exit(); 
    }



$limit = 5;

$text['en']['statistics_title'] = 'Statistics';
$text['en']['statistics_description'] = 'Below is an overview of the statistics.';
$text['en']['top_power'] = 'Top '.$limit.' power';
$text['en']['top_money'] = 'Top '.$limit.' money';
$text['en']['top_box_power'] = 'Top '.$limit.' boxing power';
$text['en']['top_rank'] = 'Top '.$limit.' rank';
$text['en']['top_prostitutes'] = 'Top '.$limit.' prostitutes';

$text['nl']['statistics_title'] = 'Statistieken';
$text['nl']['statistics_description'] = 'Zie hieronder een overzicht van de statistieken.';
$text['nl']['top_power'] = 'Top '.$limit.' kracht';
$text['nl']['top_money'] = 'Top '.$limit.' geld';
$text['nl']['top_box_power'] = 'Top '.$limit.' bokskracht';
$text['nl']['top_rank'] = 'Top '.$limit.' rang';
$text['nl']['top_prostitutes'] = 'Top '.$limit.' prostituees';

$text['de']['statistics_title'] = 'Statistiken';
$text['de']['statistics_description'] = 'Hier finden Sie eine Übersicht der Statistiken.';
$text['de']['top_power'] = 'Top '.$limit.' Stärke';
$text['de']['top_money'] = 'Top '.$limit.' Geld';
$text['de']['top_box_power'] = 'Top '.$limit.' Boxkraft';
$text['de']['top_rank'] = 'Top '.$limit.' Rang';
$text['de']['top_prostitutes'] = 'Top '.$limit.' Prostituierte';

$text['es']['statistics_title'] = 'Estadísticas';
$text['es']['statistics_description'] = 'A continuación, se muestra una visión general de las estadísticas.';
$text['es']['top_power'] = 'Mejor '.$limit.' potencia';
$text['es']['top_money'] = 'Mejor '.$limit.' dinero';
$text['es']['top_box_power'] = 'Mejor '.$limit.' potencia de boxeo';
$text['es']['top_rank'] = 'Mejor '.$limit.' rango';
$text['es']['top_prostitutes'] = 'Mejor '.$limit.' prostitutas';


$text['pt']['statistics_title'] = 'Estatísticas';
$text['pt']['statistics_description'] = 'Veja abaixo uma visão geral das estatísticas.';
$text['pt']['top_power'] = 'Melhor '.$limit.' poder';
$text['pt']['top_money'] = 'Melhor '.$limit.' dinheiro';
$text['pt']['top_box_power'] = 'Melhor '.$limit.' poder de boxe';
$text['pt']['top_rank'] = 'Melhor '.$limit.' classificação';
$text['pt']['top_prostitutes'] = 'Melhores '.$limit.' prostitutas';

$text['fr']['statistics_title'] = 'Statistiques';
$text['fr']['statistics_description'] = 'Voici un aperçu des statistiques ci-dessous.';
$text['fr']['top_power'] = 'Meilleur '.$limit.' puissance';
$text['fr']['top_money'] = 'Meilleur '.$limit.' argent';
$text['fr']['top_box_power'] = 'Meilleur '.$limit.' puissance de boxe';
$text['fr']['top_rank'] = 'Meilleur '.$limit.' rang';
$text['fr']['top_prostitutes'] = 'Meilleures '.$limit.' prostituées';

$text['cs']['statistics_title'] = 'Statistiky';
$text['cs']['statistics_description'] = 'Níže uvidíte přehled statistik.';
$text['cs']['top_power'] = 'Nejlepší '.$limit.' síla';
$text['cs']['top_money'] = 'Nejlepší '.$limit.' peníze';
$text['cs']['top_box_power'] = 'Nejlepší '.$limit.' síla v boxu';
$text['cs']['top_rank'] = 'Nejlepší '.$limit.' pořadí';
$text['cs']['top_prostitutes'] = 'Nejlepší '.$limit.' prostitutky';

// Add translations for other languages as needed





$q = "SELECT (att_power + deff_power) as power, username FROM users order by (att_power + deff_power)  desc limit ".$limit."";
$fpower = $db->query($q)->fetch();


$q = "SELECT (cash + bank) as money, username FROM users order by (cash+bank) desc limit ".$limit."";
$fmoney = $db->query($q)->fetch();

$q = "SELECT xp, username FROM users order by xp desc limit ".$limit."";
$frank = $db->query($q)->fetch();

$q = "SELECT box_power, username FROM users order by box_power desc limit ".$limit."";
$fbox = $db->query($q)->fetch();


$q = "SELECT (prostitutes + prostitutes_work) as prostitutes, username FROM users order by (prostitutes + prostitutes_work)  desc limit ".$limit."";
$fprostitutes = $db->query($q)->fetch();