<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\LoginController;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::get('/tasks/{task}', [TaskController::class, 'show'])->name('tasks.show');
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');

// Route::group(['middleware' => ['role:admin']], function () {
//     // Rute yang hanya dapat diakses oleh pengguna dengan peran 'admin'
//     //  Route::get('/admin', [AdminController::class, 'index']);
//       route::resource('tasks',TaskController::class);
//       route::resource('categories',CategoryController::class);
//  });

//Route::group(['middleware' => ['can:create posts']], function () { ... });
//Route::middleware(['auth', 'permission:create posts'])->group(function () {
    // Rute yang hanya dapat diakses oleh pengguna dengan izin 'create posts'
  //  Route::post('/posts', [PostController::class, 'store']);
//});

require __DIR__.'/auth.php';

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
// Route::get("/api/tasks", [ApiTaskController::class, "index"]);