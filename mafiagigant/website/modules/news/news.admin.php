<?php

    if(!isset($userdata[0]['authority']) or $userdata[0]['authority'] != 'admin'){
        header("Location: /");
        exit(); 
    }



          $user = array(
                'username' => $db->escape($user),
            );
           // $user_id = $db->insert('users', $user); 



  	$q = "SELECT * FROM translations_news where activity = 'news_title' and lang = '".$lang."'";
	$tt = $db->query($q)->fetch();
  	$q = "SELECT * FROM translations_news where activity = 'news_description' and lang = '".$lang."'";
	$td = $db->query($q)->fetch();

  	$q = "SELECT * FROM news order by date desc";
	$c = $db->query($q)->fetch();


  	$q = "SELECT * FROM languages";
	$l = $db->query($q)->fetch();
	
	
	
	
	

if($var == 'edit'){

	$id = isset($_GET['id']) ? $_GET['id'] : '';
	$id = $db->escape($id);

 


	if($_SERVER['REQUEST_METHOD'] === 'POST'){
	

	
	
	
     	foreach($l as $language){
				
			$planguagetitle = $db->escape($_POST[$language[lang].'_title']);
			$planguagedescription = $db->escape($_POST[$language[lang].'_description']);
			
			//echo "$planguagetitle -> $planguagedescription <br />";
  			$q = "SELECT * FROM translations_news where activity = 'news_title' and lang = '".$language['lang']."' and activity_id = '".$id."'";
			$tc = $db->query($q)->fetch();
			if($db->affected_rows == '0'){	
	
		
			$data = array(
                'activity' => 'news_title',
                'activity_id' => $id,
                'lang' => $language['lang'],
                'content' => $planguagetitle,
            );
         	$insert = $db->insert('translations_news', $data); 



			}else{
				$data = array(
                'content' => $planguagetitle,
           	 );
			$where = array(
                'activity' => 'news_title',
				'activity_id' => $id,
				'lang' => $language['lang']
			);
			$db->where($where)->update('translations_news', $data); 

			
			}
		
			$q = "SELECT * FROM translations_news where activity = 'news_description' and lang = '".$language['lang']."' and activity_id = '".$id."'";
			$tc = $db->query($q)->fetch();
			if($db->affected_rows == '0'){	
	
		
			$data = array(
                'activity' => 'news_description',
                'activity_id' => $id,
                'lang' => $language['lang'],
                'content' => $planguagedescription,
            );
         	$insert = $db->insert('translations_news', $data); 



			}else{
				$data = array(
                'content' => $planguagedescription,
           	 );
			$where = array(
                'activity' => 'news_description',
				'activity_id' => $id,
				'lang' => $language['lang']
			);
			$db->where($where)->update('translations_news', $data); 

			
			}
		



		} 
		
		
     
     
		
		
	}



  	$q = "SELECT * FROM translations_news where activity = 'news_title' and activity_id = '".$id."' ";
	$tt = $db->query($q)->fetch();
  	$q = "SELECT * FROM translations_news where activity = 'news_description' and activity_id = '".$id."' ";
	$td = $db->query($q)->fetch();

  	$q = "SELECT * FROM news where id = '".$id."' ";
	$c = $db->query($q)->fetch();


}




if($var == 'new'){



	if($_SERVER['REQUEST_METHOD'] === 'POST'){
             
			
          $news = array(
                'username' => $db->escape($userdata[0]['username']),
            );

	  $id = $db->insert('news', $news); 



	
	
     	foreach($l as $language){
				
			$planguagetitle = $db->escape($_POST[$language[lang].'_title']);
			$planguagedescription = $db->escape($_POST[$language[lang].'_description']);
			

		
			$data = array(
                'activity' => 'news_title',
                'activity_id' => $id,
                'lang' => $language['lang'],
                'content' => $planguagetitle,
            );
         	$insert = $db->insert('translations_news', $data); 


		
			$data = array(
                'activity' => 'news_description',
                'activity_id' => $id,
                'lang' => $language['lang'],
                'content' => $planguagedescription,
            );
         	$insert = $db->insert('translations_news', $data); 




		} 
		
		
     
     
		
		
	}



}




if($var == 'delete'){


	$id = isset($_GET['id']) ? $_GET['id'] : '';
	$id = $db->escape($id);
	
	
if($_SERVER['REQUEST_METHOD'] === 'POST'){



		$where = array('activity_id' => $id, 'activity' => 'news_title' );
		$db->delete('translations_news')->where($where)->execute();
		$where = array('activity_id' => $id, 'activity' => 'news_description' );
		$db->delete('translations_news')->where($where)->execute();
		
		
		$where = array('id' => $id );
		$db->delete('news')->where($where)->execute();
		
		
		
        header("Location: /admin/news/");
        exit(); 
	
}
	
	


  	$q = "SELECT * FROM translations_news where activity = 'news_title' and activity_id = '".$id."' ";
	$tt = $db->query($q)->fetch();


  	$q = "SELECT * FROM news where id = '".$id."' ";
	$c = $db->query($q)->fetch();


}







