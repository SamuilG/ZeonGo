<?php

use App\Models\Pass;
use App\Models\Device;
use App\Models\Manager;
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

// Route::get('/create', function(){
//   Device::create([
//     'device_name' => 'EG Geo Milev',
//     'device_description' => 'EG Geo Milev is a school located in Dobrich. Sami the giga chad is from there!',
//     'coordinate_x' => 43.5660385636653,
//     'coordinate_y' => 27.81893540981833
//   ]);
//   Device::create([
//     'device_name' => 'PMG Ivan Vazov',
//     'device_description' => 'PMG Ivan Vazov is a school located in Dobrich. Ilko studies there!',
//     'coordinate_x' => 43.564057234319115, 
//     'coordinate_y' => 27.828727169323802
//   ]);
//   Device::create([
//     'device_name' => 'AAAAAAAAAA',
//     'device_description' => 'AAAAAAAAAAAAAAAAA',
//     'coordinate_x' => 43.57019220851931,
//     'coordinate_y' => 27.82741656421111
//   ]);
//   Pass::create([
//     'device_id' => 1,
//     'user_id' => 1,
//     'approved' => true,
//   ]);
//   Pass::create([
//     'device_id' => 2,
//     'user_id' => 1,
//     'approved' => true,
//   ]);
//   Pass::create([
//     'device_id' => 3,
//     'user_id' => 1,
//     'approved' => true,
//   ]);
//   Manager::create([
//     'device_id' => 2,
//     'user_id' => 1
//   ]);
// });

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
Route::post('/abandon', [UserOptions::class, 'leaveDevice'])->name("leaveDevice");
// management things
Route::post('/manage', [ManageDevice::class, 'index'])->name("manage");
