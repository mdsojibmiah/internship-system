<?php
session_start();
include '../../config/db.php'; 

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'company') {
    header('Location: ../auth/login.php');
    exit();
}

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$sql = "DELETE FROM internships WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

header("Location: dashboard.php");
exit();
?>
