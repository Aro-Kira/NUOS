<?php
header("Content-Type: application/json"); // Ensure JSON response

include 'db_connection.php'; // Database connection

// Fetch organizations with their type names
$sql = "SELECT 
            o.org_id, 
            o.org_name, 
            o.org_logo, 
            o.org_description,  
            o.org_type_id, 
            t.org_type_name 
        FROM tbl_org o
        JOIN tbl_org_type t ON o.org_type_id = t.org_type_id";

$result = $conn->query($sql);

$organizations = [];

if ($result) {
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $row['org_type_id'] = (int) $row['org_type_id']; // Convert to integer
            $organizations[] = $row;
        }
    }
} else {
    echo json_encode(["error" => "Database query failed"]);
    exit;
}

// Return JSON response
echo json_encode($organizations, JSON_PRETTY_PRINT);

// Close connection
$conn->close();
?>
