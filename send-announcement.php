<?php
error_reporting(E_ERROR);
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow_Credentials: true');
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json; charset=UTF-8");

require 'pdo-api.php';
$database = new Operations();
$conn = $database->dbConnection();

$data = json_decode(file_get_contents("php://input"));

try{
    
}
catch(PDOException $e){

    http_response_code(500);
    echo json_encode([
        'success' => 0,
        'message' => $exception->getMessage()
    ]);
    exit;
}
?>