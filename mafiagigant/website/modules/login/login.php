<?php
include("login.lang.php");


if(isset($_SESSION['suid'])  and $_SESSION['suid'] != ''){
    header("Location: /");
    exit(); 
}



	if($_SERVER['REQUEST_METHOD'] === 'POST'){

		$loginuser= isset($_POST['username']) ? $_POST['username'] : '';
		$pass= isset($_POST['password']) ? $_POST['password'] : '';


        if ($_POST['submit']) {

			if(!empty($loginuser) AND !empty($pass) ){ 
				

				$loginuser=$db->escape(htmlspecialchars(trim($_POST['username'])));
				$pass=$db->escape(stripslashes(sha1(md5(trim($_POST['password'])))));







	            $q = "SELECT id,email,password,status FROM users where username = '".$loginuser."'  LIMIT 1";
	            $f = $db->query($q)->fetch();
	            

//$query = "SELECT id, email, password, status FROM users WHERE username = ? LIMIT 1";
//$f = $db->query($query, [$loginuser])->fetch();



//print_r($db);
//exit;
				if($db->affected_rows == '1')
				{	

					if($f[0]['status'] == 'verify')
					{
						//header("Location: ".BASE_URL."verify/");
						$errors[]= "U moet uw account eerst <a href='". BASE_URL ."verify/'>activeren</a>. Lukt dat niet? Neem dan <a href='". BASE_URL ."contact/'>contact</a> met ons op.";
					}
					elseif($f[0]['status'] == 'ban')
					{
						$errors[]= "Uw account is verbannen. Neem <a href='". BASE_URL ."contact/'>contact</a> met ons op.";
					}
					elseif($f[0]['status'] == 'pwreset')
					{
						$errors[]= "You have to do a password reset! <a href='". BASE_URL ."lost-password/'>You can do a Password reset here</a>.";
					}
					elseif($f[0]['password'] != $pass)
					{
						$errors[]= $text[$lang]['wrong_password'];
					}


					if(empty($errors))
					{



						$uid = $f[0]['id'];
						
						if(isset($_POST['remember'])){ 

							$_SESSION['suid'] = $uid;
							setcookie('suid', $uid, time() + (86400 * 30),'/'); 
        					header("Location: /");

						}else{
							$_SESSION['suid'] = $uid;
        					header("Location: /");

						}

					}
 
				}else{
					$errors[]= $text[$lang]['wrong_username'];
				}

			}else{
				$errors[]=$text[$lang]['wrong_fields'];
			}
        }//elseif($_POST['submit'] == "FACEBOOK / GOOGLE") { } ????
 	}

