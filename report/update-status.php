<?php
require '../pdo-api.php';

$database = new Operations();
$conn = $database->dbConnection();

$data = json_decode(file_get_contents("php://input"));
$report_id = $data->report_id;
$status = $data->status;


$sql = "UPDATE `report` SET status = :status WHERE report_id = :report_id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':status',$status);
$stmt->bindParam(':report_id',$report_id);
$stmt->execute();

echo $report_id;
?>