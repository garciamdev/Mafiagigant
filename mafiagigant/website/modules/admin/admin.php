<?php


if($userdata[0]['authority'] != 'admin'){
        header("Location: ".BASE_URL."");
        exit(); 
}


?>