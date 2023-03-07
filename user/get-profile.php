<?php
include_once "../pdo-api.php";

$db = new Operations();
$conn = $db->dbConnection();

$data = json_decode(file_get_contents("php://input"));

#$data = "bi19110110";

$user_id = $data->id;

$sql = "SELECT `profilepic` FROM `user` WHERE user_id = :user_id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':user_id',$user_id);
$stmt->execute();

$url = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($url);
#$img = file_get_contents("C:/Users/verno/OneDrive/Desktop/fyp-project/src/assets/images/profile-picture/". json_encode($url));
#$img = file_get_contents("C:/xampp/htdocs/fyp-project/assets/profile_picture/63bf0592e636b3.93349558.jpg");
#echo $img;


#readfile("C:/Users/verno/OneDrive/Desktop/fyp-project/src/assets/images/profile-picture/63c8d83e842466.11585652.jpg");

#echo json_encode([
#	"data"=>"C:/xampp/htdocs/fyp-project/assets/profile_picture/63bf0592e636b3.93349558.jpg"

#]);

?>