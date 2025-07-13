<?php
session_start();
include '../../config/db.php'; 

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'company') {
    header('Location: ../auth/login.php');
    exit();
}

$company_id = $_SESSION['user']['id'];
$internship_id = isset($_GET['internship_id']) ? (int)$_GET['internship_id'] : 0;

// Check if the internship belongs to this company
$sql_check = "SELECT * FROM internships WHERE id = ? AND company_id = ?";
$stmt_check = mysqli_prepare($conn, $sql_check);
mysqli_stmt_bind_param($stmt_check, "ii", $internship_id, $company_id);
mysqli_stmt_execute($stmt_check);
$result_check = mysqli_stmt_get_result($stmt_check);

if (mysqli_num_rows($result_check) == 0) {
    die("Unauthorized access");
}
mysqli_stmt_close($stmt_check);

// Get applications with student info
$sql_applicants = "
    SELECT a.*, u.name, u.email
    FROM applications a
    JOIN users u ON a.student_id = u.id
    WHERE a.internship_id = ?
";
$stmt_applicants = mysqli_prepare($conn, $sql_applicants);
mysqli_stmt_bind_param($stmt_applicants, "i", $internship_id);
mysqli_stmt_execute($stmt_applicants);
$result_applicants = mysqli_stmt_get_result($stmt_applicants);

$applicants = [];
while ($row = mysqli_fetch_assoc($result_applicants)) {
    $applicants[] = $row;
}
mysqli_stmt_close($stmt_applicants);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Applicants</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">
  <h2 class="text-2xl font-bold mb-6">Applicants for Internship ID: <?= htmlspecialchars($internship_id) ?></h2>
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
            <td class="p-2"><?= htmlspecialchars($a['name']) ?></td>
            <td class="p-2"><?= htmlspecialchars($a['email']) ?></td>
            <td class="p-2"><?= htmlspecialchars($a['applied_at']) ?></td>
            <td class="p-2">
              <?php
              // Get resume path for this student
              $sql_resume = "SELECT file_path FROM resumes WHERE student_id = ?";
              $stmt_resume = mysqli_prepare($conn, $sql_resume);
              mysqli_stmt_bind_param($stmt_resume, "i", $a['student_id']);
              mysqli_stmt_execute($stmt_resume);
              mysqli_stmt_bind_result($stmt_resume, $resume_path);
              mysqli_stmt_fetch($stmt_resume);
              mysqli_stmt_close($stmt_resume);
              ?>
              <?php if ($resume_path): ?>
                <a href="../../<?= htmlspecialchars($resume_path) ?>" target="_blank" class="text-blue-500 underline">View Resume</a>
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
