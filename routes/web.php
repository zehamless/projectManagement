<?php

use App\Http\Controllers\CustomerContactController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\MilestoneController;
use App\Http\Controllers\OperationalAgendaController;
use App\Http\Controllers\OperationalController;
use App\Http\Controllers\OperationalExpensesController;
use App\Http\Controllers\ProductionCostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TopController;
use App\Http\Controllers\UserController;
use App\Material;
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
Route::post('marks-as-read/{notification}', [UserController::class, 'marksAsRead'])->name('markNotification');
Route::get('mark-all-as-read', [UserController::class, 'marksAllAsRead'])->name('markAllNotification');
Route::group(['prefix' => 'projects'], function () {
    Route::get('/', [ProjectController::class, 'index'])->name('projects.index');
    Route::get('/createProjects', [ProjectController::class, 'create'])->name('projects.createProjects');
    Route::get('/editProjects/{id}', [ProjectController::class, 'edit'])->name('projects.editProjects');
    Route::post('/', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/detail/{id}', [ProjectController::class, 'show'])->name('projects.show');
    // Route::get('/{id}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::put('/{id}', [ProjectController::class, 'update'])->name('projects.update');
    Route::delete('/{id}', [ProjectController::class, 'destroy'])->name('projects.destroy');
    Route::get('/createProductionCost/{id}', [ProductionCostController::class, 'create'])->name('production-cost.create');
    Route::post('/production-cost', [ProductionCostController::class, 'store'])->name('production-cost.store');
    Route::delete('/production-cost/{id}', [ProductionCostController::class, 'destroy'])->name('production-cost.destroy');
    Route::get('/get-projects', [ProjectController::class, 'getProjects'])->name('getProjects');
});
// Milestone
Route::get('/get-milestone-data/{id}', [MilestoneController::class, 'getMilestoneData'])->name("milestone.get");
// Pcost json
Route::get('/get-cost-data/{id}', [ProductionCostController::class, 'getPCostData'])->name("cost.get");
Route::put('production/update/', [ProductionCostController::class, 'update'])->name('cost.update');
Route::get('/', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard')->name('dashboard.index');


Route::prefix('customer')->group(function () {
    Route::get('/', [CustomerController::class, 'index'])->name('customer.index');
});

Route::get('/staff', function () {
    return view('staff');
});

//Route::get('/RoleSelect', function () {
//    return view('rolecustomelogin');
//});

//cara penggunaan middleware "hasRole:role1, role2, dst"
Route::prefix('test')->group(function () {
    Route::get('/admin', function () {
        return view('testPage.index');
    })->middleware(['auth', 'hasRole:Admin'])->name('testPage.index');
    Route::get('/admin/technician', function () {
        return view('testPage.index');
    })->middleware(['auth', 'hasRole:Admin,Technician'])->name('testPage.index');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('milestone')->group(function () {
    Route::get('/create/{id}', [MilestoneController::class, 'create'])->name('milestone.create');
    Route::post('/store', [MilestoneController::class, 'store'])->name('milestone.store');
    Route::put('/', [MilestoneController::class, 'update'])->name('milestone.update');
    Route::delete('/{id}', [MilestoneController::class, 'destroy'])->name('milestone.destroy');
    Route::get('file/{file}', [MilestoneController::class, 'downloadfile'])->name('milestone.file');
});

Route::prefix('top')->group(function () {
    Route::get('/create/{id}', [TopController::class, 'create'])->name('top.create');
    Route::post('/store', [TopController::class, 'store'])->name('top.store');
    Route::get('/get-payment-data/{id}', [TopController::class, 'getTopData'])->name("top.get");
    Route::put('/', [TopController::class, 'update'])->name('top.update');
    Route::delete('/{id}', [TopController::class, 'destroy'])->name('top.destroy');
    Route::get('file/{file}', [TopController::class, 'downloadfile'])->name('top.file');
});


Route::prefix('customer')->group(function () {
    Route::get('/', [CustomerController::class, 'index'])->name('customer.index');
    Route::get('/create', [CustomerController::class, 'create'])->name('customer.create');
    Route::post('/store', [CustomerController::class, 'store'])->name('customer.store');
    Route::get('/show/{id}', [CustomerController::class, 'show'])->name('customer.show');
    Route::get('/edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
    Route::put('/update', [CustomerController::class, 'update'])->name('customer.update');
    Route::delete('/delete/{id}', [CustomerController::class, 'destroy'])->name('customer.destroy');
    Route::get('/detail/{id}', [CustomerController::class, 'detail'])->name('customer.detail');
    Route::get('/get-customer-data/{id}', [CustomerController::class, 'getCustomerData'])->name("customer.get");
});

Route::prefix('customerContact')->group(function () {
    Route::get('/', [CustomerContactController::class, 'index'])->name('customerContact.index');
    Route::get('/create', [CustomerContactController::class, 'create'])->name('customerContact.create');
    Route::post('/store', [CustomerContactController::class, 'store'])->name('customerContact.store');
    Route::get('/show/', [CustomerContactController::class, 'show'])->name('customerContact.show');
    Route::get('/edit', [CustomerContactController::class, 'edit'])->name('customerContact.edit');
    Route::get('/update', [CustomerContactController::class, 'update'])->name('customerContact.update');
    Route::delete('/delete/{id}', [CustomerContactController::class, 'destroy'])->name('customerContact.destroy');
    Route::get('/get-customer-contacts/{customer_id}', [CustomerContactController::class, 'getCustomerContacts'])->name('customerContact.getCustomerContact');;
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

    Route::get('/users/', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'createForm'])->name('users.createForm');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('/users/{user}/edit', [UserController::class, 'updateForm'])->name('users.updateForm');
    Route::patch('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'delete'])->name('users.delete');
    Route::get('/users/getTechnician/{operational}', [UserController::class, 'getTechnician'])->name('users.getTechnician');
});

Route::prefix('operational')->group(function () {
    Route::get('/', [OperationalController::class, 'index'])->name('operational.index'); //?
    Route::get('/showId/{id}', [OperationalController::class, 'showById'])->name('operational.showById'); //?
    Route::get('/create/{id}', [OperationalController::class, 'create'])->name('operational.create');
    Route::get('/create', function () {
        return view('projects.createOperational');
    })->name('createOperational');
    Route::get('/get-operational-data/{id}', [OperationalController::class, 'getOperationalData'])->name('operational.getOperationalData');
    Route::post('/store', [OperationalController::class, 'store'])->name('operational.store');
    Route::get('/show/{operational}', [OperationalController::class, 'show'])->name('operational.show'); //?
    Route::put('/update', [OperationalController::class, 'update'])->name('operational.update'); //~
    Route::delete('/{operational}', [OperationalController::class, 'destroy'])->name('operational.destroy');
    Route::post('/approve/{operational}', [OperationalController::class, 'approve'])->name('operational.approve'); //~
    Route::get('/getOperational/{salesOrder}', [OperationalController::class, 'getOperational'])->name('operational.get-operational'); //? --
    Route::get('/getTeam/{operational}', [OperationalController::class, 'getTeam'])->name('operational.get-team');
    Route::prefix('expense')->group(function () {
        Route::get('/get/{operational}', [OperationalExpensesController::class, 'index'])->name('operational.expense.index');
        Route::post('/store', [OperationalExpensesController::class, 'store'])->name('operational.expense.store');
        Route::get('/{expense}/edit', [OperationalExpensesController::class, 'updateExpenseForm'])->name('operational.expense.update-form');
        Route::patch('/{expense}', [OperationalExpensesController::class, 'update'])->name('operational.expense.update');
        Route::delete('/{expense}', [OperationalExpensesController::class, 'delete'])->name('operational.expense.delete');
        Route::get('/show/{expense}', [OperationalExpensesController::class, 'show'])->name('operational.expense.show');
    });
    Route::prefix('technician')->group(function () {
        Route::patch('/{operational}', [OperationalController::class, 'detachTeam'])->name('operational.detach-team');
        Route::patch('/attach/{operational}', [OperationalController::class, 'attachTeam'])->name('operational.attach-team');
    });
    Route::prefix('agenda')->group(function () {
        Route::get('/get/{operational}', [OperationalAgendaController::class, 'index'])->name('operational.agenda.index');
        Route::delete('/{agenda}', [OperationalAgendaController::class, 'delete'])->name('operational.agenda.delete');
        Route::post('/store', [OperationalAgendaController::class, 'store'])->name('operational.agenda.store');
        Route::patch('/{agenda}', [OperationalAgendaController::class, 'update'])->name('operational.agenda.update');
        Route::get('/show/{agenda}', [OperationalAgendaController::class, 'show'])->name('operational.agenda.show');
    });
    Route::get('/preview', function(){
        return view('operational.operationalDocument');
    }); //?
});


Route::prefix('materials')->group(function () {
    Route::get('/', [MaterialController::class, 'index'])->name('materials.index');
    Route::get('/create', [MaterialController::class, 'create'])->name('materials.create');
    Route::post('/store', [MaterialController::class, 'store'])->name('materials.store');
    Route::get('/show', [MaterialController::class, 'show'])->name('materials.show');
    Route::get('/edit', [MaterialController::class, 'edit'])->name('materials.edit');
    Route::get('/update', [MaterialController::class, 'update'])->name('materials.update');
    Route::get('/delete', [MaterialController::class, 'delete'])->name('materials.delete');
});

Route::get('/projects/createMilestone', function () {
    return view('projects.createMilestone');
});


Route::get('/projects/createOperational', function () {
    return view('projects.createOperational');
});

Route::get('/projects/createRecord', function () {
    return view('projects.createRecord');
});

Route::get('calendar', function () {
    return view('calendar');
});

Route::get('approval', function () {
    return view('approval');
});

require __DIR__ . '/auth.php';
