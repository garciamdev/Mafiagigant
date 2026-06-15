<?php
if(login()){
	require_once('header_login.php');

	
	$noaccess = isset($noaccess) ? $noaccess : 0;
	if($noaccess == 1){ exit; }
	if($module == 'home'){
		$module = 'homelogin';
	}
	@require_once("view/".$module.".php");
	require_once('footer_login.php');
}else{
	require_once('header.php');
	
	@include_once('view/'.$module.'.php');
	require_once('footer.php');
}



