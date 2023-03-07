<?php
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Methods: POST, PUT, DELETE, GET, OPTIONS");
header("Access-Control-Allow-Origin: * ");
header('Access-Control-Allow-Credentials: true');
header("Content-Type: application/json,image/jpg,image/gif,image/jpeg,image/png; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
class Operations{
    private $db_host = 'localhost';
    private $db_name = 'pmfki_activity_management_system_1';
    private $db_username = 'root';
    private $db_password = '';

    public function dbConnection(){
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
