<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginAdminController;
use App\Http\Controllers\Admin\ManufaceturerController;
use App\Http\Controllers\interface\ForgotController;
use App\Http\Controllers\Interface\HomeController;
use App\Http\Controllers\interface\LoginController;
use App\Http\Controllers\Interface\ProductController;
use App\Http\Controllers\interface\RegisterController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


//interface(giao diện khách hàng)
Route::get('/',[HomeController::class, 'index'])->name('interface.home');
Route::get('/San-Pham',[ProductController::class, 'index'])->name('interface.product');

//interface login(đăng nhập khách hàng)
Route::get('/Dang-nhap',[LoginController::class ,'index'])->name('interface.login');
Route::post('/loginpost',[LoginController::class,'loginPost'])->name('interface.loginPost');
route::get('/Dang-Xuat',[LoginController::class,'Logout'])->name('interface.logout');

//interface register(đăng ký khách hàng)
Route::get('/Dang-Ky',[RegisterController::class ,'index'])->name('interface.register');
Route::post('/registerpost',[RegisterController::class ,'registerPost'])->name('interface.registerPost');

//interface forgetpassword(quên mật khẩu)
Route::get('/Quen-Mat-Khau',[ForgotController::class ,'index'])->name('interface.forgotpass');
Route::post('/forgotpost',[ForgotController::class ,'forgotPost'])->name('interface.forgotPost');
route::get('/xac-minh-code',[ForgotController::class,'verification'])->name('interface.verification');
route::post('verifipost',[ForgotController::class,'verifiPost'])->name('interface.verifipost');
route::get('/Dat-lai-mat-khau',[ForgotController::class,'resetPassword'])->name('interface.reserpass');
route::post('updatepass',[ForgotController::class,'updatePass'])->name('interface.updatepass');

//end interface

//admin
Route::prefix('admintran')->group(function(){
    Route::get('login',[LoginAdminController::class ,'index'])->name('admin.login');
    Route::get('/',[DashboardController::class,'index'])->name('admin.dashboard');
    Route::resource('manufact',ManufaceturerController::class);

});
