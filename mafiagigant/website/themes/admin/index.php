<?php

if($userdata[0]['authority'] == 'admin'){
	require_once('header.php');
	@require_once("view/".$module.".php");
	require_once('footer.php');
}

?>