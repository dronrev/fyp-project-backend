<?php

include_once "../pdo-api.php";

$db = new Operations();
$conn = $db->dbConnection();

$data = json_decode(file_get_contents("php://input"));

$id = $data->value;

$sql = "SELECT `name`,`user_id` FROM `vote` WHERE activity_id = :activity_id";

$statement = $conn->prepare($sql);
$statement->bindParam(':activity_id',$id);
$statement->execute();
if($statement->rowCount() > 0){
	$return_data = $statement->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($return_data);
}
else{
	echo json_encode(
		["message"=>"No Data"]
	);
}

?>