<?php
// Start session and check if company user is logged in
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'company') {
    header('Location: ../auth/login.php');
    exit();
}

// Database connection
require_once '../../config/db.php';

// Get logged in company ID
$company_id = $_SESSION['user']['id'];

// Fetch internships posted by the company
$stmt = $pdo->prepare("SELECT * FROM internships WHERE company_id = ?");
$stmt->execute([$company_id]);
$internships = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Company Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>
<body class="bg-gray-100 min-h-screen">

  <!-- Sidebar + Navbar Layout -->
  <div class="flex flex-col md:flex-row min-h-screen">
    
    <!-- Sidebar -->
    <aside class="bg-white shadow-md w-full md:w-64 p-6 sticky top-0 md:h-screen">
      <h1 class="text-2xl font-bold text-indigo-700 mb-8">🏢 Dashboard</h1>
      <ul class="space-y-4 text-gray-700">
        <li><a href="dashboard.php" class="block px-4 py-2 rounded hover:bg-indigo-100">📄 Internship Posts</a></li>
        <li><a href="post_create.php" class="block px-4 py-2 rounded hover:bg-indigo-100">➕ Create New Post</a></li>
        <li><a href="../auth/logout.php" class="block px-4 py-2 text-red-500 hover:bg-red-100">🚪 Logout</a></li>
      </ul>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6">
      <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
        <div>
          <h2 class="text-2xl font-bold text-gray-800 mb-1">Welcome, <?= htmlspecialchars($_SESSION['user']['name']) ?></h2>
          <p class="text-sm text-gray-500">Here’s a summary of your internship posts.</p>
        </div>
        <a href="post_create.php" class="bg-green-500 text-white px-5 py-2 rounded hover:bg-green-600 transition">+ New Post</a>
      </div>

      <?php if (count($internships) === 0): ?>
        <div class="bg-yellow-100 text-yellow-800 p-6 rounded-lg text-center shadow">
          <p class="text-lg font-semibold">You haven’t posted any internships yet.</p>
          <p class="text-sm mt-1">Click the green button to post your first internship!</p>
        </div>
      <?php else: ?>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
          <?php foreach ($internships as $post): ?>
            <div class="bg-white p-5 rounded-xl shadow-md hover:shadow-lg transition duration-300 flex flex-col justify-between">
              <div>
                <h3 class="text-xl font-semibold text-indigo-700"><?= htmlspecialchars($post['title']) ?></h3>
                <p class="text-gray-600 text-sm mt-2 mb-3"><?= nl2br(htmlspecialchars($post['description'])) ?></p>
                <p class="text-sm text-red-500 font-medium">Deadline: <?= htmlspecialchars($post['deadline']) ?></p>
              </div>
              <div class="mt-4 space-y-2">
                <a href="post_edit.php?id=<?= $post['id'] ?>" class="block text-center bg-blue-100 text-blue-700 px-4 py-2 rounded hover:bg-blue-200">✏️ Edit</a>
                <a href="applicants.php?internship_id=<?= $post['id'] ?>" class="block text-center bg-purple-100 text-purple-700 px-4 py-2 rounded hover:bg-purple-200">👥 View Applicants</a>
                <a href="post_delete.php?id=<?= $post['id'] ?>" onclick="return confirm('Are you sure to delete this post?')" class="block text-center bg-red-100 text-red-600 px-4 py-2 rounded hover:bg-red-200">🗑️ Delete</a>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </main>
  </div>

</body>
</html>
