<?php
include_once '../pdo-api.php';

$db = new Operations();
$connection = $db->dbConnection();

$query = "SELECT `name`,`lecturer_id`,`role` FROM `lecturer`";
$statement = $connection->prepare($query);
$statement->execute();

$data = $statement->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($data)
?>