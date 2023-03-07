<?php
include_once "../pdo-api.php";

$db = new Operations();
$conn = $db->dbConnection();

$data = file_get_contents("php://input");

$sql = "SELECT `title`,`date`,`user_id`,`candidate`,`cawangan` FROM `voting` INNER JOIN `thecandidate` ON voting.vote_id = thecandidate.vote_id WHERE voting.vote_id = :vote_id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':vote_id',$data);
$stmt->execute();
$details = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($details);

?>