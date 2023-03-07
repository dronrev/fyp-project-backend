<?php
include_once "./User.php";
include_once "../pdo-api.php";

$data = json_decode(file_get_contents("php://input"));
$user_id = $data->user_id;
$db = new Operations();
$conn = $db->dbConnection();
try{
    $sql = "DELETE FROM `user` WHERE user_id = :user_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':user_id',$user_id);
    $stmt->execute();
    echo json_decode(
        $user_id
    );
    echo"anjing";

}
catch(PDOException $e){
    echo json_encode($e);
}

?>