<?php
include_once 'pdo-api.php';
use \Firebase\JWT\JWT;

class Login{
    public function logged($email_address,$password,$table,$id,$name,$role){
        $dbService = new Operations();
        $connection = $dbService ->dbConnection();
        $sql = "SELECT `$id`,`$name`,`password`,`$role` FROM $table WHERE email_id = :email_address OR $id = :email_address";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(':email_address', $email_address);
        $stmt->execute();
        $numOfRows = $stmt->rowCount();
        try{
            if($numOfRows>0){
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $user_id = $row[$id];
                $fullname = $row[$name];
                $pass = $row['password'];
                $user_role = $row[$role];
                
                if(password_verify($password,$pass)){
                    
                    $secret_key = "NordVPN";
                    $issuer_claim = "localhost"; 
                    $issuedat_claim = time(); // time issued 
                    $notbefore_claim = $issuedat_claim + 10; 
                    $expire_claim = $issuedat_claim + 10; 
            
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
                            "id"=> $user_id,
                            "role"=>$user_role,
                            "token" => $jwtValue,
                            "email_address" => $email_address,
                            "expiry" => $expire_claim
                        ));
                }
                else{
                    echo json_encode(array("success" => "false"));
                   // echo password_hash($pass,PASSWORD_DEFAULT);
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
    }
}



?>