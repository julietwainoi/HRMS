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
Route::get('/staffleaves', [App\Http\Controllers\LeaveController::class, 'pendingRequestsleave'])->name('staffleaves');

//pending request for admin
Route::get('/pending-request', [App\Http\Controllers\LeaveController::class, 'adminpendingRequests'])
    ->middleware('checkUserRole')
    ->name('admin.pendingRequests');



//home page
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//user profile
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'CurrentProfile'])->name('profile');
//assignRoles
Route::get('/create-roles', [RoleController::class, 'RoleInstances']);
 
Route::get('/assignRole/{userId}/{roleId}',[UserController::class, 'assignRole']);

// routes/web.php

//admin reject or accept leave
Route::get('/accept-request/{id}', [LeaveController::class, 'acceptRequest'])->middleware('checkUserRole');
Route::get('/reject-request/{id}', [LeaveController::class, 'rejectRequest'])->middleware('checkUserRole');
//unauthorized  route
Route::get('/unauthorized', function () { return 'Unauthorized access!';})->name('unauthorized');

//for storing leavecodes
Route::post('/leavecodes', [LeaveCodesController::class, 'store'])->name('leavecodes.store');
Route::get('/LeavesCode',[App\Http\Controllers\LeaveCodesController::class, 'index']);

//adding leaves for the employees
Route::post('/leavedetail', [LeaveDetailController::class, 'InsertLeaveDetail'])->name('leaveDetail.store');
Route::get('/LeaveDetail', [LeaveDetailController::class, 'index'])->name('LeaveDetail');
Route::get('/dashboard', [LeaveDetailController::class, 'showLeaveDetails'])->name('dashboard');
Route::get('/leavesCode', [LeaveCodesController::class,'store'])->name('leavesCode');
//adding the dropdown  type of leave to leave assignment form & leave application form from the leavecode table
Route::get('/LeaveDetail', [LeaveDetailController::class,'showLeaveDescriptions'])->name('LeaveDetail');
Route::get('/leave', [LeaveController::class,'showLeaveDescriptions'])->name('leave');