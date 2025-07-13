<?php
session_start();
include '../../config/db.php';

// Check if admin is logged in
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header('Location: ../auth/login.php');
    exit();
}

// Check if ID is provided
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete user from database
    $sql = "DELETE FROM users WHERE id = $id";
    mysqli_query($conn, $sql);

    // Redirect back
    header("Location: users.php");
    exit();
} else {
    echo "User ID not provided.";
}
