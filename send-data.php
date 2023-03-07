<?php
include_once 'pdo-api.php';
require "./vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
$database = new Operations();
$conn = $database->dbConnection();

$data = json_decode(file_get_contents("php://input"));
    $username = $data->name;
    $password = $data->passwd;
    $email_address = $data->email;
    $matric_number = $data->mat_number;
    $course_code = $data->course_code;
    $user_role = $data->role;
    $cawangan;


    #to determine either KK or Labuan
    switch ($course_code) {
        case 'UH6481001 / HC00':
            $cawangan = "KK";
            break;
        case 'UH6481002 / HC05':
            $cawangan = "KK";

            break;
        case 'UH6481003 / HC12':
            $cawangan = "Labuan";
            break;
        case 'UH641004 / HC13':
            $cawangan = "Labuan";
            break;
        case 'HC14':
            $cawangan = "KK";
            break;
        
        default:
            echo "Course Code is not available";
            break;
    }

    #query to check if the details is exist or not 
    $check = "SELECT `email_id` FROM `user` WHERE email_id = :cekEmail";
    $cekStatement = $conn->prepare($check);
    $cekStatement->bindParam(':cekEmail',$email_address);
    $cekStatement->execute();
    $found = $cekStatement->rowCount();

    #if acc exists
    if($found > 0){
        echo json_encode([
            "message" => "Account exist!!!!"
        ]);
        exit;
    }

    #checking if role selected is taken
    $checkSql = "SELECT `user_role` FROM `user` WHERE user_role = :user_role_check";
    $stmt_check = $conn->prepare($checkSql);
    $stmt_check->bindParam(':user_role_check',$user_role);
    $stmt_check->execute();
    $role_data = $stmt_check -> fetch(PDO::FETCH_ASSOC);
    $foundAccount = $stmt_check->rowCount();
    if($foundAccount > 0 && $role_data == "student"){
        echo json_encode([
            "message" => "Role Is Not Available!"
        ]);
        exit;
    }    

    $sql_stmt = "INSERT INTO `user`(`username`,`password`,`email_id`,`user_id`,`course_id`,`user_role`,`cawangan`) 
    VALUES (:usernamee, :passwd, :email, :mat_number, :course_code, :role, :cawangan)";
    $stmt = $conn->prepare($sql_stmt);
    $stmt->bindParam(':usernamee',$username);
    $stmt->bindParam(':passwd', password_hash($password,PASSWORD_DEFAULT));
    $stmt->bindParam(':email', $email_address);
    $stmt->bindParam(':mat_number', $matric_number);
    $stmt->bindParam(':course_code', $course_code);
    $stmt->bindParam(':role',$user_role);
    $stmt->bindParam(':cawangan',$cawangan);
    
    if($stmt->execute()){
        $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->Username = "";
    $mail->Password = "";

    $mail->setFrom("bernordmusran27@gmail.com", "Vernord Musran");
    $mail->addAddress($email_address,$username);
    $mail->Subject = "PMFKI Registration";

    $mail->Body = "Your account is successfully registered \nUsername : ". $matric_number . "\nPassword : " . $password . "\n\nPlease Do Not Share details with other student!";


    $mail->send();
            http_response_code(201);
            echo json_encode([
                'message' => 'Data Inserted',
            ]);
        exit;
        }
?>