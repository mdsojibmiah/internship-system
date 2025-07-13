<?php
session_start();
include '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];

    // ========== Register ==========
    if ($action === 'register') {
        $name     = $_POST['name'];
        $email    = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $role     = $_POST['role'];

        $sql = "INSERT INTO users (name, email, password, role) 
                VALUES ('$name', '$email', '$password', '$role')";

        if (mysqli_query($conn, $sql)) {
            header('Location: ../views/auth/login.php');
            exit();
        } else {
            echo "Registration failed: " . mysqli_error($conn);
        }
    }

    // ========== Login ==========
    if ($action === 'login') {
        $email    = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) === 1) {
            $user = mysqli_fetch_assoc($result);

            if (password_verify($password, $user['password'])) {
                $_SESSION['user'] = [
                    'id'   => $user['id'],
                    'name' => $user['name'],
                    'role' => $user['role']
                ];

                // Role-based redirect
                if ($user['role'] === 'student') {
                    header('Location: ../views/student/dashboard.php');
                } elseif ($user['role'] === 'company') {
                    header('Location: ../views/company/dashboard.php');
                } else {
                    header('Location: ../views/admin/dashboard.php');
                }
                exit();
            } else {
                echo "Wrong password.";
            }
        } else {
            echo "User not found.";
        }
    }
}
?>
