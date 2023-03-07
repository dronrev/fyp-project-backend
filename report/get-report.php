<?php
require '../pdo-api.php';

class GetReport{
    public function getReport($id=null,$column=null){
        try{
            $database = new Operations();
            $conn = $database->dbConnection();
            $sql ="SELECT * FROM `activity`
            INNER JOIN `report` ON activity.activity_id = report.activity_id
             WHERE user_id = :user_id"; 
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':user_id',$id);
            $stmt->execute();
        
            if($stmt->rowCount() > 0):
                $data = null;
                $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode(
                    $data
                );
            endif; 
        }
        catch(PDOException $e){
            echo "Connection error" . $e->getMessage();
            exit;
        }
    }
    public function getReportLect($id=null,$column=null){
        try{
            $database = new Operations();
            $conn = $database->dbConnection();
            $sql ="SELECT * FROM `report` WHERE lecturer_id = :user_id"; 
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':user_id',$id);
            $stmt->execute();
        
            if($stmt->rowCount() > 0):
                $data = null;
                $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode(
                    $data
                );
            endif; 
        }
        catch(PDOException $e){
            echo "Connection error" . $e->getMessage();
            exit;
        }
    }

    public function allReport(){
        try{
            $database = new Operations();
            $conn = $database->dbConnection();
            $sql ="SELECT * FROM `activity`
            INNER JOIN `report` ON activity.activity_id = report.activity_id";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            $count = $stmt->rowCount();

            if($count>0){
                $data = null;
                $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode($data);
            }
        }
        catch(PDOException $e){
            echo "Connection error" . $e->getMessage();
            exit;
        }
    }
}

class SendReport{
    //$array = array();
    public function sendreport($report_id=null
    ,$objective=null,$introduction=null,
    $involvement=null,$perkara=null,
    $jemputan_vip=null,$impak_program=null,
    $pencapaian=null,$rumusan=null){

    }

    public function sendStatus($status,$report_id){
        $database = new Operations();
        $conn = $database->dbConnection();
        $sql = "UPDATE `report` SET status = :status WHERE report_id = :report_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':status',$status);
        $stmt->bindParam(':report_id',$report_id);
        $stmt->execute();
    }
}

class DeleteReport{
    public function deleteReport($report_id=""){
        $database = new Operations();
        $conn = $database->dbConnection();
        $sql = "DELETE FROM `report` WHERE report_id = :report_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':report_id',$report_id);
        $stmt->execute();
    }
}
?>