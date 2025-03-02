<?php
header("Content-Type: application/json"); // Ensure JSON response
include 'db_connection.php'; // Database connection

define('IMGUR_CLIENT_ID', '9abd92afc81a935'); // Replace with your Imgur Client ID

function uploadToImgur($image) {
    if ($image['error'] !== UPLOAD_ERR_OK) {
        return null;
    }

    $imageData = file_get_contents($image['tmp_name']);
    $base64 = base64_encode($imageData);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.imgur.com/3/image');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Authorization: Client-ID ' . IMGUR_CLIENT_ID]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, ['image' => $base64]);

    $response = curl_exec($ch);
    curl_close($ch);

    $json = json_decode($response, true);
    return $json['data']['link'] ?? null;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $org_name = $_POST['orgName'] ?? '';
    $org_description = $_POST['orgDescription'] ?? '';
    $org_type_id = $_POST['orgType'] ?? 1; // Get the org type ID dynamically

    if (empty($org_name) || empty($org_description)) {
        echo json_encode(["status" => "error", "message" => "All fields are required."]);
        exit;
    }

    // Default logo if no image is uploaded
    $org_logo = 'default_logo.png'; 
    if (!empty($_FILES['orgImage']['tmp_name'])) {
        $org_logo = uploadToImgur($_FILES['orgImage']) ?? $org_logo;
    }

    try {
        $sql = "INSERT INTO tbl_org (org_name, org_type_id, org_description, org_logo) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("siss", $org_name, $org_type_id, $org_description, $org_logo);

        if ($stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Organization added successfully!", "image_url" => $org_logo]);
        } else {
            echo json_encode(["status" => "error", "message" => "Database error: " . $stmt->error]);
        }
    } catch (Exception $e) {
        echo json_encode(["status" => "error", "message" => "Server error: " . $e->getMessage()]);
    }

    $stmt->close();
    $conn->close();
}
?>
