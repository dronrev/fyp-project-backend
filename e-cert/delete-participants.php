<?php
include "../pdo-api.php";

$database = new Operations();
$conn = $database->dbConnection();

$data = json_decode(file_get_contents("php://input"));
$report_id = $data->report_id;
$matric_no = $data->matric_no;
try{
    $query = "DELETE FROM `participants` WHERE report_id = ? AND matric_no = ?";


    $statement = $conn->prepare($query);
    if($statement->execute([$report_id,$matric_no])){
        echo json_encode([
            "message" => "(Deleted!)"
        ]);
    }

    $checking = "SELECT * FROM `participants` WHERE report_id = :report_id AND matric_no = :matric_no";
    $statementC = $conn->prepare($checking);
    $statementC->bindParam(':report_id',$report_id);
    $statementC->bindParam(':matric_no',$matric_no);
    $statementC->execute();
    $verify = $statementC->rowCount();
    if($verify > 0){
        echo json_encode([
            "message"=>"Not Deleted!"
        ]);
    }
    else{
        echo json_encode([
            "message"=>"success!"
        ]);
    }
}
catch(PDOException $e){
    http_response_code(500);
    echo json_encode([
        'success' => 0,
        'message' => $e->getMessage()
    ]);
    exit;
}
?>