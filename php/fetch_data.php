<?php
session_start();
include 'db_connection.php'; // Ensure database connection is included

// Check if user is logged in
if (!isset($_SESSION['user_email'])) {
    echo json_encode(["error" => "User not logged in"]);
    exit();
}

$email = $_SESSION['user_email'];
$pageOrgID = isset($_GET['id']) ? intval($_GET['id']) : 0; // Get org_id from URL

$response = ["student_id" => null, "status" => null, "joined_orgs" => []];

// Fetch student ID from tbl_user and tbl_std
$sql = "SELECT s.student_id FROM tbl_user u 
        JOIN tbl_std s ON u.user_id = s.user_id 
        WHERE u.instiemail = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->bind_result($studentID);
$stmt->fetch();
$stmt->close();

if (!empty($studentID)) {
    $response["student_id"] = $studentID;

    // Fetch membership status for the current organization
    $sql_status = "SELECT status FROM tbl_membership WHERE student_id = ? AND org_id = ?";
    $stmt_status = $conn->prepare($sql_status);
    $stmt_status->bind_param("ii", $studentID, $pageOrgID);
    $stmt_status->execute();
    $stmt_status->bind_result($membershipStatus);
    $stmt_status->fetch();
    $stmt_status->close();

    $response["status"] = $membershipStatus ?? null;

    // Fetch all orgs the student has joined
    $sql_check = "SELECT org_id FROM tbl_membership WHERE student_id = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("i", $studentID);
    $stmt_check->execute();
    $result = $stmt_check->get_result();

    while ($row = $result->fetch_assoc()) {
        $response["joined_orgs"][] = $row["org_id"];
    }

    $stmt_check->close();
} else {
    $response["error"] = "Student ID not found.";
}

// Return JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>
