<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GamificationController extends Controller
{
    public function index()
    {
        // Define the games available in the platform
        $games = [
            ['title' => 'Sudoku', 'description' => 'Challenge your brain with Sudoku puzzles.', 'color_start' => 'blue-500', 'color_end' => 'indigo-600', 'route_name' => 'sudoku', 'button_color' => 'blue-600'],
            ['title' => 'Simulation', 'description' => 'Experience real-world scenarios in a simulation game.', 'color_start' => 'green-400', 'color_end' => 'blue-500', 'route_name' => 'simulation', 'button_color' => 'green-600'],
            ['title' => 'RPG Quest', 'description' => 'Embark on a quest in an RPG adventure.', 'color_start' => 'purple-600', 'color_end' => 'pink-500', 'route_name' => 'rpg-quest', 'button_color' => 'purple-600'],
            ['title' => 'Memory Match', 'description' => 'Improve your memory with matching pairs.', 'color_start' => 'yellow-400', 'color_end' => 'red-500', 'route_name' => 'memory-match', 'button_color' => 'yellow-600'],
            ['title' => 'Quiz', 'description' => 'Test your knowledge with various quizzes.', 'color_start' => 'indigo-600', 'color_end' => 'blue-400', 'route_name' => 'quiz', 'button_color' => 'indigo-600'],
            ['title' => 'Crossword', 'description' => 'Solve crosswords and test your word skills.', 'color_start' => 'teal-500', 'color_end' => 'cyan-600', 'route_name' => 'crossword', 'button_color' => 'teal-600'],
        ];

        // Top performers, could be fetched dynamically from the database
        $topPerformers = [
            ['rank' => 1, 'name' => 'Bhargav', 'points' => 1200],
            ['rank' => 2, 'name' => 'Joel', 'points' => 1100],
            ['rank' => 3, 'name' => 'Sudarshan', 'points' => 900],
        ];

        // Example of dynamic progress calculation (e.g., from the database)
        $user = auth()->user();  // Assuming the user is logged in
        $progress = $user ? $user->progress : 0; // Replace with actual progress calculation

        return view('gamification', compact('games', 'topPerformers', 'progress'));
    }
}
