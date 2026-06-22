<?php

include('connect.php');


 	$q = "SELECT * FROM crons where name = 'stockexchange' and time <= '".$date."'";
	$fcron = $db->query($q)->fetch();
	if($db->affected_rows != '1')
	{	
	echo"exit";
		exit;
	}
	
			
	

	
	
  	$q = "SELECT * FROM stockexchange";
	$d = $db->query($q)->fetch();
	
// Define parameters for geometric Brownian motion



  	$q = "SELECT * FROM countrys";
	$c = $db->query($q)->fetch();



	foreach($d as $f){
	 
	
	
			$min_price = $f['minprice'];
        	$max_price = $f['maxprice'];
        	
		$current_price = $f['price'];
		
		$oldprice = $current_price;
		
		$mu = rand(0.05,0.1);     // Mean (trend)
		$sigma = 0.5;  // Volatility (fluctuation)
		$dt = 5 / (24 * 60);  // Time interval (5 minutes)
		
		$minPriceChange = rand(1,5);  // Adjust as needed
        $drift = $mu * $current_price * $dt;
        $random = $sigma * $current_price * sqrt($dt) * rand(-2, 2);

        // Calculate the new price using geometric Brownian motion
        $new_price = $current_price + $drift + $random;

        // Ensure the new price remains within the specified range
        $current_price = round(max($min_price, min($new_price, $max_price)));

	//echo "id: ".$f['id']." > old $oldprice > new $current_price <br/ >";
		
		
		$update = array( 'price' => $current_price );
		$where = array(
			'id' => $f['id'],
			);
		$db->where($where)->update('stockexchange', $update); 
		
		echo "stock ".$f['id']." > old $oldprice > new $current_price <Br />";
		
	
	}
	
	
	
		$futureDate = strtotime($fcron[0]['time'])+(60*5);
		$update = array( 'time' => date("Y-m-d H:i:59", $futureDate) );
		$where = array(
			'name' => 'stockexchange'
			);
		$db->where($where)->update('crons', $update); 


