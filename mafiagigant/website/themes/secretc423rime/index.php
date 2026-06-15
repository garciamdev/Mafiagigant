<?php
if(login()){
	require_once('header_login.php');

	
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


