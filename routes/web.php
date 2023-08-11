<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LeaveTypeController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LeaveRequestController;

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
Route::get('/home', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    // Route::resource('leave-types', LeaveTypeController::class);
    // Route::resource('employees', EmployeeController::class);
    // Route::resource('leave-requests', LeaveRequestController::class)->only(['index', 'update']);
    // Route::post('submit-leave-request', [LeaveRequestController::class, 'submitRequest'])->name('submit-leave-request'); 
    Route::get('/create-employee', [EmployeeController::class, 'createEmployee'])->name('create-employee');
    Route::post('/store-employee', [EmployeeController::class, 'storeEmployee'])->name('store-employee');
    Route::get('/edit-employee/{employee}', [EmployeeController::class, 'editEmployee'])->name('edit-employee');
    Route::put('/update-employee/{employee}', [EmployeeController::class, 'updateEmployee'])->name('update-employee');
    Route::delete('/delete-employee/{employee}', [EmployeeController::class, 'deleteEmployee'])->name('delete-employee');
    Route::get('/create-leave-type', [LeaveTypeController::class, 'createLeaveType'])->name('create-leave-type');
    Route::post('/store-leave-type', [LeaveTypeController::class, 'storeLeaveType'])->name('store-leave-type');
    Route::get('/edit-leave-type/{leaveType}', [LeaveTypeController::class, 'editLeaveType'])->name('edit-leave-type');
    Route::put('/update-leave-type/{leaveType}', [LeaveTypeController::class, 'updateLeaveType'])->name('update-leave-type');
    Route::delete('/delete-leave-type/{leaveType}', [LeaveTypeController::class, 'deleteLeaveType'])->name('delete-leave-type');
    Route::post('/store-leave-request', [LeaveRequestController::class, 'store'])->name('store-leave-request');
    Route::put('/update-leave-request/{application}', [LeaveRequestController::class, 'update'])->name('update-leave-request');
    Route::put('/approve-leave-request/{leaveRequest}', [LeaveRequestController::class, 'approve'])->name('approve-leave-request');
    Route::put('/deny-leave-request/{leaveRequest}', [LeaveRequestController::class, 'deny'])->name('deny-leave-request');
    Route::get('/leave-management', [LeaveTypeController::class, 'index'])->name('leave-management.index');

});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

