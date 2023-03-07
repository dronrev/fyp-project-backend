<?php

include_once '../pdo-api.php';
$database = new Operations();
$conn = $database->dbConnection();

$data = file_get_contents("php://input");

$sql = "DELETE FROM `report` WHERE activity_id = :activity_id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':activity_id',$data);
if($stmt->execute()){
	$sql1 = "DELETE FROM `activity` WHERE activity_id = :activity_id1";
	$stmt1 = $conn->prepare($sql1);
	$stmt1->bindParam(':activity_id1',$data);
	if($stmt1->execute()){
		echo json_encode(["message"=>"Event has been deleted!"]);
	}
}


?>