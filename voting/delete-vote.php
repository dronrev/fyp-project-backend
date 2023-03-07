<?php

include_once "../pdo-api.php";

$db = new Operations();
$conn = $db->dbConnection();


$data = file_get_contents("php://input");

$sql = "DELETE FROM `voting` WHERE vote_id = :vote_id";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':vote_id',$data);
$stmt->execute();

echo json_encode(["message"=>"Vote Event has been deleted!"]);

?>