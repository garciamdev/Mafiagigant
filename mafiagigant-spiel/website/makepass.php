<?php

$pass = stripslashes(sha1(md5(trim($_GET['p']))));
echo $pass;
?>