<?php

include('connect.php');



 	$q = "SELECT * FROM crons where name = 'generalhour' and time <= '".$date."'";
	$f = $db->query($q)->fetch();
	if($db->affected_rows != '1')
	{	
	echo"exit";
		exit;
	}
	
			
	$qu = "update users set bank = bank + (prostitutes * 15) where prostitutes > '0' and health > 0 ";
	$db->query($qu)->execute() ;
	
	$qu = "update users set bank = bank + (prostitutes_work * 20) where prostitutes_work > '0' and health > 0 ";
	$db->query($qu)->execute() ;

	echo"run";
	
	
	
	
	
	
		$update = array( 'time' => date("Y-m-d H:59:59", time()) );
		$where = array(
			'name' => 'generalhour'
			);
		$db->where($where)->update('crons', $update); 


