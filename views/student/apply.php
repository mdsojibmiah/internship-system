<?php
session_start();
include '../../config/db.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'student') {
    header('Location: ../auth/login.php');
    exit();
}

$internship_id = $_GET['id'];
$student_id = $_SESSION['user']['id'];

// Prepare and check duplicate application
$sql_check = "SELECT * FROM applications WHERE internship_id = ? AND student_id = ?";
$stmt = mysqli_prepare($conn, $sql_check);
mysqli_stmt_bind_param($stmt, "ii", $internship_id, $student_id);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);

if (mysqli_stmt_num_rows($stmt) == 0) {
    // Insert new application
    $sql_insert = "INSERT INTO applications (internship_id, student_id) VALUES (?, ?)";
    $stmt_insert = mysqli_prepare($conn, $sql_insert);
    mysqli_stmt_bind_param($stmt_insert, "ii", $internship_id, $student_id);
    mysqli_stmt_execute($stmt_insert);
    mysqli_stmt_close($stmt_insert);
}

mysqli_stmt_close($stmt);

header('Location: my_applications.php');
exit();
?>