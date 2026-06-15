<?php

    if(!isset($userdata[0]['authority']) or $userdata[0]['authority'] != 'admin'){
        header("Location: /");
        exit(); 
    }



          $user = array(
                'username' => $db->escape($user),
            );
           // $user_id = $db->insert('users', $user); 



  	$q = "SELECT * FROM translations where activity = 'countrys' and lang = '".$lang."'";
	$t = $db->query($q)->fetch();

  	$q = "SELECT * FROM countrys";
	$c = $db->query($q)->fetch();


  	$q = "SELECT * FROM languages";
	$l = $db->query($q)->fetch();

if($var == 'new'){

if($_SERVER['REQUEST_METHOD'] === 'POST'){
	
		$country 	= isset($_POST['country']) ? $_POST['country'] : '0';
		$mincost	= isset($_POST['mincost']) ? $_POST['mincost'] : '0';
		$maxcost 	= isset($_POST['maxcost']) ? $_POST['maxcost'] : '0';
		$cooldown = isset($_POST['cooldown']) ? $_POST['cooldown'] : 0;
		$owner = isset($_POST['owner']) ? $_POST['owner']  : '';
		$sort 	= isset($_POST['sort']) ? $_POST['sort'] : '0';

		
		
          $countrys = array(
                'sort' => $db->escape($sort),
            );
          $countrys = $db->insert('countrys', $countrys); 


		$q = "SELECT * FROM drugs";
		$fc = $db->query($q)->fetch();
		foreach($fc as $ffc){
		$price = rand($ffc['minprice'],$ffc['maxprice']);

    	 $drugprice = array(
                'price' => $db->escape($price),
                'drugs' => $db->escape($ffc['id']),
                'country' => $db->escape($countrys),
            );
          $drugprice = $db->insert('drugs_prices', $drugprice); 

		}
	
	
	
	foreach($l as $language){
				
				
			$planguage = $db->escape($_POST[$language[lang]]);
			
			$countrysl = array(
                'activity' => 'countrys',
                'activity_id' => $countrys,
                'lang' => $language['lang'],
                'content' => $planguage,
            );
         	$countrysl = $db->insert('translations', $countrysl); 

		} 
			
			




} 



}




if($var == 'settings'){
	$shuffle = isset($_GET['shuffle']) ? $_GET['shuffle'] : 'inactive';
	$shuffle = $db->escape($shuffle);



	//if($_SERVER['REQUEST_METHOD'] === 'POST'){
			
			$randcountry = '';
		  	$qc = "SELECT * FROM countrys order by rand()";
			$fc = $db->query($qc)->fetch();
			$countc = $db->affected_rows;
			
			$calc = floor($allusers / $countc);
					
	       		 	$qu = "update users set country = '0' ";
					$db->query($qu) ;
					$db->execute(); 

			
			foreach($fc as $ff){
			
					$randcountry[] = $ff['id'];
					
					$randlimit = rand( ($calc) , ($calc + 5)	);
				
	       		 	$qu = "update users set country = '".$ff['id']."' where country = '0' order by rand() limit ".$randlimit." ";
					$db->query($qu) ;
					$db->execute(); 

					
					echo "id > ".$ff['id']." limit $randlimit > $qu >>";
					//print_r($e);
					echo"<br />";
					
					
		
		
			}
			

			$rand_keys = array_rand($randcountry, 1);
			//print_r($randcountry[$rand_keys]);
		
		
	       // $q = "update users set country = '".$randcountry[$rand_keys]."' limit '".$update."'";
			//$db->query($q)->execute() ;

          $update = array(
                'country' => $randcountry[$rand_keys],
            );

		$where = array(
			'country' => '0'
		);
		//$db->where($where)->update('users', $update,'false'); 
     
     
     
}

if($var == 'edit'){

	$id = isset($_GET['id']) ? $_GET['id'] : '';
	$id = $db->escape($id);

 


	if($_SERVER['REQUEST_METHOD'] === 'POST'){

		$sort = isset($_POST['sort']) ? $_POST['sort'] : 0;
		
	
                    
			
          $update = array(
                'sort' => $db->escape($sort),
            );

		$where = array(
			'id' => $id
		);
		$db->where($where)->update('countrys', $update); 
     
     
     
	
	
	
     	foreach($l as $language){
				
			$planguage = $db->escape($_POST[$language[lang]]);
			
  			$q = "SELECT * FROM translations where activity = 'countrys' and lang = '".$language['lang']."' and activity_id = '".$id."'";
			$tc = $db->query($q)->fetch();
			if($db->affected_rows == '0'){	
	
		
			$insertl = array(
                'activity' => 'countrys',
                'activity_id' => $id,
                'lang' => $language['lang'],
                'content' => $planguage,
            );
         	$insertl = $db->insert('translations', $insertl); 



			}else{
				$updatel = array(
                'content' => $planguage,
           	 );
			$where = array(
                'activity' => 'countrys',
				'activity_id' => $id,
				'lang' => $language['lang']
			);
			$db->where($where)->update('translations', $updatel); 

			
			}
		
		



		} 
		
		
     
     
		
		
	}



  	$q = "SELECT * FROM translations where activity = 'countrys' and activity_id = '".$id."' ";
	$t = $db->query($q)->fetch();

  	$q = "SELECT * FROM countrys where id = '".$id."' ";
	$c = $db->query($q)->fetch();


}





if($var == 'delete'){


	$id = isset($_GET['id']) ? $_GET['id'] : '';
	$id = $db->escape($id);
	
	
if($_SERVER['REQUEST_METHOD'] === 'POST'){



		$where = array('activity_id' => $id, 'activity' => 'countrys' );
		$db->delete('translations')->where($where)->execute();
		
		
		$where = array('id' => $id );
		$db->delete('countrys')->where($where)->execute();
		
		$where = array('country' => $id );
		$db->delete('drugs_prices')->where($where)->execute();
		
		
        header("Location: /admin/countrys/");
        exit(); 
	
}
	
	


  	$q = "SELECT * FROM translations where activity = 'countrys' and activity_id = '".$id."' ";
	$t = $db->query($q)->fetch();

  	$q = "SELECT * FROM countrys where id = '".$id."' ";
	$c = $db->query($q)->fetch();


}




