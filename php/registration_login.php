<?php
// Include database connection
include 'db_connection.php';

$log_file = 'logfile.txt';

// Function to log messages
function write_log($message) {
    global $log_file;
    $timestamp = date("Y-m-d H:i:s");
    $log_entry = "[$timestamp] $message" . PHP_EOL;
    file_put_contents($log_file, $log_entry, FILE_APPEND | LOCK_EX);
}

if (isset($_POST['sign_up'])) {
    $role_id = 2; // Default role_id for regular users
    $description = "Regular User";
    $first_name = trim($_POST['txt_reg_Fname']);
    $middle_name = trim($_POST['txt_reg_Mname']);
    $last_name = trim($_POST['txt_reg_Lname']);
    $email = trim($_POST['txt_reg_email']);
    $password = trim($_POST['txt_reg_pword']); // Storing plain text password (not recommended)
    $student_ID = str_replace('-', '', trim($_POST['txt_reg_studID']));
    $course_ID = 1;
    $year_ID = 1;

    if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !str_ends_with($email, '@students.nu-fairview.edu.ph')) {
        write_log("Invalid email format: $email");
        header("Location: ../index.php?message=invalid_email");
        exit();
    }

    $conn->begin_transaction();

    try {
        // Insert into tbl_user
        $sql_user = "INSERT INTO tbl_user (role_id, instiemail, description, password) VALUES (?, ?, ?, ?)";
        $stmt_user = $conn->prepare($sql_user);
        $stmt_user->bind_param("isss", $role_id, $email, $description, $password);
        $stmt_user->execute();
        $user_id = $conn->insert_id; // Get the auto-incremented user_id

        // Insert into tbl_std
        $sql_std = "INSERT INTO tbl_std (student_id, lname, fname, mname, course_id, year_id, user_id) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt_std = $conn->prepare($sql_std);
        $stmt_std->bind_param("isssiii", $student_ID, $last_name, $first_name, $middle_name, $course_ID, $year_ID, $user_id);
        $stmt_std->execute();

        $conn->commit();
        
        write_log("New user registered: $email (Student ID: $student_ID, User ID: $user_id)");
        header("Location: ../index.php?message=success");
        exit();
    } catch (Exception $e) {
        $conn->rollback();
        write_log("Database error: " . $e->getMessage());
        header("Location: ../index.php?message=failed");
        exit();
    } finally {
        $stmt_user->close();
        $stmt_std->close();
    }
}

// Handle Sign In logic
if (isset($_POST['sign_in'])) {
    $email = $_POST['txt_email'];
    $password = $_POST['txt_pword'];

    $sql = "SELECT password FROM tbl_user WHERE instiemail = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($stored_password);
    $stmt->fetch();

    if ($stored_password && $password === $stored_password) {
        session_start();
        $_SESSION['user_email'] = $email;
        header("Location: welcome.php");
        exit();
    } else {
        write_log("Failed login attempt for: $email");
        header("Location: ../index.php?message=failed");
        exit();
    }
}

$stmt->close();
$conn->close();
?>
