<?php
session_start();
require_once '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    if ($action === 'register') {
        $name     = $_POST['name'];
        $email    = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $role     = $_POST['role'];

        $stmt = $pdo->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $email, $password, $role]);

        header('Location: ../views/auth/login.php');
        exit();
    }

    if ($action === 'login') {
        $email    = $_POST['email'];
        $password = $_POST['password'];

        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user'] = [
                'id'   => $user['id'],
                'name' => $user['name'],
                'role' => $user['role']
            ];

            // Redirect based on role
            if ($user['role'] === 'student') {
                header('Location: ../views/student/dashboard.php');
            } elseif ($user['role'] === 'company') {
                header('Location: ../views/company/dashboard.php');
            } else {
                header('Location: ../views/admin/dashboard.php');
            }
            exit();
        } else {
            echo "Invalid credentials.";
        }
    }
}
