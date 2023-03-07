<?php
include_once "../pdo-api.php";

$db = new Operations();
$conn = $db->dbConnection();

$data =	json_decode(file_get_contents("php://input"));
$vote_id = $data->vote_id;
$user_id = $data->user_id;
$candidate = $data->candidate;
try{
	$sql = "INSERT INTO `vote` SET vote_id = :vote_id, user_id = :user_id, candidate = :candidate";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':vote_id',$vote_id);
	$stmt->bindParam(':user_id',$user_id);
	$stmt->bindParam(':candidate',$candidate);
	if($stmt->execute()){
		echo json_encode("Success");
	}
}
catch(PDOException $e){
	echo "Error " . $e->getMessage();
}

?>