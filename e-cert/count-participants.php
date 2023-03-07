<?php
include_once "../pdo-api.php";


$db = new Operations();
$conn = $db->dbConnection();

$data = file_get_contents("php://input");
$report_id = '"'.$data.'"';

$sql = "SELECT * FROM `participants` WHERE report_id = :report_id";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':report_id',$report_id);
if($stmt->execute()){
	$count = $stmt->rowCount();
	echo json_encode($count);
}
?>