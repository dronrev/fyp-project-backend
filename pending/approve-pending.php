<?php

include_once "../pdo-api.php";

$db = new Operations();
$conn = $db->dbConnection();

$data = file_get_contents("php://input");

$sql = "DELETE FROM `pending` WHERE :user_id = user_id";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':user_id',$data);
if($stmt->execute()){
	echo json_encode([
		"message" => "User Approved!"
	]);
}

?>