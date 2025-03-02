<?php

include 'db_connection.php';

session_start();
header('Content-Type: application/json');

$first_login = isset($_SESSION['first_login']) ? $_SESSION['first_login'] : true;

if ($first_login) {
    $_SESSION['first_login'] = false; // Mark as not first login after showing modal
}

echo json_encode(["first_login" => $first_login]);
?>
