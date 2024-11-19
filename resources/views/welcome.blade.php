<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>E-Learning Platform</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Tailwind CSS -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @endif
</head>

<body class="bg-gray-50 text-gray-800 font-sans">

    <!-- Navbar -->
    <nav class="bg-blue-600 text-white shadow-md">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <!-- Mobile menu button-->
                    <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <a href="#" class="text-3xl font-bold text-white">E-Learning</a>
                </div>
                <div class="ml-10 flex items-baseline space-x-4">
                    <a href="{{ route('login') }}" class="text-white hover:bg-blue-700 px-3 py-2 rounded-md text-lg font-medium">Login</a>
                    <a href="{{ route('register') }}" class="text-white hover:bg-blue-700 px-3 py-2 rounded-md text-lg font-medium">Register</a>
                    <a href="{{ route('contact') }}" class="text-white hover:bg-blue-700 px-3 py-2 rounded-md text-lg font-medium">Contact</a> <!-- Added Contact link -->
            </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <section class="relative py-16 bg-gradient-to-r from-green-400 to-blue-500">
        <div class="max-w-7xl mx-auto px-6 text-center text-white">
            <h1 class="text-4xl sm:text-5xl font-bold leading-tight mb-4">Welcome to E-Learning Platform</h1>
            <p class="text-lg sm:text-xl mb-6">Gateway to a more interactive and fun learning experience. Explore our gamified courses and boost your skills!</p>
            <a href="{{ route('register') }}" class="inline-block bg-red-500 text-white text-xl py-3 px-6 rounded-lg hover:bg-red-600 transition duration-300">Get Started</a>

        </div>
        <div class="absolute inset-0 bg-black opacity-25"></div>
    </section>

    <!-- About Section -->
<section class="py-16 bg-white">
    <div class="max-w-screen-xl mx-auto flex flex-col lg:flex-row items-center space-x-8">
        <div class="lg:w-1/2">
            <h2 class="text-3xl font-semibold text-gray-800 mb-4 animate-up">About Our Platform</h2>
            <p class="text-gray-600 text-lg">The E-learning platform with integrated gamification features is designed
to transform the way students learn by incorporating interactive and game-based
elements into the educational process. Built using the Laravel framework, this
platform aims to create a dynamic and engaging learning environment that
motivates students to actively participate in their education.</p>
        </div>
        <div class="lg:w-1/2 mt-8 lg:mt-0">
            <img src="https://i.postimg.cc/G2gS2PV2/pic1.jpg" alt="About Image" class="w-full h-auto rounded-lg shadow-xl">
        </div>
    </div>
</section>

    <!-- Feature Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto text-center">
            <h2 class="text-3xl font-semibold text-gray-900 mb-8">Why Choose Us?</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                <div class="p-6 bg-gray-50 rounded-lg shadow-md">
                    <h3 class="text-2xl font-semibold text-blue-600 mb-4">Interactive Learning</h3>
                    <p class="text-lg text-gray-600">Our platform features gamified lessons that keep you engaged while you learn, making education fun and effective.</p>
                </div>
                <div class="p-6 bg-gray-50 rounded-lg shadow-md">
                    <h3 class="text-2xl font-semibold text-blue-600 mb-4">Expert Instructors</h3>
                    <p class="text-lg text-gray-600">Learn from industry experts and gain practical insights that you can apply in the real world.</p>
                </div>
                <div class="p-6 bg-gray-50 rounded-lg shadow-md">
                    <h3 class="text-2xl font-semibold text-blue-600 mb-4">Flexible Learning</h3>
                    <p class="text-lg text-gray-600">Take courses at your own pace, anytime and anywhere, with mobile-friendly design and resources available 24/7.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-blue-600 text-white py-6 mt-16">
        <div class="max-w-7xl mx-auto text-center">
            <p class="text-lg">© {{ date('Y') }} E-Learning Platform. All rights reserved.</p>
            <div class="mt-4">
                <a href="#" class="text-white hover:text-gray-300">Privacy Policy</a> |
                <a href="#" class="text-white hover:text-gray-300">Terms of Service</a>
            </div>
        </div>
    </footer>

</body>

</html>
