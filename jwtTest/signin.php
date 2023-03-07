<?php

require "../vendor/autoload.php";
include_once 'db_configurations.php';
use \Firebase\JWT\JWT;

$email_address = '';
$password = '';

$dbService = new DB_Connection();
$connection = $dbService -> db_connect();

$api_data = json_decode(file_get_contents("php://input"));

$email_address = $api_data->email_address;
$password = $api_data->password;

$table = 'jwt-users';

$sql = "SELECT `user_id`,`fullname`,`password` FROM `jwt-users` WHERE email_address = :email_address";

$stmt = $connection->prepare($sql);
$stmt->bindParam(':email_address', $email_address);
$stmt->execute();
$numOfRows = $stmt->rowCount();
try{
    if($numOfRows>0){
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $user_id = $row['user_id'];
        $fullname = $row['fullname'];
        $pass = $row['password'];
        
        if(password_verify($password,password_hash($pass,PASSWORD_DEFAULT))){
            
            $secret_key = "NordVPN";
            $issuer_claim = "localhost"; 
            $issuedat_claim = time(); // time issued 
            $notbefore_claim = $issuedat_claim + 10; 
            $expire_claim = $issuedat_claim + 60; 
    
            $token = array(
                "iss" => $issuer_claim,
                "iat" => $issuedat_claim,
                "nbf" => $notbefore_claim,
                "exp" => $expire_claim,
                "data" => array(
                    "id" => $user_id,
                    "userEmail" => $email_address
            ));
    
            $jwtValue = JWT::encode($token, $secret_key,'HS256');
            echo json_encode(
                array(
                    "name"=> $fullname,
                    "message" => "TOP G",
                    "token" => $jwtValue,
                    "email_address" => $email_address,
                    "expiry" => $expire_claim
                ));
        }
        else{
            echo json_encode(array("success" => "false"));
            echo password_hash($pass,PASSWORD_DEFAULT);
            //echo $fullname;
        }
    }
    else{
        echo json_encode(array("success" => "Disini bang"));
    }
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