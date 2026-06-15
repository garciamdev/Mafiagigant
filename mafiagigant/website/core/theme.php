<?php
  ob_start(); 

		$theme_array = array("secretcrime", "mafiagiganten");
		
	if(isset($_SESSION['theme'])){
		setcookie('theme', $_SESSION['theme'], time() + (86400 * 30),'/'); 
		$_COOKIE['theme'] = $_SESSION['theme'];
	}
	
	
	

	//$theme = array();
	
	if(isset($_GET['theme']) && in_array($_GET['theme'], $theme_array)){
		setcookie("theme", $_GET['theme'], time()+(60*60*24*365));
				$_SESSION['theme'] = $_GET['theme'];

		header("Location: /".$module."/");
	}
	else{
		if(isset($_COOKIE['theme']) && in_array($_COOKIE['theme'], $theme_array)){
			//Language is wat jij hebt gekozen
			$_COOKIE['theme'] = $_COOKIE['theme'];
			}
		else{
			//Default language is Engels
			$_COOKIE['theme'] = 'mafiagiganten';
		}
				
	} 
	
		$theme = 'mafiagiganten';
		$theme = $_COOKIE['theme'];
		//$theme = 'secretcrime';

	
	
?> 