<?php
include_once '../login-system.php';
require "../vendor/autoload.php";

$api_data = json_decode(file_get_contents("php://input"));
$email_address = $api_data->email_address;
$password = $api_data->password;
$role = $api_data->user_role;


$log = new Login();


try{
    if($role == "1"){
        $table = "user";
        $id = "user_id";
        $name = "username";
        $user_role = "user_role";
        $loggIn = $log->logged($email_address,$password,$table,$id,$name,$user_role); 
        exit;
    }
    else if($role == "2"){
        $table = "lecturer";
        $id = "lecturer_id";
        $name = "name";
        $user_role = "role";
        $loggIn = $log->logged($email_address,$password,$table,$id,$name,$user_role); 
        exit;
    }
}
catch(PDOException $e){
    echo json_encode(
        [
            "message"=>$e
        ]
        );
}
?>