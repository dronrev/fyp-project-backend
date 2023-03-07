<?php
require "connect-database.php";

$postdata = file_get_contents("php://input");

if(isset($postdata) && !empty($postdata)){
    $request = json_encode($postdata);

    $username = trim($request->$username);
    $matric = trim($request->$matric);
    $password = mysqli_real_escape_string($mysqli, trim($request->$password));
    $email = mysqli_real_escape_string($mysqli, trim($request->$email));

    $data = "INSERT INTO user(username, password, email, matric_number) VALUES ('$username',
    '$matric','$password','$email')";
}


?>