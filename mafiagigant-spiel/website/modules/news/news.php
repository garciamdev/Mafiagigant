<?php

    if(!isset($_SESSION['suid']) or $_SESSION['suid'] == ''){
        header("Location: ".BASE_URL."login/");
        exit(); 
    }

    // Neuigkeiten sind fuer alle Spieler lesbar.
 
 
 
 $text['nl']['title_news'] = "Recent nieuws";
 
  	$q = "SELECT * FROM translations_news where activity = 'news_title' and lang = '".$lang."'";
	$tt = $db->query($q)->fetch();
  	$q = "SELECT * FROM translations_news where activity = 'news_description' and lang = '".$lang."'";
	$td = $db->query($q)->fetch();

  	$q = "SELECT * FROM news order by date desc limit 15";
	$c = $db->query($q)->fetch();


  	$q = "SELECT * FROM languages";
	$l = $db->query($q)->fetch();
	
	
	
	
	
	