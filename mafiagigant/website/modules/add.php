<?php
$page = 'add';
require_once ('../../../loader.php');
$page = 'add';
$nav = 'ja';
$sitetitle = 'content toevoegen';
$nu = date("Y-m-d H:i:s");
if($addnewcontent != 'ja'){

       header("Location: ".BASE_URL."");
        exit(); 
}

$notify = '';

if(isset($_POST["submit"])) {

    $target_dir = "../../../img/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Controleer of het bestand een afbeelding is
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            //$notify .= "Bestand is een afbeelding - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            $notify .= "Bestand is geen afbeelding.";
            $uploadOk = 0;
        }
    }

    // Controleer of het bestand al bestaat
    if (file_exists($target_file)) {
        $notify .= "Sorry, het bestand bestaat al.";
        //$uploadOk = 0;
    }

    // Controleer de grootte van het bestand
    if ($_FILES["fileToUpload"]["size"] > 50000000) {
        $notify .= "Sorry, het bestand is te groot.";
        $uploadOk = 0;
    }

    // Sta alleen bepaalde bestandstypes toe
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        $notify .= "Sorry, alleen JPG, JPEG, PNG & GIF-bestanden zijn toegestaan.";
        $uploadOk = 0;
    }

    // Als er geen fouten zijn, upload dan het bestand
    if ($uploadOk == 0) {
         $notify .=  "Sorry, het bestand is niet geüpload.";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $notify .=  "Het bestand ". basename( $_FILES["fileToUpload"]["name"]). " is geüpload.";
            
                        $image_url = "/img/" . basename($_FILES["fileToUpload"]["name"]);
           $notify .=   "<br><br><b>De URL van de afbeelding is:</b><Br /> " . $image_url."<br />";
            
            
        } else {
             $notify .=  "Sorry, er is een fout opgetreden tijdens het uploaden van het bestand.";
        }
    }
}





$theme = 'link';
require_once ('../../../themes/loader.php');