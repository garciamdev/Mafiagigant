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


	 
	$post = json_decode($post, true);
	

	
	$sql = "SELECT id FROM menu  where title = '".$db->escape($post['title'])."' and hash = '".$db->escape($post['hash'])."' limit 1 ";
	$db->query($sql)->execute() ;
	$api = $db->query($sql)->fetch();
	$count = $db->affected_rows;
	
		$addinfo = array(
			'title' => $db->escape($post['title']),
			'content' => $db->escape($post['content']),
			'hash' => $db->escape($post['hash']),
		);
		
		
		
	
		
	if($count == 0 ){  

		$addinfo = $db->insert('menu', $addinfo); 

	}else{
        
        $where = array('title' => $db->escape($post['title']), 'hash' => $db->escape($post['hash']) );
		$addinfo = $db->where($where)->update('menu', $addinfo); 
		
	}
	
		if($addinfo){
		
			$return = "success";
		}else{
		
			$return = "false";
		}
	
	
	
	
$return = json_encode($return);
print_r($return);
}






