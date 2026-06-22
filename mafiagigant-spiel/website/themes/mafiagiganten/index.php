<?php
if(login()){
	require_once('header_login.php');

	
	$noaccess = isset($noaccess) ? $noaccess : 0;
	if($noaccess == 1){ exit; }
	if($module == 'home'){
		$module = 'homelogin';
	}
	$view_file = __DIR__."/view/".$module.".php";
	if(file_exists($view_file)){
		require_once($view_file);
	}elseif(empty($module_file_exists)){
		// Weder View noch Modul vorhanden -> freundliche "in Arbeit"-Seite
		require_once(__DIR__."/view/_coming-soon.php");
	}
	require_once('footer_login.php');
}else{
	require_once('header.php');
	
	@include_once('view/'.$module.'.php');
	require_once('footer.php');
}



