<?php
session_start();
require_once '../../config/db.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header('Location: ../auth/login.php');
    exit();
}

if (!isset($_GET['internship_id'])) {
    die('Internship ID not provided');
}

$internship_id = $_GET['internship_id'];

// Internship details
$stmt = $pdo->prepare("SELECT i.*, u.name AS company_name FROM internships i JOIN users u ON i.company_id = u.id WHERE i.id = ?");
$stmt->execute([$internship_id]);
$internship = $stmt->fetch();

if (!$internship) {
    die('Internship not found');
}

// Applicants list
$stmt = $pdo->prepare("SELECT a.*, s.name AS student_name, s.email FROM applications a JOIN users s ON a.student_id = s.id WHERE a.internship_id = ?");
$stmt->execute([$internship_id]);
$applicants = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Applicants for <?= htmlspecialchars($internship['title']) ?></title>
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
      <h1 class="text-xl font-bold text-indigo-700">👥 Applicants for: <?= htmlspecialchars($internship['title']) ?></h1>
      <a href="internships.php" class="bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 rounded">← Back to Internships</a>
    </div>
  </nav>

  <section class="max-w-7xl mx-auto px-6 py-10">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Company: <?= htmlspecialchars($internship['company_name']) ?></h2>

    <?php if (count($applicants) === 0): ?>
      <div class="bg-yellow-50 border border-yellow-200 p-6 rounded text-center text-yellow-700 shadow">
        No students have applied yet.
      </div>
    <?php else: ?>
      <div class="overflow-x-auto bg-white rounded shadow">
        <table class="min-w-full text-sm text-left">
          <thead class="bg-gray-100 text-gray-600 uppercase tracking-wider">
            <tr>
              <th class="px-6 py-3">#</th>
              <th class="px-6 py-3">Student Name</th>
              <th class="px-6 py-3">Email</th>
              <th class="px-6 py-3">Applied At</th>
              <th class="px-6 py-3">Resume</th>
            </tr>
          </thead>
          <tbody class="divide-y divide-gray-200">
            <?php foreach ($applicants as $index => $a): ?>
              <tr>
                <td class="px-6 py-4"><?= $index + 1 ?></td>
                <td class="px-6 py-4"><?= htmlspecialchars($a['student_name']) ?></td>
                <td class="px-6 py-4"><?= htmlspecialchars($a['email']) ?></td>
                <td class="px-6 py-4"><?= date('d M Y, h:i A', strtotime($a['applied_at'])) ?></td>
                <td class="px-6 py-4">
                  <?php if ($a['resume_path']): ?>
                    <a href="../../uploads/<?= $a['resume_path'] ?>" class="text-blue-600 hover:underline" target="_blank">📄 View</a>
                  <?php else: ?>
                    <span class="text-gray-400 italic">No resume</span>
                  <?php endif; ?>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    <?php endif; ?>
  </section>

  <footer class="bg-white border-t mt-10">
    <div class="max-w-7xl mx-auto px-6 py-4 text-center text-sm text-gray-500">
      © <?= date('Y') ?> Internship Admin Panel. All rights reserved.
    </div>
  </footer>

</body>
</html>
