<?php
$page = 'index';
require_once ('../../../loader.php');


$nu = date("Y-m-d H:i:s");
$start = date("Y-m-d 00:00:00", strtotime( $nu . ' +1 day'));
$end = date("Y-m-d 00:00:00", strtotime( $nu . ' +0 day'));




$gemeentelist = '';
if(empty($var1) and empty($var2)){
	$url = '/';
	$nav = 'nee';
	
	$var1tekst = $var1;
	$var2tekst = $var2;

}
if(!empty($var1) and empty($var2)){
	$url = '/'.$var1.'/';
	$nav = 'ja';
	
	
	
	$sql = "SELECT * FROM places  where provincie_url = '".$var1."'  limit 1" ;
	$db->query($sql)->execute() ;
	$provincietekst = $db->query($sql)->fetch(); 
	$var1tekst = isset($provincietekst[0]['provincie']) ? $provincietekst[0]['provincie'] : $var1;
	$var2tekst = $var2;
	
	
$sql = "SELECT distinct(gemeente), provincie, plaats, plaats_url FROM places  where provincie_url = '".$db->escape($var1)."' and start <= '".$nu."'  order by gemeente ASC " ;
$db->query($sql)->execute() ;
$count = $db->affected_rows;
if($count == 0){
$sql = "SELECT distinct(gemeente), provincie, plaats, plaats_url FROM places  where start <= '".$nu."'  order by gemeente ASC " ;
$db->query($sql)->execute() ;
		
}
if($count != 0){
$fgemeente = $db->query($sql)->fetch();


$gemeentelist = '<div class="row py-5" data-masonry=';
$gemeentelist .= "'{";
$gemeentelist .= '"percentPosition": true }';
$gemeentelist .="'>";	

//$gemeentelist = '<div class="row py-5" data-masonry="{"percentPosition": true }" >	';
//$gemeentelist = '';
$old_title = '';

foreach(($fgemeente ? $fgemeente : array()) as $f) {

	$new_title = isset($f['gemeente']) ? $f['gemeente'] : ''; 
	
	if($old_title != '' and $old_title != $new_title){
		$gemeentelist .=" </ul>";
   		$gemeentelist .=" </div>";
	}
	if($new_title != $old_title){
   		$gemeentelist .="<div class='col-sm-6 col-lg-4 mb-4'>";
		$gemeentelist .="<ul class='list-group'>";
  		$gemeentelist .="<li class='list-group-item title'>Gemeente ".$new_title."</li>";
	 } 
	
	$gemeentelist .="<li class='list-group-item'><a href='/".$var1."/".$f['plaats_url']."/'>".$f['plaats']."</a></li>";

	$old_title = $new_title;
}	
	
	$gemeentelist .= "</div>";
	$gemeentelist .= "</div>";
	//$gemeentelist .= "<script src='https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js' integrity='sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D' crossorigin='anonymous' async></script>";
	$gemeentelist .= '<script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async=""></script>';
	 
}
}
	
if(!empty($var1) and !empty($var2)){
	$url = '/'.$var1.'/'.$var2.'/';
	$nav = 'ja';
	
	
	$sql = "SELECT * FROM places  where provincie_url = '".$var1."'  limit 1" ;
	$db->query($sql)->execute() ;
	$provincietekst = $db->query($sql)->fetch(); 
	
$sql = "SELECT * FROM places  where plaats_url = '".$var2."' limit 1" ;
$db->query($sql)->execute() ;
$plaatstekst = $db->query($sql)->fetch(); 

	$var1tekst = isset($provincietekst[0]['provincie']) ? $provincietekst[0]['provincie'] : $var1;
	$var2tekst = isset($plaatstekst[0]['plaats']) ? $plaatstekst[0]['plaats'] : $var2;
	
	
	
}

$pageinfo = getpage($url,$var1,$var2);
//print_r($pageinfo);
 

 
if(!empty($pageinfo)){
$content = $pageinfo[0]['content'];
$sitetitle = $pageinfo[0]['title'];


}else{
       header("Location: ".BASE_URL."");
        exit(); 
}



$htmltitle = $pageinfo[0]['title'];
$htmltitle = str_replace('{var1}', $var1tekst, $htmltitle);
$htmltitle = str_replace('{var2}', $var2tekst, $htmltitle);

$htmlmeta = $pageinfo[0]['meta'];
$htmlmeta = str_replace('{var1}', $var1tekst, $htmlmeta);
$htmlmeta = str_replace('{var2}', $var2tekst, $htmlmeta);


$content = $pageinfo[0]['content'];
$content = str_replace('{var1}', $var1tekst, $content);
$content = str_replace('{var2}', $var2tekst, $content);



$sitetitle = $pageinfo[0]['title'];
$sitetitle = str_replace('{var1}', $var1tekst, $sitetitle);
$sitetitle = str_replace('{var2}', $var2tekst, $sitetitle);
 
 
 
 
 
$sql = "SELECT distinct(provincie), provincie_url FROM places  where start <= '".$nu."'  order by provincie ASC " ;
$db->query($sql)->execute() ;
$fprovincie = $db->query($sql)->fetch();

$provincielist = '';
foreach(($fprovincie ? $fprovincie : array()) as $f) {
	$provincielist .= "<li><a href='/".$f['provincie_url']."/'>".$f['provincie']."</a></li>";
}	
 


$sql = "SELECT distinct(plaats) , provincie FROM places  where start <= '".$nu."'  order by plaats ASC " ;
$db->query($sql)->execute() ;
$fplaats = $db->query($sql)->fetch();


$sql = "SELECT distinct(plaats)  ,plaats_url, provincie_url,  provincie FROM places  where start <= '".$nu."'  order by inwoners desc limit 10" ;
$db->query($sql)->execute() ;
$fplaatstop10 = $db->query($sql)->fetch();
 
$plaatstop10 = '';
foreach(($fplaatstop10 ? $fplaatstop10 : array()) as $f) {
	$plaatstop10 .= "<li><a href='/".$f['provincie_url']."/".$f['plaats_url']."/'>".$f['plaats']."</a></li>";
}



$content = str_replace('{provincielist}', $provincielist, $content);
$content = str_replace('{plaatstop10}', $plaatstop10, $content);
$content = str_replace('{gemeentelist}', $gemeentelist, $content);



$sql = "SELECT * FROM pages  where type = 'blog' and start <= '".$nu."'  order by start desc limit 5" ;
$db->query($sql)->execute() ;
$flast5blogs = $db->query($sql)->fetch();
 
$last5blogs = '';
foreach(($flast5blogs ? $flast5blogs : array()) as $f) {
	$last5blogs .= "<li><a href='".$f['url']."/'>".$f['title']."</a></li>";
}
$content = str_replace('{last5blogs}', $last5blogs, $content);




$sql = "SELECT * FROM pages  where category = '".$var1."' and start <= '".$nu."'  order by start desc" ;
$db->query($sql)->execute() ;
$fcatlist = $db->query($sql)->fetch();
 
$catlist = '';
foreach(($fcatlist ? $fcatlist : array()) as $f) {


             $catlist .='       <article id="post-88" class="clearfix rtp-post-box post-88 post type-post status-publish format-standard hentry category-wortel-informatie">';

                        $catlist .='       <header class="post-header "> ';

                           $catlist .='        <h2 class="post-title entry-title"> ';
                         $catlist .="          <a href='".$f['url']."'>".$f['title']."</a>";
                         $catlist .='       </h2> ';

                         $catlist .='       <div class="clearfix post-meta post-meta-top"></div> ';
               
                       $catlist .='     </header> ';

                                $catlist .='   <div class="post-content"> ';
                                if(isset($f['img'])){
                                $catlist .="   <img loading='lazy' class='alignleft size-full wp-image-40' src='".$f['img']."' alt='".$f['title']."' width='250' srcset='".$f['img']." 560w, ".$f['img']." 300w' sizes='(max-width: 250px) 100vw, 25px'> ";
								}
                                   $catlist .="   <p>".strip_tags(limit_text($f['content'], 100))."</p>";
                                  $catlist .="    <a role='link' class='rtp-readmore' title='Lees verder' href='".$f['url']."' >Lees verder →</a>";
                              $catlist .='     </div>';
                       
                         $catlist .='      </article>';
                    
                    
                    
	//$last5blogs .= "<li><a href='".$f['url']."/'>".$f['title']."</a></li>";
}
$content = str_replace('{catlist}', $catlist, $content);




$theme = 'link';
require_once ('../../../themes/loader.php');

function getpage($url,$var1,$var2){
global $db;




$sql = "SELECT * FROM pages where url = '".$url."'  " ;
$db->query($sql)->execute() ;
$count = $db->affected_rows;
if($count != 1){


	if(empty($var1) and empty($var2)){
	$url = '/';

	}
	if(!empty($var1) and empty($var2)){
		$sql = "SELECT * FROM dynamic where url = '/".$var1."/'  " ;
		$db->query($sql)->execute() ;
		$count = $db->affected_rows;
		if($count != 1){
			$sql = "SELECT * FROM dynamic where url = '/{var1}/'  " ;
			$db->query($sql)->execute() ;
		}
	}
	
	if(!empty($var1) and !empty($var2)){
		$sql = "SELECT * FROM dynamic where url = '/".$var1."/{var2}/'  " ;
		$db->query($sql)->execute() ;
		$count = $db->affected_rows;
		if($count != 1){
			$sql = "SELECT * FROM dynamic where url = '/{var1}/{var2}/'  " ;
			$db->query($sql)->execute() ;
		}
	}

	 
}
$count = $db->affected_rows;
if($count == 0){

       header("Location: ".BASE_URL."404/");
        exit(); 
}

$pageinfo =$db->query($sql)->fetch();

return $pageinfo;

}

 
 
 function limit_text($text, $limit) {
    if (str_word_count($text, 0) > $limit) {
        $words = str_word_count($text, 2);
        $pos   = array_keys($words);
        $text  = substr($text, 0, $pos[$limit]) . '...';
    }
    return $text;
}
