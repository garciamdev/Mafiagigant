<?php 

require_once ('apiconfig.php');


$access = $_GET['accesskey'];

if($accesskey == $access){
	echo 'connect';
}else{
	echo 'false';
}