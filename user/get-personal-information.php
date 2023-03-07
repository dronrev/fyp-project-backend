<?php

include '../pdo-api.php';

$dbService = new Operations();
$conn = $dbService->dbConnection();
$data = file_get_contents("php://input");

try{
    $query = "SELECT`user_id`,`email_id`,`username`,`course_id`,`user_role`,`cawangan`,`profilepic` FROM `user` WHERE `user_id` = :user_id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':user_id',$data);
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