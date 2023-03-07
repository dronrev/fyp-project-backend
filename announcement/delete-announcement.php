<?php
include_once "../pdo-api.php";

$db = new Operations();
$conn = $db->dbConnection();

$data = file_get_contents("php://input");

$sql = "DELETE FROM `announcement` WHERE announcement_id = :announcement_id";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':announcement_id',$data);
if($stmt->execute()){
	echo json_encode(
		[
			"message"=>"Announcement has been deleted!"
		]
	);
}


?>