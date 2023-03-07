<?php

include_once "financial.php";

$obj = new Financial();

$data = json_decode(file_get_contents("php://input"));

$a = $obj->getPendahuluan($data->report_id);

#echo $data->report_id;

?>