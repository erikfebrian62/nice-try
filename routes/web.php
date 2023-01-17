<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\users\MainController;
use App\Http\Controllers\users\ProdukController;
use App\Http\Controllers\auth\PasswordController;
use App\Http\Controllers\users\LaporanController;
use App\Http\Controllers\users\KategoriController;
use App\Http\Controllers\auth\VerificationController;

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

Route::controller(AuthController::class)->middleware('guest')->group(function () {
    //register
    Route::get('/', 'register_index')->name('register.index');
    Route::post('/', 'register_proces')->name('register.proces');

    //login
    Route::get('login', 'login_index')->name('login.index');
    Route::post('login', 'login_proces')->name('login');

    //forgot password
    Route::controller(PasswordController::class)->group(function () {
        Route::get('forgot-password', 'forgot_index')->name('forgot.index');
        Route::post('forgot-password', 'forgot_proces')->name('forgot.proces');
        Route::get('reset-password/{token}', 'reset_index')->name('password.reset');
        Route::post('reset-password', 'reset_proces')->name('reset.proces');
    });
});

//logout
Route::get('logout', function () {
    Auth::logout();

    return redirect(route('login.index'));
})->name('logout');

//verifycation email
Route::controller(VerificationController::class)->group(function () {
    Route::get('email/verify/need-verification', 'notice')->middleware('auth')->name('verification.notice');
    Route::get('email/verify/{id}/{hash}', 'verify')->middleware(['auth','signed', 'throttle:6,1' ])->name('verification.verify');
    Route::get('email/verify/resend-verification', 'send')->middleware(['auth','throttle:6,1'])->name('verification.send');
});



Route::group(['middleware' => ['auth','auth.session', 'verified']], function(){
    Route::get('dashboard', [MainController::class, 'index'])->name('dashboard');
    Route::get('profile', [MainController::class, 'profile'])->name('profile');
    Route::put('profile/{id}', [MainController::class, 'proces'])->name('profile.proces');
    Route::get('laporan-keuangan', [LaporanController::class, 'index'])->name('laporan');
    Route::prefix('kategori')->name('kategori.')->group(function (){
        Route::get('/', [KategoriController::class, 'index'])->name('index');
        Route::get('create', [KategoriController::class, 'create'])->name('create');
        Route::post('create', [KategoriController::class, 'store'])->name('store');
        Route::get('edit/{id}', [KategoriController::class, 'edit'])->name('edit');
        Route::put('update/{id}', [KategoriController::class, 'update'])->name('update');
        Route::get('{id}', [KategoriController::class, 'destroy'])->name('destroy');
    });
    Route::prefix('kelola-produk')->name('kelola-produk.')->group(function (){
        Route::get('/', [ProdukController::class, 'index'])->name('index');
        Route::get('pdf', [ProdukController::class, 'generatePdf'])->name('pdf');
        Route::get('search', [ProdukController::class, 'search'])->name('search');
        Route::get('read', [ProdukController::class, 'read'])->name('read');
        Route::get('create', [ProdukController::class, 'create'])->name('create');
        Route::get('store', [ProdukController::class, 'store'])->name('store');
        Route::get('edit/{id}', [ProdukController::class, 'edit'])->name('edit');
        Route::get('update/{id}', [ProdukController::class, 'update'])->name('update');
        Route::get('{id}', [ProdukController::class, 'destroy'])->name('hapus');
    });
});

