<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Login - Internship Portal</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-indigo-500 via-purple-500 to-pink-500">

  <div class="bg-white rounded-xl shadow-lg overflow-hidden w-full max-w-5xl flex flex-col md:flex-row">
    
    <!-- Left Side Content -->
    <div class="md:w-1/2 bg-gradient-to-br from-indigo-600 to-purple-600 text-white p-10 flex flex-col justify-center rounded-br-[100px]">
      <h2 class="text-3xl font-bold mb-4">Welcome to Internship Portal</h2>
      <p class="text-sm leading-relaxed mb-6">
        Connect with top companies and unlock your future. Your career journey begins here.
      </p>
      <ul class="space-y-3 text-sm">
        <li class="flex items-center">
          <svg class="w-5 h-5 mr-2 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path d="M9 17v-4h6v4m2 4H7a2 2 0 01-2-2V7a2 2 0 012-2h3l2-2h4l2 2h3a2 2 0 012 2v12a2 2 0 01-2 2z" />
          </svg>
          Post & Apply for Internships
        </li>
        <li class="flex items-center">
          <svg class="w-5 h-5 mr-2 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path d="M17 20h5V4H2v16h5m10 0v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4m10 0H7" />
          </svg>
          Manage Applications Easily
        </li>
        <li class="flex items-center">
          <svg class="w-5 h-5 mr-2 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path d="M12 11c1.657 0 3-1.343 3-3S13.657 5 12 5s-3 1.343-3 3 1.343 3 3 3zM5.1 20.2C5.2 17.6 8 16 12 16s6.8 1.6 6.9 4.2c0 .4-.3.8-.8.8H5.9c-.5 0-.8-.4-.8-.8z" />
          </svg>
          Role-Based Secure Login
        </li>
      </ul>
    </div>

    <!-- Right Side Login Form -->
    <div class="md:w-1/2 p-10 bg-white">
      <form action="../../controllers/AuthController.php" method="POST" class="w-full">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Login to Your Account</h2>
        <input type="hidden" name="action" value="login">

        <!-- Email -->
        <div class="mb-4">
          <label class="block mb-1 text-sm text-gray-600">Email</label>
          <div class="flex items-center border rounded px-3 py-2 bg-gray-50">
            <svg class="w-5 h-5 text-gray-400 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path d="M16 12l-4-4-4 4m8 0l-4 4-4-4" />
            </svg>
            <input type="email" name="email" placeholder="you@example.com" required class="bg-transparent outline-none w-full" />
          </div>
        </div>

        <!-- Password -->
        <div class="mb-6">
          <label class="block mb-1 text-sm text-gray-600">Password</label>
          <div class="flex items-center border rounded px-3 py-2 bg-gray-50">
            <svg class="w-5 h-5 text-gray-400 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path d="M12 11c1.657 0 3-1.343 3-3S13.657 5 12 5s-3 1.343-3 3 1.343 3 3 3zM5.1 20.2C5.2 17.6 8 16 12 16s6.8 1.6 6.9 4.2c0 .4-.3.8-.8.8H5.9c-.5 0-.8-.4-.8-.8z" />
            </svg>
            <input type="password" name="password" placeholder="********" required class="bg-transparent outline-none w-full" />
          </div>
        </div>

        <!-- Button -->
        <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded w-full font-medium transition">
          Login
        </button>

        <!-- Register Link -->
        <p class="text-sm mt-4 text-gray-600 text-center">
          Don't have an account?
          <a href="register.php" class="text-indigo-600 font-medium hover:underline">Register here</a>
        </p>
      </form>
    </div>
  </div>

</body>
</html>
