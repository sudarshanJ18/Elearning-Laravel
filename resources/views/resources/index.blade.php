@extends('layouts.app')

@section('content')
<div class="text-center mb-5">
        <div class="d-flex justify-content-center gap-3 flex-wrap">
            <a href="{{ url('/home') }}" class="btn btn-primary shadow animated zoomIn delay-2s">Home</a>
            <a href="{{ url('/resources') }}" class="btn btn-info shadow animated zoomIn delay-3s">Resources</a>
            <a href="{{ url('/gamification') }}" class="btn btn-warning shadow animated zoomIn delay-4s">Gamification</a>
            <a href="{{ url('/contact') }}" class="btn btn-success shadow animated zoomIn delay-5s">Contact</a>
            <a href="{{ url('/profile') }}" class="btn btn-secondary shadow animated zoomIn delay-6s">Profile</a>
        </div>
    </div>
<div class="container py-5">
    <div class="text-center my-4">
        <h1 class="display-4">Learning Resources</h1>
        <p class="lead">Explore a curated selection of resources to enhance your skills in PHP, Laravel, and Web Development.</p>
    </div>

    <!-- Filter Options -->
    <div class="d-flex justify-content-center mb-4">
        <div class="btn-group" role="group" aria-label="Filter Resources">
            <button class="btn btn-outline-primary filter-btn" data-type="all">All Resources</button>
            <button class="btn btn-outline-secondary filter-btn" data-type="PHP">PHP Resources</button>
            <button class="btn btn-outline-success filter-btn" data-type="Laravel">Laravel Resources</button>
            <button class="btn btn-outline-info filter-btn" data-type="Web Development">Web Development</button>
            <button class="btn btn-outline-warning filter-btn" data-type="Miscellaneous">Miscellaneous</button>
        </div>
    </div>

    <!-- Resources List -->
    <div class="row justify-content-center" id="resources-list">
        <!-- PHP Resources -->
        <div class="col-md-4 col-sm-6 resource-item" data-type="PHP">
            <div class="resource-card card shadow-sm mb-4">
                <div class="card-body">
                    <h5><a href="https://www.php.net/manual/en/" target="_blank" class="text-decoration-none">PHP Manual</a></h5>
                    <p>Comprehensive guide for all PHP functions, features, and examples.</p>
                </div>
            </div>
            <div class="resource-card card shadow-sm mb-4">
                <div class="card-body">
                    <h5><a href="https://phptherightway.com/" target="_blank" class="text-decoration-none">PHP: The Right Way</a></h5>
                    <p>A community-driven guide to best practices and up-to-date techniques in PHP.</p>
                </div>
            </div>
        </div>

        <!-- Laravel Resources -->
        <div class="col-md-4 col-sm-6 resource-item" data-type="Laravel">
            <div class="resource-card card shadow-sm mb-4">
                <div class="card-body">
                    <h5><a href="https://laravel.com/docs" target="_blank" class="text-decoration-none">Official Laravel Documentation</a></h5>
                    <p>The best place to start learning about Laravel, with detailed sections on routing, authentication, database management, etc.</p>
                </div>
            </div>
            <div class="resource-card card shadow-sm mb-4">
                <div class="card-body">
                    <h5><a href="https://laracasts.com" target="_blank" class="text-decoration-none">Laracasts - Laravel From Scratch</a></h5>
                    <p>A comprehensive series of video tutorials for beginners and advanced Laravel developers.</p>
                </div>
            </div>
        </div>

        <!-- Web Development Resources -->
        <div class="col-md-4 col-sm-6 resource-item" data-type="Web Development">
            <div class="resource-card card shadow-sm mb-4">
                <div class="card-body">
                    <h5><a href="https://www.freecodecamp.org/news/php-and-laravel-full-course/" target="_blank" class="text-decoration-none">freeCodeCamp - Full PHP & Laravel Course</a></h5>
                    <p>Covers both PHP basics and advanced Laravel concepts.</p>
                </div>
            </div>
        </div>

        <!-- Miscellaneous Resources -->
        <div class="col-md-4 col-sm-6 resource-item" data-type="Miscellaneous">
            <div class="resource-card card shadow-sm mb-4">
                <div class="card-body">
                    <h5><a href="https://laravel.com/docs/9.x/database" target="_blank" class="text-decoration-none">Laravel Database Documentation</a></h5>
                    <p>Learn how to manage databases efficiently with Laravel.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const buttons = document.querySelectorAll('.filter-btn');
        const resourceItems = document.querySelectorAll('.resource-item');

        buttons.forEach(button => {
            button.addEventListener('click', () => {
                const type = button.getAttribute('data-type');

                resourceItems.forEach(item => {
                    if (type === 'all' || item.getAttribute('data-type') === type) {
                        item.classList.remove('d-none');
                        item.classList.add('animate__fadeIn');
                    } else {
                        item.classList.add('d-none');
                    }
                });
            });
        });
    });
</script>
@endsection
