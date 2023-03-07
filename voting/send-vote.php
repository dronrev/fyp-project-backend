<?php

include_once "../pdo-api.php";

$db = new Operations();
$conn = $db->dbConnection();


$data = json_decode(file_get_contents("php://input"));

$name = $data->name;
$activity_id = $data->activity_id;
$user_id = $data->user_id;

$sql = "INSERT INTO `vote` SET activity_id = :activity_id, name = :name, user_id = :user_id";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':activity_id', $activity_id);
$stmt->bindParam(':name',$name);
$stmt->bindParam(':user_id',$user_id);
$stmt->execute();



echo $activity_id;

#echo json_decode($list);

?>