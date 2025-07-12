<?php
session_start();
require_once '../../config/db.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header('Location: ../auth/login.php');
    exit();
}

$id = $_GET['id'];
$pdo->prepare("DELETE FROM users WHERE id = ?")->execute([$id]);

header("Location: users.php");
exit();
