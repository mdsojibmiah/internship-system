<?php
session_start();
include '../../config/db.php';

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'student') {
    header('Location: ../auth/login.php');
    exit();
}

$student_id = $_SESSION['user']['id'];
$message = "";
$messageClass = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['resume'])) {
    $target_dir = "../../public/uploads/";
    $file_name = "resume_" . $student_id . "_" . basename($_FILES["resume"]["name"]);
    $target_file = $target_dir . $file_name;

    // Check if file is PDF
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if ($fileType !== 'pdf') {
        $message = "❌ Only PDF files are allowed.";
        $messageClass = "text-red-600 bg-red-100 border border-red-200";
    } else {
        if (move_uploaded_file($_FILES["resume"]["tmp_name"], $target_file)) {
            $path = "public/uploads/" . $file_name;

            // Check if resume already exists
            $check_sql = "SELECT * FROM resumes WHERE student_id = ?";
            $stmt_check = mysqli_prepare($conn, $check_sql);
            mysqli_stmt_bind_param($stmt_check, "i", $student_id);
            mysqli_stmt_execute($stmt_check);
            mysqli_stmt_store_result($stmt_check);

            if (mysqli_stmt_num_rows($stmt_check) > 0) {
                // Update existing resume
                $update_sql = "UPDATE resumes SET file_path = ? WHERE student_id = ?";
                $stmt_update = mysqli_prepare($conn, $update_sql);
                mysqli_stmt_bind_param($stmt_update, "si", $path, $student_id);
                mysqli_stmt_execute($stmt_update);
                mysqli_stmt_close($stmt_update);
            } else {
                // Insert new resume
                $insert_sql = "INSERT INTO resumes (student_id, file_path) VALUES (?, ?)";
                $stmt_insert = mysqli_prepare($conn, $insert_sql);
                mysqli_stmt_bind_param($stmt_insert, "is", $student_id, $path);
                mysqli_stmt_execute($stmt_insert);
                mysqli_stmt_close($stmt_insert);
            }

            mysqli_stmt_close($stmt_check);

            $message = "✅ Resume uploaded successfully!";
            $messageClass = "text-green-600 bg-green-100 border border-green-200";
        } else {
            $message = "❌ Failed to upload resume.";
            $messageClass = "text-red-600 bg-red-100 border border-red-200";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Upload Resume</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>
<body class="bg-gradient-to-br from-indigo-50 to-white min-h-screen flex items-center justify-center px-4">

  <div class="bg-white shadow-xl rounded-lg w-full max-w-lg p-8">
    <h2 class="text-2xl md:text-3xl font-bold text-indigo-700 text-center mb-6">📄 Upload Your Resume</h2>
    
    <?php if (!empty($message)): ?>
      <div class="mb-4 p-4 rounded <?= htmlspecialchars($messageClass) ?>">
        <?= htmlspecialchars($message) ?>
      </div>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data" class="space-y-6">
      <div>
        <label class="block text-gray-700 font-medium mb-2">Choose your resume (PDF only)</label>
        <input type="file" name="resume" accept="application/pdf" required
               class="w-full border border-gray-300 px-4 py-2 rounded file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-100 file:text-indigo-700 hover:file:bg-indigo-200 transition" />
      </div>
      <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded hover:bg-indigo-700 transition font-semibold">
        Upload Resume
      </button>
    </form>

    <div class="mt-6 text-center">
      <a href="dashboard.php" class="text-sm text-indigo-600 hover:underline">← Back to Dashboard</a>
    </div>
  </div>

</body>
</html>
