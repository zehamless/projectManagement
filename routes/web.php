<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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
    return view('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('customer')->group(function () {
    Route::get('/index', [CustomerController::class, 'index'])->name('customer.index');
    Route::get('/index/create', [CustomerController::class, 'create'])->name('customer.create');
    Route::post('/index/store', [CustomerController::class, 'store'])->name('customer.store');
    Route::get('/index/show', [CustomerController::class, 'show'])->name('customer.show');
    Route::get('/index/edit', [CustomerController::class, 'edit'])->name('customer.edit');
    Route::get('/index/update', [CustomerController::class, 'update'])->name('customer.update');
    Route::delete('/index/destroy', [CustomerController::class, 'destroy'])->name('customer.destroy');
});

//contoh route (post(/admin/roles)
Route::prefix('admin')->group(function () {
    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/roles/create', [RoleController::class, 'createForm'])->name('roles.createForm');
    Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/roles/{role}/edit', [RoleController::class, 'updateForm'])->name('roles.updateForm');
    Route::patch('/roles/{role}', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('/roles/{role}', [RoleController::class, 'delete'])->name('roles.delete');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'createForm'])->name('users.createForm');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [UserController::class, 'updateForm'])->name('users.updateForm');
    Route::patch('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'delete'])->name('users.delete');
});

Route::get('/detailProjects', function () {
    return view('detailProjects');
});
require __DIR__.'/auth.php';
