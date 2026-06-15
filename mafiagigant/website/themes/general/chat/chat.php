<?php


function loadChat() {
    global $db;
    global $userdata;

$chatMessages = [];

	$chatss = '';
	$q = $db->query("SELECT * FROM chat_messages ORDER BY created_at ASC");
	$chats = $db->fetch($q);
	if ($db->affected_rows > 0 ) {
		foreach ($chats as $c){
					
		$chatMessages[] = [
            'username' => $c['username'],
            'message' => $c['message'],
        	];
        	
        	
        	 $chatss .= '<li>
                            <b> ' .htmlspecialchars( $row['username'] ). ' </b> <img src="./css/images/bullet.gif" alt="-" /> ' .htmlspecialchars( $row['message'] ). '
                            <span class="date"> ' .htmlspecialchars( $row['createt_at'] ). ' </span>
                        </li>
                    ';
                    
                    
		}
	}
	
	
    return $chatss;
}

function addMessage($message) {
    global $db;
    global $userdata;

          $chat = array(
                'username' => $db->escape($userdata[0]['username']),
                'message' => $db->escape($message),
            );
            $chat = $db->insert('chat_messages', $chat); 




}




?>