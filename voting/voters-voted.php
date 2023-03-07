<?php
include_once "../pdo-api.php";

$db = new Operations();
$conn = $db->dbConnection();

$vote_id = file_get_contents("php://input");

$data = file_get_contents("php://input");

$sql = "SELECT * FROM `vote_check` WHERE vote_id = :vote_id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':vote_id',$data);
$stmt->execute();

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($data);

?>