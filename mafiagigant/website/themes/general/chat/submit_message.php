<?php
session_start();
    if(!isset($_SESSION['suid']) or $_SESSION['suid'] == ''){
		exit;
    }
    
    
    
require_once 'config.php'; // Include your database connection configuration

if (isset($_POST['message'])) {

    $suid = mysqli_real_escape_string($conn, $_SESSION['suid']);
$sql = "SELECT username FROM users where id = ".$suid." limit 1 ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
   
        	 $username = $row['username'];
        	 
    $message = mysqli_real_escape_string($conn, $_POST['message']);
   // $username = mysqli_real_escape_string($conn, $_SESSION['suid']);
    $sql = "INSERT INTO shoutouts (message,username) VALUES ('$message','$username')";
    mysqli_query($conn, $sql);
}

mysqli_close($conn);
?>
 


