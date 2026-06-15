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

	$post = json_decode($post, true);


	
	  	$sql = "SELECT id, title FROM np_portal_pages_categories where portal_pages_id = '".$db->escape($post['cat'])."'" ;
		$db->query($sql)->execute() ;
		$f = $db->query($sql)->fetch();

		foreach (($f ? $f : array()) as $site){ 



			$pages[$site['title']]['data'] = array("id" => isset($site['id']) ? $site['id'] : '', "title" => isset($site['title']) ? $site['title'] : '', );
			
 
 
  			$sql = "SELECT * FROM np_portal_pages_links where portal_pages_categories_id = '".$site['id']."' " ;
			$db->query($sql)->execute() ;
			$ff = $db->query($sql)->fetch();
		
			foreach (($ff ? $ff : array()) as $s){ 

				$pages[$site['title']]['links'][] = array( "id" => $site['id'], "titel" => $s['link_title'] );
			}




		}



//echo $links;


//print_r($links);

$links = json_encode($pages);
print_r($links);

}



if($action == 'INSERTCAT'){


	
	$post = json_decode($post, true);
	$sql = "SELECT id FROM np_portal_pages_categories  where portal_pages_id = '".$db->escape($post['id'])."' and category_url = '".$db->escape($post['url'])."'  limit 1 ";
	$db->query($sql)->execute() ;
	$api = $db->query($sql)->fetch();
	$count = $db->affected_rows;

	if($count == 0 and $post['title'] != '' and $post['id'] != ''){  

		$addinfo = array(
			'category_url' => $db->escape($post['url']),
			'portal_pages_id' => $db->escape($post['id']),
			'title' => $db->escape($post['title']),
		);
		$addinfo = $db->insert('np_portal_pages_categories', $addinfo); 
		

	$count = $db->error;
	
	
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



if($action == 'AUTOCREATECATS'){

	
	$post = json_decode($post, true);
	$sql = "SELECT id FROM np_portal_pages  where url = '".$db->escape($post['page'])."'  limit 1 ";
	$db->query($sql)->execute() ;
	$api = $db->query($sql)->fetch();
	$count = $db->affected_rows;
	
	
	$sql = "SELECT id FROM np_portal_pages_categories  where portal_pages_id = '".$db->escape($api[0]['id'])."' and title = '".$db->escape($post['title'])."'  limit 1 ";
	$db->query($sql)->execute() ;
	$f = $db->query($sql)->fetch();
	$count1 = $db->affected_rows;
	
	

	if($count == 1 and $count1 == 0 and  $post['title'] != '' ){  

		$addinfo = array(
			'category_url' => $db->escape($post['url']),
			'portal_pages_id' => $db->escape($api[0]['id']),
			'title' => $db->escape($post['title']),
		);
		$addinfo = $db->insert('np_portal_pages_categories', $addinfo); 
		

	$count = $db->error;
	
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





if($action == 'INSERTLINK'){


	
	$post = json_decode($post, true);
echo $post['url'];
	$sql = "SELECT id FROM np_portal_pages_categories  where portal_pages_id = '".$db->escape($post['id'])."' and category_url = '".$db->escape($post['category'])."'  limit 1 ";
	$db->query($sql)->execute() ;
	$api = $db->query($sql)->fetch();
	$count = $db->affected_rows;

if($count == 0 ){
		$addinfo = array(
			'category_url' => $db->escape($post['category']),
			'portal_pages_id' => $db->escape($post['id']),
			'title' => $db->escape($post['category']),
		);
		$addinfo = $db->insert('np_portal_pages_categories', $addinfo); 
		


		$sql = "SELECT id FROM np_portal_pages_categories  where portal_pages_id = '".$db->escape($post['id'])."' ";
		$db->query($sql)->execute() ;
		$count = $db->affected_rows;
	
	
		//$cats = $count  + 1;
		
		$data = array(
			'num_categories' => $count,
		);
		$where = array( 'id' => $db->escape($post['id'])		);
		$db->where($where)->update('np_portal_pages', $data); 


}


	if($post['title'] != '' and $post['id'] != '' and $post['title'] != '' and $post['url'] != ''){  


	$sql = "SELECT id FROM np_portal_pages_categories  where portal_pages_id = '".$db->escape($post['id'])."' and category_url = '".$db->escape($post['category'])."'  limit 1 ";
	$db->query($sql)->execute() ;
	$api = $db->query($sql)->fetch();
	
	
		$addinfo = array(
			'portal_pages_categories_id' => $db->escape($api[0]['id']),
			'link_title' => $db->escape($post['title']),
			'link_url' => $db->escape($post['url']),
		);
		$addinfo = $db->insert('np_portal_pages_links', $addinfo); 
		

	$error = $db->query($sql)->error;
	
	
	
	
	$sql = "SELECT id FROM np_portal_pages_categories  where portal_pages_id = '".$db->escape($post['id'])."' ";
	$db->query($sql)->execute() ;
	$catids = $db->query($sql)->fetch();
	
	//print_r($catids);
	 foreach($catids as $key => $value){
	 	$ids[] = $value['id'];
	 }
	
		$sql = "SELECT id FROM np_portal_pages_links  where portal_pages_categories_id IN (" . implode(',', array_map('intval', $ids)) . ") ";
		$db->query($sql)->execute() ;
		$count = $db->affected_rows;
	
		
		$data = array(
			'num_links' => $count,
		);
		$where = array( 'id' => $db->escape($post['id'])		);
		$db->where($where)->update('np_portal_pages', $data); 



		if($addinfo){
		
			$return = "success";
			

		}else{
		
			$return = "false";
		}

	}else{
		$return = $error;
	}
	
	
	
	
	
$return = json_encode($return);
print_r($return);
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
		
	$count = $db->error;
	
		print_r($db->error);
		if($db->error){
		
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
