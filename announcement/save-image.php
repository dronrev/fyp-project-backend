<?php
include_once "../pdo-api.php";

$db = new Operations();
$conn = $db->dbConnection();

$file = $_FILES['file'];
$fileName = $file['name'];
$fileTmpName = $file['tmp_name'];
$fileSize = $file['size'];
$fileError = $file['error'];
$fileType = $file['type'];

$data = $_POST['myid'];
$announcement_id = $data;
#$data1 = $data['name'];

#$yourname = $_FILES['yourname'];

$message = "";

$fileExt = explode('.', $fileName);
$fileActualExt = strtolower(end($fileExt));

$allowed = array('jpg', 'jpeg', 'png', 'pdf');

if (in_array($fileActualExt, $allowed)) {
  if ($fileError === 0) {
    if ($fileSize < 1000000) {
      $fileNameNew = $announcement_id . "announce.".$fileActualExt;
      $fileDestination = 'C:/Users/verno/OneDrive/Desktop/fyp-project/src/assets/images/announcement/'.$fileNameNew;
      if(file_exists($fileDestination)){
        unlink($fileDestination);
      }
      move_uploaded_file($fileTmpName, $fileDestination);

      
      $sql = "UPDATE `announcement` SET attachment = :attachment WHERE announcement_id = :announcement_id";
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':announcement_id',$announcement_id);
      $stmt->bindParam(':attachment',$fileNameNew);
      $stmt->execute();


    } else {
      $message = "Your file is too big!";
    }
  } else {
    $message ="There was an error uploading your file!";
  }
} else {
  $message ="You cannot upload files of this type!";
}

echo json_encode(
	[
		"message" => $message
	]
);

?>