<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/pages/create', [PageController::class, 'create'])->name('page.create');
    Route::post('/pages/create/store', [PageController::class, 'store'])->name('page.store');
    Route::delete('/pages/{page}', [PageController::class, 'destroy'])->name('page.destroy');

    Route::get('/tasks/{page:slug}', [TaskController::class, 'index'])->name('tasks');
    Route::get('/tasks/{page:slug}/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::post('/tasks/{page:slug}/store', [TaskController::class, 'store'])->name('tasks.store');
    Route::patch('/tasks/{page:slug}/{task}/update', [TaskController::class, 'update'])->name('task.update');
});

require __DIR__.'/auth.php';
