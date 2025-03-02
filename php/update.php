<?php
session_start();
include 'db_connection.php'; // Ensure this file contains your database connection logic

header('Content-Type: application/json');

$log_file = 'log.txt';

function log_message($message) {
    global $log_file;
    error_log("[" . date("Y-m-d H:i:s") . "] " . $message . "\n", 3, $log_file);
}

log_message("Script execution started.");

// Check if user is logged in
if (!isset($_SESSION['user_email'])) {
    log_message("Error: User not logged in.");
    echo json_encode(["status" => "error", "message" => "User not logged in."]);
    exit();
}

$email = $_SESSION['user_email'];
$new_course_id = $_POST['course_id'] ?? null;

log_message("User email: $email, New Course ID: $new_course_id");

// Validate input
if (!$new_course_id) {
    log_message("Error: Invalid course ID.");
    echo json_encode(["status" => "error", "message" => "Invalid course ID."]);
    exit();
}

// Fetch student_id from tbl_user
$sql = "SELECT student_id FROM tbl_user WHERE instiemail = ?";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    log_message("Error: Prepare statement failed - " . $conn->error);
    echo json_encode(["status" => "error", "message" => "Database error."]);
    exit();
}

$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->bind_result($studentID);
$stmt->fetch();
$stmt->close();

log_message("Fetched Student ID: " . ($studentID ?: "Not found"));

if (!$studentID) {
    log_message("Error: Student ID not found for email $email.");
    echo json_encode(["status" => "error", "message" => "Student ID not found."]);
    exit();
}

// Update course_id in tbl_std
$sql_update = "UPDATE tbl_std SET course_id = ? WHERE student_id = ?";
$stmt_update = $conn->prepare($sql_update);

if (!$stmt_update) {
    log_message("Error: Prepare statement for update failed - " . $conn->error);
    echo json_encode(["status" => "error", "message" => "Database error."]);
    exit();
}

$stmt_update->bind_param("ss", $new_course_id, $studentID);

if ($stmt_update->execute()) {
    log_message("Success: Course updated for Student ID $studentID with Course ID $new_course_id.");
    echo json_encode(["status" => "success", "message" => "Course updated successfully."]);
} else {
    log_message("Error: Failed to update course for Student ID $studentID - " . $stmt_update->error);
    echo json_encode(["status" => "error", "message" => "Failed to update course."]);
}

$stmt_update->close();
$conn->close();

log_message("Script execution completed.");
?>
