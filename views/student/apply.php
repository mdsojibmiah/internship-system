<?php
session_start();
require_once '../../config/db.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'student') {
    header('Location: ../auth/login.php');
    exit();
}

$internship_id = $_GET['id'];
$student_id = $_SESSION['user']['id'];

// Prevent duplicate application
$stmt = $pdo->prepare("SELECT * FROM applications WHERE internship_id = ? AND student_id = ?");
$stmt->execute([$internship_id, $student_id]);

if ($stmt->rowCount() == 0) {
    $apply = $pdo->prepare("INSERT INTO applications (internship_id, student_id) VALUES (?, ?)");
    $apply->execute([$internship_id, $student_id]);
}

header('Location: my_applications.php');
exit();
