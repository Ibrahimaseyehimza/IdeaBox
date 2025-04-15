<?php

use \App\Http\Controllers\ProjectController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\CommentController;

use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\UserIdeaController;
use App\Http\Controllers\VoteController;
use App\Models\Department;
use App\Models\Project;
use App\Models\Theme;
use Illuminate\Support\Facades\Route;





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route pour le home accessible à tous les utilisateur
Route::get('/', [HomeController::class, 'index'])->name('welcome');

// Route pour le home accessible uniquement aux utilisateurs authentifiés
Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

// Route pour le dashboard accessible uniquement aux admin authentifiés
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::resource('themes', ThemeController::class);

Route::get('/ideas', [IdeaController::class, 'index'])->name('ideas.index'); // Liste des idées
Route::get('/ideas/create', [IdeaController::class, 'create'])->name('ideas.create'); // Formulaire de création
Route::post('/ideas', [IdeaController::class, 'store'])->name('ideas.store'); // Stockage d'une idée
Route::get('/ideas/{idea}', [IdeaController::class, 'show'])->name('ideas.show'); // Détails d'une idée

Route::get('/ideas/{id}/edit', [IdeaController::class, 'edit'])->name('ideas.edit');

Route::put('/ideas/{idea}', [IdeaController::class, 'update'])->name('ideas.update'); // Liaison implicite
Route::delete('/ideas/{idea}', [IdeaController::class, 'destroy'])->name('ideas.destroy'); // Liaison implicite
Route::put('/ideas/{idea}/status', [IdeaController::class, 'updateStatus'])->name('ideas.updateStatus'); // Liaison implicite

// Route Dashboard
// Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/ideas', [AdminDashboardController::class, 'index'])->name('ideas.index');
    Route::patch('/ideas/{idea}/status', [AdminDashboardController::class, 'updateStatus'])->name('ideas.updateStatus');
});

Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
    ->middleware('auth', 'role:admin') // Assurez-vous que l'utilisateur est connecté et est un admin
    ->name('admin.dashboard');

// Route Project
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');

// Route Departement
Route::get('/departments', [DepartmentController::class, 'index'])->name('departments.index');

// Route Theme
Route::get('/themes', [ThemeController::class, 'index'])->name('themes.index');

// Route User
Route::get('/users', [UserController::class, 'index'])->name('users.index');

// Route UserIdeaController
Route::middleware(['auth'])->group(function (){
    Route::get('/user/dashboard', [UserIdeaController::class, 'index'])->name('user.dashboard');
    Route::get('/user/ideas', [UserIdeaController::class, 'store'])->name('user.idea.store');

    Route::get('/mes_idees', [IdeaController::class, 'mine'])->name('ideas.mine');
});

// Route DashboardUser
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/dashboard_user', [UserDashboardController::class, 'index'])->name('user.dashboard');
});



// Route Like
// Route::post('/ideas/{id}/like', [IdeaController::class, 'like'])->name('ideas.like');
Route::post('/ideas/{id}/like', [VoteController::class, 'store'])->name('ideas.like');


// Route pour les commentaires
Route::post('/ideas/{idea}/comments', [CommentController::class, 'store'])->name('comments.store')->middleware('auth');



require __DIR__.'/auth.php';
