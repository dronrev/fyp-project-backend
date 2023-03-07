<?php

include_once "../pdo-api.php";

$db = new Operations();
$conn = $db->dbConnection();

$sql = "SELECT tempat_pertama,tempat_kedua,tempat_ketiga,yuran_pendapatan,peruntukan_hep,bajet_diluluskan,jumlah_cek,title,date FROM `budget` 
INNER JOIN `report` ON budget.report_id = report.report_id 
INNER JOIN `activity` ON report.activity_id = activity.activity_id WHERE status = 4 ORDER BY date DESC";

$stmt = $conn->prepare($sql);

if($stmt->execute()){
	$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($data);
}

?>