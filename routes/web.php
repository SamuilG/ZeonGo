<?php

use App\Models\Pass;
// use App\Http\Controllers\Auth\PasswordController;
use App\Models\Device;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\PassController;
use App\Http\Controllers\Auth\EmailController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Scene\RegularController;
use App\Models\History;

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

Route::get('/create', function(){
  // Device::create([
  //   'device_name' => 'treto ime',
  //   'coordinate_x' => 69.69,
  //   'coordinate_y' => 1,
  // ]);
  // Pass::create([
    // 'device_id' => 3,
    // 'user_id' => 1
  // ]);
  History::create([
    'device_id' => 2,
    'user_id' => 1
  ]);
});


// Auth Things
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::post('/forgottenPassword', [PassController::class, 'forgottenPassword'])->name('forgottenPassword');
Route::get('/forgottenPassword', [PassController::class, 'index']);

// Route::post('/resetPassword', [PassController::class, 'forgottenPassword'])->name('resetPassword'); // за после 
Route::get('/create', function(){
  Device::create([
    'device_name' => 'Drugo ime',
    'coordinate_x' => 1,
    'coordinate_y' => 1,
  ]);
  Pass::create([
    'device_id' => 2,
    'user_id' => 1
  ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/', function () {
    return view('index');
})->name('index')
  ->middleware(['guest']);