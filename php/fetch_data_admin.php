<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *'); // Allow all origins (for development)

include 'db_connection.php';

// Fetch data from your table
$sql = "SELECT org_id, org_name, org_description, org_logo FROM tbl_org";
$result = $conn->query($sql);

$data = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = [
            "id" => $row["org_id"], 
            "name" => $row["org_name"], 
            "description" => $row["org_description"], 
            "image_url" => $row["org_logo"]
        ];
    }
}

// Output JSON response
echo json_encode($data, JSON_PRETTY_PRINT);

$conn->close();
?>
