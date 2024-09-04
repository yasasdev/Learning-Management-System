<?php
// Set the content type to HTML
header('Content-Type: text/html');

// Directory where PDF files are stored
$upload_dir = "uploads/";

// Check if the directory exists
if (is_dir($upload_dir)) {
    // Scan the directory for PDF files
    $pdf_files = array_diff(scandir($upload_dir), array('.', '..'));

    echo "<h2>List of Uploaded PDFs</h2>"; 
    
    if (!empty($pdf_files)) {
        echo "<div class='table-responsive'>";
        echo "<table class='table table-striped table-bordered'>";
            echo "<thead><tr><th>File Name</th><th>Size (KB)</th><th>Download</th></tr></thead>";
            echo "<tbody>";
    
        // Loop through the files and display them in a table
        foreach ($pdf_files as $file) {
            $file_path = $upload_dir . $file;
    
            // Only display PDF files
            if (is_file($file_path) && mime_content_type($file_path) == 'application/pdf') {
                $file_size = round(filesize($file_path) / 1024, 2); // Convert file size to KB
                echo "<tr>";
                echo "<td>" . htmlspecialchars($file) . "</td>";
                echo "<td>" . $file_size . "</td>";
                echo "<td><a href='" . htmlspecialchars($file_path) . "' download>Download</a></td>";
                echo "</tr>";
            }
        }
    
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
    }
     else {
        echo "<p>No PDF files found in the directory.</p>";
    }
} else {
    echo "<p>The uploads directory does not exist.</p>";
}
?>
