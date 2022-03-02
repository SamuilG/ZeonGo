<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DeviceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\PassController;
use App\Http\Controllers\Devices\UserOptions;
use App\Http\Controllers\Auth\EmailController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Devices\ManageDevice;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Scene\RegularController;

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


// Home
Route::get('/home', [RegularController::class, 'index'])->name('home');

// Email
Route::get('/verifyEmail', [EmailController::class, 'verifyEmail']);



// Auth Things
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::post('/forgottenPassword', [PassController::class, 'forgottenPassword'])->name('forgottenPassword');
Route::get('/forgottenPassword', [PassController::class, 'index']);

// Route::post('/resetPassword', [PassController::class, 'forgottenPassword'])->name('resetPassword'); // за после 
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/', function () {
    return view('index');
})->name('index')
  ->middleware(['guest']);


// Device management things
// normal user things
Route::get('/account', [RegularController::class, 'userSettings'])->name("userSettings");

Route::post('/addDevice', [UserOptions::class, 'addDevice'])->name("addDevice");

Route::post('/user/accept/{device}', [UserOptions::class, 'accept']);
Route::post('/user/decline/{device}', [UserOptions::class, 'decline']);
// management things
Route::get('/manage/{device}', [ManageDevice::class, 'index'])->name("manage");
Route::post('/manage/{device}', [ManageDevice::class, 'saveChanges']);

Route::post('/approve/{device}/{user}', [ManageDevice::class, 'approve']);
Route::post('/decline/{device}/{user}', [ManageDevice::class, 'decline']);

Route::post('/addUser/{device}/', [ManageDevice::class, 'addUser']);


// SUPER ADMIN THINGS

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

Route::get('/createDevice', [AdminController::class, 'createDeviceIndex']);

Route::resource('admin/device', DeviceController::class);
