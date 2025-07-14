<?php
session_start();
include '../../config/db.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'student') {
    header('Location: ../auth/login.php');
    exit();
}

$student_id = $_SESSION['user']['id'];

$sql = "SELECT a.*, i.title, i.deadline, u.name AS company_name
        FROM applications a
        JOIN internships i ON a.internship_id = i.id
        JOIN users u ON i.company_id = u.id
        WHERE a.student_id = $student_id";

$result = mysqli_query($conn, $sql);
$applications = [];

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $applications[] = $row;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>My Applications</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>
<body class="bg-gray-100 min-h-screen py-10 px-6 md:px-20">

  <!-- Page Header -->
  <div class="mb-10 flex flex-col md:flex-row items-start md:items-center justify-between">
    <h1 class="text-3xl font-bold text-indigo-700 mb-4 md:mb-0">🎓 My Internship Applications</h1>
    <a href="dashboard.php" class="text-sm bg-indigo-600 text-white px-5 py-2 rounded hover:bg-indigo-700 transition">
      ← Back to Dashboard
    </a>
  </div>

  <!-- Applications List -->
  <?php if (count($applications) > 0): ?>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
      <?php foreach ($applications as $app): ?>
        <div class="bg-white rounded-xl shadow hover:shadow-lg transition p-6">
          <!-- Company logo initials -->
          <div class="flex items-center space-x-4 mb-4">
            <div class="w-12 h-12 flex items-center justify-center bg-indigo-100 text-indigo-700 font-bold rounded-full text-xl">
              <?= strtoupper(substr($app['company_name'], 0, 1)) ?>
            </div>
            <div>
              <h3 class="text-lg font-semibold text-gray-800"><?= htmlspecialchars($app['title']) ?></h3>
              <p class="text-sm text-gray-500">at <?= htmlspecialchars($app['company_name']) ?></p>
            </div>
          </div>

          <!-- Application status -->
          <div class="mt-4">
            <span class="text-sm font-medium mr-2">Status:</span>
            <?php
              $status = strtolower($app['status']);
              $statusColor = match($status) {
                'pending' => 'bg-yellow-100 text-yellow-700',
                'accepted' => 'bg-green-100 text-green-700',
                'rejected' => 'bg-red-100 text-red-700',
                default => 'bg-gray-100 text-gray-600',
              };
            ?>
            <span class="px-3 py-1 rounded-full text-xs font-semibold <?= $statusColor ?>">
              <?= ucfirst($status) ?>
            </span>
          </div>

          <!-- Date Info -->
          <p class="mt-2 text-sm text-gray-500">📅 Applied on: 
            <?= date("M d, Y", strtotime($app['applied_at'])) ?>
          </p>
        </div>
      <?php endforeach; ?>
    </div>
  <?php else: ?>
    <div class="text-center text-gray-600 text-lg mt-20">
      You haven’t applied to any internships yet.<br>
      <a href="dashboard.php" class="text-indigo-600 hover:underline font-medium">Browse internships now →</a>
    </div>
  <?php endif; ?>

</body>
</html>
