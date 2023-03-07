<?php
include_once 'get-report.php';

$data = json_decode(file_get_contents("php://input"));

$id = $data->id;
$role = $data->auth;

$col1 = 'user_id';
$get = new GetReport();

if($role == '1'){
    $getreport = $get->getReport($id,$col1);
}
if($role == '2'){
    $getreport = $get->getReportLect($id,$col1);
}


?>