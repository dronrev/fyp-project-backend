<?php
include_once '../pdo-api.php';
require "../vendor/autoload.php";
include_once '../budget/financial.php';
#database object
$db = new Operations;
$conn = $db->dbConnection();

#php mailer to send email
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

#budget report object to add data
$obj = new Financial();
$b = $obj->ReportCount();

$data = json_decode(file_get_contents("php://input"));


    $query = "SELECT * FROM `report`";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $count = $stmt->rowCount();
    $id = "r" . uniqid(($count+1));

    $activity_id = $data->activity_id;
    $user = $data->matric_id;
    #$lecturer = $data->value;

    $sql = "INSERT INTO `report` SET report_id = :id, user_id = :matric_id, activity_id = :activity_id";
    $statement = $conn->prepare($sql);
    $statement->bindParam(':id',$id);
    $statement->bindParam(':matric_id',$user);
    $statement->bindParam(':activity_id',$activity_id);
    #$statement->bindParam(':lecturer',$lecturer);

    if($statement->execute()){
    #add data to budget database
    $countB = $b;
    $budget_id = "b" . uniqid($countB+1);
    $queryToBudget = "INSERT INTO `budget` SET report_id = :Bid, budget_id = :budget_id";
    $bStmt = $conn->prepare($queryToBudget);
    $bStmt->bindParam(':Bid',$id);
    $bStmt->bindParam(':budget_id',$budget_id);
    $bStmt->execute();

    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->SMTPAuth = true;

    $mail->Host = "smtp.gmail.com";
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->Username = "vernordmusran27@gmail.com";
    $mail->Password = "";

    $mail->setFrom("bernordmusran27@gmail.com", "Vernord Musran");
    $mail->addAddress("bernordmusran27@gmail.com","");
    $mail->Subject = "New Report";

    $mail->Body = "Your student has send new report.\nSender : " . $user;

    $mail->send();
            echo json_encode(
                [
                    "message" => "Your report has been created !",
                    "success" => 1
                ]
            );
        }

?>