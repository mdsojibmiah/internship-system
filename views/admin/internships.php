<?php
include '../../config/db.php';
session_start();


// Admin check
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header('Location: ../auth/login.php');
    exit();
}

// Fetch internships with company names
$sql = "SELECT i.*, u.name AS company_name 
        FROM internships i 
        JOIN users u ON i.company_id = u.id 
        ORDER BY i.created_at DESC";

$result = mysqli_query($conn, $sql);

$posts = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $posts[] = $row;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>All Internship Posts</title>
  <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Font: Poppins -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>
<body class="bg-gray-50 min-h-screen">

  <!-- Navbar -->
  <nav class="bg-white shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
      <h1 class="text-xl font-bold text-indigo-700">📋 All Internship Posts</h1>
      <a href="dashboard.php" class="bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 rounded transition">← Back to Dashboard</a>
    </div>
  </nav>

  <!-- Main Content -->
  <section class="max-w-7xl mx-auto px-6 py-10">
    <?php if (count($posts) === 0): ?>
      <div class="text-center bg-yellow-50 border border-yellow-200 text-yellow-700 p-6 rounded shadow">
        <p class="text-lg font-medium">No internship posts found.</p>
      </div>
    <?php else: ?>
      <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php foreach ($posts as $post): ?>
          <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
            <h3 class="text-xl font-semibold text-indigo-700 mb-1">
              <?= htmlspecialchars($post['title']) ?>
            </h3>
            <p class="text-sm text-gray-500 mb-2">Posted by <strong><?= htmlspecialchars($post['company_name']) ?></strong></p>
            <p class="text-sm text-red-500 mb-3">Deadline: <?= htmlspecialchars($post['deadline']) ?></p>
            <p class="text-gray-600 text-sm mb-4">
              <?= strlen($post['description']) > 150 ? substr(htmlspecialchars($post['description']), 0, 150) . '...' : htmlspecialchars($post['description']) ?>
            </p>
            <a href="applicants.php?internship_id=<?= $post['id'] ?>" class="text-sm bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded transition">
              View Applicants
            </a>
          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </section>

  <!-- Footer -->
  <footer class="bg-white mt-20 border-t">
    <div class="max-w-7xl mx-auto px-6 py-4 text-center text-sm text-gray-500">
      © <?= date('Y') ?> Internship Admin Panel. All rights reserved.
    </div>
  </footer>

</body>
</html>
