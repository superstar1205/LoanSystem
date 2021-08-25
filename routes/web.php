<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
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
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
Route::get('/manageboard', [AdminController::class, 'manageboard'])->name('manageboard');
Route::get('/edituser', [AdminController::class, 'edituser'])->name('edituser');
Route::post('/roleuser', [AdminController::class, 'roleuser'])->name('roleuser');
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

Route::get('/addcustomer', [UserController::class, 'addcustomer'])->name('addcustomer');

Route::post('/addnewcustomer', [UserController::class, 'addnewcustomer'])->name('addnewcustomer');

Route::get('/showcustomers', [UserController::class, 'showcustomers'])->name('showcustomers');

Route::get('/viewcustomer', [UserController::class, 'viewcustomer'])->name('viewcustomer');

Route::get('/addtrade', [UserController::class, 'addtrade'])->name('addtrade');

Route::post('/deletecustomer', [UserController::class, 'delcustomer'])->name('deletecustomer');

Route::post('/addnewtrade', [UserController::class, 'newtrade'])->name('addnewtrade');

Route::get('/showtrades', [UserController::class, 'showtrades'])->name('showtrades');

Route::get('/addnewpay', [UserController::class, 'addnewpay'])->name('addnewpay');

Route::post('/tradepay', [UserController::class, 'tradepay'])->name('tradepay');

