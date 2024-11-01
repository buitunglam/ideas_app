<?php

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
Route::get('/terms', [TermsController::class, 'index']);
