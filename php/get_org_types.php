<?php
header("Content-Type: application/json");
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'db_connection.php';

// Check database connection
if (!$conn) {
    echo json_encode(["status" => "error", "message" => "Database connection failed"]);
    exit;
}

$sql = "SELECT org_type_id, org_type_name FROM tbl_org_type";
$result = $conn->query($sql);

if (!$result) {
    echo json_encode(["status" => "error", "message" => "SQL error: " . $conn->error]);
    exit;
}

$orgTypes = [];
while ($row = $result->fetch_assoc()) {
    $orgTypes[] = $row;
}

echo json_encode($orgTypes);
$conn->close();
?>
