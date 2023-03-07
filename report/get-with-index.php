<?php
include_once '../pdo-api.php';

$db = new Operations;
$conn = $db->dbConnection();

$sql = "SELECT ";
$statement = $conn->prepare($sql);
$statement->execute();
    if($statement->rowCount()>0){
        $report = $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    else{
        $report = "Not Found";
    }
echo json_encode(
    $report
);
?>