<?php
include "../pdo-api.php";
#include_once "./make-dir.php";
#type of image 
header('Content-type: image/jpeg');

$db = new Operations();
$conn = $db->dbConnection();

$certificate = imagecreatefromjpeg('../assets/cert2.jpg');

$font_path =realpath('../font.ttf');

$white = imagecolorallocate($certificate,54,12,110);

#input
$data = json_decode(file_get_contents("php://input"));

$title = $data->title;
$myDir = "C:/xampp/htdocs/fyp-project/e-cert/". $title;
if(!is_dir($myDir)){
    mkdir($myDir);
    $cert_id = $title . uniqid($title);
    $report_id = $data->report_id;
    $sql = "INSERT INTO `certificate` SET report_id = :report_id,file_name = :file_name, certificate_id = :certificate_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':report_id',$report_id);
    $stmt->bindParam(':file_name',$title);
    $stmt->bindParam(':certificate_id',$cert_id);
    if($stmt->execute()){
    	echo json_encode(["message"=>"Success"]);
    }
}

#name
$participant_name = $data->name;
#ic
$matric_no= $data->matric_no;
#programme name
$prog_name = "E-portfolio competition";

imagettftext($certificate,40,0,380,670,$white,$font_path,$participant_name);
imagettftext($certificate,40,0,380,750,$white,$font_path,$matric_no);


imagejpeg($certificate,$myDir ."/".$participant_name .".jpeg");
imagedestroy($certificate);

?>