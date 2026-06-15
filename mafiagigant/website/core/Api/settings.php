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
	

	
	$sql = "SELECT id FROM settings  where name = '".$db->escape($post['name'])."' limit 1 ";
	$db->query($sql)->execute() ;
	$api = $db->query($sql)->fetch();
	$count = $db->affected_rows;





	if($post['name'] == 'adstxt'){
		$contents = $post['value'];
		$file = '../../../../ads.txt';
		file_put_contents($file, $contents);  
	}


		$addinfo = array(
			'name' => $db->escape($post['name']),
			'value' => $db->escape($post['value']),
			'type' => $db->escape($post['type']),
			'module' => '',
			'description' => $db->escape($post['description'])
		);
		
		
	if($count == 0 ){  
	
		$addinfo = $db->insert('settings', $addinfo); 

	}else{
        
        $where = array('name' => $db->escape($post['name']) );
		$addinfo = $db->where($where)->update('settings', $addinfo); 
		
	}
		if($addinfo){
		
			$return = "success";
		}else{
		
			$return = "false";
		}
	
	
	
	
$return = json_encode($return);
print_r($return);
}





