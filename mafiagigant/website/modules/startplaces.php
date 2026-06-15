<?php 
$page = 'start';
require_once ('../../../loader.php');

$nu = date("Y-m-d H:i:s");
//$start = $nu;

 

if($_GET['p'] == 'top'){


 		$start = date("Y-m-d H:i:s", (strtotime(date($nu)) - 1000000));
 		
$sql = "SELECT * FROM places  where  planned = '0'  order by inwoners DESC limit 100 " ;
$db->query($sql)->execute() ;
$places = $db->query($sql)->fetch();

foreach(($places ? $places : array()) as $f) {


 		$seconds = rand(1200,4500);
		$start = date("Y-m-d H:i:s", (strtotime(date($start)) + $seconds));

 	if(date('H', strtotime($start)) > '00' and date('H', strtotime($start)) < '07'){
 		
		$h = rand(7,9);
 		$start = date("Y-m-d ".$h.":i:s", (strtotime(date($start)) + $seconds));
	 }


		$data = array(
			'planned' => 1,
			'start' => $start,
		);
		$where = array( 'id' => $db->escape($f['id']));
		$db->where($where)->update('places', $data); 


		echo" start: $start <br />";



}




}
 
 
$sql = "SELECT * FROM places  where planned = '1' order by start desc limit 1" ;
$db->query($sql)->execute() ;
$fstart = $db->query($sql)->fetch();
$start = isset($fstart[0]['start']) ? $fstart[0]['start'] : $nu;


if($_GET['p'] == 'rest'){



$sql = "SELECT * FROM places  where planned = '0' order by rand() limit 500  " ;
$db->query($sql)->execute() ;
$places = $db->query($sql)->fetch();


foreach(($places ? $places : array()) as $f) {

		
	$seconds = rand(1200,4500);

	$start = date("Y-m-d H:i:s", (strtotime(date($start)) + $seconds));
	
 	if(date('H', strtotime($start)) > '00' and date('H', strtotime($start)) < '07'){
 		
		$h = rand(7,9);
 		$start = date("Y-m-d ".$h.":i:s", (strtotime(date($start)) + $seconds));
	 }


		$data = array(
			'planned' => 1,
			'start' => $start,
		);
		$where = array( 'id' => $db->escape($f['id']));
		$db->where($where)->update('places', $data); 


		echo" start: $start <br />";
}

}
exit;

	

		$data = array(
			'planned' => 1,
			'start' => $start,
		);
		$where = array( 'id' => $db->escape($f['id']));
		$db->where($where)->update('places', $data); 



