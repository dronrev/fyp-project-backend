<?php

include_once "../pdo-api.php";

$db = new Operations();
$conn = $db->dbConnection();


$data = json_decode(file_get_contents("php://input"));

$user_id = $data->user_id;
$vote_id = $data->vote_id;

$sql = "INSERT INTO `vote_check` SET vote_id = :vote_id, user_id = :user_id";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':vote_id', $vote_id);
$stmt->bindParam(':user_id',$user_id);

if($stmt->execute()){
	json_encode([
		"message"=>"Your Vote Successfully Inserted!"
	]);
}
else{
	json_encode([
		"message"=>"Something went wrong!"
	]);
}


?>
