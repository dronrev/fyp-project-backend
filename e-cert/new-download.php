<?php
include_once '../pdo-api.php';

$data = json_decode(file_get_contents("php://input"));

$folder = $data->title;
$zip = new ZipArchive();
$zip->open('folder.zip', ZipArchive::CREATE | ZipArchive::OVERWRITE);

$files = new RecursiveIteratorIterator(
  new RecursiveDirectoryIterator($folder),
  RecursiveIteratorIterator::LEAVES_ONLY
);

foreach ($files as $name => $file) {
  if (!$file->isDir()) {
    $filePath = $file->getRealPath();
    $relativePath = substr($filePath, strlen($folder) + 1);
    $zip->addFile($filePath, $relativePath);
  }
}

$zip->close();
header('Content-Type: application/zip');
header('Content-Disposition: attachment; filename="folder.zip"');
header('Content-Length: ' . filesize('folder.zip'));
readfile('folder.zip');
?>