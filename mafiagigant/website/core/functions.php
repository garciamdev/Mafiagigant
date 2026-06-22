<?php




if(!isset($_SESSION['suid']) or $_SESSION['suid'] == '' ) {

    if(isset($_COOKIE['suid']) and $_COOKIE['suid'] != ''){
        $koek = $_COOKIE['suid'];
        $_SESSION['suid'] = $koek;
    }else{
        $_SESSION['suid'] = '';
    }
    
}


if(isset($_SESSION['suid']) and $_SESSION['suid'] != '') {


        $quserdata = $db->query("SELECT * FROM users   where  id = '".$db->escape($_SESSION['suid'])."' ");
        $userdata = $db->fetch($quserdata);
        $user_id =  $userdata[0]['id'];
    	$suid = $_SESSION['suid'];

}


function auth(){
    global $_SESSION;
    global $db;

    if(!isset($_SESSION['suid']) or $_SESSION['suid'] == ''){
        header("Location: ".BASE_URL."login/");
        exit(); 
    }else{

        //$userdata[] = $userdata;
        return true;

    }

}



function login(){
    global $_SESSION;
    if(!isset($_SESSION['suid']) or $_SESSION['suid'] == ''){
		return false;
    }else{
        return true;
    }
}







				
function timetodate($string){
$string = date("Y-m-d H:i:s", $string);
return $string;
}
function datetotime($string){
$string = strtotime($string);
return $string;
}
function number($string){
$string = number_format($string, 0, ',', '.');
return $string;
} 



						function gettranslation($id, $string){
						
							$translation = 'no translation yet!';
							foreach($string as $f){
								if($f['activity_id'] == $id ){
									$translation = !empty($f['content']) ? $f['content'] : $translation;
								}
							}
							
							$translation = isset($translation) ? $translation : 'no translation yet!';
							return $translation;
						}
						
	    						
						function getactivityxp($id, $string){
						
							$xp = 0;
							foreach($string as $f){
								if($f['activity_id'] == $id ){
									$xp = !empty($f['xp']) ? $f['xp'] : $xp;
								}
							}
							
							$xp = isset($xp) ? $xp : 0;
							return $xp;
						}
						

function jail($username, $cooldown){
global $db;	


		$free = timetodate(time() + $cooldown);
		$qc = "SELECT * FROM timers where username = '".$username."' and activity = 'jail'";
		$fchance = $db->query($qc)->fetch();
		if($db->affected_rows == '0')
		{	
			$timers = array(
                'activity' => 'jail',
                'username' =>$username,
                'time' => $free,
            );
         	$timers = $db->insert('timers', $timers); 
		}else{
			$timers = array(
                'time' => $free,
           	 );
			$where = array(
				'activity' => 'jail',
				'username' => $username
			);
			$db->where($where)->update('timers', $timers); 
		}




}

									
function onlinestatus($string){
	global $db;
	
	$string = $db->escape($string);
	
	$q = "SELECT lastaction_date FROM users where username = '".$string."'  LIMIT 1";
	$f = $db->query($q)->fetch();

	$time = time();
	$usertime = datetotime($f[0]['lastaction_date']);
	$onlinetime = $time - $usertime;

 	if($onlinetime <= 900){
		return imgicons('online');	
	}		
	elseif($onlinetime >= 901 && $onlinetime <= 3600){
		return imgicons('online');	
	}else{
		return imgicons('offline');	
	}
	


}



function imgicons($text) 
{
	$url = 'themes/img/icons/';

	$array = array(
	
	
	
		'online' => 'status_online.png',
		'away' => 'status_away.gif',
		'offline' => 'status_offline.png',
		'death' => 'death.png',
		
		
		
		'password' => 'password.png',
		'mail' => 'mail.png',
		'stats_power' => 'stats_power.png',
		'bank' => 'stats_bank.png',
		'money' => 'stats_money.png',
		'cash' => 'stats_cash.png',
		'credits' => 'stats_credits.png',
		'health' => 'stats_health.png',
		'stats' => 'stats.png',
		'rank' => 'stats_rank.png',
		'crime' => 'crime.png',
		
		
		
		

	);


	foreach($array as $s => $xc)
	{
		$text = str_replace($s, "<img src='".$url.$xc."'>", $text);	
	}

return $text;
}


function rank($string){
	global $db;
	
	$qu = $db->query("SELECT * FROM users where username = '".$string."' ");
	$fu = $db->fetch($qu);
	
	
	$qr = $db->query("SELECT * FROM ranks where xp <= '".$fu[0]['xp']."' order by xp desc limit 1");
	$fr = $db->fetch($qr);
	
	$nr = $db->query("SELECT * FROM ranks where xp > '".$fu[0]['xp']."' order by xp asc limit 1");
	$nr = $db->fetch($nr);
	if ($db->affected_rows > 0 ) {
		$return = $fr[0]['rank'];
	}else{
		$lvl = floor($fu[0]['xp'] / $fr[0]['xp']);
		$return = $fr[0]['rank']." (lvl ".$lvl.")";
	}
	
	
	 
	return $return;
}


function ranklvl($string){
	global $db;
	
	$qu = $db->query("SELECT * FROM users where username = '".$string."' ");
	$fu = $db->fetch($qu);
	
	
	$qr = $db->query("SELECT * FROM ranks where xp <= '".$fu[0]['xp']."' order by xp desc");
	$fr = $db->fetch($qr);
	$lvls = $db->affected_rows;
	
	$nr = $db->query("SELECT * FROM ranks where xp > '".$fu[0]['xp']."' order by xp asc limit 1");
	$nr = $db->fetch($nr);
	if ($db->affected_rows > 0 ) {
		$return = $lvls;
	}else{
		$lvl = floor($fu[0]['xp'] / $fr[0]['xp']);
		
		$return = $lvls + $lvl - 1;
	}
	
	
	 
	return $return;
}

function rangvordering($string){
	global $db;
	
	$qu = $db->query("SELECT * FROM users where username = '".$string."' ");
	$fu = $db->fetch($qu);
	
	
	$pr = $db->query("SELECT * FROM ranks where xp <= '".$fu[0]['xp']."' order by xp desc limit 1");
	$pr = $db->fetch($pr);
	
	
	$nr = $db->query("SELECT * FROM ranks where xp > '".$fu[0]['xp']."' order by xp asc limit 1");
	$nr = $db->fetch($nr);
	if ($db->affected_rows > 0 ) {
		$progress = ($fu[0]['xp'] - $pr[0]['xp'])/($nr[0]['xp'] - $pr[0]['xp'])*100;
		$progress = floor($progress);
	}else{
		$nextrankxp = $pr[0]['xp'] * ceil($fu[0]['xp'] / $pr[0]['xp']);
		$prefrankxp = $pr[0]['xp'] * floor($fu[0]['xp'] / $pr[0]['xp']);
		$progress = ($fu[0]['xp'] - $prefrankxp)/($nextrankxp - $prefrankxp)*100;
		$progress = floor($progress);
	}
	
	
	return $progress;
}





function loadChat() {
    global $db;
    global $userdata;

$chatMessages = [];

	$chatss = '';
	$q = $db->query("SELECT * FROM shoutouts ORDER BY created_at ASC");
	$chats = $db->fetch($q);
	if ($db->affected_rows > 0 ) {
	
	
	
	$chatss .= '<table class="minichat"><tbody>';
	
	
		foreach ($chats as $c){
					

        	
        	 $chatss .= '
	<tr>
	<td width="4%">afb</td>
	<td width="18%"><a href="member/Donna13" class="level1 vip">user</a>:</td>
	<td width="76%">bericht </td>
	</tr>
                           
                    ';
                    
                    
                    
                    
		}
	$chatss .= '</tbody></table>'; 
	}
	
	
    return $chatss;
}



function getflag($id){
	global $db;
	
								
	$q = "SELECT * FROM countrys where id = '".$id."'  ";
	$f = $db->query($q)->fetch();
	$n = $db->affected_rows;
	if($n > 0){
		$return = $f[0]['img'];
	}else{
		$return = '/themes/img/flag/flag.png';	
	}
	return $return;
						
}
function getcountry($id){
	global $db;
	global $lang;
	
	$q = "SELECT * FROM translations where activity = 'countrys' and lang = '".$lang."'";
	$t = $db->query($q)->fetch();
								
	$n = $db->affected_rows;
	if($n > 0){
		$return = gettranslation($id,$t);
	}else{
		$return = '';	
	}
	return $return;
						
}

						function getobjectowner($id, $string){

	$owner = array('username' => '', 'earnings' => 0);
	if(is_array($string)){
		foreach($string as $f){
			if(isset($f['country']) && $f['country'] == $id){
				$owner['username'] = !empty($f['username']) ? $f['username'] : '';
				$owner['earnings'] = !empty($f['earnings']) ? $f['earnings'] : 0;
			}
		}
	}
	return $owner;
}
						
	    						
	    						
	    						
	    						
				$online = timetodate(datetotime(date("Y-m-d H:i:s")) - 3600);
	            $qonline = "SELECT count(id) as online FROM users where lastaction_date > '".$online."'  LIMIT 1";
	            $fonline = $db->query($qonline)->fetch();
	            $online = $fonline[0]['online'];


	            $qallusers = "SELECT count(id) as allusers FROM users  LIMIT 1";
	            $fallusers = $db->query($qallusers)->fetch();
	            $allusers = $fallusers[0]['allusers'];

function makelog($what,$page,$username,$amount,$description){

	global $db;

	if($what == 'cash'){
		$db = 'logs_cash';
	}
	
	if($db != ''){
	
		
			$insert = array(
                'page' => $page,
                'username' => $username,
                'amount' => $amount,
                'descripotion' => $descriotion,
            );
         	$insert = $db->insert($db, $insert); 
	
	}


} 


function showcooldown($tijd) {
 
   

  if ($tijd >= 0) {
 

    // Calculate days, hours, minutes, and seconds
    $dagen = floor($tijd / 3600 / 24);
    $uren = floor(($tijd - $dagen * 3600 * 24) / 3600);
    $minuten = floor(($tijd - $dagen * 3600 * 24 - $uren * 3600) / 60);
    $seconden = floor($tijd - $dagen * 3600 * 24 - $uren * 3600 - $minuten * 60);

    // Format seconds, minutes, hours, and days as needed
    if ($seconden > 0 && $seconden < 10) {
      $seconden = "0". $seconden;
    } else if ($seconden > 9 && $seconden < 60) {
      $seconden = $seconden;
    } else {
      $seconden = "00";
    }

    if ($minuten > 0 && $minuten < 10) {
      $minuten = "0".$minuten.":";
    } else if ($minuten > 9 && $minuten < 60) {
      $minuten = $minuten .":";
    } else if ($uren > 0 || $dagen > 0) {
      $minuten = "00:";
    } else {
      $minuten = "00:";
    }

    if ($uren > 0 && $uren < 10) {
      $uren = "0".$uren.":";
    } else if ($uren > 9 && $uren < 60) {
      $uren = $uren .":";
    } else if ($dagen > 0) {
      $uren = "00:";
    } else {
      $uren = "";
    }

    if ($dagen > 0 && $dagen < 10) {
      $dagen = "0".$dagen .":";
    } else if ($dagen > 9) {
      $dagen = $dagen .":";
    } else {
      $dagen = "";
    }

    // Construct the formatted countdown time
    $zichttijd = $dagen."".$uren."".$minuten."".$seconden;




  } else {
    
    $zichttijd = "00:00";
  }
  
  return $zichttijd;
}

?>