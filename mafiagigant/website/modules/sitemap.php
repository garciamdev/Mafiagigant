<?php 
$page = 'sitemap';
require_once ('../../../loader.php');

$nu = date("Y-m-d H:i:s");


header("Content-Type: application/xml; charset=utf-8");

echo '<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL; 

echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">' . PHP_EOL;



 
$sql = "SELECT *  FROM pages  where start < '".$nu."' and type = 'page' order by start ASC " ;
$db->query($sql)->execute() ;
$fpages = $db->query($sql)->fetch();

foreach(($fpages ? $fpages : array()) as $f) {
$url = ltrim($f['url'],'/');
 echo '<url>' . PHP_EOL;
 echo '<loc>'.MAIN_DOMAIN. $url .'</loc>' . PHP_EOL;
 echo '<lastmod>'.date('c', strtotime($f["start"])) .'</lastmod>' . PHP_EOL;
 echo '<changefreq>weekly</changefreq>' . PHP_EOL;
 echo '</url>' . PHP_EOL;
 
}	
 
 

 
$sql = "SELECT *  FROM pages  where start < '".$nu."' and type = 'category' order by start ASC " ;
$db->query($sql)->execute() ;
$fpages = $db->query($sql)->fetch();

foreach(($fpages ? $fpages : array()) as $f) {
$url = ltrim($f['url'],'/');
$sql = "SELECT *  FROM pages  where start < '".$nu."' and category = '".trim($f["url"],'/')."' order by start desc " ;
$db->query($sql)->execute() ;

		$scount = $db->affected_rows;
		if($scount != 0){
			$ff = $db->query($sql)->fetch();
			$time = date('c',strtotime($ff[0]["start"]));
		}else{
			$ff = $db->query($sql)->fetch();
			$time = date('c',strtotime($f["start"]));		
		}


 echo '<url>' . PHP_EOL;
 echo '<loc>'.MAIN_DOMAIN. $url .'</loc>' . PHP_EOL;
 echo '<lastmod>'. $time .'</lastmod>' . PHP_EOL;
 echo '<changefreq>daily</changefreq>' . PHP_EOL;
 echo '</url>' . PHP_EOL;
 
}	


 
$sql = "SELECT *  FROM pages  where start < '".$nu."' and type = 'blog' order by start ASC " ;
$db->query($sql)->execute() ;
$fpages = $db->query($sql)->fetch();

foreach(($fpages ? $fpages : array()) as $f) {
$url = ltrim($f['url'],'/');
 echo '<url>' . PHP_EOL;
 echo '<loc>'.MAIN_DOMAIN. $url .'</loc>' . PHP_EOL;
 echo '<lastmod>'.date('c', strtotime($f["start"])) .'</lastmod>' . PHP_EOL;
 echo '<changefreq>weekly</changefreq>' . PHP_EOL;
 echo '</url>' . PHP_EOL;
 
}	
 
 
$sql = "SELECT distinct(provincie), provincie_url, start FROM places  where start < '".$nu."'  GROUP BY provincie order by provincie ASC " ;
$db->query($sql)->execute() ;
$fprovincie = $db->query($sql)->fetch();

foreach(($fprovincie ? $fprovincie : array()) as $f) {

$sql = "SELECT start FROM places  where start < '".$nu."'  and provincie_url = '".$f['provincie_url']."' order by start desc " ;
$db->query($sql)->execute() ;
$ff = $db->query($sql)->fetch();


 echo '<url>' . PHP_EOL;
 echo '<loc>'.MAIN_DOMAIN. $f['provincie_url'] .'/</loc>' . PHP_EOL;
 echo '<lastmod>'.date('c', strtotime($ff[0]["start"])) .'</lastmod>' . PHP_EOL;
 echo '<changefreq>daily</changefreq>' . PHP_EOL;
 echo '</url>' . PHP_EOL;
 
}	
 


 
$sql = "SELECT distinct(plaats), provincie_url, plaats_url, start FROM places  where start < '".$nu."'  GROUP BY plaats order by plaats ASC " ;
$db->query($sql)->execute() ;
$fplaats = $db->query($sql)->fetch();

foreach(($fplaats ? $fplaats : array()) as $f) {
 
 echo '<url>' . PHP_EOL;
 echo '<loc>'.MAIN_DOMAIN. $f["provincie_url"] .'/'. $f["plaats_url"] .'/</loc>' . PHP_EOL;
 echo '<lastmod>'.date('c', strtotime($f["start"])) .'</lastmod>' . PHP_EOL;
       
 echo '<changefreq>weekly</changefreq>' . PHP_EOL;
 echo '</url>' . PHP_EOL;
 
}	

echo '</urlset>' . PHP_EOL;

?>
