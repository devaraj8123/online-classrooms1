<?php
$folderPath = "uploads/"; // Change this to your folder

// Check if the folder exists
if (is_dir($folderPath)) {
    $files = scandir($folderPath); // Get all files

    echo "<h3>Available Files:</h3><ul>";
    foreach ($files as $file) {
        if ($file != "." && $file != "..") { // Ignore system files
            echo "<li>$file - <a href='download.php?file=" . urlencode($file) . "'>Download</a></li>";
        }
    }
    echo "</ul>";
} else {
    echo "Folder does not exist!";
}
?>