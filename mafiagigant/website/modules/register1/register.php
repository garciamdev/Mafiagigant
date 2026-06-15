<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include("register.lang.php");


	function cleanstring($string) {
		 return preg_replace("/[^A-Za-z0-9 ]/", ' ', $string);
	}	




if($_SERVER['REQUEST_METHOD'] === 'POST'){

	$captcha= isset($_POST['captcha']) ? $_POST['captcha'] : '';
	
	$user =  $db->escape($_POST['username']);
	$pass1 = $db->escape(stripslashes(sha1(md5(trim($_POST['pass1'])))));
	$pass2 = $db->escape(stripslashes(sha1(md5(trim($_POST['pass2'])))));

	$email = $db->escape($_POST['email']);
	$gender =$db->escape($_POST['gender']);


 


	#inlognaam
	if(empty($user)){
		$errors[]= $text[$lang]['empty_username'];
  	}  
 	if(strlen($user) < 3 ){
 	
		$errors[]= $text[$lang]['username_short'];
  	}
	
    #Is de inlognaam wel korter dan 10 tekens
	if(strlen($user) > 12 ){
	
		$errors[]= $text[$lang]['username_long'];
  	}
  	
  	
	$q = "SELECT username FROM users where username = '".$user."'  LIMIT 1";
	$f = $db->query($q)->fetch();
	if($db->affected_rows != '0'){	
		$errors[]= $text[$lang]['username_exist'];
	}
	
	if(!preg_match('/^([a-zA-Z0-9]+)$/is', $user)){
		//$errors[]= $text[$lang]['username_incorrect_signs'];
  	}
  	
  	

	
	if(empty($pass1)){
		$errors[]= $text[$lang]['no_password'];
	}
	#Komen de wachtwoorden niet overeen
	if($pass1 <> $pass2){
	
		$errors[]= $text[$lang]['password_dont_match'];
  	}
  	
  	if(empty($email)){
		$errors[]= $text[$lang]['no_email'];
  	}
  	
  	#Is email wel goed?
	if(!preg_match("/^[A-Z0-9._%-]+@[A-Z0-9][A-Z0-9.-]{0,61}[A-Z0-9]\.[A-Z]{2,6}$/i", $email)){
		$errors[]= $text[$lang]['email_incorrect_signs'];
  	}	
  	
  	$q = "SELECT email FROM users where email = '".$email."'  LIMIT 1";
	$f = $db->query($q)->fetch();
	if($db->affected_rows != '0' and !empty($email)){	
		$errors[]= $text[$lang]['email_exist'];
	}
	
	$q = "SELECT ip FROM users where ip = '".$_SERVER['REMOTE_ADDR']."'  LIMIT 1";
	$f = $db->query($q)->fetch();
	if($db->affected_rows != '0'){	
		$errors[]= $text[$lang]['ip_exist'];
	}
	
  	
  	#Als dubbel account checkbox wel aangevinkt is
  	if($_POST['accept1'] != True){
		$alert  		= '<div class="red">'.$text['alert_condition'].'</div>';
  	}
  	#Als dubbel account checkbox wel aangevinkt is
  	elseif($_POST['accept2'] != True){
		$alert  		= '<div class="red">'.$text['alert_1account_condition'].'</div>';
  	}
  	
  	
  	
  	
	if(!checkcaptcha()){
		$errors[]= $text[$lang]['wrong_captcha'];

	}
	    		
	if(empty($errors))
	{
	
	 	
    	#Genereer activatiecode
    		$activatiecode = rand(111111,999999);
	
if($gender == 'M'){
$gender = 'male';
}elseif($gender == 'F'){
$gender = 'female';
}else{
$gender = 'male';
}
            $lastaction = date("Y-m-d H:i:s");
            $user = array(
                'status' => 'verify',
                'username' => $db->escape($user),
                'email' => $db->escape($email),
                'password' => $db->escape($pass1),
                'gender' => $db->escape($gender),
                'activationcode' => $db->escape($activatiecode),
                'ip' => $db->escape($_SERVER['REMOTE_ADDR']),
                'status' => 'active'
            );
            $user_id = $db->insert('users', $user); 


		
		//sendmail($email,$txt['mail_register_title'],$txt['mail_register']);

		
			$mail_body = txt($text[$lang]['signup_success_email'],'{activationcode}',$activatiecode);
		
		
			$mail = new PHPMailer(true);
			   
			//From email address and name
			$mail->From = SITE_EMAIL;
			$mail->FromName = SITE_EMAIL_FROM;

			//To address and name
			$mail->addAddress($email, $username);

		    // Content
		    $mail->isHTML(true); // Set email format to HTML
		    $mail->Subject = $text[$lang]['signup_email_subject'];
		    $mail->Body    = $mail_body;

			try {
			   //$mail->send();
				$success[]= $text[$lang]['signup_success'];
				//$success[]= txt($text[$lang]['signup_success_email'],'{activationcode}',$activatiecode);
		
		
			} catch (Exception $e) {
				$errors[]=$text[$lang]['signup_email_error'];
			}






	}
	
	
}





