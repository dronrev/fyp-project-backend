<?php
$url = "e-certificate.php";
$image=basename($url);
$exec = file_get_contents($image, file_get_contents($url));

if(!$exec){
    echo "Failed";
}
else{
    echo "Successfully";
}
?>