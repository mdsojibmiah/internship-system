<?php
session_start();
require_once '../../config/db.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header('Location: ../auth/login.php');
    exit();
}

$stmt = $pdo->query("SELECT a.*, u.name AS student_name, i.title AS internship_title
                    FROM applications a
                    JOIN users u ON a.student_id = u.id
                    JOIN internships i ON a.internship_id = i.id
                    ORDER BY a.applied_at DESC");
$apps = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>All Internship Applications</title>
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
  <nav class="bg-white shadow sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
      <h1 class="text-xl font-bold text-indigo-700">📄 All Internship Applications</h1>
      <a href="dashboard.php" class="bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 rounded">← Back to Dashboard</a>
    </div>
  </nav>

  <section class="max-w-7xl mx-auto px-6 py-10">

    <?php if (count($apps) === 0): ?>
      <div class="bg-yellow-50 border border-yellow-200 p-6 rounded text-center text-yellow-700 shadow">
        No applications submitted yet.
      </div>
    <?php else: ?>
      <div class="overflow-x-auto bg-white rounded-lg shadow">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-100 text-gray-600 uppercase text-sm">
            <tr>
              <th class="px-6 py-3 text-left">#</th>
              <th class="px-6 py-3 text-left">Student</th>
              <th class="px-6 py-3 text-left">Internship</th>
              <th class="px-6 py-3 text-left">Status</th>
              <th class="px-6 py-3 text-left">Applied At</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-100 text-gray-700 text-sm">
            <?php foreach ($apps as $index => $app): ?>
              <tr class="hover:bg-gray-50">
                <td class="px-6 py-4 font-medium"><?= $index + 1 ?></td>
                <td class="px-6 py-4"><?= htmlspecialchars($app['student_name']) ?></td>
                <td class="px-6 py-4"><?= htmlspecialchars($app['internship_title']) ?></td>
                <td class="px-6 py-4">
                  <span class="px-2 py-1 rounded-full text-white text-xs font-semibold
                    <?= $app['status'] === 'pending' ? 'bg-yellow-500' : ($app['status'] === 'approved' ? 'bg-green-600' : 'bg-red-500') ?>">
                    <?= ucfirst($app['status']) ?>
                  </span>
                </td>
                <td class="px-6 py-4"><?= date('d M Y, h:i A', strtotime($app['applied_at'])) ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    <?php endif; ?>

  </section>

  <!-- Footer -->
  <footer class="bg-white border-t mt-10">
    <div class="max-w-7xl mx-auto px-6 py-4 text-center text-sm text-gray-500">
      © <?= date('Y') ?> Internship Admin Panel. All rights reserved.
    </div>
  </footer>

</body>
</html>
