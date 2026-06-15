<?php
$db_host = 'localhost';
$db_user = 'mafiagigan-crime';
$db_pass = 'h1Fit9H-r2kV-sU2YmfR9-En78gWre-2Vkal-2j';
$db_name = 'mafiagigan-crime';


$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}
?>