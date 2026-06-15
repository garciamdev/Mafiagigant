<?php


require_once ('apiconfig.php');


$access = $_GET['accesskey'];
if($accesskey != $access){
	echo 'false';
	exit;
}

$action = $_GET['action'];
$post = $_POST['post'];

if($action == 'GET'){


}



if($action == 'sync'){

//$test = htmlspecialchars(utf8_decode($post));
//echo $post.">>><<<<Br />";
	$post = json_decode($post, true);
	
	
	$lines = explode(",", $post['tags']);


	// Elk artikel in de database importeren
	foreach ($lines as $line) {
    			
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
					
						
			$sql = "SELECT id FROM pages  where url = '".$db->escape($url)."' and type = 'tags' limit 1 ";
			$db->query($sql)->execute() ;
			$api = $db->query($sql)->fetch();
			$count = $db->affected_rows;
 
					
			$title = $title;
			$content = "<h1>Tag: ".$title."</h1> {taglist}";
			
			$addinfo = array(
				'type' => 'tags',
				'url' => $db->escape($url),
				'title' => $db->escape($title),
				'content' => $db->escape($content),
				'start' => $db->escape($post['publish']),
				'category' => '',
				'tags' => '',
				'hash' => '',
			);
		
			if($count == 0 ){  

				$addinfo = $db->insert('pages', $addinfo); 

			}else{
        
      			$where = array('url' => $db->escape($url), 'type' => 'tags' );
				$addinfo = $db->where($where)->update('pages', $addinfo); 
		
			}
			
		}
					
					
    	
	}
	
	
	$sql = "SELECT id FROM pages  where url = '".$db->escape($post['url'])."' and hash = '".$db->escape($post['hash'])."' limit 1 ";
	$db->query($sql)->execute() ;
	$api = $db->query($sql)->fetch();
	$count = $db->affected_rows;







		$addinfo = array(
			'type' => $db->escape($post['type']),
			'status' => $db->escape($post['status']),
			'url' => $db->escape($post['url']),
			'title' => $db->escape($post['title']),
			'meta' => $db->escape($post['meta']),
			'content' => $db->escape($post['content']),
			'start' => $db->escape($post['publish']),
			'category' => $db->escape($post['category']),
			'menu' => $db->escape($post['menu']),
			'tags' => $db->escape($post['tags']),
			'hash' => $db->escape($post['hash']),
		);
		
		
	if($count == 0 ){  
	
		$addinfo = $db->insert('pages', $addinfo); 

	}else{
        
        $where = array('url' => $db->escape($post['url']), 'hash' => $db->escape($post['hash']) );
		$addinfo = $db->where($where)->update('pages', $addinfo); 
		
	}
		if($addinfo){
		
			$return = "success";
		}else{
		
			$return = "false";
		}
	
	
	
	
$return = json_encode($return);
print_r($return);
}





if($action == 'nohash'){


	 
	$post = json_decode($post, true);
	//print_r($post);    
	
	$lines = explode(",", $post['tags']);


	// Elk artikel in de database importeren
	foreach ($lines as $line) {
    			
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
					
						
			$sql = "SELECT id FROM pages  where url = '".$db->escape($url)."' and type = 'tags' limit 1 ";
			$db->query($sql)->execute() ;
			$api = $db->query($sql)->fetch();
			$count = $db->affected_rows;
 
					
			$title = $title;
			$content = "<h1>Tag: ".$title."</h1> {taglist}";
			
			$addinfo = array(
				'type' => 'tags',
				'url' => $db->escape($url),
				'title' => $db->escape($title),
				'content' => $db->escape($content),
				'start' => $db->escape($post['publish']),
				'category' => '',
				'tags' => '',
				'hash' => '',
			);
		
			if($count == 0 ){  

				$addinfo = $db->insert('pages', $addinfo); 

			}else{
        
      			$where = array('url' => $db->escape($url), 'type' => 'tags' );
				$addinfo = $db->where($where)->update('pages', $addinfo); 
		
			}
			
		}
					
					
    	
	}
	
	
	$sql = "SELECT id FROM pages  where url = '".$db->escape($post['url'])."'  limit 1 ";
	$db->query($sql)->execute() ;
	$api = $db->query($sql)->fetch();
	$count = $db->affected_rows;







		$addinfo = array(
			'type' => $db->escape($post['type']),
			'status' => $db->escape($post['status']),
			'url' => $db->escape($post['url']),
			'title' => $db->escape($post['title']),
			'meta' => $db->escape($post['meta']),
			'content' => $db->escape($post['content']),
			'start' => $db->escape($post['publish']),
			'category' => $db->escape($post['category']),
			'menu' => $db->escape($post['menu']),
			'tags' => $db->escape($post['tags']),
			'hash' => $db->escape($post['hash']),
		);
		
		
	if($count == 0 ){  
	
		$addinfo = $db->insert('pages', $addinfo); 

	}else{
        
        $where = array('url' => $db->escape($post['url']) );
		$addinfo = $db->where($where)->update('pages', $addinfo); 
		
	}
		if($addinfo){
		
			$return = "success";
		}else{
		
			$return = "false";
		}
	
	
	
	
$return = json_encode($return);
print_r($return);
}




