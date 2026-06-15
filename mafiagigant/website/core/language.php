<?php
  ob_start(); 
  
  //echo "start: ses:".$_SESSION['pa_language']." > cookie".$_COOKIE['pa_language']."<br />";

	$language_array = array("nl", "en", "fr", "es", "pt", "cs", "de");
	$taal = array();
	
	if(isset($_SESSION['pa_language'])){
		setcookie('pa_language', $_SESSION['pa_language'], time() + (86400 * 30),'/'); 
		$_COOKIE['pa_language'] = $_SESSION['pa_language'];
	}
	
	if(isset($_GET['language']) && in_array($_GET['language'], $language_array)){

		
		setcookie('pa_language', $_GET['language'], time() + (86400 * 30),'/'); 
		$_SESSION['pa_language'] = $_GET['language'];
 if($var != ''){$extraurl = $var.'/';}else{ $extraurl = '';}

header("Location: /".$module."/".$extraurl);
	}
	else{
		if(isset($_COOKIE['pa_language']) && in_array($_COOKIE['pa_language'], $language_array)){
			//Language is wat jij hebt gekozen
			setcookie('pa_language', $_COOKIE['pa_language'], time() + (86400 * 30),'/'); 
			$_COOKIE['pa_language'] = $_COOKIE['pa_language'];
			}
		else{
			//Default language is Engels
			$_COOKIE['pa_language'] = 'de';
			setcookie('pa_language', $_COOKIE['pa_language'], time() + (86400 * 30),'/'); 
		}
		
		
		//include('./modules/'.$module.'/'.$module.'.'.$_COOKIE['pa_language'].'.php');
	}
	
	
		$lang = $_COOKIE['pa_language'];
		
		include('languages/general.'.$lang.'.php');
	
	
	
	
	function txt($txt, $from, $to){
	
		$txt = str_replace($from,$to,$txt);	
		return $txt;
	
	}
?>