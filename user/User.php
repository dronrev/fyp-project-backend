<?php
include_once "../pdo-api.php";


class User{
    public function deleteUser($user_id){
        $db = new Operations();
        $conn = $db->dbConnection();
        try{
            $sql = "DELETE FROM `user` WHERE `user_id` = :user_id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":user_id",$user_id);
            
            if($stmt->execute()){
                echo json_encode(
                    ["message"=>"deleted"]
                );
            }
            echo json_encode($user_id);

        }
        catch(PDOException $e){
            echo json_encode($e);
        }
    }
    public function getAllId(){
        $db = new Operations();
        $conn = $db->dbConnection();
        try{
            $sql = "SELECT `user_id`,`email_id`,`cawangan` FROM `user`";
            $stmt = $conn->prepare($sql);
            if($stmt->execute()){
                $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                json_encode($data);
                $user_id = $data;
                return $user_id;
            }
        }
        catch(PDOException $e){
            echo json_encode($e);
        }
    }
}

?>