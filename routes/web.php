<?php
//admin
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginAdminController;
use App\Http\Controllers\Admin\ManufaceturerController;


//interface
use App\Http\Controllers\interface\ForgotController;
use App\Http\Controllers\Interface\HomeController;
use App\Http\Controllers\interface\LoginController;
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
Route::get('/', [HomeController::class, 'index'])->name('interface.home');
Route::get('/ProductController', [ProductController::class, 'index'])->name('interface.product');

//interface login(đăng nhập khách hàng)
Route::get('/Login', [LoginController::class, 'index'])->name('interface.login');
Route::post('/loginpost', [LoginController::class, 'loginPost'])->name('interface.loginPost');
route::get('/Logout', [LoginController::class, 'Logout'])->name('interface.logout');

//interface register(đăng ký khách hàng)
Route::get('/Register', [RegisterController::class, 'index'])->name('interface.register');
Route::post('/registerpost', [RegisterController::class, 'registerPost'])->name('interface.registerPost');

//interface forgetpassword(quên mật khẩu)
Route::get('/Forgotpass', [ForgotController::class, 'index'])->name('interface.forgotpass');
Route::post('/forgotpost', [ForgotController::class, 'forgotPost'])->name('interface.forgotPost');
route::get('/verification code', [ForgotController::class, 'verification'])->name('interface.verification');
route::post('verifipost', [ForgotController::class, 'verifiPost'])->name('interface.verifipost');
route::get('/Reserpass', [ForgotController::class, 'resetPassword'])->name('interface.resetpass');
route::post('updatepass', [ForgotController::class, 'updatePass'])->name('interface.updatepass');
//
route::get('/mail_register',[RegisterController::class,'verification_register'])->name('interface.verification_register');
route::post('/mail_registerpost',[RegisterController::class,'verification_register_post'])->name('interface.verification_register_post');


//admin
Route::prefix('admintran')->group(function () {
    Route::get('/', [LoginAdminController::class, 'index'])->name('admin.login');
    Route::post('/handleadmin', [LoginAdminController::class, 'loginPost'])->name('admin.loginpostAdmin');
    Route::get('/logOut', [LoginAdminController::class, 'logOut'])->name('admin.logout');
    route::middleware('auth.admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::resource('manufact', ManufaceturerController::class);
        Route::prefix('category')->group(function () {
            Route::get('/', [CategoriesController::class, 'index'])->name('categories.index');
            Route::get('create', [CategoriesController::class, 'create'])->name('categories.create');
            Route::post('store', [CategoriesController::class, 'store'])->name('categories.store');
            Route::get('edit/{category_id}', [CategoriesController::class, 'edit'])->name('categories.edit');
            Route::put('update/{category_id}', [CategoriesController::class, 'update'])->name('categories.update');
            Route::delete('destroy/{category_id}', [CategoriesController::class, 'destroy'])->name('categories.destroy');
        });
       
    });
});
