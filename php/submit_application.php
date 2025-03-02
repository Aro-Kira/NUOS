<?php
include 'db_connection.php';  // Include your database connection file

// Define log file
$logFile = 'application.log';

// Function to write log entries
function writeLog($message) {
    global $logFile;
    $timestamp = date("Y-m-d H:i:s");
    file_put_contents($logFile, "[$timestamp] $message" . PHP_EOL, FILE_APPEND);
}

// Simulated logged-in user session (replace with actual session implementation)
session_start();
$loggedInUserEmail = $_SESSION['user_email'] ?? null; // Assuming email is stored in session after login

if (!$loggedInUserEmail) {
    writeLog("Unauthorized access attempt - No session email found");
    echo "Error: Unauthorized access.";
    exit();
}

// Step 1: Fetch user_id from tbl_user using logged-in user's email
$query = "SELECT user_id FROM tbl_user WHERE instiemail = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $loggedInUserEmail);
$stmt->execute();
$stmt->bind_result($userId);
$stmt->fetch();
$stmt->close();

if (!$userId) {
    writeLog("User ID not found for email: $loggedInUserEmail");
    echo "Error: User record not found.";
    exit();
}

// Step 2: Fetch student_id from tbl_std using user_id
$query = "SELECT student_id FROM tbl_std WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $userId);
$stmt->execute();
$stmt->bind_result($studentId);
$stmt->fetch();
$stmt->close();

if (!$studentId) {
    writeLog("Student ID not found for user ID: $userId");
    echo "Error: Student record not found.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $orgId = $_POST['orgId'] ?? null; // Get orgId from form submission
    $name = $_POST['name'];
    $program = $_POST['program'];
    $section = $_POST['section'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $skills = $_POST['skills'];
    $reason = $_POST['reason'];

    writeLog("New application received for org_id: $orgId, Student: $name (Student ID: $studentId)");

    // Step 3: Fetch or insert membership_id in tbl_membership
    $query = "SELECT membership_id FROM tbl_membership WHERE student_id = ? AND org_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ii", $studentId, $orgId);
    $stmt->execute();
    $stmt->bind_result($membershipId);
    $stmt->fetch();
    $stmt->close();

    // If no existing membership, insert a new one
    if (!$membershipId) {
        $query = "INSERT INTO tbl_membership (student_id, org_id, status_id) VALUES (?, ?, 1)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ii", $studentId, $orgId);
        if ($stmt->execute()) {
            $membershipId = $stmt->insert_id; // Get newly inserted membership ID
        }
        $stmt->close();
    }

    if (!$membershipId) {
        writeLog("Failed to retrieve or insert membership for student ID: $studentId in org ID: $orgId");
        echo "Error: Unable to process membership.";
        exit();
    }

    // Step 4: Insert application into tbl_application using membership_id
    $sql = "INSERT INTO tbl_application (membership_id, reason_for_joining, section, contact_number, address, skills) 
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ississ", $membershipId, $reason, $section, $contact, $address, $skills);

    if ($stmt->execute()) {
        writeLog("Application submitted successfully for $name (Student ID: $studentId)");
        echo "Application submitted successfully!";
        header("Location: org.php");
        exit();
    } else {
        $errorMsg = "Error: " . $stmt->error;
        writeLog("Failed to submit application for $name (Student ID: $studentId) - Error: " . $stmt->error);
        echo $errorMsg;
    }

    $stmt->close();
    $conn->close();
}
?>
