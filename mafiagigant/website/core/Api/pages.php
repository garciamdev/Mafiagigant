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
	$sql = "SELECT url,title,num_categories,num_links, id FROM np_portal_pages " ;
	$db->query($sql)->execute() ;
	$f = $db->query($sql)->fetch();

	foreach (($f ? $f : array()) as $site){ 


			$pages[$site[title]][] = array("id" => $site['id'], "url" => $site['url'], "title" => $site['title'],
			"cats" => $site['num_categories'],  "links" => $site['num_links']
			);
			
 

	}

$pages = json_encode($pages);
print_r($pages);

}



if($action == 'INSERT'){


	
	$post = json_decode($post, true);
	$sql = "SELECT id FROM np_portal_pages  where url = '".$db->escape($post['url'])."' limit 1 ";
	$db->query($sql)->execute() ;
	$api = $db->query($sql)->fetch();
	$count = $db->affected_rows;

	if($count == 0 and $post['title'] != '' and $post['url'] != ''){  

		$addinfo = array(
			'url' => $db->escape($post['url']),
			'title' => $db->escape($post['title']),
			'keywords' => $db->escape($post['keywords']),
			'description' => $db->escape($post['description']),
		);
		$addinfo = $db->insert('np_portal_pages', $addinfo); 
		
		if($addinfo){
		
			$return = "success";
		}else{
		
			$return = "false";
		}

	}else{
		$return = "false";
	}
	
	
	
	
	
$return = json_encode($return);
print_r($return);
}



if($action == 'AUTOCREATEPAGE'){


	
	$post = json_decode($post, true);

	$sql = "SELECT id FROM np_portal_pages  where url = '".$db->escape($post['url'])."' limit 1 ";
	$db->query($sql)->execute() ;
	$api = $db->query($sql)->fetch();
	$count = $db->affected_rows;

	if($count == 0 and $post['title'] != '' and $post['url'] != ''){  

		$addinfo = array(
			'url' => $db->escape($post['url']),
			'title' => $db->escape($post['title']),
			'keywords' => $db->escape($post['keywords']),
			'description' => $db->escape($post['description']),
		);
		$addinfo = $db->insert('np_portal_pages', $addinfo); 
		
		if($addinfo){
		
			$return = "success";
		}else{
		
			$return = "false";
		}

	}else{
		$return = "exist";
	}
	
	
	
	
	
$return = json_encode($return);
print_r($return);
}



if($action == 'SYNCPAGES'){
	$sql = "SELECT url,title,num_categories,num_links,add_new_categories, id FROM np_portal_pages " ;
	$db->query($sql)->execute() ;
	$f = $db->query($sql)->fetch();

	foreach (($f ? $f : array()) as $site){ 


			$pages[] = array("id" => $site['id'], "url" => $site['url'], "title" => $site['title'],
			"cats" => $site['num_categories'],  "links" => $site['num_links'], "addcats" => $site['add_new_categories']
			);
			
 

	}

$pages = json_encode($pages);
print_r($pages);

}


