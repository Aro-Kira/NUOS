<?php
include 'db_connection.php';

// Get student ID from AJAX request
$student_id = $_GET['student_id'];

$sql = "SELECT 
            s.student_id,
            CONCAT(s.lname, ', ', s.fname, ' ', s.mname) AS full_name,
            u.instiemail AS school_email,
            u.description AS user_description,
            o.org_name,
            o.org_logo
        FROM tbl_std s
        JOIN tbl_user u ON s.user_id = u.user_id
        LEFT JOIN tbl_org o ON o.org_id = s.course_id  -- Assuming org_id is related to course_id
        WHERE s.student_id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $student_id);
$stmt->execute();
$result = $stmt->get_result();

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// Return JSON response
echo json_encode($data);

$stmt->close();
$conn->close();
?>
