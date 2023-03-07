<?php

include_once '../pdo-api.php';
$database = new Operations();
$conn = $database->dbConnection();

$data = json_decode(file_get_contents("php://input"));

try{
    $sql = "SELECT * FROM `participants` WHERE report_id = :report_id";

    $report_id = $data->report_id;

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':report_id',$report_id);
    $stmt->execute();

    $numOfRows = $stmt->rowCount();

    if($numOfRows > 0){
        $content = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($content);
    }
    else{
        echo json_encode(
            [
                'message' => 'Data not Found'
            ]
            );
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