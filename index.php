<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Internship Management System</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/feather-icons"></script>
  <!-- In <head> tag -->
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
/>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <!-- Google Font: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public/css/style.css">

</head>
<body class="bg-gray-50 text-gray-800 font-sans">

  <!-- Navbar -->
  <nav class="bg-white shadow sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between h-16">
        <div class="flex items-center">
          <a href="index.php" class="text-2xl font-bold text-indigo-600">Internship</a>
        </div>
        <div class="hidden md:flex items-center space-x-6">
          <a href="index.php" class="hover:text-indigo-600">Home</a>
          <a href="#services" class="hover:text-indigo-600">Services</a>
          <a href="#testimonials" class="hover:text-indigo-600">Testimonials</a>
          <a href="#footer" class="hover:text-indigo-600">Contact</a>
          <a href="views/auth/register.php" class="text-indigo-600 font-semibold px-4 py-2 border border-indigo-600 rounded hover:bg-indigo-600 hover:text-white transition">Sign Up</a>
          <a href="views/auth/login.php" class="text-gray-700 font-semibold px-4 py-2 rounded hover:bg-indigo-600 hover:text-white transition">Sign In</a>
        </div>

        <!-- Mobile Hamburger -->
        <div class="flex items-center md:hidden">
          <button id="menu-btn" class="focus:outline-none">
            <i data-feather="menu" class="w-6 h-6"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-white shadow-lg">
     <a href="inde.php" class="block px-4 py-2 border-b border-gray-200    hover:bg-indigo-50">Home</a>
      <a href="#services" class="block px-4 py-2 border-b border-gray-200 hover:bg-indigo-50">Services</a>
      <a href="#testimonials" class="block px-4 py-2 border-b border-gray-200 hover:bg-indigo-50">Testimonials</a>
      <a href="#footer" class="block px-4 py-2 border-b border-gray-200 hover:bg-indigo-50">Contact</a>
      <a href="views/auth/register.php" class="block px-4 py-2 border-b border-gray-200 hover:bg-indigo-600 hover:text-white">Sign Up</a>
      <a href="views/auth/login.php" class="block px-4 py-2 hover:bg-indigo-600 hover:text-white">Sign In</a>
    </div>
  </nav>

<!-- Hero Section -->
<section class="max-w-7xl mx-auto px-6 py-20 md:flex md:items-center md:justify-between gap-12">
  <!-- Left content -->
  <div class="md:w-1/2 space-y-6 text-center md:text-left">
    <h1 class="text-4xl sm:text-5xl font-extrabold leading-tight text-indigo-700">
      Your Gateway to Perfect Internships
    </h1>
    <p class="text-gray-600 text-lg sm:text-xl max-w-lg mx-auto md:mx-0">
      Discover thousands of internships, apply with your resume, and get hired by top companies.
    </p>
    <div class="space-x-4 flex justify-center md:justify-start">
      <a href="views/auth/register.php" class="bg-indigo-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-indigo-700 transition-shadow shadow-md hover:shadow-lg">
        Get Started
      </a>
      <a href="views/auth/login.php" class="text-indigo-600 font-semibold px-8 py-3 border-2 border-indigo-600 rounded-lg hover:bg-indigo-700 hover:text-white transition">
        Sign In
      </a>
    </div>
  </div>

  <!-- Right image -->
  <div class="md:w-1/2 mt-12 md:mt-0 flex justify-center">
    <img src="public/images/hero.jpg" alt="Hero Image" class="w-full max-w-md rounded-lg shadow-lg object-cover" />
  </div>
</section>

<!-- How It Works Section -->
<section class="py-20 bg-gray-50">
  <div class="max-w-7xl mx-auto px-6 text-center">
    <h2 class="text-4xl font-extrabold text-indigo-700 mb-16">How It Works</h2>
    <div class="grid gap-12 sm:grid-cols-2 lg:grid-cols-5">

      <!-- Step 1 -->
      <div class="bg-white p-2 rounded-xl shadow-md hover:shadow-xl transition cursor-pointer">
        <div class="flex items-center justify-center mb-6">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
          </svg>
        </div>
        <h3 class="text-xl font-semibold mb-2">1. Register</h3>
        <p class="text-gray-600 text-sm leading-relaxed">
          Create your free account as a student or company to get started with our platform.
        </p>
      </div>

      <!-- Step 2 -->
      <div class="bg-white p-2 rounded-xl shadow-md hover:shadow-xl transition cursor-pointer">
        <div class="flex items-center justify-center mb-6">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M8 16l-4-4m0 0l4-4m-4 4h18" />
          </svg>
        </div>
        <h3 class="text-xl font-semibold mb-2">2. Explore</h3>
        <p class="text-gray-600 text-sm leading-relaxed">
          Browse thousands of internships filtered by your skills, location, and preferences.
        </p>
      </div>

      <!-- Step 3 -->
      <div class="bg-white p-2 rounded-xl shadow-md hover:shadow-xl transition cursor-pointer">
        <div class="flex items-center justify-center mb-6">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M16 12V8a4 4 0 10-8 0v4" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 14v4" />
          </svg>
        </div>
        <h3 class="text-xl font-semibold mb-2">3. Apply</h3>
        <p class="text-gray-600 text-sm leading-relaxed">
          Apply with your uploaded resume quickly and track your applications in your dashboard.
        </p>
      </div>

      <!-- Step 4 -->
      <div class="bg-white p-2 rounded-xl shadow-md hover:shadow-xl transition cursor-pointer">
        <div class="flex items-center justify-center mb-6">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4" />
          </svg>
        </div>
        <h3 class="text-xl font-semibold mb-2">4. Get Hired</h3>
        <p class="text-gray-600 text-sm leading-relaxed">
          Receive interview calls and job offers directly from companies.
        </p>
      </div>

      <!-- Step 5 (New!) -->
      <div class="bg-white p-2 rounded-xl shadow-md hover:shadow-xl transition cursor-pointer">
        <div class="flex items-center justify-center mb-6">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 21v-6a2 2 0 00-2-2h-6" />
          </svg>
        </div>
        <h3 class="text-xl font-semibold mb-2">5. Grow Your Career</h3>
        <p class="text-gray-600 text-sm leading-relaxed">
          Build your professional network and gain valuable experience for your future career.
        </p>
      </div>

    </div>
  </div>
</section>
<!-- How it Works end -->

<!-- Why Choose Us Section -->
<section class="bg-indigo-50 py-20">
  <div class="max-w-7xl mx-auto px-6 text-center">
    <h2 class="text-4xl font-extrabold text-indigo-700 mb-12">Why Choose <span class="text-indigo-900">InternshipSys</span>?</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10 text-left">
      
      <!-- Card 1 -->
      <div class="bg-white p-8 rounded-xl shadow hover:shadow-xl transition">
        <div class="text-indigo-600 mb-4">
          <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
            <path d="M9 12l2 2l4 -4" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M12 22c5.523 0 10 -4.477 10 -10S17.523 2 12 2S2 6.477 2 12s4.477 10 10 10z" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </div>
        <h3 class="text-xl font-semibold mb-2 text-gray-800">Verified Companies</h3>
        <p class="text-gray-600 text-sm leading-relaxed">We ensure every company is manually verified for authenticity and quality internship roles.</p>
      </div>

      <!-- Card 2 -->
      <div class="bg-white p-8 rounded-xl shadow hover:shadow-xl transition">
        <div class="text-green-500 mb-4">
          <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
            <path d="M16 3v4a1 1 0 001 1h4" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M21 21H3V3h13l5 5z" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </div>
        <h3 class="text-xl font-semibold mb-2 text-gray-800">Real Opportunities</h3>
        <p class="text-gray-600 text-sm leading-relaxed">No fake listings. Every internship is open, live, and ready for you to apply.</p>
      </div>

      <!-- Card 3 -->
      <div class="bg-white p-8 rounded-xl shadow hover:shadow-xl transition">
        <div class="text-indigo-400 mb-4">
          <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
            <path d="M4 4h16v16H4z" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M4 9h16M9 4v16" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </div>
        <h3 class="text-xl font-semibold mb-2 text-gray-800">Smart Dashboard</h3>
        <p class="text-gray-600 text-sm leading-relaxed">Track applications, receive alerts, and manage your resume or company post with ease.</p>
      </div>

      <!-- Card 4 (New) -->
      <div class="bg-white p-8 rounded-xl shadow hover:shadow-xl transition">
        <div class="text-yellow-500 mb-4">
          <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
            <path d="M9 19V6h13M9 6L4 12l5 6" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </div>
        <h3 class="text-xl font-semibold mb-2 text-gray-800">Easy Resume Upload</h3>
        <p class="text-gray-600 text-sm leading-relaxed">Upload your resume once and apply to multiple internships with just one click.</p>
      </div>

      <!-- Card 5 (New) -->
      <div class="bg-white p-8 rounded-xl shadow hover:shadow-xl transition">
        <div class="text-pink-500 mb-4">
          <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
            <path d="M5 13l4 4L19 7" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </div>
        <h3 class="text-xl font-semibold mb-2 text-gray-800">Faster Hiring</h3>
        <p class="text-gray-600 text-sm leading-relaxed">Get noticed quickly by HRs and increase your chances of getting selected.</p>
      </div>

      <!-- Card 6 (Optional Bonus) -->
      <div class="bg-white p-8 rounded-xl shadow hover:shadow-xl transition">
        <div class="text-blue-500 mb-4">
          <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
            <path d="M12 8v4l3 3" stroke-linecap="round" stroke-linejoin="round"/>
            <circle cx="12" cy="12" r="10" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </div>
        <h3 class="text-xl font-semibold mb-2 text-gray-800">24/7 Support</h3>
        <p class="text-gray-600 text-sm leading-relaxed">Need help? Our support team is always ready to assist you with any queries.</p>
      </div>

    </div>
  </div>
</section>

<!-- Why Choose Us Section End -->

<!-- Services Section -->
<section id="services" class="bg-white py-20">
  <div class="max-w-7xl mx-auto px-6 text-center">
    <h2 class="text-4xl font-extrabold text-indigo-700 mb-4">Our Services</h2>
    <p class="text-gray-500 max-w-2xl mx-auto text-lg mb-12">We are dedicated to providing the best tools and support to help you land your dream internship. Here's how we can help you:</p>

    <div class="grid gap-10 md:grid-cols-2 lg:grid-cols-3 text-left">
      
      <!-- Service 1 -->
      <div class="bg-indigo-50 p-8 rounded-xl shadow hover:shadow-xl transition">
        <div class="text-indigo-600 mb-4">
          <svg class="w-12 h-12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path d="M21 21l-4.35-4.35M10 18a8 8 0 100-16 8 8 0 000 16z" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </div>
        <h3 class="text-xl font-semibold mb-2">Search Internships</h3>
        <p class="text-gray-600">Browse curated internships filtered by category, location, and duration.</p>
      </div>

      <!-- Service 2 -->
      <div class="bg-indigo-50 p-8 rounded-xl shadow hover:shadow-xl transition">
        <div class="text-indigo-600 mb-4">
          <svg class="w-12 h-12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path d="M8 16h8M8 12h8M8 8h8M4 6h16v12H4z" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </div>
        <h3 class="text-xl font-semibold mb-2">Easy Application</h3>
        <p class="text-gray-600">Apply in one click using your uploaded resume. No long forms!</p>
      </div>

      <!-- Service 3 -->
      <div class="bg-indigo-50 p-8 rounded-xl shadow hover:shadow-xl transition">
        <div class="text-indigo-600 mb-4">
          <svg class="w-12 h-12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path d="M17 21v-2a4 4 0 00-3-3.87M5 21v-2a4 4 0 013-3.87M9 7a4 4 0 116 0" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </div>
        <h3 class="text-xl font-semibold mb-2">Connect with Companies</h3>
        <p class="text-gray-600">Build relationships with top employers and get noticed easily.</p>
      </div>

      <!-- Service 4 -->
      <div class="bg-indigo-50 p-8 rounded-xl shadow hover:shadow-xl transition">
        <div class="text-indigo-600 mb-4">
          <svg class="w-12 h-12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path d="M12 8v4l3 3M12 22a10 10 0 100-20 10 10 0 000 20z" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </div>
        <h3 class="text-xl font-semibold mb-2">Real-Time Notifications</h3>
        <p class="text-gray-600">Get instant updates when companies view your resume or respond.</p>
      </div>

      <!-- Service 5  -->
      <div class="bg-indigo-50 p-8 rounded-xl shadow hover:shadow-xl transition">
        <div class="text-indigo-600 mb-4">
          <svg class="w-12 h-12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path d="M15 12h.01M12 12h.01M9 12h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </div>
        <h3 class="text-xl font-semibold mb-2">Support & Resources</h3>
        <p class="text-gray-600">Get help with resume building, interview prep, and career advice.</p>
      </div>

      <!-- Service 6 -->
      <div class="bg-indigo-50 p-8 rounded-xl shadow hover:shadow-xl transition">
        <div class="text-indigo-600 mb-4">
          <svg class="w-12 h-12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path d="M3 10h2l1 2h13l1-2h2M5 16h14a2 2 0 002-2v-4H3v4a2 2 0 002 2z" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </div>
        <h3 class="text-xl font-semibold mb-2">Application Tracking</h3>
        <p class="text-gray-600">See where you’ve applied, application status, and company responses.</p>
      </div>

    </div>
  </div>
</section>
<!-- Services Section End-->


<!-- Newsletter Subscribe Section -->
<!-- <section class="bg-indigo-600 text-white py-12 mb-8">
  <div class="max-w-4xl mx-auto px-6 text-center">
    <h2 class="text-2xl font-bold mb-4">Subscribe for Updates</h2>
    <p class="mb-6">Get new internship alerts directly to your inbox.</p>
    <form action="#" method="POST" class="flex flex-col sm:flex-row items-center justify-center gap-4">
      <input type="email" placeholder="Your email" class="px-4 py-2 rounded w-full sm:w-auto text-gray-800" required />
      <button type="submit" class="bg-white text-indigo-700 font-semibold px-6 py-2 rounded hover:bg-gray-100">Subscribe</button>
    </form>
  </div>
</section> -->

<!-- Testimonials Section -->
<section id="testimonials" class="py-20 bg-gradient-to-r from-indigo-50 via-indigo-100 to-indigo-50">
  <div class="max-w-6xl mx-auto px-6 text-center">
    <h2 class="text-4xl font-extrabold text-indigo-700 mb-12">What Our Users Say</h2>

    <!-- Swiper -->
    <div class="swiper testimonial-swiper">
      <div class="swiper-wrapper">

        <!-- Slide 1 -->
        <div class="swiper-slide bg-white p-8 rounded-xl shadow-lg max-w-xl mx-auto text-left">
          <div class="mb-4 text-indigo-600">
            <svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
              <path d="M7 17a4 4 0 01-4-4V5h4v8h3v4H7zm10 0a4 4 0 01-4-4V5h4v8h3v4h-3z" />
            </svg>
          </div>
          <blockquote class="italic text-gray-600 text-lg mb-4">
            "This platform helped me land my dream internship within weeks!"
          </blockquote>
          <p class="text-indigo-700 font-semibold">— Sarah K.</p>
        </div>

        <!-- Slide 2 -->
        <div class="swiper-slide bg-white p-8 rounded-xl shadow-lg max-w-xl mx-auto text-left">
          <div class="mb-4 text-indigo-600">
            <svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
              <path d="M7 17a4 4 0 01-4-4V5h4v8h3v4H7zm10 0a4 4 0 01-4-4V5h4v8h3v4h-3z" />
            </svg>
          </div>
          <blockquote class="italic text-gray-600 text-lg mb-4">
            "The UI is smooth, mobile-friendly and I loved the fast response."
          </blockquote>
          <p class="text-indigo-700 font-semibold">— Mark T.</p>
        </div>

        <!-- Slide 3 -->
        <div class="swiper-slide bg-white p-8 rounded-xl shadow-lg max-w-xl mx-auto text-left">
          <div class="mb-4 text-indigo-600">
            <svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
              <path d="M7 17a4 4 0 01-4-4V5h4v8h3v4H7zm10 0a4 4 0 01-4-4V5h4v8h3v4h-3z" />
            </svg>
          </div>
          <blockquote class="italic text-gray-600 text-lg mb-4">
            "From resume upload to final selection—everything was smooth."
          </blockquote>
          <p class="text-indigo-700 font-semibold">— Anika R.</p>
        </div>

        <!-- Slide 4 -->
        <div class="swiper-slide bg-white p-8 rounded-xl shadow-lg max-w-xl mx-auto text-left">
          <div class="mb-4 text-indigo-600">
            <svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
              <path d="M7 17a4 4 0 01-4-4V5h4v8h3v4H7zm10 0a4 4 0 01-4-4V5h4v8h3v4h-3z" />
            </svg>
          </div>
          <blockquote class="italic text-gray-600 text-lg mb-4">
            "InternshipSys gave me direction and made the process super easy."
          </blockquote>
          <p class="text-indigo-700 font-semibold">— Faisal A.</p>
        </div>

      </div>

      <!-- Navigation -->
      <div class="flex justify-center mt-6 space-x-4">
        <div class="swiper-button-prev !text-indigo-600"></div>
        <div class="swiper-button-next !text-indigo-600"></div>
      </div>

      <!-- Pagination -->
      <div class="swiper-pagination mt-6"></div>
    </div>
  </div>
</section>



<!-- Contact Section -->
<section id="contact" class="bg-white py-16">
  <div class="max-w-7xl mx-auto px-6 md:flex md:space-x-12">
    <!-- Left side: Contact Info -->
    <div class="md:w-1/2 mb-12 md:mb-0">
      <h2 class="text-3xl font-bold mb-6 text-indigo-700">Contact Us</h2>
      <p class="mb-6 text-gray-700">
        Have questions or want to get in touch? We’d love to hear from you!  
        Reach out by phone, email, or using the contact form.
      </p>
      <ul class="space-y-4 text-gray-600">
        <li class="flex items-center space-x-3">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2v-5a2 2 0 00-2-2H5a2 2 0 00-2 2v5a2 2 0 002 2z"/>
          </svg>
          <span>info@internshipsys.com</span>
        </li>
        <li class="flex items-center space-x-3">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h2l3.5 7a2 2 0 01-1.5 3H5v4h14v-4h-2.5a2 2 0 01-1.5-3L19 5h2"/>
          </svg>
          <span>+880 123 456 789</span>
        </li>
        <li class="flex items-center space-x-3">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a7 7 0 00-7-7H7a7 7 0 00-7 7v2h5"/>
          </svg>
          <span>123 Internship St., Dhaka, Bangladesh</span>
        </li>
      </ul>
    </div>

    <!-- Right side: Contact Form -->
    <div class="md:w-1/2 bg-indigo-50 p-8 rounded-lg shadow-lg">
      <h3 class="text-xl font-semibold mb-6 text-indigo-700">Send us a message</h3>
      <form action="views/contact_submit.php" method="POST" class="space-y-6">
        <div>
          <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
          <input type="text" name="name" id="name" required
            class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
        </div>
        <div>
          <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
          <input type="email" name="email" id="email" required
            class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
        </div>
        <div>
          <label for="message" class="block text-gray-700 font-medium mb-2">Message</label>
          <textarea name="message" id="message" rows="4" required
            class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 resize-none"></textarea>
        </div>
        <button type="submit" class="bg-indigo-600 text-white px-6 py-3 rounded font-semibold hover:bg-indigo-700 transition">
          Send Message
        </button>
      </form>
    </div>
  </div>
</section>


  <!-- Footer -->
  <footer id="footer" class="bg-gray-900 text-gray-300 py-10">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-8">
      <div>
        <h3 class="font-bold text-xl mb-4">Internship</h3>
        <p>Your trusted platform for internships and career growth.</p>
      </div>
      <div>
        <h3 class="font-semibold mb-4">Follow Us</h3>
        <div class="flex space-x-6">
          <a href="#" aria-label="Facebook" class="hover:text-white">
            <i data-feather="facebook" class="w-6 h-6"></i>
          </a>
          <a href="#" aria-label="Twitter" class="hover:text-white">
            <i data-feather="twitter" class="w-6 h-6"></i>
          </a>
          <a href="#" aria-label="LinkedIn" class="hover:text-white">
            <i data-feather="linkedin" class="w-6 h-6"></i>
          </a>
          <a href="#" aria-label="Instagram" class="hover:text-white">
            <i data-feather="instagram" class="w-6 h-6"></i>
          </a>
        </div>
      </div>
      <div>
        <h3 class="font-semibold mb-4">Contact</h3>
        <p>Email: info@internship.com</p>
        <p>Phone: +880 123 456 789</p>
      </div>
    </div>
    <div class="text-center mt-10 text-gray-500 text-sm">
      &copy; <?= date('Y') ?> InternshipSys. All rights reserved.
    </div>
  </footer>

  <!-- Feather Icons Init -->
  <script>
    feather.replace();
  </script>

  <!-- Mobile Menu Toggle Script -->
  <script>
    const btn = document.getElementById('menu-btn');
    const menu = document.getElementById('mobile-menu');

    btn.addEventListener('click', () => {
      menu.classList.toggle('hidden');
    });
  </script>
  <!-- Swiper -->
  <script>
  const swiper = new Swiper('.testimonial-swiper', {
    loop: true,
    spaceBetween: 30,
    grabCursor: true,
    autoplay: {
      delay: 5000,
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    breakpoints: {
      640: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 1,
      },
      1024: {
        slidesPerView: 2,
      },
    },
  });
</script>

  <!-- <script src="public/js/swipper.js"></script> -->
</body>
</html>
