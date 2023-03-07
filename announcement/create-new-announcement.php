<?php
include_once '../pdo-api.php';
include_once '../user/User.php';
$db = new Operations;
$conn = $db->dbConnection();


$data = json_decode(file_get_contents("php://input"));

$query = "SELECT * FROM `announcement`";
$stmt = $conn->prepare($query);
$stmt->execute();
$count = $stmt->rowCount();


$announcement_id = "noti" . uniqid(($count+1));
$role = $data->auth;


if($role == '3'){

	$user_id = $data->id;
	$title = $data->title;
	$subject = $data->subject;
	$message = $data->message;
	$date = $data->date_created;
	$sql = "INSERT INTO `announcement` SET announcement_id = :announcement_id , title = :title, subject = :subject, message = :message,user_id = :user_id, date_created = :date";
	$statement = $conn->prepare($sql);
	$statement->bindParam(':user_id',$user_id);
	$statement->bindParam(':announcement_id',$announcement_id);
	$statement->bindParam(':title',$title);
	$statement->bindParam(':subject',$subject);
	$statement->bindParam(':message',$message);
	$statement->bindParam(':date',$date);

	if($statement->execute()){	
        echo json_encode([
            'message' => 'Data Inserted',
            'id'=>$announcement_id
        ]);
        exit;
    }
}
if($role == '1'){
	$user_id = $data->id;
	$title = $data->title;
	$subject = $data->subject;
	$message = $data->message;
	$date = $data->date_created;
	$sql = "INSERT INTO `announcement` SET announcement_id = :announcement_id , title = :title, subject = :subject, message = :message,user_id = :user_id, date_created = :date";
	$statement = $conn->prepare($sql);
	$statement->bindParam(':user_id',$user_id);
	$statement->bindParam(':announcement_id',$announcement_id);
	$statement->bindParam(':title',$title);
	$statement->bindParam(':subject',$subject);
	$statement->bindParam(':message',$message);
	$statement->bindParam(':date',$date);

	if($statement->execute()){	
        echo json_encode([
            'message' => 'Data Inserted',
            'id'=>$announcement_id
        ]);
	}
	exit;
}



##

?>