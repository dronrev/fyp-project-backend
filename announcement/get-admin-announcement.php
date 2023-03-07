<?php
include_once '../pdo-api.php';

$db = new Operations();
$connection = $db->dbConnection();


$query = "SELECT announcement.user_id,announcement.announcement_id,announcement.title,announcement.subject,announcement.message,admin_pmfki.username,announcement.date_created FROM `announcement` INNER JOIN `admin_pmfki` ON announcement.user_id = admin_pmfki.user_id ORDER BY announcement.date_created DESC";
$stmt = $connection->prepare($query);



if($stmt->execute()){
	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($data);
}
?>