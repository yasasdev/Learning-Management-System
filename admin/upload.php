<?php
header('Content-Type: application/json');

$response = array('status' => '', 'message' => '');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['pdf']) && !empty($_FILES['pdf']['name'])) {
        $file_name = $_FILES['pdf']['name'];
        $file_type = $_FILES['pdf']['type'];
        $file_size = $_FILES['pdf']['size'];
        $file_tmp_name = $_FILES['pdf']['tmp_name'];

        $allowed_types = array("application/pdf");

        if (in_array($file_type, $allowed_types)) {
            $upload_dir = "uploads/";

            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }

            $file_path = $upload_dir . basename($file_name);

            if (move_uploaded_file($file_tmp_name, $file_path)) {
                $response['status'] = 'success';
                $response['message'] = "The file ". htmlspecialchars($file_name) ." has been uploaded successfully.";
            } else {
                $response['status'] = 'error';
                $response['message'] = "Sorry, there was an error uploading your file.";
            }
        } else {
            $response['status'] = 'error';
            $response['message'] = "Error: Only PDF files are allowed.";
        }
    } else {
        $response['status'] = 'error';
        $response['message'] = "Error: No file uploaded or file input is empty.";
    }
} else {
    $response['status'] = 'error';
    $response['message'] = "Invalid request.";
}

echo json_encode($response);
?>