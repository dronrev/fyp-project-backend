<?php
include_once "../pdo-api.php";

$db = new Operations();
$conn = $db->dbConnection();

$theId = file_get_contents("php://input");

$sql = "SELECT `candidate`,`user_id` FROM `vote`";
$stmt = $conn->prepare($sql);
$stmt->execute();

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($data);

?>