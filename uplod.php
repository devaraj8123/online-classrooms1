<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $targetDir = "uploads/"; // Define the upload directory
    $targetFile = $targetDir . basename($_FILES["document"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if the file already exists
    if (file_exists($targetFile)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Limit file types (allow only certain formats)
    $allowedTypes = ["pdf", "doc", "docx", "txt"];
    if (!in_array($fileType, $allowedTypes)) {
        echo "Sorry, only PDF, DOC, DOCX, and TXT files are allowed.";
        $uploadOk = 0;
    }

    // Check file size (limit to 5MB)
    if ($_FILES["document"]["size"] > 5 * 1024 * 1024) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // If everything is fine, upload file
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["document"]["tmp_name"], $targetFile)) {
            echo "The file " . htmlspecialchars(basename($_FILES["document"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>

<form action="" method="post" enctype="multipart/form-data">
    Select document to upload:
    <input type="file" name="document">
    <input type="submit" value="Upload Document" name="submit">
</form>