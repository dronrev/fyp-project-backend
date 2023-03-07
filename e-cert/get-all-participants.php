<?php
include_once '../pdo-api.php';
$database = new Operations();
$conn = $database->dbConnection();

try{
	$sql = "SELECT * FROM `participants`";
	$stmt = $conn->prepare($sql);
	$stmt->execute();

	$numOfRowCount = $stmt->rowCount();
    if($numOfRowCount > 0){
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