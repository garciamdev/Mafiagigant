<?php
ob_start();

// Spiel ist ausschließlich auf Deutsch.
$lang = 'de';

include('languages/general.' . $lang . '.php');

function txt($txt, $from, $to)
{
    return str_replace($from, $to, $txt);
}
?>
