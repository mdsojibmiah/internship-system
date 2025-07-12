<?php
session_start();
require_once '../../config/db.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'company') {
  header('Location: ../auth/login.php');
  exit();
}

$id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM internships WHERE id = ?");
$stmt->execute([$id]);

header("Location: dashboard.php");
exit();
