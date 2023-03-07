<?php

include_once "../pdo-api.php";

$db = new Operations();
$conn = $db->dbConnection();

$data = file_get_contents("php://input");


$announcement_id = $data;

$sql = "SELECT `attachment` FROM `announcement` WHERE announcement_id = :announcement_id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':announcement_id',$announcement_id);
$stmt->execute();

$url = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($url);

?>