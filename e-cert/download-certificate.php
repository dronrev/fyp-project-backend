<?php

// Initialize archive object


// Zip archive will be created only after closing object
#$zip->close();

try{

$file = "./testing.zip";
touch($file);

$zip = new ZipArchive();
$this_zip = $zip->open($file,ZipArchive::CREATE);

if($this_zip){
	$folder = opendir('./broo');

	if($folder){
		while(false !== ($image=readdir($folder))){
			if($image !== "." && $image !==".."){
				$file_name = "./broo/" . $image;
				#$name = "addfile.jpeg";
				$zip->addFile($file_name,$image);
			}
		}
		closedir($folder);
	}
	
}


if(file_exists($file)){
	$download_name = "download.zip";
	header('Content-type : application/zip');
	header('Content-Disposition : attachment;filename = "'.$download_name.'"');
	header('Content-length :' .filesize($file));
	readfile('$file');
	echo json_encode("Download");
}


}
catch(PDOException $e){
	echo json_encode($e);
}

?>