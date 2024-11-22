<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\GamificationController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FirebaseAuthController;


// Public Routes
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Authentication Routes
Auth::routes();

// User Dashboard (authenticated users only)
Route::middleware('auth')->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
});

// Admin Routes (protected by admin middleware)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/admin/uploads', [AdminController::class, 'uploads'])->name('admin.uploads');
    Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
});

// Guest Routes (for non-authenticated users only)
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

// Contact Form Routes
Route::get('/contact', [ContactController::class, 'showContactForm'])->name('contact');
Route::post('/send-contact', [ContactController::class, 'sendContactForm'])->name('send.contact');

// Firebase Authentication Route
Route::post('/firebase-login', [FirebaseAuthController::class, 'loginWithFirebase'])->name('firebase.login');

// Resource Routes
Route::get('/resources', [ResourceController::class, 'index'])->name('resources.index');

// Gamification and Game Routes
Route::get('/gamification', [GamificationController::class, 'index'])->name('gamification');
Route::prefix('games')->group(function () {
    Route::get('/sudoku', [GameController::class, 'sudoku'])->name('games.sudoku');
    Route::get('/rpg-quest', [GameController::class, 'rpgQuest'])->name('games.rpgQuest');
    Route::get('/crossword', [GameController::class, 'crossword'])->name('games.crossword');
    Route::get('/load-quiz', [GameController::class, 'loadQuiz'])->name('games.loadQuiz');
    Route::get('/memory-quest', [GameController::class, 'memoryQuest'])->name('games.memoryQuest');
    Route::get('/simulation', [GameController::class, 'simulation'])->name('games.simulation');
});

// Gamification Game Routes
Route::prefix('gamification')->group(function () {
    Route::get('/sudoku', [GamificationController::class, 'sudoku'])->name('gamification.sudoku');
    Route::get('/simulation', [GamificationController::class, 'simulation'])->name('gamification.simulation');
    Route::get('/rpg-quest', [GamificationController::class, 'rpgQuest'])->name('gamification.rpgQuest');
    Route::get('/memory-match', [GamificationController::class, 'memoryMatch'])->name('gamification.memoryMatch');
    Route::get('/quiz', [GamificationController::class, 'quiz'])->name('gamification.quiz');
    Route::get('/crossword', [GamificationController::class, 'crossword'])->name('gamification.crossword');
});

// Profile Routes (authenticated users only)
Route::middleware('auth')->prefix('profile')->group(function () {
    Route::get('/', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('/', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/password', [ProfileController::class, 'changePassword'])->name('profile.changePassword');
});

// Home Route
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/sudoku', [SudokuController::class, 'index'])->name('sudoku');
Route::get('/crossword', [CrosswordController::class, 'index'])->name('crossword');
Route::get('/memory-match', [MemoryMatchController::class, 'index'])->name('memory-match');
Route::get('/quiz', [QuizController::class, 'index'])->name('quiz');
Route::get('/simulation', [SimulationController::class, 'index'])->name('simulation');
Route::get('/rpg-quest', [RpgQuestController::class, 'index'])->name('rpg-quest');
