<?php

include_once '../pdo-api.php';
$database = new Operations();
$conn = $database->dbConnection();

#$data = file_get_contents("php://input");

$sql = "SELECT name_activity,activity.organizer,location,tema,date,pengarah,username FROM `activity` INNER JOIN `report` ON activity.activity_id = report.activity_id INNER JOIN `user` ON activity.pengarah = user.user_id ORDER BY date DESC";
$stmt = $conn->prepare($sql);
$stmt->execute();
if($stmt->rowCount() > 0){
	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($data);
}


?>