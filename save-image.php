<?php

include_once "./pdo-api.php";

$db = new Operations();
$conn = $db->dbConnection();

$data = json_decode(file_get_contents("php://input"));

?>