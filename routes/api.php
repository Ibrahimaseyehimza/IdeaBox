<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\VoteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;








/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::middleware(['auth:sanctum'])->group(function () {
//     Route::get('/ideas', [IdeaController::class, 'index']);
//     Route::post('/ideas', [IdeaController::class, 'store']);
//     Route::get('/ideas/{id}', [IdeaController::class, 'show']);
//     Route::put('/ideas/{id}', [IdeaController::class, 'update']);
//     Route::delete('/ideas/{id}', [IdeaController::class, 'destroy']);

//     Route::put('/ideas/{id}/status', [IdeaController::class, 'updateStatus']);

// });

// Route::middleware(['auth:sanctum'])->group(function () {
//     Route::apiResource('themes', ThemeController::class);
//     Route::apiResource('departments', DepartmentController::class);
//     Route::apiResource('projects', ProjectController::class);
// });

// Route::middleware(['auth:sanctum'])->group(function () {
//     Route::post('/ideas/{id}/vote', [VoteController::class, 'vote']);
//     Route::delete('/ideas/{id}/vote', [VoteController::class, 'unvote']);
//     Route::get('/ideas/{id}/votes', [VoteController::class, 'count']);
// });

// Route::middleware('auth:sanctum')->group(function () {
//     Route::get('/ideas/{id}/comments', [CommentController::class, 'index']);
//     Route::post('/ideas/{id}/comments', [CommentController::class, 'store']);
//     Route::delete('/comments/{id}', [CommentController::class, 'destroy']);
// });

// Route::middleware('auth:sanctum')->get('/dashboard', [DashboardController::class, 'index']);
