<?php
include_once "../pdo-api.php";

$db = new Operations();
$conn = $db->dbConnection();

$sql = "SELECT * FROM `voting` ";
$stmt = $conn->prepare($sql);
$stmt->execute();

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($data);

?>