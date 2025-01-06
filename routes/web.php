<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Home\TaskController;
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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/task/create', [TaskController::class, 'create']);

Route::post('/store', [TaskController::class, 'store'])->name('store');

Route::get('/dashboard', [TaskController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/task/show/{id}', [TaskController::class, 'show'])
->name('post.show');

Route::get('/task/{id}/edit', [TaskController::class, 'edit'])
->name('edit');

Route::patch('/task/{id}', [TaskController::class, 'update'])
->name('update');

require __DIR__.'/auth.php';
