@extends('layouts.app')

@section('content')

<!-- Navigation Bar -->
<div class="text-center mb-5">
        <div class="d-flex justify-content-center gap-3 flex-wrap">
            <a href="{{ url('/home') }}" class="btn btn-primary shadow animated zoomIn delay-2s">Home</a>
            <a href="{{ url('/resources') }}" class="btn btn-info shadow animated zoomIn delay-3s">Resources</a>
            <a href="{{ url('/gamification') }}" class="btn btn-warning shadow animated zoomIn delay-4s">Gamification</a>
            <a href="{{ url('/contact') }}" class="btn btn-success shadow animated zoomIn delay-5s">Contact</a>
            <a href="{{ url('/profile') }}" class="btn btn-secondary shadow animated zoomIn delay-6s">Profile</a>
        </div>
    </div>

<!-- Gamification Section -->
<section id="game-section" class="py-16 bg-gradient-to-r from-blue-50 to-indigo-50">
    <h2 class="text-4xl font-bold text-gray-800 text-center mb-12">Interactive Learning Games</h2>
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach ($games as $game)
        <div class="game-card relative bg-white p-6 rounded-xl shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition duration-300">
            <div class="absolute -top-4 right-4 w-12 h-12 bg-gradient-to-r from-{{ $game['color_start'] }} to-{{ $game['color_end'] }} rounded-full flex items-center justify-center text-white text-xl font-bold shadow-md">
                🎮
            </div>
            <h3 class="text-2xl font-bold text-gray-700 mb-4">{{ $game['title'] }}</h3>
            <p class="text-gray-600 mb-6">{{ $game['description'] }}</p>
            <a href="{{ route($game['route_name']) }}" class="bg-blue-500 text-white py-2 px-4 rounded-lg shadow hover:bg-blue-600 transition">
                Play Now
            </a>
        </div>
        @endforeach
    </div>
</section>

<!-- Interactive Features Section -->
<section id="features-section" class="py-16 bg-white text-center">
    <h2 class="text-4xl font-bold text-gray-800 mb-8">Boost Your Learning with Fun</h2>
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Feature 1 -->
        <div class="feature-card bg-gradient-to-br from-purple-600 to-pink-500 text-white p-6 rounded-xl shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition duration-300">
            <h3 class="text-2xl font-bold mb-4">Daily Challenges</h3>
            <p class="text-lg mb-6">Complete small challenges every day to win badges and boost your skills.</p>
            <button class="bg-white text-purple-700 py-2 px-4 rounded-lg hover:bg-purple-200 transition">
                Start Challenges
            </button>
        </div>
        <!-- Feature 2 -->
        <div class="feature-card bg-gradient-to-br from-blue-500 to-teal-400 text-white p-6 rounded-xl shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition duration-300">
            <h3 class="text-2xl font-bold mb-4">Team Quizzes</h3>
            <p class="text-lg mb-6">Join a team and compete with others in real-time quizzes.</p>
            <button class="bg-white text-blue-700 py-2 px-4 rounded-lg hover:bg-blue-200 transition">
                Join a Team
            </button>
        </div>
        <!-- Feature 3 -->
        <div class="feature-card bg-gradient-to-br from-green-500 to-yellow-400 text-white p-6 rounded-xl shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition duration-300">
            <h3 class="text-2xl font-bold mb-4">Flashcard Practice</h3>
            <p class="text-lg mb-6">Improve memory by practicing topics with interactive flashcards.</p>
            <button class="bg-white text-green-700 py-2 px-4 rounded-lg hover:bg-green-200 transition">
                Practice Now
            </button>
        </div>
        <!-- Feature 4 -->
        <div class="feature-card bg-gradient-to-br from-indigo-600 to-cyan-500 text-white p-6 rounded-xl shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition duration-300">
            <h3 class="text-2xl font-bold mb-4">Interactive Case Studies</h3>
            <p class="text-lg mb-6">Work through real-world scenarios and learn problem-solving skills.</p>
            <button class="bg-white text-indigo-700 py-2 px-4 rounded-lg hover:bg-indigo-200 transition">
                Explore Cases
            </button>
        </div>
        <!-- Feature 5 -->
        <div class="feature-card bg-gradient-to-br from-red-500 to-orange-400 text-white p-6 rounded-xl shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition duration-300">
            <h3 class="text-2xl font-bold mb-4">Learning Streak</h3>
            <p class="text-lg mb-6">Maintain a daily streak to unlock exclusive rewards and content.</p>
            <button class="bg-white text-red-700 py-2 px-4 rounded-lg hover:bg-red-200 transition">
                Keep Streak
            </button>
        </div>
    </div>
</section>

<!-- Progress Section -->
<section id="progress-section" class="py-16 bg-gradient-to-r from-gray-50 to-gray-100 text-center">
    <h2 class="text-3xl font-semibold text-gray-800 mb-6">Track Your Progress</h2>
    <div class="max-w-md mx-auto">
        <div class="bg-gray-200 rounded-full h-6">
            <div class="bg-blue-600 h-6 rounded-full progress-bar" style="width: {{ $progress }}%;"></div>
        </div>
        <p class="text-gray-700 mt-4 text-lg">You have completed <span class="font-semibold text-blue-600">{{ $progress }}%</span> of your learning goals!</p>
    </div>
</section>

@endsection

<style>
.progress-bar {
    transition: width 1.5s ease-in-out;
}

.game-card:hover {
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.2);
}

.feature-card:hover {
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
}

section {
    padding-bottom: 40px; /* Ensure sections are spaced apart */
}
</style>
