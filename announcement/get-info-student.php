<?php

include_once "../user/User.php";

$obj = new User();
$data = $obj->getAllId();

echo json_encode($data);

?>