<?php
include_once '../pdo-api.php';

require "../vendor/autoload.php";

$data = json_decode(file_get_contents("php://input"));

$email = $data->email_id;
$name = $data->username;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = "smtp.gmail.com";
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;

$mail->Username = "";
$mail->Password = "";

#send to all PMFKI members

	$mail->setFrom("bernordmusran27@gmail.com", "Vernord Musran");
	$mail->addAddress($email,$name);
	$mail->Subject = "New Announcement from PMFKI ADMIN";

	$mail->Body = "There is a new announcement. Please login to your account!";

	$mail->send();
    echo json_encode(
        [
            "message" => "Announcement has been emailed!",
            "success" => 1
        ]
    );
?>