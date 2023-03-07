<?php
include_once "financial.php";

$obj = new Financial();
$data = json_decode(file_get_contents("php://input"));

if(is_null($data)){
	echo json_encode("No Data");
}
else{
	$a = $obj->sendPendahuluan($data);
}

?>