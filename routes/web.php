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
//   User::create([
//     'name' => 'Ilko',
//     'email' => 'ilko.petrov27@gmail.com',
//     'password' => Hash::make('123'),
//     'email_verified' => '1'
//   ]);
//   Device::create([
//     'device_name' => 'EG Geo Milev',
//     'device_description' => 'EG Geo Milev is a school located in Dobrich. Sami the giga chad is from there!',
//     'coordinates' => '43.5660385636653, 27.81893540981833',
//     'device_key' => Device::createKey(),
//   ]);
//   Device::create([
//     'device_name' => 'PMG Ivan Vazov',
//     'device_description' => 'PMG Ivan Vazov is a school located in Dobrich. Ilko studies there!',
//     'coordinates' => '43.564057234319115, 27.828727169323802',
//     'device_key' => Device::createKey(),
//   ]);
//   Device::create([
//     'device_name' => 'AAAAAAAAAA',
//     'device_description' => 'AAAAAAAAAAAAAAAAA',
//     'coordinates' => '43.57019220851931, 27.82741656421111',
//     'device_key' => Device::createKey(),
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
//   History::factory()->times(100)->create();
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
Route::post('/addDevice', [UserOptions::class, 'addDevice'])->name("addDevice");
// management things
Route::post('/manage', [ManageDevice::class, 'index'])->name("manage");
Route::post('/saveChanges', [ManageDevice::class, 'saveChanges']);
