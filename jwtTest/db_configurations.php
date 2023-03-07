<?php
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Methods: POST, PUT, DELETE, GET");
header("Access-Control-Allow-Origin: * ");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
class DB_Connection{
    private $db_host = "localhost";
    private $db_name = "jwt-database";
    private $db_username = "root";
    private $db_password = "";

    //private $conn;

    public function db_connect(){
        //$this->conn = null;
        try
        {
            $connection = new PDO("mysql:host=" . $this->db_host . ";dbname=" . $this->db_name, $this->db_username, $this->db_password);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connection;

        }
        catch(PDOException $e){
            echo "Error " . $e->getMessage();
        }   
    }
}
?>