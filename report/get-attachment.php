<?php
include_once "../pdo-api.php";

$db = new Operations();
$conn = $db->dbConnection();

#readfile("C:/Users/verno/OneDrive/Desktop/fyp-project/src/assets/images/report-attachment/r463b988b705ae5/abra.png");

$data = file_get_contents("php://input");


#$url = file_get_contents("C:/Users/verno/OneDrive/Desktop/fyp-project/src/assets/images/report-attachment/r463b988b705ae5/abra.png");
$url = scandir("C:/Users/verno/OneDrive/Desktop/fyp-project/src/assets/images/report-attachment/". $data ."/");
#chmod()
echo json_encode($url);

#echo json_encode($data);

?>