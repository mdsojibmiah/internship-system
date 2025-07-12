<?php
session_start();
require_once '../../config/db.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'company') {
  header('Location: ../auth/login.php');
  exit();
}

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM internships WHERE id = ?");
$stmt->execute([$id]);
$post = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $title = $_POST['title'];
  $desc = $_POST['description'];
  $category = $_POST['category'];
  $duration = $_POST['duration'];
  $stipend = $_POST['stipend'];
  $deadline = $_POST['deadline'];

  $stmt = $pdo->prepare("UPDATE internships SET title=?, description=?, category=?, duration=?, stipend=?, deadline=? WHERE id=?");
  $stmt->execute([$title, $desc, $category, $duration, $stipend, $deadline, $id]);

  header("Location: dashboard.php");
  exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Internship</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Google Font: Poppins -->
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
    <input name="title" value="<?= $post['title'] ?>" class="w-full p-2 border mb-4 rounded" />
    <textarea name="description" class="w-full p-2 border mb-4 rounded"><?= $post['description'] ?></textarea>
    <input name="category" value="<?= $post['category'] ?>" class="w-full p-2 border mb-4 rounded" />
    <input name="duration" value="<?= $post['duration'] ?>" class="w-full p-2 border mb-4 rounded" />
    <input name="stipend" value="<?= $post['stipend'] ?>" class="w-full p-2 border mb-4 rounded" />
    <input type="date" name="deadline" value="<?= $post['deadline'] ?>" class="w-full p-2 border mb-4 rounded" />
    <button class="bg-blue-500 text-white px-4 py-2 rounded w-full">Update</button>
  </form>
</body>
</html>
