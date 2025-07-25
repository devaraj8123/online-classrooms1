<?php
$folderPath = "uploads/"; // Change this to your folder

if (isset($_GET['file'])) {
    $file = basename($_GET['file']);
    $filePath = $folderPath . $file;

    if (file_exists($filePath)) {
        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachment; filename=" . $file);
        readfile($filePath);
        exit;
    } else {
        echo "File not found!";
    }
} else
    echo "Invalid request!";
?>