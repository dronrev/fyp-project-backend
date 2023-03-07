<?php

include_once "../pdo-api.php";

$db = new Operations();
$conn = $db->dbConnection();

$data = json_decode(file_get_contents("php://input"));

$announcement_id = $data->announcement_id;
$title = $data->title;
$subject = $data->subject;
$message = $data->message;

$sql = "UPDATE `announcement` SET title = :title, subject = :subject, message = :message WHERE announcement_id = :announcement_id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':announcement_id',$announcement_id);
$stmt->bindParam(':title',$title);
$stmt->bindParam(':subject',$subject);
$stmt->bindParam(':message',$message);
if($stmt->execute()){
	echo json_encode([
		"message"=>"Announcement has been updated!"
	]);
}

?>