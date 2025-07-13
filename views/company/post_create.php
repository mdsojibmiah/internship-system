<?php
include '../../config/db.php'; 
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'company') {
  header('Location: ../auth/login.php');
  exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $company_id = $_SESSION['user']['id'];
  $title = $_POST['title'];
  $desc = $_POST['description'];
  $category = $_POST['category'];
  $duration = $_POST['duration'];
  $stipend = $_POST['stipend'];
  $deadline = $_POST['deadline'];

  // Prepare statement
  $sql = "INSERT INTO internships (company_id, title, description, category, duration, stipend, deadline) VALUES (?, ?, ?, ?, ?, ?, ?)";
  $stmt = mysqli_prepare($conn, $sql);

  // Bind parameters (all strings except company_id which is int)
  mysqli_stmt_bind_param($stmt, "issssss", $company_id, $title, $desc, $category, $duration, $stipend, $deadline);

  // Execute statement
  mysqli_stmt_execute($stmt);

  // Close statement
  mysqli_stmt_close($stmt);

  header("Location: dashboard.php");
  exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Post Internship</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Google Font: Poppins -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>
<body class="bg-gray-100 p-10">
  <form method="POST" class="bg-white p-6 rounded shadow-md w-full max-w-md mx-auto">
    <h2 class="text-2xl font-bold mb-4">Create Internship</h2>
    <input name="title" placeholder="Internship Title" required class="w-full p-2 border mb-4 rounded" />
    <textarea name="description" placeholder="Description" required class="w-full p-2 border mb-4 rounded"></textarea>
    <input name="category" placeholder="Category" class="w-full p-2 border mb-4 rounded" />
    <input name="duration" placeholder="Duration (e.g. 3 months)" class="w-full p-2 border mb-4 rounded" />
    <input name="stipend" placeholder="Stipend (e.g. 5000 BDT)" class="w-full p-2 border mb-4 rounded" />
    <input name="deadline" type="date" required class="w-full p-2 border mb-4 rounded" />
    <button class="bg-blue-500 text-white px-4 py-2 rounded w-full">Post</button>
  </form>
</body>
</html>
