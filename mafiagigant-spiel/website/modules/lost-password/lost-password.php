<?php

if(!isset($module)){
exit;
}

include('lost-password.lang.php');


	function cleanstring($string) {
		 return preg_replace("/[^A-Za-z0-9 ]/", ' ', $string);
	}	

if($_SERVER['REQUEST_METHOD'] === 'POST'){

	$captcha= isset($_POST['captcha']) ? $_POST['captcha'] : '';
	$user =  $db->escape($_POST['username']);
	
	
	$pass1 = $db->escape(stripslashes(sha1(md5(trim($_POST['pass1'])))));
	$pass2 = $db->escape(stripslashes(sha1(md5(trim($_POST['pass2'])))));
	

	$email = $db->escape($_POST['email']);

			function random_hash() 
			{ 
					$code = md5(uniqid(rand(), true)); 
					return substr($code, 0, '15'); 
			}

			$hash = random_hash();
 

	#inlognaam
	if(empty($user)){
		$errors[]= $text[$lang]['empty_username'];
  	}  
 	if(strlen($user) < 3 ){
 	
		$errors[]= $text[$lang]['username_short'];
  	}
	
    #Is de inlognaam wel korter dan 10 tekens
	if(strlen($user) > 15 ){
	
		$errors[]= $text[$lang]['username_long'];
  	}
  
	
	if(!preg_match('/^([a-zA-Z0-9]+)$/is', $user)){
		//$errors[]= $text[$lang]['username_incorrect_signs'];
  	}
  	
  	
  	if(empty($email)){
		$errors[]= $text[$lang]['no_email'];
  	}
  	
  	#Is email wel goed?
	if(!preg_match("/^[A-Z0-9._%-]+@[A-Z0-9][A-Z0-9.-]{0,61}[A-Z0-9]\.[A-Z]{2,6}$/i", $email)){
		$errors[]= $text[$lang]['email_incorrect_signs'];
  	}	
  	
  	
	
	if(empty($pass1)){
		$errors[]= $text[$lang]['no_password'];
	}
	#Komen de wachtwoorden niet overeen
	if($pass1 <> $pass2){
	
		$errors[]= $text[$lang]['password_dont_match'];
  	}
  	
  	
	$q = "SELECT username, email FROM users where username = '".$user."'  LIMIT 1";
	$f = $db->query($q)->fetch();
	if($db->affected_rows == '0'){	
		$errors[]= $text[$lang]['username_notexist'];
	}else{
		if($f[0]['email'] != ''){
		//echo"$user - $email";
		$q = "SELECT email FROM users where username = '".$user."' and email = '".$email."'  LIMIT 1";
		$f = $db->query($q)->fetch();
		if($db->affected_rows == '0'){	
				$errors[]= $text[$lang]['email_no_match'];
		}
		}
		
	
	}
  	

	  	
	
 	
  	
	//if(!checkcaptcha()){
		//$errors[]= $text[$lang]['wrong_captcha'];

	//}
	    		
	if(empty($errors))
	{
	
	 		$lastaction = date("Y-m-d H:i:s");
			$info = array(
				'email' => $email,
				'password_new' => $pass1,
				'password_new_hash' => $hash
			);
			$where = array(
				'username' => $user,
			);
			$db->where($where)->update('users', $info); 
	
		//$success[]= $text[$lang]['lost_password_success'];
		
		$mail= txt($text[$lang]['lost_password_mail'],'{hash}',$hash);


$to      = $email;
$subject = $text[$lang]['lost_password_mail_subject'];
$message = $mail;
$headers = 'From: no-reply@secretcrime.nl' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

//mail($to, $subject, $message, $headers);
	
	
	
	
	
			$mail_body = txt($text[$lang]['lost_password_mail'],'{hash}',$hash);
	
				$naam_afz = 'Secretcrime';
				$email_afz = 'no-reply@secretcrime.nl';
				//$email_afz = 'info@promotica.nl';
				$bcc_emailadres = '';
				$html = true;
				$headers	 = 'From: ' . $naam_afz . ' <' . $email_afz . '>' . PHP_EOL;
				$headers	.= 'Reply-To: ' . $naam_afz . ' <' . $email_afz . '>' . PHP_EOL;
				$headers	.= 'Return-Path: Mail-Error <' . $email_afz . '>' . PHP_EOL;
				$headers	.= ($bcc_emailadres != '') ? 'Bcc: ' . $bcc_emailadres . PHP_EOL : '';
				$headers	.= 'X-Mailer: PHP/' . phpversion() . PHP_EOL;
				$headers	.= 'X-Priority: Normal' . PHP_EOL;
				$headers	.= ($html) ? 'MIME-Version: 1.0' . PHP_EOL : '';
				//$headers	.= ($html) ? 'Content-type: text/html; charset=iso-8859-1' . PHP_EOL : '';
				$headers 	.= ($html) ? 'Content-Type: text/html; charset=UTF-8' . PHP_EOL : '';
				

				if(mail($email, $text[$lang]['lost_password_mail_subject'],stripcslashes($mail_body), $headers)) 
				{
						$success[]= $text[$lang]['lost_password_success'];
		
			} else {
				$errors[]= $text[$lang]['not_reset'];
			}
				
				
	
			
		
	




	}
	
	
	 
}


if(isset($var) and $var != ''){

	$var =  $db->escape($var);
		$q = "SELECT username,password_new ,status FROM users where password_new_hash = '".$var."' LIMIT 1";
		$f = $db->query($q)->fetch();
		if($db->affected_rows == '0'){	
				$errors[]= $text[$lang]['not_reset'];
		}else{
			if($f[0]['status'] == 'pwreset'){
				$newstatus = 'active';
			}else{
				$newstatus = $f[0]['status'];
			}
			
			
			$info = array(
				'status' => $newstatus,
				'password' => $f[0]['password_new'],
				'password_new' => '',
				'password_new_hash' => '',
			);
			$where = array(
				'username' => $f[0]['username'],
			);
			$db->where($where)->update('users', $info); 
		
        					header("Location: /login");
		
			
		}


}

  	