<?php

session_start();
$_SESSION["suid"] = '';
session_unset($_SESSION["suid"]);
session_destroy();

$_COOKIE['suid'] = '';

foreach ($_COOKIE as $key => $value) {
    unset($value);
    setcookie($key, '', time() - 86400,'/');
    setcookie($key, '', time() - 86400);
}



header("Location: ".BASE_URL."");
exit(); 

?>
