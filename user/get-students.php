<?php

include '../pdo-api.php';

$dbService = new Operations();
$conn = $dbService->dbConnection();

try{
    $query = "SELECT`user_id`,`email_id`,`username`,`course_id`,`user_role`,`cawangan`,`profilepic` FROM `user`";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $row = $stmt->rowCount();

    if($row>0){
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($data);
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