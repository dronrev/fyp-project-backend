<?php

include_once "financial.php";

$obj = new Financial();
$data = file_get_contents("php://input");

if(is_null($data)){
	echo "Nothing";
}
else{
	$details = $obj->getFinancialDetails($data);
}

?>