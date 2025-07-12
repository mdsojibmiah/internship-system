<?php
session_start();
require_once '../../config/db.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'company') {
    header('Location: ../auth/login.php');
    exit();
}

$company_id = $_SESSION['user']['id'];
$internship_id = $_GET['internship_id'] ?? 0;

// Check if the internship belongs to this company
$check = $pdo->prepare("SELECT * FROM internships WHERE id = ? AND company_id = ?");
$check->execute([$internship_id, $company_id]);
if ($check->rowCount() == 0) {
    die("Unauthorized access");
}

// Get applications with student info
$stmt = $pdo->prepare("
    SELECT a.*, u.name, u.email
    FROM applications a
    JOIN users u ON a.student_id = u.id
    WHERE a.internship_id = ?
");
$stmt->execute([$internship_id]);
$applicants = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Applicants</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">
  <h2 class="text-2xl font-bold mb-6">Applicants for Internship ID: <?= $internship_id ?></h2>
  <a href="dashboard.php" class="text-blue-600 mb-4 inline-block">← Back to Dashboard</a>

  <?php if (count($applicants) === 0): ?>
    <p>No applicants found yet.</p>
  <?php else: ?>
    <table class="w-full bg-white rounded shadow">
      <thead>
        <tr class="bg-gray-200 text-left">
          <th class="p-2">#</th>
          <th class="p-2">Name</th>
          <th class="p-2">Email</th>
          <th class="p-2">Applied At</th>
          <th class="p-2">Resume</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($applicants as $index => $a): ?>
          <tr class="border-t">
            <td class="p-2"><?= $index + 1 ?></td>
            <td class="p-2"><?= $a['name'] ?></td>
            <td class="p-2"><?= $a['email'] ?></td>
            <td class="p-2"><?= $a['applied_at'] ?></td>
            <td class="p-2">
              <?php
              $res = $pdo->prepare("SELECT file_path FROM resumes WHERE student_id = ?");
              $res->execute([$a['student_id']]);
              $resume = $res->fetchColumn();
              ?>
              <?php if ($resume): ?>
                <a href="../../<?= $resume ?>" target="_blank" class="text-blue-500 underline">View Resume</a>
              <?php else: ?>
                <span class="text-red-400">Not Uploaded</span>
              <?php endif; ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>
</body>
</html>
