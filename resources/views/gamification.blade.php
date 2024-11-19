@extends('layouts.app')

@section('content')

<!-- Gamification Section -->
<section class="py-16 bg-blue-50 text-center">
    <h2 class="text-3xl font-semibold text-gray-800 mb-8">Play a Game</h2>
    <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach ($games as $game)
        <div class="game-card bg-gradient-to-r from-{{ $game['color_start'] }} to-{{ $game['color_end'] }} p-6 rounded-xl shadow-lg transform hover:scale-105 hover:shadow-2xl transition-all duration-500 ease-in-out">
            <h3 class="text-2xl font-bold text-white drop-shadow-md mb-4">{{ $game['title'] }}</h3>
            <p class="text-white text-lg mb-4">{{ $game['description'] }}</p>
            <a href="{{ route($game['route_name']) }}" class="bg-white text-{{ $game['button_color'] }} py-2 px-6 rounded-full transition-all duration-300 transform hover:bg-{{ $game['button_color'] }} hover:text-white hover:scale-110">Play {{ $game['title'] }}</a>
        </div>
        @endforeach
    </div>
</section>

<!-- Progress Bar Section -->
<section class="py-8 bg-white text-center">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Your Learning Progress</h2>
    <div class="max-w-md mx-auto">
        <div class="bg-gray-200 rounded-full h-4">
            <div class="bg-blue-600 h-4 rounded-full progress-bar" style="width: 0%; animation: progressBarAnimation 2s forwards;"></div>
        </div>
        <p class="text-gray-600 mt-2 text-lg">You are <span class="font-semibold text-blue-600">{{ $progress }}%</span> through your current course!</p>
    </div>
</section>

<!-- Leaderboard Section -->
<section class="py-16 bg-white text-center">
    <h2 class="text-3xl font-semibold text-gray-800 mb-8">Top Performers</h2>
    <div class="max-w-4xl mx-auto">
        <table class="min-w-full bg-gray-50 shadow-lg rounded-lg">
            <thead class="bg-blue-500 text-white">
                <tr>
                    <th class="py-3 px-6 text-sm font-semibold text-center">Rank</th>
                    <th class="py-3 px-6 text-sm font-semibold text-center">User</th>
                    <th class="py-3 px-6 text-sm font-semibold text-center">Points</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($topPerformers as $performer)
                <tr class="border-b hover:bg-gray-100 transition duration-300 transform hover:scale-105">
                    <td class="py-4 px-6 text-center">{{ $performer['rank'] }}</td>
                    <td class="py-4 px-6 text-center">{{ $performer['name'] }}</td>
                    <td class="py-4 px-6 text-center">{{ $performer['points'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>

@endsection

<style>
/* Keyframe for Progress Bar Animation */
@keyframes progressBarAnimation {
    from {
        width: 0%;
    }
    to {
        width: {{ $progress }}%;
    }
}

.progress-bar {
    animation-duration: 2s;
}

/* Custom Shadow for Card Hover */
.game-card:hover {
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
}

/* Add styling for the layout */
body {
    font-family: 'Poppins', sans-serif;
}

h2, h3 {
    line-height: 1.4;
}

/* Ensure smooth scaling of the game cards */
.game-card {
    transition: all 0.3s ease-in-out;
    padding: 1.5rem;
    border-radius: 1rem;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    cursor: pointer;
}

/* Increase scaling on hover */
.game-card:hover {
    transform: scale(1.05);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
}

/* Adjust spacing for text and button elements */
.game-card h3 {
    font-size: 1.875rem;
    font-weight: bold;
    color: #fff;
    text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.5);
}

.game-card a {
    display: inline-block;
    text-decoration: none;
    padding: 12px 25px;
    border-radius: 50px;
    background-color: #fff;
    color: #2d3748;
    font-weight: 600;
    text-transform: uppercase;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.game-card a:hover {
    background-color: #e2e8f0;
    transform: scale(1.1);
}

.game-card .text-gray-600 {
    transition: color 0.3s ease;
}

.game-card:hover .text-gray-600 {
    color: #4B5563; /* Darker gray */
}

/* Table styling */
table {
    width: 100%;
}

th {
    text-align: center;
}

td {
    text-align: center;
}

/* Grid Layout for Game Cards */
@media (min-width: 640px) {
    .game-card {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
}

@media (min-width: 1024px) {
    .game-card {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
}
</style>
