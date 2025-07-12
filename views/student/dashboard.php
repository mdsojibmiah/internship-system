<?php
session_start();
require_once '../../config/db.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'student') {
    header('Location: ../auth/login.php');
    exit();
}

$stmt = $pdo->query("SELECT i.*, u.name AS company_name 
                    FROM internships i
                    JOIN users u ON i.company_id = u.id
                    ORDER BY i.deadline ASC");
$internships = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Student Dashboard</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/feather-icons"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
    /* Sidebar fixed height scrollbar */
    #sidebar {
      height: 100vh;
    }
  </style>
</head>
<body class="bg-gray-50 min-h-screen flex">

  <!-- Sidebar -->
  <aside id="sidebar" class="fixed left-0 top-0 z-40 w-64 bg-white shadow-md h-full transform -translate-x-full md:translate-x-0 transition-transform duration-300">
    <div class="flex items-center justify-center h-16 border-b">
      <h1 class="text-indigo-700 font-bold text-xl">🎓 Student</h1>
    </div>
    <nav class="mt-6 flex flex-col px-4 space-y-1">
      <a href="dashboard.php" class="flex items-center px-3 py-2 rounded-md text-indigo-700 font-semibold bg-indigo-100 hover:bg-indigo-200">
        <i data-feather="home" class="w-5 h-5 mr-3"></i> Dashboard
      </a>
      <a href="upload_resume.php" class="flex items-center px-3 py-2 rounded-md text-gray-700 hover:bg-indigo-100 hover:text-indigo-700 transition">
        <i data-feather="upload" class="w-5 h-5 mr-3"></i> Upload Resume
      </a>
      <a href="my_applications.php" class="flex items-center px-3 py-2 rounded-md text-gray-700 hover:bg-indigo-100 hover:text-indigo-700 transition">
        <i data-feather="file-text" class="w-5 h-5 mr-3"></i> My Applications
      </a>
      <a href="../auth/logout.php" class="flex items-center px-3 py-2 rounded-md text-red-600 hover:bg-red-100 hover:text-red-700 transition mt-auto">
        <i data-feather="log-out" class="w-5 h-5 mr-3"></i> Logout
      </a>
    </nav>
  </aside>

  <!-- Overlay for mobile -->
  <div id="overlay" class="fixed inset-0 bg-black bg-opacity-30 z-30 hidden md:hidden"></div>

  <!-- Main content -->
  <div class="flex-1 ml-0 md:ml-64 flex flex-col min-h-screen">

    <!-- Top Navbar -->
    <header class="flex items-center justify-between bg-white shadow-md h-16 px-4 md:hidden sticky top-0 z-50">
      <button id="sidebar-toggle" class="text-indigo-700 focus:outline-none">
        <i data-feather="menu" class="w-6 h-6"></i>
      </button>
      <h1 class="text-lg font-bold text-indigo-700">🎓 Student Dashboard</h1>
      <div></div> <!-- placeholder to keep space -->
    </header>

    <!-- Page Content -->
    <main class="p-6">
      <h2 class="text-2xl sm:text-3xl font-bold mb-8 text-gray-800">Available Internships</h2>

      <?php if (count($internships) === 0): ?>
        <p class="text-gray-500 text-center">No internships available at the moment.</p>
      <?php else: ?>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
          <?php foreach ($internships as $job): ?>
            <div class="bg-white p-6 rounded-lg shadow hover:shadow-lg transition">
              <h3 class="text-lg sm:text-xl font-semibold text-indigo-700 mb-2"><?= htmlspecialchars($job['title']) ?></h3>
              <p class="text-sm text-gray-500 mb-1">Company: <strong><?= htmlspecialchars($job['company_name']) ?></strong></p>
              <p class="text-gray-700 text-sm mb-3 line-clamp-3"><?= nl2br(htmlspecialchars($job['description'])) ?></p>
              <p class="text-sm mb-4 text-red-500 font-medium">Deadline: <?= htmlspecialchars($job['deadline']) ?></p>
              <a href="apply.php?id=<?= $job['id'] ?>" class="inline-block bg-indigo-600 text-white px-4 py-2 text-sm rounded hover:bg-indigo-700 transition">Apply Now</a>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </main>
  </div>

  <script>
    feather.replace();

    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');
    const toggleBtn = document.getElementById('sidebar-toggle');

    function openSidebar() {
      sidebar.classList.remove('-translate-x-full');
      overlay.classList.remove('hidden');
    }
    function closeSidebar() {
      sidebar.classList.add('-translate-x-full');
      overlay.classList.add('hidden');
    }

    toggleBtn.addEventListener('click', () => {
      if(sidebar.classList.contains('-translate-x-full')) {
        openSidebar();
      } else {
        closeSidebar();
      }
    });

    overlay.addEventListener('click', closeSidebar);
  </script>
</body>
</html>
