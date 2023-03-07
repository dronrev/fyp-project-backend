<?php
include_once '../pdo-api.php';
require "../vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$database = new Operations();
$conn = $database->dbConnection();

$data = json_decode(file_get_contents("php://input"));


    
    #bind data to var
    $username = $data->name;
    $password = $data->passwd;
    $email = $data->email;
    $role = $data->role;

    $check = "SELECT `email_id` FROM `lecturer` WHERE email_id = :cekEmail";
    $cekStatement = $conn->prepare($check);
    $cekStatement->bindParam(':cekEmail',$email);
    $cekStatement->execute();
    $found = $cekStatement->rowCount();

    #if acc exists
    if($found > 0){
        echo json_encode([
            "message" => "Account exist!!!!"
        ]);
        exit;
    }

    $sql = "INSERT INTO `lecturer`(`name`,`password`,`email_id`,`role`) VALUES(:name,:pwd,:email,:role)";
    $hashPwd = password_hash($password,PASSWORD_DEFAULT);
    $statement = $conn->prepare($sql);
    $statement->bindParam(':name',$username);
    $statement->bindParam(':pwd',$hashPwd);
    $statement->bindParam(':email',$email);
    $statement->bindParam(':role',$role);

    if($statement->execute()){
    #email to user
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->Username = "vernordmusran27@gmail.com";
    $mail->Password = "wxnbwtkglysjzxlb";
    $mail->setFrom("bernordmusran27@gmail.com", "Vernord Musran");
    $mail->addAddress($email,$username);
    $mail->Subject = "PMFKI Registration";

    $mail->Body = "Your account is successfully registered \nUsername : ". $username . "\nPassword : " . $password . "\nEmail Address : ". 
    $email ."\n\nPlease Do Not Share details with other user!\n"
    . "Enter the system with email.";

    $mail->send();
            http_response_code(201);
            echo json_encode([
                'message' => 'Account added successfully!'
            ]);
        exit;
        }
?>