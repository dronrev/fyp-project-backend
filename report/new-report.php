<?php
include_once '../pdo-api.php';
require "../vendor/autoload.php";
$db = new Operations;
$conn = $db->dbConnection();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
$data = json_decode(file_get_contents("php://input"));


    $query = "SELECT * FROM `report`";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $count = $stmt->rowCount();
    $id = "r" . uniqid(($count+1));
    
    


    $title = $data->title;
    $organizer = $data->organizer;
    $location = $data->location;
    $user = $data->matric_id;
    $lecturer = $data->value;

    $sql = "INSERT INTO `report` SET report_id = :id ,title = :title , organizer = :organizer , 
    location = :location, user_id = :matric_id , lecturer_id = :lecturer";

    $statement = $conn->prepare($sql);

    $statement->bindParam(':id',$id);
    $statement->bindParam(':title',$title);
    $statement->bindParam(':organizer',$organizer);
    $statement->bindParam(':location',$location);
    $statement->bindParam(':matric_id',$user);
    $statement->bindParam(':lecturer',$lecturer);
    if($statement->execute()){
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

    $mail->Body = "Your student has send new report.\n
    Title : " . $title . "\nOrganizer : " . $organizer . "\nSender : " . $user;

    $mail->send();
            echo json_encode(
                [
                    "message" => "Your report has been created !",
                    "success" => 1
                ]
            );
        }

?>