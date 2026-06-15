<?php



     	function generatecaptcha() {
            $_SESSION["CSFR1"] = md5(mt_rand(1, 10000000));
            $_SESSION["CSFR2"] = md5(mt_rand(1, 10000000));
            $_SESSION["CSFR3"] = md5(mt_rand(1, 10000000));
            $_SESSION["CSFR4"] = md5(mt_rand(1, 10000000));
            
   		}
   		
   		
   		 
   		function showcaptcha(){
   		$showcaptcha = '';
   			global $_SESSION;
   			if(!isset($_SESSION["CSFR1"])){
   				generatecaptcha();
   			}
   			
   			

   				$captcha[] = '<button type="submit"  name="captcha" value="'.$_SESSION["CSFR1"].'" style="background:none;border:none;padding:0"><img  width="75px" src="/themes/img/correct.png"></button>';
   				$captcha[] = '<button type="submit"    name="captcha" value="'.$_SESSION["CSFR2"].'" style="background:none;border:none;padding:0"><img width="75px"  src="/themes/img/wrong.png"></button>';
   				$captcha[] = '<button type="submit"    name="captcha" value="'.$_SESSION["CSFR3"].'" style="background:none;border:none;padding:0"><img width="75px"  src="/themes/img/wrong.png"></button>';
   				$captcha[] = '<button type="submit"   name="captcha" value="'.$_SESSION["CSFR4"].'" style="background:none;border:none;padding:0"><img  width="75px" src="/themes/img/wrong.png"></button>';


   		//		$captcha[] = '<input type="image" width="75px" src="/themes/img/correct.png" name="captcha" value="'.$_SESSION["CSFR1"].'">';
   		//		$captcha[] = '<input type="image" width="75px" src="/themes/img/wrong.png" name="captcha" value="'.$_SESSION["CSFR2"].'">';
   		//		$captcha[] = '<input type="image" width="75px" src="/themes/img/wrong.png" name="captcha" value="'.$_SESSION["CSFR3"].'">';
   		//		$captcha[] = '<input type="image" width="75px" src="/themes/img/wrong.png" name="captcha" value="'.$_SESSION["CSFR4"].'">';
   				
   				shuffle($captcha);
   				
   				foreach($captcha AS $value){
   					$showcaptcha .= $value;
   				}
                  
   		
   			return $showcaptcha;
   		}


         function checkcaptcha($showError = true) {
	global $_REQUEST;
	global $_SESSION;
	
	//print_r($_REQUEST); echo">>>>";
	//print_r($_SESSION); echo">>>>";
            if (isset($_REQUEST["captcha"]) && $_REQUEST["captcha"] == $_SESSION["CSFR1"]) {
                generatecaptcha();
                return true;
            }ELSE{
            generatecaptcha();
            	return false;
            }


        }
		