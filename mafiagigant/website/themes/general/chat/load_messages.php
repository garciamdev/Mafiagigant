<?php
session_start();

    if(!isset($_SESSION['suid']) or $_SESSION['suid'] == ''){
		exit;
    }
    
    

require_once 'config.php'; // Include your database connection configuration

$limit = isset($_GET['limit']) ? $_GET['limit'] : 8;
if($limit == 35){
$limit = 35;
}else{
$limit = 8;
}
$sql = "SELECT * FROM shoutouts ORDER BY created_at DESC limit ".$limit." ";
$result = mysqli_query($conn, $sql);

	$chatss = '';
	$chatss .= '<table class="minichat"><tbody>';
while ($row = mysqli_fetch_assoc($result)) {

                    
                            	 $allchats[]= '
	<tr>
	<td width="4%"></td>
	<td width="18%"><a href="member/' . $row['username'] . '" class="">' . $row['username'] . '</a>:</td>
	<td width="76%">' . $row['message'] . '</td>
	</tr>
                           
                    ';
                    
                    
                    
}



   $chatsss = array_reverse($allchats);
   foreach($chatsss as $row){
           	 $chatss .= $row;
   
   }
   
   
	$chatss .= '</tbody></table>'; 
mysqli_close($conn);
echo $chatss;



?>


