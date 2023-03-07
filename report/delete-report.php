<?php

include_once './get-report.php';

$data = file_get_contents("php://input");

$report_id = $data;

$obj = new DeleteReport();

$delete = $obj->deleteReport($report_id);

?>