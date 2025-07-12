<?php
$host = 'localhost';
$db   = 'internship_system';
$user = 'root';
$pass = '';         

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    // Enable exceptions
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("DB Connection Failed: " . $e->getMessage());
}
?>
