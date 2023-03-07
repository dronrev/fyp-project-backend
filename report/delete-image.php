<?php

include_once "../pdo-api.php";

$db = new Operations();
$conn = $db->dbConnection();

$data = json_decode(file_get_contents("php://input"));

$file_name = $data->file_name;
$report_id = $data->report_id;

$url = "C:/Users/verno/OneDrive/Desktop/fyp-project/src/assets/images/report-attachment/" . $report_id . "/" . $file_name;

echo json_encode($url);

?>