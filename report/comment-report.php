<?php
include_once '../pdo-api.php';

$db = new Operations();
$conn = $db->dbConnection();
$data = json_decode(file_get_contents("php://input"));

$report_id = $data->report_id;
$comment = $data->comment;

$sql = "UPDATE `report` SET comment = :comment WHERE report_id = :report_id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':comment',$comment);
$stmt->bindParam(':report_id',$report_id);
if($stmt->execute()){
	echo json_encode([
		"message" => "Comment has been inserted!"
	]);
}
else{
	echo json_encode(["message"=>"Something went wrong!"]);
}

//echo json_encode($comment);

?>