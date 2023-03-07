<?php
include_once '../pdo-api.php';

$db = new Operations();
$connection = $db->dbConnection();


$query = "SELECT * FROM `announcement`";
$stmt = $connection->prepare($query);



if($stmt->execute()){
	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($data);
}
?>