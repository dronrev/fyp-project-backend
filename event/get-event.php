<?php
include_once "../pdo-api.php";
include_once "event.php";

$conn = new Event();
$data = $conn->getEvent();
echo json_encode($data);

?>