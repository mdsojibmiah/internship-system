<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Register - Internship Portal</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-br from-indigo-500 via-purple-500 to-pink-500">

  <div class="bg-white rounded-2xl shadow-lg overflow-hidden w-full max-w-5xl flex flex-col md:flex-row">
    
    <!-- Left Side Content -->
    <div class="md:w-1/2 bg-gradient-to-br from-indigo-600 to-purple-600 text-white p-10 flex flex-col justify-center rounded-br-[100px]">
      <h2 class="text-3xl font-bold mb-4">Join the Internship Portal</h2>
      <p class="text-sm leading-relaxed mb-6">
        Create your free account and connect with opportunities that shape your future. Whether you're a student or a company, this platform is built for you.
      </p>
      <ul class="space-y-3 text-sm">
        <li class="flex items-center">
          <svg class="w-5 h-5 mr-2 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path d="M5 13l4 4L19 7" />
          </svg>
          Student & Company Friendly
        </li>
        <li class="flex items-center">
          <svg class="w-5 h-5 mr-2 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path d="M12 11c1.657 0 3-1.343 3-3S13.657 5 12 5 9 6.343 9 8s1.343 3 3 3zM5.1 20.2C5.2 17.6 8 16 12 16s6.8 1.6 6.9 4.2c0 .4-.3.8-.8.8H5.9c-.5 0-.8-.4-.8-.8z" />
          </svg>
          Role-based Registration System
        </li>
        <li class="flex items-center">
          <svg class="w-5 h-5 mr-2 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path d="M9 17v-4h6v4m2 4H7a2 2 0 01-2-2V7a2 2 0 012-2h3l2-2h4l2 2h3a2 2 0 012 2v12a2 2 0 01-2 2z" />
          </svg>
          Secure & Scalable Platform
        </li>
      </ul>
    </div>

    <!-- Right Side Register Form -->
    <div class="md:w-1/2 p-10 bg-white rounded-tl-[100px]">
      <form action="../../controllers/AuthController.php" method="POST" class="w-full">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Create Your Account</h2>
        <input type="hidden" name="action" value="register">

        <!-- Name -->
        <div class="mb-4">
          <label class="block mb-1 text-sm text-gray-600">Full Name</label>
          <input name="name" placeholder="Your full name" required class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-purple-500" />
        </div>

        <!-- Email -->
        <div class="mb-4">
          <label class="block mb-1 text-sm text-gray-600">Email</label>
          <input type="email" name="email" placeholder="you@example.com" required class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-purple-500" />
        </div>

        <!-- Password -->
        <div class="mb-4">
          <label class="block mb-1 text-sm text-gray-600">Password</label>
          <input type="password" name="password" placeholder="********" required class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-purple-500" />
        </div>

        <!-- Role -->
        <div class="mb-6">
          <label class="block mb-1 text-sm text-gray-600">Register as</label>
          <select name="role" class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-purple-500">
            <option value="student">Student</option>
            <option value="company">Company</option>
            <option value="admin">Admin</option>
          </select>
        </div>

        <!-- Submit Button -->
        <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-3 rounded w-full font-medium transition">
          Create Account
        </button>

        <!-- Login Link -->
        <p class="text-sm mt-4 text-gray-600 text-center">
          Already have an account?
          <a href="login.php" class="text-indigo-600 font-medium hover:underline">Login here</a>
        </p>
      </form>
    </div>
  </div>

</body>
</html>
