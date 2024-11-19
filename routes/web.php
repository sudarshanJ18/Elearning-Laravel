<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\FirebaseAuthController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\GamificationController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/admin/uploads', [AdminController::class, 'uploads'])->name('admin.uploads');
    Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
});

Route::get('/contact', [ContactController::class, 'showContactForm'])->name('contact');
Route::post('/send-contact', [ContactController::class, 'sendContactForm'])->name('send.contact');

Route::post('/firebase-login', [FirebaseAuthController::class, 'loginWithFirebase']);

Route::get('/resources', [ResourceController::class, 'index'])->name('resources.index');

Route::get('/gamification', [GamificationController::class, 'index'])->name('gamification');


Route::get('/games/sudoku', [GameController::class, 'sudoku']);
Route::get('/games/rpg-quest', [GameController::class, 'rpgQuest']);
Route::get('/games/crossword', [GameController::class, 'crossword']);
Route::get('/games/load-quiz', [GameController::class, 'loadQuiz']);
Route::get('/games/memory-quest', [GameController::class, 'memoryQuest']);
Route::get('/games/simulation', [GameController::class, 'simulation']);

Route::get('/sudoku', [GamificationController::class, 'sudoku'])->name('sudoku');
Route::get('/simulation', [GamificationController::class, 'simulation'])->name('simulation');
Route::get('/rpg-quest', [GamificationController::class, 'rpgQuest'])->name('rpg-quest');
Route::get('/memory-match', [GamificationController::class, 'memoryMatch'])->name('memory-match');
Route::get('/quiz', [GamificationController::class, 'quiz'])->name('quiz');
Route::get('/crossword', [GamificationController::class, 'crossword'])->name('crossword');
