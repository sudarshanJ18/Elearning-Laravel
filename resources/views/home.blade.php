@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Dashboard Title -->
    <div class="text-center my-4">
        <h1 class="display-4 fw-bold animated fadeInDown">E-Learning Dashboard</h1>
        <p class="lead animated fadeInUp delay-1s">Welcome to your interactive learning hub!</p>
    </div>

    <!-- Navigation Links -->
    <div class="text-center mb-4">
        <nav class="nav justify-content-center">
            <a class="nav-link btn btn-outline-primary mx-2 animated zoomIn delay-2s" href="{{ url('/home') }}">Home</a>
            <a class="nav-link btn btn-outline-primary mx-2 animated zoomIn delay-3s" href="{{ url('/resources') }}">Resources</a>
            <a class="nav-link btn btn-outline-primary mx-2 animated zoomIn delay-4s" href="{{ url('/gamification') }}">Gamification</a>
            <a class="nav-link btn btn-outline-primary mx-2 animated zoomIn delay-5s" href="{{ url('/contact') }}">Contact</a>
            <a class="nav-link btn btn-outline-primary mx-2 animated zoomIn delay-6s" href="{{ url('/profile') }}">Profile</a>
        </nav>
    </div>

    <!-- Content Section -->
    <div class="row">
        <!-- Upcoming Courses Section -->
        <div class="col-md-6">
            <div class="card mb-4 animated fadeInLeft">
                <div class="card-header bg-primary text-white">{{ __('Upcoming Courses') }}</div>
                <div class="card-body">
                    <p>Stay tuned for the latest learning materials and interactive sessions!</p>
                    <ul>
                        <li>Laravel for Beginners</li>
                        <li>Advanced PHP Techniques</li>
                        <li>Interactive Quizzes & Challenges</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Recent Activities Section -->
        <div class="col-md-6">
            <div class="card mb-4 animated fadeInRight">
                <div class="card-header bg-success text-white">{{ __('Recent Activities') }}</div>
                <div class="card-body">
                    <p>Here's what you've been up to:</p>
                    <ul>
                        <li>Completed: Laravel Basics Quiz</li>
                        <li>Started: Gamified Memory Game</li>
                        <li>Uploaded: Course Notes for PHP Fundamentals</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Gamification Highlights Section -->
    <div class="row">
        <div class="col-md-12">
            <div class="card animated fadeInUp">
                <div class="card-header bg-warning text-dark">{{ __('Gamification Highlights') }}</div>
                <div class="card-body">
                    <p>Engage in fun and challenging activities to enhance your skills:</p>
                    <ul>
                        <li>🏆 Earn badges for completing courses</li>
                        <li>🎮 Play and learn with RPG-style quests</li>
                        <li>🔍 Solve puzzles and memory games to reinforce knowledge</li>
                    </ul>
                    <a href="{{ url('/gamification') }}" class="btn btn-warning mt-3 animated pulse infinite">Explore Gamification</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
