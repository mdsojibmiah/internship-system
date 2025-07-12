<?php
session_start();
require_once '../../config/db.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header('Location: ../auth/login.php');
    exit();
}

$stmt = $pdo->query("SELECT * FROM users ORDER BY role, name");
$users = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Manage Users</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-4 sm:p-10">
  <div class="max-w-6xl mx-auto">
    <h2 class="text-2xl font-bold mb-4 sm:mb-6">👥 All Registered Users</h2>
    <a href="dashboard.php" class="text-blue-600 mb-6 inline-block">← Back to Dashboard</a>

    <!-- Large Screen Table -->
    <div class="hidden md:block">
      <table class="w-full bg-white rounded shadow overflow-hidden">
        <thead>
          <tr class="bg-gray-200 text-left text-sm text-gray-700">
            <th class="p-3">ID</th>
            <th class="p-3">Name</th>
            <th class="p-3">Email</th>
            <th class="p-3">Role</th>
            <th class="p-3">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($users as $user): ?>
            <tr class="border-t hover:bg-gray-50 text-sm">
              <td class="p-3"><?= $user['id'] ?></td>
              <td class="p-3"><?= htmlspecialchars($user['name']) ?></td>
              <td class="p-3"><?= htmlspecialchars($user['email']) ?></td>
              <td class="p-3"><?= ucfirst($user['role']) ?></td>
              <td class="p-3">
                <a href="delete_user.php?id=<?= $user['id'] ?>" class="text-red-500 hover:underline" onclick="return confirm('Delete user?')">Delete</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <!-- Mobile Cards -->
    <div class="md:hidden space-y-4">
      <?php foreach ($users as $user): ?>
        <div class="bg-white rounded-lg shadow p-4 text-sm space-y-2">
          <p><span class="font-semibold">ID:</span> <?= $user['id'] ?></p>
          <p><span class="font-semibold">Name:</span> <?= htmlspecialchars($user['name']) ?></p>
          <p><span class="font-semibold">Email:</span> <?= htmlspecialchars($user['email']) ?></p>
          <p><span class="font-semibold">Role:</span> <?= ucfirst($user['role']) ?></p>
          <a href="delete_user.php?id=<?= $user['id'] ?>" class="text-red-500 font-semibold inline-block mt-2" onclick="return confirm('Delete user?')">🗑️ Delete</a>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</body>
</html>
