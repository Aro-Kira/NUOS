<?php

include 'db_connection.php';
header('Content-Type: application/json');

$sql = "SELECT course_id, course_name FROM tbl_course";
$result = $conn->query($sql);

$courses = [];
while ($row = $result->fetch_assoc()) {
    $courses[] = $row;
}

echo json_encode($courses);
$conn->close();

?>