<?php
error_reporting(E_ERROR);
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow_Crednetials: true');
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, access");
header("Content-Type: application/json; charset=UTF-8");


if($_SERVER['REQUEST_METHOD'] !== 'GET') :
    http_response_code(405);
    echo json_encode([
        'success'=> 0,
        'message'=> 'Bad Request Detected! Only get method is allowed',
    ]);
    exit;
endif;

require 'pdo-api.php';
$database = new Operations();
$conn = $database->dbConnection();

if (isset($_GET['id'])){
    $reports_id = filter_var($_GET['id'], FILTER_VALIDATE_INT, [
        'options'=>[
            'default'=>'all_reports',
            'min_range'=> 1
        ]
    ]);
}

try{
    $sql = is_numeric($reports_id) ? "SELECT * FROM `user` WHERE id = '$reports_id'" : "SELECT * FROM `user`";

    $stmt = $conn->prepare($sql);

    $stmt->execute();

    if($stmt->rowCount() > 0):
        $data = null;
        if(is_numeric($reports_id)){
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        else{
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        echo json_encode([
            'success'=> 1,
            'message'=> $data,
        ]);
    endif;  
}
catch(PDOException $exception){
    http_response_code(500);
    echo json_encode([
        'success' => 0,
        'message' => $exception->getMessage()
    ]);
    exit;
}
?>