<?php

include_once "../pdo-api.php";

$db = new Operations();
$conn = $db->dbConnection();

$data = json_decode(file_get_contents("php://input"));

$vote_id = $data->vote_id;
$title = $data->title;
$theCandidates = $data->detail;
$date = $data->date;
$cawangan = $data->cawangan;

#update title or date or branch
$update = "UPDATE `voting` SET title = :title, date = :date, cawangan = :cawangan WHERE vote_id = :vote_id";
$updStmt = $conn->prepare($update);
$updStmt->bindParam(':vote_id',$vote_id);
$updStmt->bindParam(':title',$title);
$updStmt->bindParam(':date',$date);
$updStmt->bindParam(':cawangan',$cawangan);
if($updStmt->execute()){

}

#delete all candidate
$deleteAllCand = "DELETE FROM `thecandidate` WHERE vote_id = :vote_id";
$stmtTitle = $conn->prepare($deleteAllCand);
$stmtTitle->bindParam(':vote_id',$vote_id);
if($stmtTitle->execute()){
}

#adding the candidates to database
foreach ($theCandidates as $key => $value) {
	$matric_no = $value->matric_no;
	$candidate = $value->candidate;

	$sql = "INSERT INTO `thecandidate` SET vote_id = :vote_cid,user_id = :user_id, candidate = :candidate";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':vote_cid',$vote_id);
	$stmt->bindParam(':user_id',$matric_no);
	$stmt->bindParam('candidate',$candidate);
	if($stmt->execute()){
	}
}

echo json_encode(["message" => "Vote Event has been edited!"]);

?>