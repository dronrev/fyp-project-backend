<?php

include_once "../pdo-api.php";

$db = new Operations();

$conn = $db->dbConnection();

$data = file_get_contents("php://input");



$sql = "SELECT `role` FROM `lecturer` WHERE `lecturer_id` = :id";

$statement = $conn->prepare($sql);
$statement->bindParam(':id',$data);
$statement->execute();

$theData = $statement->fetch(PDO::FETCH_ASSOC);

echo json_encode($theData);

?>