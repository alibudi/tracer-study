<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KuesionerController;
use App\Http\Controllers\admin\LaporanController;
use App\Http\Controllers\Admin\PengumumanController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EntriesController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AuthController::class,'login'])->name('login');
Route::post('actionLogin',[AuthController::class,'actionLogin'])->name('actionLogin');
Route::get('actionLogout',[AuthController::class,'actionLogout'])->name('actionLogout');
Route::get('/survey',[EntriesController::class,'create'])->name('entries.create');
Route::post('/survey',[EntriesController::class,'store'])->name('entries.store');

Route::prefix('admin')->middleware('auth')->group(function (){
    Route::post('import', [UserController::class,'import_excel'])->name('import');
    Route::get('dashboard', [DashboardController::class,'index'])->name('dashboard');
    Route::resource('user', UserController::class);
    Route::post('changepassword/{id}',[UserController::class,'changePassword'])->name('user.password');
    Route::resource('role', RoleController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('kuesioner', KuesionerController::class);
    Route::get('/kuesioner-user',[KuesionerController::class,'user'])->name('kuesioner-user');
    Route::post('user-submit',[KuesionerController::class,'storeData'])->name('add');
    Route::resource('pengumuman', PengumumanController::class);
    Route::get('pengumuman-user', [PengumumanController::class,'user_pengumuman'])->name('pengumuman-user');
    Route::resource('laporan-alumni', LaporanController::class);
    Route::get('alumni',[UserController::class,'alumni'])->name('kelola-alumni');
});


