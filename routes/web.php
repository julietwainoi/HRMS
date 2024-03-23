<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\databaseController;
use App\Http\Controllers\leaveController;
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
Route::get('/leave',[leaveController::class, 'index']);
Route::post('/leave-form',[leaveController::class, 'InsertLeaveData']);

Route::get('/pending-request', [App\Http\Controllers\leaveController::class, 'showPendingRequests']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'CurrentProfile'])->name('profile');
