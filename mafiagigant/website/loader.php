<?php
// Start session
session_start();

$addnewcontent = 'nee';

/**
 * Define very basic constants
 */
 




 
/**
 * Define constants
 */
// Path to root directory of app.
define("ROOTPATH", dirname(__FILE__));

// Path to app folder.
define("APPPATH", ROOTPATH."/main/app");



 if (!file_exists(APPPATH.'/config/db.config.php')) {
 
 	if($page != 'install'){
    header("Location: ./install");
    exit;
 	}
 	
define("ENVIRONMENT", "installation"); // [development|production|installation]
    
} else {
define("ENVIRONMENT", "development"); // [development|production|installation]
}



/**
 * Check ENVIRONMENT
 */
error_reporting(E_ALL);
if (ENVIRONMENT == "installation") {
    //header("Location: ./install");
    //exit;
} else if (ENVIRONMENT == "development") {
    ini_set('display_errors', 1);
} else if (ENVIRONMENT == "production") {
    ini_set('display_errors', 0);
} else {
    header('HTTP/1.1 503 Service Unavailable.', true, 503);
    echo 'Environment is invalid. Please contact developer for more information.';
    exit;
}





// Path to themes directory
define("THEMES_PATH", ROOTPATH . "/themes");



// Check if SSL enabled.
$ssl = isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] && $_SERVER["HTTPS"] != "off" 
     ? true 
     : false;
     $ssl = true;
define("SSL_ENABLED", $ssl);

// URL of the application root. 
// This is not the URL of the app directory.
$app_url = (SSL_ENABLED ? "https" : "http")
         . "://"
         . $_SERVER["SERVER_NAME"]
         . (dirname($_SERVER["SCRIPT_NAME"]) == DIRECTORY_SEPARATOR ? "" : "/")
         . trim(str_replace("\\", "/", dirname($_SERVER["SCRIPT_NAME"])), "/");
define("APPURL", $app_url);


// URL of the application root. 
// This is not the URL of the app directory.
$themes_url = (SSL_ENABLED ? "https" : "http")
         . "://"
         . $_SERVER["SERVER_NAME"]
         . "/themes/";
define("THEMES_URL", $themes_url);


// URL of the application root. 
// This is not the URL of the app directory.
$base_url = (SSL_ENABLED ? "https" : "http")
         . "://"
         . $_SERVER["SERVER_NAME"]
         . "/";
define("BASE_URL", $base_url);


$subdomain = extract_subdomains($_SERVER['HTTP_HOST']);
$maindomain = str_replace($subdomain,'',$_SERVER["SERVER_NAME"]);
$subdomain = str_replace("www.","",$subdomain);

$maindomain = (SSL_ENABLED ? "https" : "http")
         . "://"
         . $maindomain
         . "/";
         
$maindomain = str_replace("://.",'://',$maindomain);
define("MAIN_DOMAIN", $maindomain);


// Define Base Path (for routing)
$base_path = trim(str_replace("\\", "/", dirname($_SERVER["SCRIPT_NAME"])), "/");
$base_path = $base_path ? "/" . $base_path : "";
define("BASEPATH", $base_path);


if (file_exists(APPPATH.'/config/db.config.php')) {
 
 
require_once APPPATH.'/config/config.php';

}

require_once APPPATH.'/core/database.php';
$db = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);


$page = isset($page) ? $page : 'index';
$page = 'index'; 

$htmltitle = 'Energietoeslag aanvragen voor 2023'; 
$htmlmeta = 'Lees hier alles wat je moet weten over het aanvragen van energietoeslag voor het jaar 2023. Ontdek of je er recht op hebt en hoe je het kunt aanvragen.'; 

			$sql = "SELECT * FROM settings  " ;
			$db->query($sql)->execute() ;
			$f = $db->query($sql)->fetch();
			foreach (($f ? $f : array()) as $k => $v){ 

				$setting[$v['name']] = $v['value'];
			}


$var1 = isset($_GET['var1']) ? $_GET['var1'] : '';
$var1 = $db->escape($var1);
$var2 = isset($_GET['var2']) ? $_GET['var2'] : '';
$var2 = $db->escape($var2);


			$sql = "SELECT * FROM menu  " ;
			$db->query($sql)->execute() ;
			$fm = $db->query($sql)->fetch();
			foreach (($fm ? $fm : array()) as $k => $v){ 
				$menu[$v['title']] = $v['content'];
			}

//exit;



if($page =='fbb-shipment' ){

require_once ROOTPATH . "/CronjobS/bolapifuntions.php";

}




function auth(){
    global $_SESSION;
    global $db;

    if(!isset($_SESSION['suid']) or $_SESSION['suid'] == ''){
        header("Location: ".BASE_URL."sign-in/");
        exit(); 
    }else{

        //$userdata[] = $userdata;
        return true;

    }

}

function checkadmin(){
    global $userdata;

    if($userdata[0]['account_type'] == 'admin'){
        
        return true;
    }else{
       
       return false;

    }

}



function admin(){
    if(checkadmin() ){
        return true;
    }else{
       
        header("Location: ".BASE_URL."dashboard/");
        exit(); 

    }

}

function checksubscription(){
    global $userdata;

    if($userdata[0]['package_id'] == 0){
        header("Location: ".BASE_URL."subscription/");
        exit(); 
    }else{
        return true;

    }


}


function extract_domain($domain)
{
    if(preg_match("/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i", $domain, $matches))
    {
        return $matches['domain'];
    } else {
        return $domain;
    }
}

function extract_subdomains($domain)
{
    $subdomains = $domain;
    $domain = extract_domain($subdomains);

    $subdomains = rtrim(strstr($subdomains, $domain, true), '.');

    return $subdomains;
}

// Wanneer de gebruiker op "Accepteren" klikt, wordt er een cookie_consent cookie ingesteld en worden alle cookie-categorieën geladen
if(isset($_POST['accept-all-cookies'])) {
    $cookie_consent = array(
        'basics' => true, // Marketing cookies
        'analytics' => true, // Google Analytics cookies
    );
   setcookie('cookie_consent', json_encode($cookie_consent), time() + (86400 * 30), '/'); // Cookie blijft 30 dagen actief
    header('Location: ' . $_SERVER['REQUEST_URI']); // De pagina wordt opnieuw geladen nadat de cookie_consent cookie is ingesteld
    exit();
}

        
                
   // Wanneer de gebruiker op "Opslaan" klikt in de cookie-instellingen pop-up, wordt de cookie_consent cookie ingesteld met de geselecteerde cookie-categorieën
if(isset($_POST['save-cookie-settings'])) {
$cookie_consent = array(
'basics' => true, // Google Analytics cookies
'analytics' => isset($_POST['analytics']), // Google Analytics cookies
);
setcookie('cookie_consent', json_encode($cookie_consent), time() + (86400 * 30), '/'); // Cookie blijft 30 dagen actief
header('Location: ' . $_SERVER['REQUEST_URI']); // De pagina wordt opnieuw geladen nadat de cookie_consent cookie is ingesteld
exit();
}

