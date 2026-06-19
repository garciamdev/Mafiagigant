<?php 
// Used for cache control
define("VERSION", "010001"); 

// Application version name
define("APP_VERSION", "1.0.1"); 

// Default timezone
date_default_timezone_set("Europe/Amsterdam"); 

// Default multibyte encoding
mb_internal_encoding("UTF-8");

// base url – DYNAMISCH: lokal (Laragon/XAMPP) -> localhost, online -> echte Domain.
// So gehen Links/Formulare immer auf die aktuell aufgerufene Adresse,
// statt fest auf die Live-Seite.
$mg_proto = (!empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off') ? 'https' : 'http';
$mg_host  = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : 'mafiagiganten.de';
define("BASE_URL", $mg_proto . "://" . $mg_host . "/");


// base url
define("SITE_NAME", "mafiagiganten.de"); 


// base url
define("SITE_EMAIL", "info@mafiagiganten.de"); 
// base url
define("SITE_EMAIL_FROM", "Mafiagiganten"); 