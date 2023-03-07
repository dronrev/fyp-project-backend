<?php
include_once "event.php";

$conn = new Event();
$data = $conn->getEvent();

$rowcount = count($data);
echo $rowcount;


?>