<?php
$page = 'install';

 if (!file_exists('../config/db.config.php')) {
 ?>
 
 	<form method="post" action=""><input type="hidden" name="action" value="dbinstall">


    	<label for="inputCity">DB name</label><br />
      	<input type="text" class="form-control" name="name" value=""><br />
      	<label for="inputCity">DB user</label><br />
      	<input type="text" class="form-control" name="user" value=""><br />
      	<label for="inputCity">DB pass</label><br />
      	<input type="text" class="form-control" name="pass" value=""><br />
    	<button type="submit" class="btn btn-primary">Opslaan</button>
	</form>
 
 
 
 <?php
$action= isset($_POST['action']) ? $_POST['action'] : '';   
if($_SERVER['REQUEST_METHOD'] === 'POST'){
	if($action == 'dbinstall'){
	
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		$name = $_POST['name'];
		$contents = '<?php
/**
 * Define database credentials
 */
define("DB_HOST", "localhost");
define("DB_NAME", "'.$name.'");
define("DB_USER", "'.$user.'");
define("DB_PASS", "'.$pass.'");
define("DB_ENCODING", "utf8"); // DB connnection charset


/**
 * Define DB tables
 */
define("TABLE_PREFIX", "np_");

// Set table names without prefix
define("TABLE_USERS", "users");
define("TABLE_ACCOUNTS", "accounts");
define("TABLE_PACKAGES", "packages");
define("TABLE_POSTS", "posts");
define("TABLE_GENERAL_DATA", "general_data");
define("TABLE_OPTIONS", "options");
define("TABLE_ORDERS", "orders");

define("TABLE_FILES", "files");
define("TABLE_CAPTIONS", "captions");
define("TABLE_PROXIES", "proxies");

define("TABLE_PLUGINS", "plugins");
define("TABLE_THEMES", "themes");

define("TABLE_TRACKING","tracking");';
		$file = '../config/db.config.php';
		file_put_contents($file, $contents);  
		
		echo"1";
		require_once '../core/database.php';
		$db = new Database('localhost', $user, $pass, $name);
		
		
		echo"2";
		
		





$sql = 'CREATE TABLE `dynamic` (
  `id` int(10) UNSIGNED NOT NULL,
  `url` text NOT NULL,
  `title` text NOT NULL,
  `meta` text DEFAULT NULL,
  `content` text NOT NULL,
  `start` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;';
$db->query($sql)->execute();


		echo"3";




$sql = "CREATE TABLE `menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(80) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `hash` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
$db->query($sql)->execute();



$sql = "CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` enum('page','blog','category','tags') NOT NULL DEFAULT 'page',
  `status` enum('published','concept') NOT NULL DEFAULT 'published',
  `url` text NOT NULL,
  `title` text NOT NULL,
  `meta` text NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `img` text DEFAULT NULL,
  `start` datetime NOT NULL DEFAULT current_timestamp(),
  `category` text NOT NULL,
  `tags` text NOT NULL,
  `menu` varchar(80) NOT NULL DEFAULT '',
  `hash` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
$db->query($sql)->execute();

$content = "INSERT INTO `pages` (`id`, `type`, `url`, `title`, `meta`, `content`, `img`, `start`, `category`, `tags`, `menu`, `hash`) VALUES
(1, 'page', '/privacy-policy/', 'Privacy policy', '', '<h1>Privacyverklaring {sitenaam}</h1>\r\n<p>Wij hechten veel waarde aan de privacy van onze bezoekers en nemen de bescherming van persoonlijke gegevens zeer serieus. In deze privacyverklaring wordt uitgelegd welke informatie we verzamelen, hoe we deze informatie gebruiken en hoe we deze informatie beschermen.</p>\r\n\r\n<h2>Cookies en Web Beacons</h2>\r\n<p>Deze Website maakt gebruik van cookies om informatie op te slaan over bezoekers voorkeuren, zo hoeft u bijvoorbeeld na een reactie geplaatst te hebben op deze Website niet telkens opnieuw in te loggen. Daarnaast kunnen er advertenties van derde partijen zoals Google Adsense worden getoond. Deze derde partijen kunnen gebruik maken van cookies en/of web beacons. Wij hebben hier geen invloed op.</p>\r\n<h2>DoubleClick DART-cookie</h2>\r\n<ul>\r\n    <li>Google, als een derde partij, gebruikt cookies voor advertenties op deze Website.</li>\r\n    <li>Google&rsquo;s gebruik van de DART-cookie kan er voor zorgen dat u advertenties te zien krijgt welke gebaseerd zijn op deze Website en andere bezochte websites.</li>\r\n    <li>Gebruikers kunnen zich afmelden voor het gebruik van de DART-cookie door naar de Google-advertenties en het inhoudsnetwerk van privacy-beleid te gaan op de volgende URL &ndash;&nbsp;https://www.google.com/policies/technologies/ads/</li>\r\n</ul>\r\n<p>Naast Google kunnen een aantal van onze reclame-partners kunnen gebruik maken van cookies en web beacons op onze site.</p>\r\n<p>Deze derden ad servers of ad-netwerken maken gebruik van een technologie om de advertenties en links die op deze Website rechtstreeks naar uw browser te sturen. Zij ontvangen automatisch uw IP-adres wanneer dit gebeurt. Andere technologie&euml;n (zoals cookies, JavaScript, of Web Beacons) kunnen ook worden gebruikt door de derde partij advertentie-netwerken om de effectiviteit te meten van hun advertenties en / of de reclame-inhoud die u ziet.</p>\r\n<p>Deze Website heeft geen toegang tot of controle over deze cookies die worden gebruikt door derden adverteerders.</p>\r\n<p>Raadpleegt u de privacy-beleid van deze derden ad servers voor meer gedetailleerde informatie over hun handelen, alsook voor instructies over de opt-out van bepaalde praktijken. Wij hebben geen controle over de activiteiten van deze andere adverteerders of websites.</p>\r\n<p>Als u cookies wilt uitschakelen, kunt u dit doen via uw eigen browser-opties. Meer gedetailleerde informatie over het beheer van cookies met specifieke webbrowsers kunnen worden gevonden op de browsers betreffende websites.</p>\r\n\r\n<h2>Gegevensverzameling en -gebruik</h2>\r\n<p>We verzamelen bepaalde informatie van onze bezoekers, zoals IP-adressen, browsertypen, taalvoorkeuren en verwijzingspagina&apos;s. Deze informatie wordt gebruikt om trends te analyseren, de site te beheren, de bewegingen van gebruikers op de site te volgen en demografische informatie te verzamelen.</p>\r\n<p>We verzamelen ook informatie die je vrijwillig verstrekt, zoals naam, e-mailadres en andere persoonlijke gegevens die je achterlaat wanneer je een reactie plaatst op onze site.</p>\r\n<p>We zullen de verzamelde informatie niet verkopen, verhuren of delen met derden, tenzij we daarvoor toestemming hebben van de betrokken persoon of wanneer we wettelijk verplicht zijn om dit te doen.</p>\r\n<h2>Beveiliging</h2>\r\n<p>We doen er alles aan om de persoonlijke informatie van onze bezoekers te beschermen en hebben passende maatregelen genomen om de veiligheid van deze informatie te waarborgen. We gebruiken SSL-encryptie om gevoelige informatie te beschermen en onze systemen zijn beveiligd met firewalls en andere beveiligingsmaatregelen.</p>\r\n<h2>Contact</h2>\r\n<p>Als je vragen hebt over deze privacyverklaring of als je je persoonlijke informatie wilt wijzigen of verwijderen, kun je contact met ons opnemen via de <a href=\"/contact/\">contact</a> pagina</p>', NULL, '2023-05-01 14:37:45', '', '', '', ''),
(2, 'page', '/404/', 'Oops! Pagina niet gevonden', '', '<h1>Oops! pagina niet gevonden</h1><p>Helaas hebben wij de pagina niet gevonden waar u naar opzoek bent.</p> ', NULL, '2023-05-01 14:37:45', '', '', '', ''),
(3, 'page', '/contact/', 'Contact', '', '<h1>Contact</h1><p>Helaas is het op dit moment niet mogelijk om contact op te nemen via deze pagina. Onze excuses voor het eventuele ongemak.</p>\r\n<p>Mocht u toch nog vragen of opmerkingen hebben, dan kunt <!--via <a href=\"{contacturl}\">{contactsite}</a> contact met ons opnemen. Daarnaast kunt u -->ons bedrijf via andere kanalen bereiken, zoals onze sociale media-accounts.</p>\r\n<p>Wij stellen uw interesse in ons bedrijf zeer op prijs en bedanken u voor uw bezoek aan onze website.</p>\r\n', NULL, '2023-05-01 14:37:45', '', '', '', ''),
(4, 'page', '/', '{sitenaam}', '', '<section class=\"jumbotron text-center\">\r\n    <div class=\"container\">\r\n      <h1 class=\"jumbotron-heading\">{sitenaam}</h1>\r\n    </div>\r\n  </section>\r\n\r\n<div class=\"row py-5\">\r\n\r\n<div class=\"col-sm-12 col-lg-6 mb-4\">\r\n</div></div>', NULL, '2023-05-01 14:37:45', '', '', '', ''),
(5, 'category', '/blog/', 'Blog: Laatste berichten', 'Bekijk hier de blog van {sitenaam}', '<h1>Blog: Laatste berichten</h1>{catlist}', NULL, '2023-05-01 14:37:45', '', '', '', '')
;";

//$db->query($content)->execute();


$sql = "CREATE TABLE `places` (
  `id` int(11) NOT NULL,
  `planned` enum('0','1') NOT NULL DEFAULT '0',
  `start` datetime DEFAULT current_timestamp(),
  `plaats_url` varchar(512) DEFAULT NULL,
  `plaats` varchar(512) DEFAULT NULL,
  `gemeente-url` varchar(512) DEFAULT NULL,
  `gemeente` varchar(512) DEFAULT NULL,
  `provincie_url` varchar(512) DEFAULT NULL,
  `provincie` varchar(512) DEFAULT NULL,
  `inwoners` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
$db->query($sql)->execute();


$sql = "CREATE TABLE `settings` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `value` text NOT NULL,
  `type` char(1) NOT NULL DEFAULT 's',
  `module` varchar(30) NOT NULL DEFAULT '',
  `description` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
";
$db->query($sql)->execute();


$sql = "INSERT INTO `settings` (`id`, `name`, `value`, `type`, `module`, `description`) VALUES
(1, 'site_language', 'nl', 's', '', 'Website taal'),
(2, 'license_key', '7WMBL258IJfe2', 's', '', NULL),
(3, 'email_address', 'mbgek@hotmail.com', 's', '', 'E-mailadres van de beheerder'),
(4, 'site_title', 'SITE TITEL', 's', '', 'Website titel'),
(5, 'active_theme', 'naturel', 's', '', 'Actief thema'),
(6, 'theme_color', 'naturel', 's', '', 'theme color'),
(7, 'contact_url', 'https://www.4marketingandmore.com', 's', '', 'contact url'),
(8, 'contact_site', '4Marketingandmore.com', 's', '', 'contact site'),
(9, 'install', '1', 's', '', NULL);";
$db->query($sql)->execute();




$sql = "ALTER TABLE `dynamic` ADD PRIMARY KEY (`id`);";
$db->query($sql)->execute();


$sql = "ALTER TABLE `menu` ADD PRIMARY KEY (`id`);";
$db->query($sql)->execute();


$sql = "ALTER TABLE `pages` ADD PRIMARY KEY (`id`);";
$db->query($sql)->execute();


$sql = "ALTER TABLE `places`  ADD PRIMARY KEY (`id`),  ADD UNIQUE KEY `id` (`id`), ADD KEY `id_2` (`id`);";
$db->query($sql)->execute();


$sql = "ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);";
$db->query($sql)->execute();


$sql = "ALTER TABLE `dynamic`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
";
$db->query($sql)->execute();


$sql = "ALTER TABLE `menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;";
$db->query($sql)->execute();


$sql = "ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;";
$db->query($sql)->execute();


$sql = "ALTER TABLE `places`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;";
$db->query($sql)->execute();


$sql = "ALTER TABLE `settings`MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;";
$db->query($sql)->execute();





exit();

	
	}
}
 
 
        exit(); 
} 
require_once ('../../../loader.php');
$page = 'install';
$install = 'ja';
$sitetitle = 'Site installeren';
$nu = date("Y-m-d H:i:s");
if($setting['install'] != '1'){

       header("Location: ".BASE_URL."");
        exit(); 
}



  



	     
$action= isset($_POST['action']) ? $_POST['action'] : '';   
if($_SERVER['REQUEST_METHOD'] === 'POST'){

	if($action == 'test'){
 
 
 $sql = "CREATE TABLE `dynamic222` (
  `id` int(10) UNSIGNED NOT NULL,
  `url` text NOT NULL,
  `title` text NOT NULL,
  `meta` text DEFAULT NULL,
  `content` text NOT NULL,
  `start` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";



//$sql = "SELECT * FROM table" ;
$db->query($sql) ;
echo $db->last_query();
echo"DONE";

$sql = 'CREATE TABLE IF NOT EXISTS photo_tag (' .
            'id int(10) NOT NULL AUTO_INCREMENT, ' .
            'photo_id int(10) NOT NULL, ' .
            'tag_id int(10) NOT NULL, ' .
            'PRIMARY KEY (id)' .
            ') ENGINE=MyISAM DEFAULT CHARSET=utf8;';
$db->query($sql)->execute();



echo $db->last_query();
echo"DONE";

	} 
	
	
	if($action == 'install'){
    
          	$sql = "SELECT * FROM settings  where name = 'site_title' limit 1 ";
			$db->query($sql)->execute() ;
			$api = $db->query($sql)->fetch();
			$count = $db->affected_rows;
    	
			if($count == 0){  
    			$insert = array(
					'name' => 'site_title',
					'value' => $db->escape($_POST['title']),
					'type' => 's',
				);
        		$addinfo = $db->insert('settings', $insert); 
        	}else{
        	
				$data = array(
					'value' => $db->escape($_POST['title']),
				);
				$where = array( 'name' => 'site_title');
				$db->where($where)->update('settings', $data); 
        	
        	}
        	
        	
        	
    
          	$sql = "SELECT * FROM settings  where name = 'active_theme' limit 1 ";
			$db->query($sql)->execute() ;
			$api = $db->query($sql)->fetch();
			$count = $db->affected_rows;
    	
			if($count == 0){  
    			$insert = array(
					'name' => 'active_theme',
					'value' => $db->escape($_POST['theme']),
					'type' => 's',
				);
        		$addinfo = $db->insert('settings', $insert); 
        	}else{
        	
				$data = array(
					'value' => $db->escape($_POST['theme']),
				);
				$where = array( 'name' => 'active_theme');
				$db->where($where)->update('settings', $data); 
        	
        	}
        	
        	
    		$_POST['themecolor'] = isset($_POST['themecolor']) ? $_POST['themecolor'] : 'naturel';
          	$sql = "SELECT * FROM settings  where name = 'themecolor' limit 1 ";
			$db->query($sql)->execute() ;
			$api = $db->query($sql)->fetch();
			$count = $db->affected_rows;
    	
			if($count == 0){  
    			$insert = array(
					'name' => 'themecolor',
					'value' => $db->escape($_POST['themecolor']),
					'type' => 's',
				);
        		$addinfo = $db->insert('settings', $insert); 
        	}else{
        	
				$data = array(
					'value' => $db->escape($_POST['themecolor']),
				);
				$where = array( 'name' => 'themecolor');
				$db->where($where)->update('settings', $data); 
        	
        	}
        	
        	
        	
    
          	$sql = "SELECT * FROM settings  where name = 'contact_url' limit 1 ";
			$db->query($sql)->execute() ;
			$api = $db->query($sql)->fetch();
			$count = $db->affected_rows;
    	
			if($count == 0){  
    			$insert = array(
					'name' => 'contact_url',
					'value' => $db->escape($_POST['contact_url']),
					'type' => 's',
				);
        		$addinfo = $db->insert('settings', $insert); 
        	}else{
        	
				$data = array(
					'value' => $db->escape($_POST['contact_url']),
				);
				$where = array( 'name' => 'contact_url');
				$db->where($where)->update('settings', $data); 
        	
        	}
        	
        	
    
          	$sql = "SELECT * FROM settings  where name = 'contact_site' limit 1 ";
			$db->query($sql)->execute() ;
			$api = $db->query($sql)->fetch();
			$count = $db->affected_rows;
    	
			if($count == 0){  
    			$insert = array(
					'name' => 'contact_site',
					'value' => $db->escape($_POST['contact_site']),
					'type' => 's',
				);
        		$addinfo = $db->insert('settings', $insert); 
        	}else{
        	
				$data = array(
					'value' => $db->escape($_POST['contact_site']),
				);
				$where = array( 'name' => 'contact_site');
				$db->where($where)->update('settings', $data); 
        	
        	}
        	
        	  
          	$sql = "SELECT * FROM settings  where name = 'access_key' limit 1 ";
			$db->query($sql)->execute() ;
			$api = $db->query($sql)->fetch();
			$count = $db->affected_rows;
    	
			if($count == 0){  
    			$insert = array(
					'name' => 'access_key',
					'value' => $db->escape($_POST['access_key']),
					'type' => 's',
				);
        		$addinfo = $db->insert('settings', $insert); 
        	}else{
        	
				$data = array(
					'value' => $db->escape($_POST['access_key']),
				);
				$where = array( 'name' => 'access_key');
				$db->where($where)->update('settings', $data); 
        	
        	}
        	
        	
	}
	
	




	if($action == 'content'){

          	$sql = "SELECT id FROM pages  where url =   '/' limit 1 ";
			$db->query($sql)->execute() ;
			$api = $db->query($sql)->fetch();
			$count = $db->affected_rows;
			if($count == 1){  
				$data = array(
					'start' => $nu
				);
				$where = array( 'url' => '/');
				$db->where($where)->update('pages', $data); 
				
        	}
        	
    		$sql = "SELECT id FROM pages  where url =   '/contact/' limit 1 ";
			$db->query($sql)->execute() ;
			$api = $db->query($sql)->fetch();
			$count = $db->affected_rows;
			if($count == 1){  
				$data = array(
					'start' => $nu
				);
				$where = array( 'url' => '/contact/');
				$db->where($where)->update('pages', $data); 
				
        	}

        	
    		$sql = "SELECT id FROM pages  where url =   '/privacy-policy/' limit 1 ";
			$db->query($sql)->execute() ;
			$api = $db->query($sql)->fetch();
			$count = $db->affected_rows;
			if($count == 1){  
				$data = array(
					'start' => $nu
				);
				$where = array( 'url' => '/privacy-policy/');
				$db->where($where)->update('pages', $data); 
				
        	}
        	
        	
    		$sql = "SELECT id FROM pages  where url =   '/blog/' limit 1 ";
			$db->query($sql)->execute() ;
			$api = $db->query($sql)->fetch();
			$count = $db->affected_rows;
			if($count == 1){  
				$data = array(
					'start' => $nu
				);
				$where = array( 'url' => '/blog/');
				$db->where($where)->update('pages', $data); 
				
        	}
        	 
        	
    		$sql = "SELECT id FROM pages  where url =   '/404/' limit 1 ";
			$db->query($sql)->execute() ;
			$api = $db->query($sql)->fetch();
			$count = $db->affected_rows;
			if($count == 1){  
				$data = array(
					'start' => $nu
				);
				$where = array( 'url' => '/404/');
				$db->where($where)->update('pages', $data); 
				
        	}
        	 
	
	}



	if($action == 'finished'){

          	$sql = "SELECT id FROM settings  where name =   'install' limit 1 ";
			$db->query($sql)->execute() ;
			$api = $db->query($sql)->fetch();
			$count = $db->affected_rows;
    	
			if($count == 1){  
				$data = array(
					'value' => '0'
				);
				$where = array( 'name' => 'install');
				$db->where($where)->update('settings', $data); 
				
        	}

	
	}
	     //header("Location: ".BASE_URL."install/");
        //exit(); 

}


$hash1 = random_hash(rand(4,5));
$hash2 = random_hash(rand(5,8));
$hash3 = random_hash(rand(3,8));
$hash4 = random_hash(rand(2,3));
$hash5 = random_hash(rand(4,6));

$random = $hash1."-".$hash2."-".$hash3."-".$hash4."-".$hash5;

$access_key = isset($setting['access_key']) ? $setting['access_key'] : '';
if($setting['access_key'] != ''){
$access_key = $access_key;
}else{
$access_key = $random;
}
$theme = 'link';
require_once ('../../../themes/loader.php');


function random_hash($n) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
 
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
 
    return $randomString;
}