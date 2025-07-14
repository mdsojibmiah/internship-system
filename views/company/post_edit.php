<?php
session_start();
include '../../config/db.php'; 

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'company') {
    header('Location: ../auth/login.php');
    exit();
}

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;


$sql = "SELECT * FROM internships WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$post = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);

if (!$post) {
    die("Internship not found");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $desc = $_POST['description'] ?? '';
    $category = $_POST['category'] ?? '';
    $duration = $_POST['duration'] ?? '';
    $stipend = $_POST['stipend'] ?? '';
    $deadline = $_POST['deadline'] ?? '';

    $sql_update = "UPDATE internships SET title=?, description=?, category=?, duration=?, stipend=?, deadline=? WHERE id=?";
    $stmt_update = mysqli_prepare($conn, $sql_update);
    mysqli_stmt_bind_param($stmt_update, "ssssssi", $title, $desc, $category, $duration, $stipend, $deadline, $id);
    mysqli_stmt_execute($stmt_update);
    mysqli_stmt_close($stmt_update);

    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Internship</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>
<body class="bg-gray-100 p-10">
  <form method="POST" class="bg-white p-6 rounded shadow-md w-full max-w-md mx-auto">
    <h2 class="text-2xl font-bold mb-4">Edit Internship</h2>
    <input name="title" value="<?= htmlspecialchars($post['title']) ?>" class="w-full p-2 border mb-4 rounded" required />
    <textarea name="description" class="w-full p-2 border mb-4 rounded" required><?= htmlspecialchars($post['description']) ?></textarea>
    <input name="category" value="<?= htmlspecialchars($post['category']) ?>" class="w-full p-2 border mb-4 rounded" required />
    <input name="duration" value="<?= htmlspecialchars($post['duration']) ?>" class="w-full p-2 border mb-4 rounded" required />
    <input name="stipend" value="<?= htmlspecialchars($post['stipend']) ?>" class="w-full p-2 border mb-4 rounded" required />
    <input type="date" name="deadline" value="<?= htmlspecialchars($post['deadline']) ?>" class="w-full p-2 border mb-4 rounded" required />
    <button class="bg-blue-500 text-white px-4 py-2 rounded w-full">Update</button>
  </form>
</body>
</html>
