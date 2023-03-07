<?php
include_once "financial.php";

$data = json_decode(file_get_contents("php://input"));

$obj = new Financial();

$total = $obj->getTotal($data);

?>