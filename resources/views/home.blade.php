@extends('layouts.app')

@section('content')
<div class="container-fluid py-5">
    <!-- Welcome Section -->
    <div class="text-center my-5">
        <h1 class="display-4 fw-bold text-primary animated fadeInDown">
            Welcome, {{ Auth::user()->name ?? 'Guest' }}!
        </h1>
        <p class="lead text-secondary animated fadeInUp delay-1s">
            Dive into a world of learning with gamified experiences and interactive resources!
        </p>
    </div>

    <!-- Navigation Links -->
    <div class="text-center mb-5">
        <div class="d-flex justify-content-center gap-3 flex-wrap">
            <a href="{{ url('/home') }}" class="btn btn-primary shadow animated zoomIn delay-2s">Home</a>
            <a href="{{ url('/resources') }}" class="btn btn-info shadow animated zoomIn delay-3s">Resources</a>
            <a href="{{ url('/gamification') }}" class="btn btn-warning shadow animated zoomIn delay-4s">Gamification</a>
            <a href="{{ url('/contact') }}" class="btn btn-success shadow animated zoomIn delay-5s">Contact</a>
            <a href="{{ url('/profile') }}" class="btn btn-secondary shadow animated zoomIn delay-6s">Profile</a>
        </div>
    </div>

    <!-- Interactive Dashboard Cards -->
    <div class="row g-4">
        <!-- Upcoming Courses -->
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow h-100 animated fadeInLeft">
                <div class="card-header bg-primary text-white d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Upcoming Courses</h5>
                    <i class="fas fa-calendar-alt fa-lg"></i>
                </div>
                <div class="card-body">
                    <p>Boost your skills with our latest learning materials:</p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Laravel for Beginners</li>
                        <li class="list-group-item">Advanced PHP Techniques</li>
                        <li class="list-group-item">Interactive Quizzes & Challenges</li>
                    </ul>
                    <button class="btn btn-primary mt-3 w-100">Enroll Now</button>
                </div>
            </div>
        </div>

        <!-- Recent Activities -->
        <div class="col-lg-4 col-md-6">
            <div class="card border-0 shadow h-100 animated fadeInRight">
                <div class="card-header bg-success text-white d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Recent Activities</h5>
                    <i class="fas fa-chart-line fa-lg"></i>
                </div>
                <div class="card-body">
                    <p>Your recent learning progress:</p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Completed: Laravel Basics Quiz</li>
                        <li class="list-group-item">Started: Gamified Memory Game</li>
                        <li class="list-group-item">Uploaded: PHP Fundamentals Notes</li>
                    </ul>
                    <button class="btn btn-success mt-3 w-100">View History</button>
                </div>
            </div>
        </div>

        <!-- Gamification Highlights -->
        <div class="col-lg-4 col-md-12">
            <div class="card border-0 shadow h-100 animated fadeInUp">
                <div class="card-header bg-warning text-dark d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Gamification Highlights</h5>
                    <i class="fas fa-gamepad fa-lg"></i>
                </div>
                <div class="card-body">
                    <p>Level up your learning through fun activities:</p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Earn badges for completing courses</li>
                        <li class="list-group-item">RPG-style quests for interactive learning</li>
                        <li class="list-group-item">Puzzles and memory games</li>
                    </ul>
                    <a href="{{ url('/gamification') }}" class="btn btn-warning mt-3 w-100">Explore Gamification</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonials Section -->
    <div class="mt-5">
        <h2 class="fw-bold text-center text-secondary mb-4 animated fadeInDown">What Our Students Say</h2>
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow animated fadeInLeft">
                    <div class="card-body">
                        <blockquote class="blockquote">
                            <p>"The gamification elements are simply amazing. I love learning this way!"</p>
                            <footer class="blockquote-footer">Aditi</footer>
                        </blockquote>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow animated fadeInUp">
                    <div class="card-body">
                        <blockquote class="blockquote">
                            <p>"Interactive courses have transformed how I learn programming."</p>
                            <footer class="blockquote-footer">Karan</footer>
                        </blockquote>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mx-auto">
                <div class="card border-0 shadow animated fadeInRight">
                    <div class="card-body">
                        <blockquote class="blockquote">
                            <p>"This platform has made me more productive and motivated."</p>
                            <footer class="blockquote-footer">Meena</footer>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Call-to-Action -->
    <div class="text-center mt-5">
        <a href="{{ url('/resources') }}" class="btn btn-lg btn-info shadow animated pulse infinite">📘 Browse Resources</a>
    </div>
</div>
@endsection
