<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
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

Route::group(['prefix' => 'projects'], function () {
    // Menampilkan daftar project
    Route::get('/', [ProjectController::class, 'index'])->name('projects.index');
    // Menampilkan form untuk membuat project baru
    Route::get('/create', [ProjectController::class, 'create'])->name('projects.create');
    // Menyimpan project baru ke dalaFm database
    Route::post('/', [ProjectController::class, 'store'])->name('projects.store');
    // Menampilkan detail project
    Route::get('/detail/{id}', [ProjectController::class, 'show'])->name('projects.show');

    // Menampilkan form untuk mengedit project
    Route::get('/{id}/edit', [ProjectController::class, 'edit'])->name('projects.edit');

    // Mengupdate project ke dalam database
    Route::put('/{id}', [ProjectController::class, 'update'])->name('projects.update');

    // Menghapus project dari database
    Route::delete('/{id}', [ProjectController::class, 'destroy'])->name('projects.destroy');
});

Route::get('/', function () {
    return view('testPage.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('project/store', [ProjectController::class, 'store'])->name('project.store');

require __DIR__ . '/auth.php';
