<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\SlideController;
use App\Http\Controllers\Backend\ProdukController;
use App\Http\Controllers\Backend\PortofolioController;
use App\Http\Controllers\Backend\ProyekController;
use App\Http\Controllers\Backend\SmsController;
use App\Http\Controllers\Backend\UsersController;
use App\Http\Controllers\WAgatewayController;


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
Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/proyek',[HomeController::class,'proyek'])->name('proyek');
// Route::get('/Wa', [WAgatewayController::class,'sendWA']);
// Route::get('/sendsms',[SmsController::class,'sendsms']);
Route::get('/login', [LoginController::class,'login'])->name('login');
Route::post('/login-act',[LoginController::class,'actlogin'])->name('proses.login');

Route::group(['middleware' => ['web', 'auth', 'role:admin,superadmin']], function(){
    //role admin
    Route::group(['role' => 'admin'], function(){
        Route::get('/home', [DashboardController::class,'index'])->name('home');
        Route::get('/logout',[LoginController::class,'logout'])->name('logout');
    
        //slide
        Route::get('/slide',[SlideController::class,'index'])->name('slide.index');
        Route::get('/slide-create',[SlideController::class,'create'])->name('slide.create');
        Route::post('/slide-save',[SlideController::class,'store'])->name('slide.save');
        Route::get('/slide/{id}/destroy',[SlideController::class,'destroy']);
        Route::get('/slide/{id}/edit',[SlideController::class,'edit']);
        Route::post('/slide/{id}/update',[SlideController::class,'update']);
    
        //produk
        Route::get('/produk',[ProdukController::class,'index'])->name('produk.index');
        Route::get('/produk-create',[ProdukController::class,'create'])->name('produk.create');
        Route::post('/produk-save',[ProdukController::class,'store'])->name('produk.save');
        Route::get('/produk/{id}/destroy',[ProdukController::class,'destroy']);
        Route::get('/produk/{id}/edit',[ProdukController::class,'edit']);
        Route::post('/produk/{id}/update',[ProdukController::class,'update']);
    
        //portofolio
        Route::get('/porto',[PortofolioController::class,'index'])->name('porto.index');
        Route::get('/porto-create',[PortofolioController::class,'create'])->name('porto.create');
        Route::post('/porto-save',[PortofolioController::class,'store'])->name('porto.save');
        Route::get('/porto/{id}/destroy',[PortofolioController::class,'destroy']);
        Route::get('/porto/{id}/edit',[PortofolioController::class,'edit']);
        Route::post('/porto/{id}/update',[PortofolioController::class,'update']);
    
        //proyek
        Route::get('/proyek',[ProyekController::class,'index'])->name('proyek.index');
        Route::get('/proyek-create',[ProyekController::class,'create'])->name('proyek.create');
        Route::post('/proyek-save',[ProyekController::class,'store'])->name('proyek.save');
        Route::get('/proyek/{id}/destroy',[ProyekController::class,'destroy']);
        Route::get('/proyek/{id}/edit',[ProyekController::class,'edit']);
        Route::post('/proyek/{id}/update',[ProyekController::class,'update']);
        Route::get('/cetak-proyek', [ProyekController::class,'cetak_pdf'])->name('cetak.proyek');
        Route::get('/proyek-detail/{id}',[ProyekController::class,'detail'])->name('detail.proyek');
        Route::get('/cetak-per-proyek/{id}', [ProyekController::class,'unduh'])->name('cetak.per.proyek');
    
        //sms
        Route::get('/sms',[SmsController::class,'index'])->name('sms.index');
        Route::get('/sms-create',[SmsController::class,'create'])->name('sms.create');
        Route::post('/sms-save',[SmsController::class,'sendSMS'])->name('sms.save');
        Route::get('/sms/{id}/destroy',[SmsController::class,'destroy']);
    
        //users
        Route::get('/users',[UsersController::class,'index'])->name('users.index');
        Route::get('/users-create',[UsersController::class,'create'])->name('users.create');
        Route::post('/users-save',[UsersController::class,'store'])->name('users.save');
        Route::get('/users/{id}/destroy',[UsersController::class,'destroy']);
        Route::get('/users/{id}/edit',[UsersController::class,'edit']);
        Route::post('/users/{id}/update',[UsersController::class,'update']);
    
    });
    //role superadmin
    Route::group(['role' => 'superadmin'], function(){
        Route::get('/superadmin', function () {
            return view('welcome');
        });
    });
});

// Route::group(['middleware' => ['auth', 'role:admin']],function(){
// });