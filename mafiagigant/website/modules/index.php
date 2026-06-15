<?php
$page = 'index';
require_once ('../../../loader.php');


$nu = date("Y-m-d H:i:s");
$start = date("Y-m-d 00:00:00", strtotime( $nu . ' +1 day'));
$end = date("Y-m-d 00:00:00", strtotime( $nu . ' +0 day'));


$tagcloud = '';
$homepagetags = '';
$gemeentelist = '';
$type  = '';
if(empty($var1) and empty($var2)){
	$url = '/';
	$nav = 'nee';
	
	$var1tekst = $var1;
	$var2tekst = $var2;



$sql = "SELECT * FROM pages where tags != '' and status = 'published'  and start <= '".$nu."' order by rand() desc limit 5 " ;
$db->query($sql)->execute() ;
$hometags = $db->query($sql)->fetch();
 
$tagshomepage = array();
$sizes = array("10px", "12px", "14px", "16px", "18px", "20px", "22px", "24px");

foreach(($hometags ? $hometags : array()) as $f) {



	$taglines = explode(",", $f['tags']);

	foreach ($taglines as $line) {
    			
		$tekst = str_replace(",","", $line);
		$tekst = str_replace("	","", $tekst);
		$tekst = str_replace(" ","", $tekst);
		$urltag = $tekst;
		$tekst = str_replace("/","", $tekst);
		//$url = $tekst;
		$title = ucfirst(str_replace("-"," ", $tekst));
		$urltag = !empty($urltag) ? $urltag : '';
		if($urltag != ''){  
		
    		$size = $sizes[array_rand($sizes)];
    		$tagshomepage[] = "<a href='".$urltag."' style='font-size: ".$size."'>".$title."</a> ";
		}
		
	}

	

}

	shuffle($tagshomepage);
	$homepagetags = '';
	foreach ($tagshomepage as $line) {
    		$homepagetags .= $line;

	}









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
$type = isset($pageinfo[0]['type']) ? $pageinfo[0]['type'] : '';
$tags = isset($pageinfo[0]['tags']) ? $pageinfo[0]['tags'] : '';
$sidebar = isset($pageinfo[0]['menu']) ? $pageinfo[0]['menu'] : '';


}else{
       header("Location: ".BASE_URL."");
        exit(); 
}



$htmltitle = $pageinfo[0]['title'];
$htmltitle = str_replace('{var1}', $var1tekst, $htmltitle);
$htmltitle = str_replace('{var2}', $var2tekst, $htmltitle);
$htmltitle = str_replace('{sitenaam}', $setting['site_title'], $htmltitle);

$htmlmeta = $pageinfo[0]['meta'];
$htmlmeta = str_replace('{var1}', $var1tekst, $htmlmeta);
$htmlmeta = str_replace('{var2}', $var2tekst, $htmlmeta);
$htmlmeta = str_replace('{sitenaam}', $setting['site_title'], $htmlmeta);


$content = $pageinfo[0]['content'];
$content = str_replace('{var1}', $var1tekst, $content);
$content = str_replace('{var2}', $var2tekst, $content);
$content = str_replace('{sitenaam}', $setting['site_title'], $content);
$content = str_replace('{contactsite}', $setting['contact_site'], $content);
$content = str_replace('{contacturl}', $setting['contact_url'], $content);



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



$sql = "SELECT * FROM pages  where type = 'blog' and start <= '".$nu."' and status = 'published' order by start desc limit 5" ;
$db->query($sql)->execute() ;
$flast5blogs = $db->query($sql)->fetch();
 
$last5blogs = '';
foreach(($flast5blogs ? $flast5blogs : array()) as $f) {
	$last5blogs .= "<li><a href='".$f['url']."'>".$f['title']."</a></li>";
}
$content = str_replace('{last5blogs}', $last5blogs, $content);



if($type =='category'){
$catcontent = loadcategory($var1,$var2,'10');  
$content = str_replace('{catlist}', $catcontent, $content);
}

if($type =='tags'){
$tagcontent = loadtags($var1,$var2,'10');  
$content = str_replace('{taglist}', $tagcontent, $content);
}



$sizes = array("10px", "12px", "14px", "16px", "18px", "20px", "22px", "24px");


	$taglines = explode(",", $tags);

	$tagsarr = array();
	// Elk artikel in de database importeren
	foreach ($taglines as $line) {
    			
		$tekst = str_replace(",","", $line);
		$tekst = str_replace("	","", $tekst);
		$tekst = str_replace(" ","", $tekst);
		$url = $tekst;
		$tekst = str_replace("/","", $tekst);
		//$url = $tekst;
		$title = ucfirst(str_replace("-"," ", $tekst));
		$url = !empty($url) ? $url : '';
		if($url != ''){  
		
		//echo"$tekst > $url >  $title <br />";
					
    		$size = $sizes[array_rand($sizes)];
    		$tagcloud .= "<a href='".$url."' style='font-size: ".$size."'>".$title."</a> ";
    		$tagsarr[] = "<a href='".$url."' style='font-size: ".$size."'>".$title."</a> ";
		}
		
	}


	shuffle($tagsarr);
	$tagcloud = '';
	foreach ($tagsarr as $line) {
    		$tagcloud .= $line;

	}

//echo $last5blogs;



 


$content = str_replace('{homepagetags}', $homepagetags, $content);













//echo $sidebar;

if(isset($menu[$sidebar])){
	$sidebar = $menu[$sidebar];
}elseif(isset($menu['sidebar'])){
	$sidebar = $menu['sidebar'];
}else{
	$sidebar = '';
}







//echo "1> $sidebar <br/ >";
$sidebar = str_replace('{last5blogs}', '<div class="p-4"><h4 class="fst-italic">Laatste berichten</h4><ol class="list-unstyled mb-0">'.$last5blogs.'</ol></div>', $sidebar);
//echo "2> $last5blogs > $sidebar <br/ >";
$sidebar = str_replace('{tags}', '<div class="p-4"><h4 class="fst-italic">Tags</h4><ol class="list-unstyled mb-0">'.$tagcloud.'</ol></div>', $sidebar);
//echo "3> $tagcloud > $sidebar <br/ >";

//exit;
$theme = 'naturel';
require_once ('../../../themes/loader.php');

function getpage($url,$var1,$var2){
global $db;





$sql = "SELECT * FROM pages where url = '".$url."' and status = 'published' order by id desc limit 1 " ;
$db->query($sql)->execute() ;
$count = $db->affected_rows;
if($count != 1){



		$sql = "SELECT * FROM pages where url LIKE '%".$var1."%' and type = 'category'  order by id desc limit 1 " ;
		$db->query($sql)->execute() ;
		$category = $db->affected_rows;
		
		$sql = "SELECT * FROM pages where url LIKE '%".$var1."%' and type = 'tags'  order by id desc limit 1 " ;
		$db->query($sql)->execute() ;
		$tags = $db->affected_rows;
		

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



		if($tags == 1){
		
			$sql = "SELECT * FROM pages where url LIKE '%".$var1."%'  and type = 'tags'  order by id desc  limit 1 " ;
			$db->query($sql)->execute() ;
			
		}
		
		if($category == 1){
		
			$sql = "SELECT * FROM pages where url LIKE '%".$var1."%'  and type = 'category'  order by id desc  limit 1 " ;
			$db->query($sql)->execute() ;
			
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


function loadcategory($var1,$var2,$total_records_per_page){

global $db;
global $nu;


   if (isset($var2) && $var2 !="") {
    	$page_no = $var2;
    } else {
        $page_no = 1;
     } 

$offset = ($page_no-1) * $total_records_per_page;
$previous_page = $page_no - 1;
$next_page = $page_no + 1;
$adjacents = "2";


$sql = "SELECT * FROM pages  where category LIKE '%".$var1."%'  and start <= '".$nu."' and type = 'blog'  and status = 'published' order by start desc" ;
if($var1 == 'blog'){
$sql = "SELECT * FROM pages  where  start <= '".$nu."' and type = 'blog'  and status = 'published' order by start desc" ;

}

$db->query($sql)->execute() ;


		$totalincategory = $db->affected_rows;
		$total_no_of_pages = ceil($totalincategory / $total_records_per_page);
$second_last = $total_no_of_pages - 1; // total pages minus 1
		
		
		
$catlist = '';
		if($totalincategory > 0){
			$sql = "SELECT * FROM pages where category LIKE '%".$var1."%' and start <= '".$nu."'  and type = 'blog' and status = 'published' order by start desc LIMIT ". $offset .", ". $total_records_per_page."  " ;
			if($var1 == 'blog'){
			$sql = "SELECT * FROM pages where start <= '".$nu."'  and type = 'blog' and status = 'published' order by start desc LIMIT ". $offset .", ". $total_records_per_page."  " ;
			}
$db->query($sql)->execute() ;
			
			
$fcatlist = $db->query($sql)->fetch();
 
$catlist = '';
foreach(($fcatlist ? $fcatlist : array()) as $f) {


             $catlist .='       <article>';

                        $catlist .='       <header class="post-header "> ';

                           $catlist .='        <h2 class="post-title entry-title"> ';
                         $catlist .="          <a href='".$f['url']."'>".$f['title']."</a>";
                         $catlist .='       </h2> ';

                         $catlist .='       <div class="clearfix post-meta post-meta-top"></div> ';
               
                       $catlist .='     </header> ';

                                $catlist .='   <div class="post-content"> ';
                                      if(isset($f['img'])){
                                $catlist .="   <img loading='lazy' class='alignleft size-full' src='".$f['img']."' alt='".$f['title']."' width='250' srcset='".$f['img']." 560w, ".$f['img']." 300w' sizes='(max-width: 250px) 100vw, 25px'> ";
								}
                                   $catlist .="   <p>".strip_tags(limit_text($f['content'], 100))."</p>";
                                  $catlist .="    <a role='link' class='readmore' title='Lees verder' href='".$f['url']."' >Lees verder →</a>";
                              $catlist .='     </div>';
                       
                         $catlist .='      </article>';
                    
                    
                    
}









$catlist .= pagination($var1,$var2,$totalincategory,$total_records_per_page );






}


return $catlist;
}






function loadtags($var1,$var2,$total_records_per_page){

global $db;
global $nu;


   if (isset($var2) && $var2 !="") {
    	$page_no = $var2;
    } else {
        $page_no = 1;
     } 

$offset = ($page_no-1) * $total_records_per_page;
$previous_page = $page_no - 1;
$next_page = $page_no + 1;
$adjacents = "2";


$sql = "SELECT * FROM pages  where tags LIKE '%".$var1."%' and start <= '".$nu."' and type = 'blog' and status = 'published' order by start desc" ;
$db->query($sql)->execute() ;


		$totalincategory = $db->affected_rows;
		$total_no_of_pages = ceil($totalincategory / $total_records_per_page);
$second_last = $total_no_of_pages - 1; // total pages minus 1
		
		
		
$catlist = '';
		if($totalincategory > 0){
			$sql = "SELECT * FROM pages where tags LIKE '%".$var1."%' and start <= '".$nu."'  and type = 'blog'  and status = 'published' order by start desc LIMIT ". $offset .", ". $total_records_per_page."  " ;
			$db->query($sql)->execute() ;
			
			
$fcatlist = $db->query($sql)->fetch();
 
$catlist = '';
foreach(($fcatlist ? $fcatlist : array()) as $f) {


             $catlist .='       <article>';

                        $catlist .='       <header class="post-header "> ';

                           $catlist .='        <h2 class="post-title entry-title"> ';
                         $catlist .="          <a href='".$f['url']."'>".$f['title']."</a>";
                         $catlist .='       </h2> ';

                         $catlist .='       <div class="clearfix post-meta post-meta-top"></div> ';
               
                       $catlist .='     </header> ';

                                $catlist .='   <div class="post-content"> ';
                                      if(isset($f['img'])){
                                $catlist .="   <img loading='lazy' class='alignleft size-full' src='".$f['img']."' alt='".$f['title']."' width='250' srcset='".$f['img']." 560w, ".$f['img']." 300w' sizes='(max-width: 250px) 100vw, 25px'> ";
								}
                                   $catlist .="   <p>".strip_tags(limit_text($f['content'], 100))."</p>";
                                  $catlist .="    <a role='link' class='rtp-readmore' title='Lees verder' href='".$f['url']."' >Lees verder →</a>";
                              $catlist .='     </div>';
                       
                         $catlist .='      </article>';
                    
                    
                    
}









$catlist .= pagination($var1,$var2,$totalincategory,$total_records_per_page );






}


return $catlist;
}




function pagination($var1,$var2,$totalpages,$total_records_per_page){
$pageniation = '';

   //$total_records_per_page = 2;
     
   if (isset($var2) && $var2 !="") {
    	$page_no = $var2;
    } else {
        $page_no = 1;
     }

$offset = ($page_no-1) * $total_records_per_page;
$previous_page = $page_no - 1;
$next_page = $page_no + 1;
$adjacents = "2";




		$total_no_of_pages = ceil($totalpages / $total_records_per_page);
$second_last = $total_no_of_pages - 1; // total pages minus 1
		


$pageniation .=' <ul class="pagination">';

	 // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } 
  
  	if($page_no <= 1){$class = "class='disabled page-item'"; }else{ $class = ""; }
	$pageniation .=" <li $class> ";
	if($page_no > 1){ $url = "href='/".$var1."/".$previous_page."/'"; }else{ $url = "";}
	$pageniation .=" <a  class='page-link' $url >Previous</a> ";
	$pageniation .=" </li>";
    
     
	if ($total_no_of_pages <= 10){  	 
		for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
			if ($counter == $page_no) {
		  $pageniation .= "<li   class='active page-item'><a class='page-link'>$counter</a></li>";	
				}else{
          $pageniation .= "<li class='page-item' ><a class='page-link' href='/".$var1."/".$counter."/'>$counter</a></li>";
				}
        }
	}
	elseif($total_no_of_pages > 10){
		
	if($page_no <= 4) {			
	 for ($counter = 1; $counter < 8; $counter++){		 
			if ($counter == $page_no) {
		   $pageniation .= "<li class='active page-item'><a>$counter</a></li>";	
				}else{
           $pageniation .= "<li  class='page-item' ><a class='page-link' href='/".$var1."/".$counter."/'>$counter</a></li>";
				}
        }
		$pageniation .= "<li  class='page-item' ><a>...</a></li>";
		$pageniation .= "<li  class='page-item' ><a class='page-link' href='/".$var1."/".$second_last."/'>$second_last</a></li>";
		$pageniation .= "<li  class='page-item' ><a class='page-link' href='/".$var1."/".$total_no_of_pages."/'>$total_no_of_pages</a></li>";
		}

	 elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {		 
		$pageniation .= "<li  class='page-item' ><a class='page-link' href='/".$var1."/1/'>1</a></li>";
		$pageniation .= "<li  class='page-item' ><a class='page-link' href='/".$var1."/2/'>2</a></li>";
        $pageniation .= "<li  class='page-item' ><a>...</a></li>";
        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {			
           if ($counter == $page_no) {
		   $pageniation .= "<li class='page-item active'><a>$counter</a></li>";	
				}else{
           $pageniation .= "<li  class='page-item' ><a class='page-link' href='/".$var1."/".$counter."/'>$counter</a></li>";
				}                  
       }
       $pageniation .= "<li  class='page-item' ><a>...</a></li>";
	   $pageniation .= "<li  class='page-item' ><a class='page-link' href='/".$var1."/".$second_last."/'>$second_last</a></li>";
	   $pageniation .= "<li  class='page-item' ><a class='page-link' href='/".$var1."/".$total_no_of_pages."/'>$total_no_of_pages</a></li>";      
            }
		
		else {
        $pageniation .= "<li  class='page-item' ><a class='page-link' href='/".$var1."/1/'>1</a></li>";
		$pageniation .= "<li  class='page-item' ><a class='page-link' href='/".$var1."/2/'>2</a></li>";
        $pageniation .= "<li  class='page-item' ><a>...</a></li>";

        for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
          if ($counter == $page_no) {
		   $pageniation .= "<li class='active page-item'><a class='page-link'>$counter</a></li>";	
				}else{
           $pageniation .= "<li  class='page-item' ><a class='page-link' href='/".$var1."/".$counter."/'>$counter</a></li>";
				}                   
                }
            }
	}
    
    
  	if($page_no >= $total_no_of_pages){$class = "class='disabled'"; }else{ $class = ""; }
	$pageniation .= "<li  $class>";
	
	if($page_no < $total_no_of_pages) { $url = "href='/".$var1."/".$next_page."/'"; }else{ $url = "";}
	$pageniation .= "<a class='page-link' $url >Next</a>";
	$pageniation .= "</li>";
   if($page_no < $total_no_of_pages){
		$pageniation .= "<li><a class='page-link' href='/".$var1."/".$total_no_of_pages."/'>Last &rsaquo;&rsaquo;</a></li>";
		} 
		

	$pageniation .=" </ul>";




return $pageniation;
}