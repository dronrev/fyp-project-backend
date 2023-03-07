<?php
include_once "../pdo-api.php";

$db = new Operations();
$conn = $db->dbConnection();

$report_id = $_POST['report_id'];

#echo json_encode($report_id);
$dir_name = "C:/Users/verno/OneDrive/Desktop/fyp-project/src/assets/images/report-attachment/" . $report_id;
if(!file_exists($dir_name)){
	mkdir($dir_name);
}

#$file_dir = $dir_name . $report_id;

foreach ($_FILES['image']['name'] as $key => $value) {
    $uploadfile = $dir_name ."/". basename($_FILES['image']['name'][$key]);
    if (move_uploaded_file($_FILES['image']['tmp_name'][$key], $uploadfile)) {
        echo "File is valid, and was successfully uploaded.\n";
    } else {
        echo "Upload failed";
    }
}

?>