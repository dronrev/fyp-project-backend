<?php
include_once "../pdo-api.php";

$db = new Operations();
$conn = $db->dbConnection();

$data = json_decode(file_get_contents("php://input"));



    $username = $data->name;
    $password = $data->passwd;
    $email_address = $data->email;
    $matric_number = $data->mat_number;
    $course_code = $data->course_code;
    $user_role = $data->role;

    $check_user = "SELECT `user_id` FROM `user` WHERE `user_id` = :mat_no";
    $stmt_check = $conn->prepare($check_user);
    $stmt_check->bindParam(':mat_no',$matric_number);
    $stmt_check->execute();
    if($stmt_check->rowCount() > 0){
        echo json_encode([
            "message" => "Your application is failed. Matric ID is already registered!",
            "message2"=> "Please contact the president for further information"
        ]);
        return;
    }

    $check_email = "SELECT `user_id` FROM `user` WHERE `email_id` = :reg_email";
    $stmt_email = $conn->prepare($check_email);
    $stmt_email->bindParam(':reg_email',$email_address);
    $stmt_email->execute();
    if($stmt_email->rowCount() > 0){
        echo json_encode([
            "message" => "Your application is failed. Email address is already registered!",
            "message2"=> "Please contact the president for further information"
        ]);
        return;
    }

    $sql = "INSERT INTO `pending`(`username`,`password`,`email_id`,`user_id`,`course_id`,`user_role`) 
    VALUES (:usernamee, :passwd, :email, :mat_number, :course_code, :role)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':usernamee',$username);
    $stmt->bindParam(':passwd',$password);
    $stmt->bindParam(':email', $email_address);
    $stmt->bindParam(':mat_number', $matric_number);
    $stmt->bindParam(':course_code', $course_code);
    $stmt->bindParam(':role',$user_role);

    if($stmt->execute()){
    	echo json_encode([
    		"message" => "Your application has been send!",
    		"message2"=> "Please contact the president for further information"
    	]);
    }
?>