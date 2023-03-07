<?php
include_once 'pdo-api.php';
$database = new Operations();
$conn = $database->dbConnection();

include_once "./event/event.php";

$counting = new Event();
$input = $counting->getEvent();

$rowcount = count($input);


$data = json_decode(file_get_contents("php://input"));

    $id = "a" . uniqid(($rowcount+1));
    $name_activity = $data->name_activity;
    $location = $data->location;
    $organizer = $data->organizer;
    $tema = $data->tema;
    $date = $data->date;
    $pengarah = $data->pengarah;

    $sql_stmt = "INSERT INTO `activity`
    SET activity_id = :id ,name_activity = :name_activity, location = :location, tema = :tema, organizer = :organizer, pengarah = :pengarah, date = :date";

    $stmt = $conn->prepare($sql_stmt);

    $stmt->bindParam(':id',$id);
    $stmt->bindParam(':name_activity', $name_activity);
    $stmt->bindParam(':location', $location);
    $stmt->bindParam(':organizer', $organizer);
    $stmt->bindParam(':tema', $tema);
    $stmt->bindParam(':date',$date);
    $stmt->bindParam(':pengarah',$pengarah);

    if($stmt->execute()){
        http_response_code(201);
        echo json_encode([
            'success' => 1,
            'message' => 'Data Inserted'
        ]);
    exit;
    }

?>