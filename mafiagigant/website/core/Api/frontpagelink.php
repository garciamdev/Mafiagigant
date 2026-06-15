<?php


require_once ('apiconfig.php');


$access = $_GET['accesskey'];
if($accesskey != $access){
	echo 'false';
	exit;
}

$action = $_GET['action'];
$post = $_POST['post'];







if($action == 'ADD'){
	$post = json_decode($post, true);
//echo $post['link_url'];


	if($post['link_title'] != ''  and $post['link_url'] != ''){  


	$sql = "SELECT id FROM lb_frontpage_links  where user_id = '".$db->escape($post['user_id'])."' and hash = '".$db->escape($post['hash'])."'  limit 1 ";
	$db->query($sql)->execute() ;
	$api = $db->query($sql)->fetch();
	$count = $db->affected_rows;

if($count == 0 ){
		$addinfo = array(
			'link_title' => $db->escape($post['link_title']),
			'link_url' => $db->escape($post['link_url']),
			'category' => $db->escape($post['category']),
			'follow' => $db->escape($post['follow']),
			'newtab' => $db->escape($post['newtab']),
			'start' => $db->escape($post['start']),
			'end' => $db->escape($post['end']),
			'user_id' => $db->escape($post['user_id']),
			'hash' => $db->escape($post['hash'])
		);
		$addinfo = $db->insert('lb_frontpage_links', $addinfo); 
		
}else{

		
		$data = array(
			'link_title' => $db->escape($post['link_title']),
			'link_url' => $db->escape($post['link_url']),
			'category' => $db->escape($post['category']),
			'follow' => $db->escape($post['follow']),
			'newtab' => $db->escape($post['newtab']),
			'start' => $db->escape($post['start']),
			'end' => $db->escape($post['end']),
		);
		$where = array( 'hash' => $db->escape($post['hash']) ,  'user_id' => $db->escape($post['user_id'] )		);
		$db->where($where)->update('lb_frontpage_links', $data); 




}


			$return = "success";






	}else{
		$return = "false";
	}
	
	

	
	
	$return = json_encode($return);
print_r($return);
}



