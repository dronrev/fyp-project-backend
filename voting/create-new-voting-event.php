<?php

include_once "../pdo-api.php";

$db = new Operations();
$conn = $db->dbConnection();

$data = json_decode(file_get_contents("php://input"));

$vote_id = uniqid("voting");
$title = $data->title;
$theCandidates = $data->detail;
$date = $data->date;
$cawangan = $data->cawangan;

#adding the title to database

$addTitleSql = "INSERT INTO `voting` SET `vote_id` = :vote_id, `title` = :title, `date` = :the_date,`cawangan` = :cawangan";
$stmtTitle = $conn->prepare($addTitleSql);
$stmtTitle->bindParam(':vote_id',$vote_id);
$stmtTitle->bindParam(':title',$title);
$stmtTitle->bindParam(':the_date',$date);
$stmtTitle->bindParam(':cawangan',$cawangan);
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

echo json_encode(["message" => "Vote Event has been created!"]);

?>