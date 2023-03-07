<?php
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow_Crednetials: true');
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Content-Type: application/json; charset=UTF-8");
$servername = "localhost";
$username = "root";
$password = "";
$database_name = "test";
$connect_database = mysqli_connect($servername,$username,$password,$database_name);

if(!$connect_database){
    die("Connection failed" .mysqli_connect_error());
}
echo "Connection success !";

?>