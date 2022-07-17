<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PemesananController;

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

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'cobaLogin']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboardAdmin', function(){
    return view('dashboardAdmin.index');
})->middleware('auth', 'isAdmin');

Route::resource('/dashboardUser', DashboardUserController::class)->middleware('auth', 'isUser');

Route::resource('/dashboardAdmin/car', CarsController::class)->middleware('auth', 'isAdmin');
Route::resource('/dashboardAdmin/pemesanan', PemesananController::class)->middleware('auth', 'isAdmin');
Route::resource('/dashboardAdmin/pembayaran', PembayaranController::class)->middleware('auth', 'isAdmin');
