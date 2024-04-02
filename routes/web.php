<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\databaseController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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

Route::get('/leave',[App\Http\Controllers\LeaveController::class, 'index']);
Route::post('/leave-form',[App\Http\Controllers\LeaveController::class, 'insertLeaveData']);
Route::get('/pending-request',[App\Http\Controllers\LeaveController::class, 'adminpendingRequests'])->middleware('checkUserRole');
Route::get('/leave',[App\Http\Controllers\LeaveController::class, 'pendingRequestsleave']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'CurrentProfile'])->name('profile');
Route::get('/create-roles', [RoleController::class, 'RoleInstances']);
Route::get('/assignRole/{userId}/{roleId}',[UserController::class, 'assignRole']);

// routes/web.php


Route::get('/accept-request/{id}', [LeaveController::class, 'acceptRequest'])->middleware('checkUserRole');
Route::get('/reject-request/{id}', [LeaveController::class, 'rejectRequest'])->middleware('checkUserRole');
Route::get('/unauthorized', function () { return 'Unauthorized access!';})->name('unauthorized');
