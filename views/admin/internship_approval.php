<?php
include '../../config/db.php';
session_start();

// Admin login check
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header('Location: ../auth/login.php');
    exit();
}

// Approve or reject post
if (isset($_GET['action']) && isset($_GET['id'])) {
    $status = $_GET['action'] === 'approve' ? 'approved' : 'rejected';
    $id = $_GET['id'];

    $sql = "UPDATE internships SET status = '$status' WHERE id = $id";
    mysqli_query($conn, $sql);

    header("Location: internship_approval.php");
    exit();
}

// Fetch all internships with company name
$sql = "SELECT i.*, u.name AS company_name 
        FROM internships i 
        JOIN users u ON i.company_id = u.id 
        ORDER BY i.created_at DESC";

$result = mysqli_query($conn, $sql);

$posts = [];
while ($row = mysqli_fetch_assoc($result)) {
    $posts[] = $row;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Internship Approval</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen">
  <div class="max-w-7xl mx-auto px-6 py-10">
    <h1 class="text-2xl font-bold mb-6 text-indigo-700">Internship Post Approvals</h1>
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
      <?php foreach ($posts as $post): ?>
        <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
          <h3 class="text-xl font-semibold text-indigo-700 mb-1">
            <?= htmlspecialchars($post['title']) ?>
          </h3>
          <p class="text-sm text-gray-500 mb-2">Company: <?= htmlspecialchars($post['company_name']) ?></p>
          <p class="text-sm text-gray-400 mb-2">Status: <span class="font-semibold uppercase <?= $post['status'] === 'pending' ? 'text-yellow-600' : ($post['status'] === 'approved' ? 'text-green-600' : 'text-red-600') ?>">
            <?= htmlspecialchars($post['status']) ?></span></p>
          <div class="flex gap-3 mt-3">
            <a href="?action=approve&id=<?= $post['id'] ?>" class="bg-green-500 text-white px-3 py-1 rounded text-sm">Approve</a>
            <a href="?action=reject&id=<?= $post['id'] ?>" class="bg-red-500 text-white px-3 py-1 rounded text-sm">Reject</a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</body>
</html>
