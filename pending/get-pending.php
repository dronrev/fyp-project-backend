<?php
include_once "../pdo-api.php";

$db = new Operations();
$conn = $db->dbConnection();

$sql = "SELECT * FROM `pending`";
$stmt = $conn->prepare($sql);
$stmt->execute();
$count = $stmt->rowCount();

if($count > 0){
	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($data);
}
?>