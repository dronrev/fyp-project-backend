<?php
include_once "../pdo-api.php";
class Event{
    public function getEvent(){
        $database = new Operations();
        $conn = $database->dbConnection();

        $sql = "SELECT * FROM `activity`
        INNER JOIN `user` ON activity.pengarah = user.user_id ORDER BY date DESC";

        $statement = $conn->prepare($sql);
        $statement->execute();

        $data = $statement->fetchAll(PDO::FETCH_ASSOC);

        //echo json_encode($data);
        return $data;
    }
}

?>