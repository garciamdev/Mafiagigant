<?php
$langs = [];

// US English
$langs[] = [
    "code" => "en-US",
    "shortcode" => "en",
    "name" => "English",
    "localname" => "English"
];


// Dutch
$langs[] = [
    "code" => "nl-NL",
    "shortcode" => "nl",
    "name" => "Dutch",
    "localname" => "Nederlands"
];



Config::set("applangs", $langs);
Config::set("default_applang", "nl");
