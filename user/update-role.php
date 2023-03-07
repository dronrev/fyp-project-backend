<?php
include_once "../pdo-api.php";

$db = new Operations();
$conn = $db->dbConnection();

$data = file_get_contents("php://input");

$user_id = $data;
$role = "student";

try{
	$sql = "UPDATE `user` SET user_role = :user_role WHERE user_id = :user_id";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':user_id',$user_id);
	$stmt->bindParam('user_role',$role);
	$stmt->execute();
	#echo $data;
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