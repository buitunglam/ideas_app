<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TermsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/idea/{id}', [IdeaController::class, 'show'])->name('idea.show');

Route::get('/idea/{id}/edit', [IdeaController::class, 'edit'])->name('idea.edit');

Route::put('/idea/{id}', [IdeaController::class, 'update'])->name('idea.update');

Route::post('/idea', [IdeaController::class, 'store'])->name('idea.create');

Route::delete('/idea/{id}', [IdeaController::class, 'destroy'])->name('idea.destroy');

Route::post('/ideas/{idea}/comments', [CommentController::class, 'store'])->name('ideas.comments.store');

Route::get('/terms', [TermsController::class, 'index']);

//Auth
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store']);