<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\databaseController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DeleteController;
use App\Http\Controllers\LeaveDetailController;
use App\Http\Controllers\LeaveCodesController;
use App\Http\Middleware\CheckUserRole;
use App\Http\Controllers\staffDashboardController;
use App\Http\Controllers\RoleuserController;
use App\Http\Controllers\deprtController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ProfileController;

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
    return view('auth.login');
});

Auth::routes();
//leave application form
Route::get('/leave',[App\Http\Controllers\LeaveController::class, 'index'])->name('leave');
Route::post('/leave-form',[App\Http\Controllers\LeaveController::class, 'insertLeaveData']);

Route::get('/staffleaves', [App\Http\Controllers\LeaveController::class, 'Requestsleave'])->name('staffleaves');

//pending request for admin
Route::get('/pending-request', [App\Http\Controllers\staffDashboardController::class, 'adminpendingRequests'])
 ->name('admin.pendingRequests');



//home page
Route::get('/home', [App\Http\Controllers\staffDashboardController::class, 'DashboardView'])->name('home');
//user profile
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'CurrentProfile'])->name('profile');


Route::post('/roles.store', [RoleController::class, 'store'])->name('roles.store');
Route::get('/roles', [RoleController::class, 'index'])->name('roles');
//assignRoles
Route::post('/assign.role',[RoleuserController::class, 'assignRole'])->name('assign.role');
Route::get('/assignrole', [RoleuserController::class, 'index'])->name('assignrole'); 




//admin reject or accept leave
Route::get('/accept-request/{id}', [LeaveController::class, 'acceptRequest'])->name('accept-request');
Route::get('/reject-request/{id}', [LeaveController::class, 'rejectRequest'])->name('reject-request');
//unauthorized  route
Route::get('/unauthorized', function () { return 'Unauthorized access!';})->name('unauthorized');

//for storing leavecodes
Route::post('/leavecodes', [LeaveCodesController::class, 'store'])->name('leavecodes.store');
Route::get('/LeavesCode',[App\Http\Controllers\LeaveCodesController::class, 'index']);

//adding leaves for the employees
Route::post('/leavedetail', [LeaveDetailController::class, 'InsertLeaveDetail'])->name('leaveDetail.store');
Route::get('/LeaveDetail', [LeaveDetailController::class, 'index'])->name('LeaveDetail');
Route::get('/dashboard', [LeaveDetailController::class, 'showLeaveDetails'])->name('dashboard');
//Route::get('/LeavesCode', [LeaveCodesController::class,'store'])->name('leavesCode');
//adding the dropdown  type of leave to leave assignment form & leave application form from the leavecode table
Route::get('/LeaveDetail', [LeaveDetailController::class,'showLeaveDescriptions'])->name('LeaveDetail');

Route::get('/leave', [LeaveController::class, 'showLeaveData'])->name('leave');
Route::delete('leave_delete/{data}', [LeaveController::class, 'deleteLeaveData'])->name('leave_delete');


//
Route::post('/change-password', [UserController::class, 'changePassword'])->name('change.password');
Route::get('/change-password', [UserController::class, 'index'])->name('change-password');
//
Route::get('/staffDashboard', [staffDashboardController::class, 'showStaffDashboard'])->name('staffDashboard');
Route::get('/Supervisor', [staffDashboardController::class, 'getPendingLeavesInDepartment1'])->name('Supervisor');
//department route
Route::get('/department', [DepartmentController::class, 'index'])->name('department');
Route::post('/departments.store', [DepartmentController::class, 'store'])->name('departments.store');
Route::get('/department/{department}/edit', [DepartmentController::class, 'edit'])->name('departments.edit');
Route::put('/department/{department}', [DepartmentController::class, 'update'])->name('departments.update');
Route::delete('/department/{department}', [DepartmentController::class, 'destroy'])->name('departments.destroy');

// Replace YourController with the actual controller name

Route::get('/dashboard-view', [staffDashboardController::class, 'DashboardView'])->name('dashboard-view');
Route::get('/profile/{user}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile/{user}', [ProfileController::class, 'update'])->name('profile.update');