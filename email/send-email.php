<?php
require "../vendor/autoload.php";


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);

$mail->SMTPDebug = SMTP::DEBUG_SERVER;

$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = "smtp.gmail.com";
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;

$mail->Username = "vernordmusran27@gmail.com";
$mail->Password = "wxnbwtkglysjzxlb";

$mail->setFrom("bernordmusran27@gmail.com", "Vernord Musran");
$mail->addAddress("bi19110110@student.ums.edu.my","Edly");
$mail->Subject = "Yusrim Banchod";

$mail->Body = "Notification";

$mail->send();
echo "Sent";


?>