<?php
include_once '../pdo-api.php';

$db = new Operations;
$conn = $db->dbConnection();

$data = json_decode(file_get_contents("php://input"));
$id = $data;
$auth = '1';

if($auth =='1'){
    $query = "SELECT * FROM `report` WHERE report_id = :report_id";

    $statement = $conn->prepare($query);
    $statement->bindParam(':report_id',$id);
    $statement->execute();

    if($statement->rowCount()>0){
        $report = $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    else{
        $report = "Not Found";
    }
}

if($auth =='2'){
    $query = "SELECT * FROM `report` WHERE id = :report_id";

    $statement = $conn->prepare($query);
    $statement->bindParam(':report_id',$id);
    $statement->execute();

    if($statement->rowCount()>0){
        $report = $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    else{
        $report = "Not Found";
    }
}

echo json_encode(
    $report
);

?>