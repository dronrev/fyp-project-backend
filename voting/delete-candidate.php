<?php

include_once "../pdo-api.php";

$db = new Operations();
$conn = $db->dbConnection();


$data = json_decode(file_get_contents("php://input"));
$user_id = $data->user_id;
$vote_id = $data->vote_id;


$sql = "DELETE FROM `thecandidate` WHERE user_id = :user_id AND vote_id = :vote_id";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':user_id', $user_id);
$stmt->bindParam(':vote_id',$vote_id);
$stmt->execute();

?>