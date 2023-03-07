<?php

include_once "../pdo-api.php";

$db = new Operations();
$conn = $db->dbConnection();


$data = json_decode(file_get_contents("php://input"));

$user_id = $data->user_id;
#$vote_id = $data->vote_id;

$sql = "SELECT * FROM `vote_check` WHERE user_id = :user_id";

$stmt = $conn->prepare($sql);
#$stmt->bindParam(':vote_id', $vote_id);
$stmt->bindParam(':user_id',$user_id);
$stmt->execute();
$count = $stmt->rowCount();
if($count > 0){
	$returnData = $stmt->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($returnData);
}
else{
	echo json_encode([
		"message"=>"User does not exist!"
	]);
}


?>
