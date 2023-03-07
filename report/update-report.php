<?php
require '../pdo-api.php';

$data = json_decode(file_get_contents("php://input"));

$title = $data->title;
$report_id = $data->report_id;
$objective = $data->objective;
$introduction = $data->introduction;
$involvement = $data->involvement;
$perkara = $data->perkara;
$jemputan_vip = $data->vip;
$impak_program = $data->impak;
$pencapaian = $data->pencapaian;
$rumusan = $data->rumusan;
$cadangan = $data->cadangan;

try{
    $database = new Operations();
$conn = $database->dbConnection();

$query = "UPDATE `report` SET title = :title, objective = :objective, introduction = :introduction, 
involvement = :involvement, perkara_hendak_maklum = :perkara_h_m, jemputan_vip = :jemputan_vip, impak_program = :impak_program,
pencapaian = :pencapaian, rumusan = :rumusan, cadangan = :cadangan WHERE report_id = :id ";
$stmt = $conn->prepare($query);
$stmt->bindParam('title',$title);
$stmt->bindParam(':id',$report_id);
$stmt->bindParam(':objective',$objective);
$stmt->bindParam(':introduction',$introduction);
$stmt->bindParam(':involvement',$involvement);
$stmt->bindParam(':perkara_h_m',$perkara);
$stmt->bindParam(':jemputan_vip',$jemputan_vip);
$stmt->bindParam(':impak_program',$impak_program);
$stmt->bindParam(':pencapaian',$pencapaian);
$stmt->bindParam(':rumusan',$rumusan);
$stmt->bindParam(':cadangan',$cadangan);
if($stmt->execute()){
	echo json_encode(
    ["message" => "Data saved successfully!"]
);
}
else{
	echo json_encode(
    ["message" => "Something went wrong!"]
);
}

}
catch(PDOException $e){
    echo "Connection error" . $e->getMessage();
    exit;
}
?>