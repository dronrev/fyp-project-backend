<?php
include_once '../pdo-api.php';

$db = new Operations();
$connection = $db->dbConnection();


$query = "SELECT announcement.user_id,announcement.announcement_id,announcement.title,announcement.subject,announcement.message,user.username,announcement.date_created FROM `announcement` INNER JOIN `user` ON announcement.user_id = user.user_id ORDER BY announcement.date_created DESC";
$stmt = $connection->prepare($query);



if($stmt->execute()){
	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($data);
}
?>