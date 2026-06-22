<?php

include('connect.php');


 	$q = "SELECT * FROM crons where name = 'drugs' and time <= '".$date."'";
	$f = $db->query($q)->fetch();
	if($db->affected_rows != '1')
	{	
	//echo"exit";
		//exit;
	}
	
			
	//$qu = "update users set bank = bank + 0 where prostitutes > '0' and health > 0 ";
	//$db->query($qu)->execute() ;
	

	
	
  	$q = "SELECT * FROM drugs";
	$d = $db->query($q)->fetch();
	
// Define parameters for geometric Brownian motion



  	$q = "SELECT * FROM countrys";
	$c = $db->query($q)->fetch();



	foreach($d as $f){
	 
	
	
			$min_price = $f['minprice'];
        	$max_price = $f['maxprice'];
        	

		foreach($c as $fc){
		
		
  		$q = "SELECT * FROM drugs_prices where country = '".$fc['id']."' and drugs = '".$f['id']."'";
		$d = $db->query($q)->fetch();
		$current_price = $d[0]['price'];
		
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
			'drugs' => $f['id'],
			'country' => $fc['id'],
			);
		$db->where($where)->update('drugs_prices', $update); 
		
		echo "country > ".$fc['id']." > drugs ".$f['id']." > old $oldprice > new $current_price <Br />";
		}
		
		echo"<br /><br />";
	}
	
	
	
		$update = array( 'time' => date("Y-m-d H:59:59", time()) );
		$where = array(
			'name' => 'drugs'
			);
		$db->where($where)->update('crons', $update); 

exit;


  	$q = "SELECT * FROM drugs limit 1";
	$c = $db->query($q)->fetch();
	
// Define parameters for geometric Brownian motion


	foreach($c as $f){
	
			$min_price = $f['minprice'];
        	$max_price = $f['maxprice'];
        	$current_price = $f['price'];
        	

		$i = 1;
		$max = 100;
		
		
		while ($i <= $max) {
		
		$oldprice = $current_price;
		
		$mu = rand(0.05,0.1);     // Mean (trend)
		$sigma = 0.5;  // Volatility (fluctuation)
		$dt = 5 / (24 * 60);  // Time interval (5 minutes)
        $drift = $mu * $current_price * $dt;
        $random = $sigma * $current_price * sqrt($dt) * rand(-2, 2);

        // Calculate the new price using geometric Brownian motion
        $new_price = $current_price + $drift + $random;

        // Ensure the new price remains within the specified range
        $current_price = round(max($min_price, min($new_price, $max_price)));

		//if($oldprice == $current_price) { $current_price = $current_price + rand(-5,5);}

			echo"$i > Nieuwe price: $current_price <Br />";
			
		
		$i = $i + 1;
		}
	
	
	}
	
