<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\AuthController;
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
    return view('welcome');
});

Route::get('login', [AuthController::class,'login'])->name('login');
Route::post('actionLogin',[AuthController::class,'actionLogin'])->name('actionLogin');
Route::get('actionLogout',[AuthController::class,'actionLogout'])->name('actionLogout');

Route::prefix('admin')->middleware('auth')->group(function (){
    Route::get('dashboard', [DashboardController::class,'index'])->name('dashboard');
});


