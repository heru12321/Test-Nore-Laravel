<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

Route::get('/', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::get('login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('login', [AuthController::class, 'auth']);

Route::post('logout', [AuthController::class, 'authlogout']);

Route::get('register', [AuthController::class, 'register'])->middleware('guest');
Route::post('register', [AuthController::class, 'addreg']);

Route::get('dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::post('editprofile', [DashboardController::class, 'editprofile'])->middleware('auth');
Route::post('changepass', [DashboardController::class, 'changepass'])->middleware('auth');
Route::post('delete', [DashboardController::class, 'delaccount'])->middleware('auth');

Route::post('viewpdf', [DashboardController::class, 'showpdf'])->middleware('auth');
Route::post('viewexcel', [DashboardController::class, 'showexcel'])->middleware('auth');
