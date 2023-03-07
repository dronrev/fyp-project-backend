<?php
include_once 'db_configurations.php';

$full_name = '';
$email_address = '';
$password1 = '';
$connection = null;

$db = new DB_Connection();
$connection = $db->db_connect();

$api_data = json_decode(file_get_contents("php://input"));

$full_name = $api_data->full_name;
$email_address = $api_data->email;
$password1 = $api_data->password;

$query = "INSERT INTO`jwt-users` SET fullname = :fullname, email_address = :email_address, password = :password";

$stmt = $connection->prepare($query);

$stmt->bindParam(':fullname',$full_name);
$stmt->bindParam(':email_address', $email_address);
$stmt->bindParam(':password', $password1);
$stmt->execute();
?>