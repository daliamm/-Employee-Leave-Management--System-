<?php
use App\Http\Controllers\ViewController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LeaveRequestController;
use App\Http\Controllers\LeaveTypeController;
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
Route::get('/view', [ViewController::class, 'index'])->name('view');
Route::get('/view/login/{userType}', [ViewController::class, 'redirectToLogin'])->name('view.login');

Route::group(['middleware' => ['auth', 'user']], function () {
    Route::get('my-requests', [LeaveRequestController::class, 'index'])->name('my-requests');
    Route::get('/my-tasks', [EmployeeController::class, 'tasksUser'])->name('tasks.myTasks');
    Route::post('/my-tasks/{task}/leave', [EmployeeController::class,'leave'])->name('tasks.leave');
    Route::get('my-task/{task}', [EmployeeController::class,'show'])->name('tasks.show');
});

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('admin/dashboard',[AdminController::class,'index'])->name('dashboard.index');
    Route::resource('leave-types',LeaveTypeController::class);
    Route::get('show-request-details/{id}',[AdminController::class,'show'])->name('request.details');
    Route::put('/update-leave-request/{leaveRequest}', [AdminController::class,'updateRequest'])->name('update.leave-request');
    Route::put('/leave-types/{leave_type}', [LeaveTypeController::class,'update'])->name('leave-types.update');
    Route::resource('employees',EmployeeController::class);
    Route::put('/employees/{employee}', [EmployeeController::class, 'update'])->name('employees.update');
    Route::get('employee/{id}/request/',[EmployeeController::class,'getLeaveRequestById'])->name('employee.request');
    Route::get('leavetype/{id}/request/',[LeaveTypeController::class,'getLeaveRequestByType'])->name('leavetype.request');
    Route::resource('tasks',TaskController::class);
});

// Auth
Route::get('/register', [RegisterController::class, 'RegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'LoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);