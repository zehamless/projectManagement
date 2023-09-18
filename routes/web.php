<?php

use App\Http\Controllers\CustomerContactController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OperationalAgendaController;
use App\Http\Controllers\OperationalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Models\Role;
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
    Route::get('/createProjects', [ProjectController::class, 'create'])->name('projects.createProjects');
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
Route::get('/customer', function () {
    return view('customer');
});
Route::get('/formcustomer', function () {
    return view('formcustomer');
});
Route::get('/staff', function () {
    return view('staff');
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
    Route::get('/', [CustomerController::class, 'index'])->name('customer.index');
    Route::get('/create', [CustomerController::class, 'create'])->name('customer.create');
    Route::post('/store', [CustomerController::class, 'store'])->name('customer.store');
    Route::get('/show', [CustomerController::class, 'show'])->name('customer.show');
    Route::get('/edit', [CustomerController::class, 'edit'])->name('customer.edit');
    Route::get('/update', [CustomerController::class, 'update'])->name('customer.update');
    Route::delete('/delete', [CustomerController::class, 'delete'])->name('customer.delete');
});

Route::prefix('customerContact')->group(function () {
    Route::get('/', [CustomerContactController::class, 'index'])->name('customerContact.index');
    Route::get('/create', [CustomerContactController::class, 'create'])->name('customerContact.create');
    Route::post('/store', [CustomerContactController::class, 'store'])->name('customerContact.store');
    Route::get('/show', [CustomerContactController::class, 'show'])->name('customerContact.show');
    Route::get('/edit', [CustomerContactController::class, 'edit'])->name('customerContact.edit');
    Route::get('/update', [CustomerContactController::class, 'update'])->name('customerContact.update');
    Route::get('/delete', [CustomerContactController::class, 'delete'])->name('customerContact.delete');
});

//contoh route (post(/admin/roles)
Route::prefix('admin')->group(function () {
    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/roles/create', [RoleController::class, 'createForm'])->name('roles.createForm');
    Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/roles/{role}/edit', [RoleController::class, 'updateForm'])->name('roles.updateForm');
    Route::patch('/roles/{role}', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('/roles', [RoleController::class, 'delete'])->name('roles.delete');
    Route::get('/roles/{role}', [RoleController::class, 'showRole'])->name('roles.show');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'createForm'])->name('users.createForm');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [UserController::class, 'updateForm'])->name('users.updateForm');
    Route::patch('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'delete'])->name('users.delete');
});

Route::prefix('operational')->group(function () {
    Route::get('/', [OperationalController::class, 'index'])->name('operational.index');
    Route::get('/create', [OperationalController::class, 'createForm'])->name('operational.createForm');
    Route::post('/store', [OperationalController::class, 'store'])->name('operational.store');
    Route::get('/show', [OperationalController::class, 'show'])->name('operational.show');
    Route::get('/{operational}/edit', [OperationalController::class, 'updateForm'])->name('operational.update-form');
    Route::get('/{operational}', [OperationalController::class, 'update'])->name('operational.update');
    Route::delete('/{operational}', [OperationalController::class, 'delete'])->name('operational.delete');
    Route::post('/approve/{operational}', [OperationalController::class, 'approve'])->name('operational.approve');
});

Route::prefix('operationalAgenda')->group(function () {
    Route::get('/', [OperationalAgendaController::class, 'index'])->name('operational_agenda.index');
    Route::get('/create', [OperationalAgendaController::class, 'create'])->name('operational_agenda.create');
    Route::post('/store', [OperationalAgendaController::class, 'store'])->name('operational_agenda.store');
    Route::get('/show', [OperationalAgendaController::class, 'show'])->name('operational_agenda.show');
    Route::get('/edit', [OperationalAgendaController::class, 'edit'])->name('operational_agenda.edit');
    Route::get('/update', [OperationalAgendaController::class, 'update'])->name('operational_agenda.update');
    Route::get('/delete', [OperationalAgendaController::class, 'delete'])->name('operational_agenda.delete');
});


Route::get('/admin/olahAkun', function () {
    return view('admin.olahAkun');
});

Route::get('/admin/createAkun', function () {
    return view('admin.createAkun');
});

Route::get('/projects/createMilestone', function () {
    return view('projects.createMilestone');
});

Route::get('/projects/createProductionCost', function () {
    return view('projects.createProductionCost');
});

Route::get('/projects/createOperational', function () {
    return view('projects.createOperational');
});

require __DIR__ . '/auth.php';
