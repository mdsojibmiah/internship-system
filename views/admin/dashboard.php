<?php
session_start();
require_once '../../config/db.php';

// Check if admin is logged in
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header('Location: ../auth/login.php');
    exit();
}

// Fetch all required statistics
$users = $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn();
$students = $pdo->query("SELECT COUNT(*) FROM users WHERE role = 'student'")->fetchColumn();
$companies = $pdo->query("SELECT COUNT(*) FROM users WHERE role = 'company'")->fetchColumn();
$internships = $pdo->query("SELECT COUNT(*) FROM internships")->fetchColumn();
$applications = $pdo->query("SELECT COUNT(*) FROM applications")->fetchColumn();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Admin Dashboard</title>
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
  <!-- Sidebar & Navbar Wrapper -->
  <div class="flex flex-col lg:flex-row">
    <!-- Sidebar -->
    <aside class="bg-white shadow-lg lg:w-64 w-full lg:h-screen p-5 space-y-4 sticky top-0 z-40">
      <div class="flex justify-between items-center lg:block">
        <h1 class="text-2xl font-bold text-indigo-700">🛡️ Admin</h1>
        <button id="menu-toggle" class="lg:hidden text-gray-600 focus:outline-none">
          ☰
        </button>
      </div>
      <nav id="menu" class="mt-8 lg:mt-4 space-y-2 hidden lg:block">
        <a href="dashboard.php" class="block px-4 py-2 rounded hover:bg-indigo-100 text-gray-700">📊 Dashboard</a>
        <a href="users.php" class="block px-4 py-2 rounded hover:bg-indigo-100 text-gray-700">👥 Manage Users</a>
        <a href="internships.php" class="block px-4 py-2 rounded hover:bg-indigo-100 text-gray-700">📢 Internships</a>
        <a href="applications.php" class="block px-4 py-2 rounded hover:bg-indigo-100 text-gray-700">📄 Applications</a>
        <a href="../auth/logout.php" class="block px-4 py-2 text-red-500 hover:bg-red-100 font-semibold">🚪 Logout</a>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6">
      <div class="flex flex-col sm:flex-row justify-between items-center mb-8">
        <h2 class="text-3xl font-bold text-gray-800">📊 Dashboard Overview</h2>
        <span class="text-gray-600">Welcome, <?= htmlspecialchars($_SESSION['user']['name']) ?></span>
      </div>

      <!-- Cards -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
        <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition">
          <h3 class="text-lg font-semibold text-gray-700">👥 Total Users</h3>
          <p class="text-3xl font-bold text-indigo-600 mt-2"><?= $users ?></p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition">
          <h3 class="text-lg font-semibold text-gray-700">🎓 Students</h3>
          <p class="text-3xl font-bold text-green-600 mt-2"><?= $students ?></p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition">
          <h3 class="text-lg font-semibold text-gray-700">🏢 Companies</h3>
          <p class="text-3xl font-bold text-yellow-600 mt-2"><?= $companies ?></p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition">
          <h3 class="text-lg font-semibold text-gray-700">📢 Internship Posts</h3>
          <p class="text-3xl font-bold text-purple-600 mt-2"><?= $internships ?></p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition">
          <h3 class="text-lg font-semibold text-gray-700">📄 Applications</h3>
          <p class="text-3xl font-bold text-red-600 mt-2"><?= $applications ?></p>
        </div>
      </div>

      <!-- Quick Actions -->
      <h3 class="text-2xl font-semibold text-gray-800 mb-5">⚡ Quick Actions</h3>
      <div class="flex flex-col sm:flex-row sm:flex-wrap gap-4">
        <a href="users.php" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded shadow w-full sm:w-auto text-center">👥 Manage Users</a>
        <a href="internships.php" class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded shadow w-full sm:w-auto text-center">📢 View Internships</a>
        <a href="applications.php" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded shadow w-full sm:w-auto text-center">📄 View Applications</a>
      </div>
    </main>
  </div>

  <!-- Footer -->
  <footer class="bg-white mt-20 border-t">
    <div class="max-w-7xl mx-auto px-4 py-4 text-center text-sm text-gray-500">
      © <?= date('Y') ?> Internship System Admin Panel. All rights reserved.
    </div>
  </footer>

  <!-- JS -->
  <script>
    document.getElementById('menu-toggle').addEventListener('click', function () {
      const menu = document.getElementById('menu');
      menu.classList.toggle('hidden');
    });
  </script>
</body>

</html>