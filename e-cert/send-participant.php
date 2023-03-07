<?php

include_once '../pdo-api.php';
$database = new Operations();
$conn = $database->dbConnection();

$data = json_decode(file_get_contents("php://input"));


    $sql = "INSERT INTO `participants` SET report_id = :report_id , name = :name , matric_no = :matric_no";

    $report_id = $data->report_id;
    $name = $data->name;
    $matric_no = $data->matric_no;

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':report_id',$report_id);
    $stmt->bindParam(':name',$name);
    $stmt->bindParam(':matric_no',$matric_no);
    $stmt->execute();

    echo json_encode(
        [
            'message' => 'Data Inserted'
        ]
        );


