<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmpPossitionController;
use App\Http\Controllers\Award\AwardController;
use App\Http\Controllers\Holiday\WeeklyHolidayController;
use App\Http\Controllers\Holiday\HolidayController;
use App\Http\Controllers\Holiday\LeaveApplicationController;
use App\Http\Controllers\Notice\NoticeController;
use App\Http\Controllers\Department\DepartmentController;
use App\Http\Controllers\Department\subDepartmentController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserRoleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});
Route::get('/home', function () {
    return redirect('dashboard');
});

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'submitLogin']);

Route::middleware(['checkAuth','age'])->group(function (){
    Route::get('logout', [LoginController::class, 'logout']);

    Route::get('dashboard', [DashboardController::class, 'index']);
    Route::resource('users', UserController::class);
    Route::resource('employee', EmployeeController::class);
    Route::resource('possition', EmpPossitionController::class);
    Route::resource('award', AwardController::class);
    Route::resource('weekly_holiday', WeeklyHolidayController::class);
    Route::resource('holiday', HolidayController::class);
    Route::resource('leave_application', LeaveApplicationController::class);
    Route::resource('notice', NoticeController::class);
    Route::resource('department', DepartmentController::class);
    Route::resource('subdepartment', subDepartmentController::class);

    Route::resource('role', RoleController::class);
    Route::resource('user_role', UserRoleController::class);
});


