<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$page = 'contact';
require_once ('../../../loader.php');

if($_SERVER['REQUEST_METHOD'] === 'POST'){

      $action= isset($_POST['action']) ? $_POST['action'] : '';
      if($action == 'sent'){

            $name= isset($_POST['name']) ? $_POST['name'] : '';
            $email= isset($_POST['email']) ? $_POST['email'] : '';
            $message= isset($_POST['message']) ? $_POST['message'] : '';
			$_SESSION['wachtentot'] = isset($_SESSION['wachtentot'])  ? $_SESSION['wachtentot'] : '';

if (isset($_POST['g-recaptcha-response'])) {
    $captcha = $_POST['g-recaptcha-response'];
} else {
    $captcha = false;
}

if (!$captcha) {
			$errors[]= "Er is iets fout gegaan.";
} else {
    $secret   = '6LdtPfMfAAAAAJymDJY1tfUGbbuQfk6tXhybsw1w';
    $response = file_get_contents(
        "https://www.google.com/recaptcha/api/siteverify?secret=" . $secret . "&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']
    );
    // use json_decode to extract json response
    $response = json_decode($response);

    if ($response->success === false) {
			$errors[]= "captcha error.";
    }
}


		if(empty($name) ){ 
			$errors[]= "U heeft geen naam ingevuld.";
		}
		if(empty($email) ){ 
			$errors[]= "U heeft geen email adres ingevuld";
		}
		if(empty($message) ){ 
			$errors[]= "U heeft geen bericht ingevuld";
		}
		if($_SESSION['wachtentot'] > time()) {
			$errors[]= "U mag maar 1 keer in de 5 minuten een bericht sturen.";
		}

		if(empty($errors))
		{
		
		if ($response->success==true && $response->score <= 0.5) {




			$sql = "SELECT * FROM np_settings where name = 'email_address'  " ;
			$db->query($sql)->execute() ;
			$f = $db->query($sql)->fetch();
			
			$contactinfo = $f[0]['value'];


			$mail = new PHPMailer(true);
			   
			//From email address and name
			$mail->From = $email;
			$mail->FromName = $name;

			//To address and name
			$mail->addAddress($contactinfo, 'Miro Ecommerce');

		    // Content
		    $mail->isHTML(true); // Set email format to HTML
		    $mail->Subject = 'Contact Ecommerce tool';
		    $mail->Body    = 	$message;

			try {
			    $mail->send();
            	$success[] = "Bericht is verstuurd";


					$vandaag = time();
					$_SESSION['wachtentot'] = strtotime ("+300 seconds", $vandaag);

			} catch (Exception $e) {
				$errors[]= "Er is iets fout gegaan.<br />";
			}


		}
        }

      }
}


			$sql = "SELECT * FROM np_portal_pages  order by title ASC " ;
			$db->query($sql)->execute() ;
			$f = $db->query($sql)->fetch();
		




			

$theme = 'link';
require_once ('../../../themes/loader.php');

