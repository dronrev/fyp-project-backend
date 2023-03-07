<?php
include_once "pdo-api.php";
use \Firebase\JWT\JWT;


$db = new Operations();
$conn = $db->dbConnection();

$data = json_decode(file_get_contents("php://input"));

$username = $data->email_address;
$passwd = $data->password;

$sql = "SELECT * FROM `admin_pmfki` WHERE username = :username";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':username',$username);
#$stmt->bindParam(':password',$passwd);
$stmt->execute();
$count = $stmt->rowCount();
if($count > 0){
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  $user_id = $row['username'];
  $pass = $row['password'];
  if($pass == $passwd){
    echo json_encode([
      "token"=>"admin1"
    ]);
  }
}

/*if($count > 0 ){
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
  $user_id = $row['username'];
  $pass = $row['password'];
}
*/
?>