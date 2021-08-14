<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\LecturerController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\AdminController;

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
    return view('auth.login');
});

// Route::get('/main', function () {
//     return view('backend.dashboard');
// });



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Admin Routes
//Nama route : admin.user.{{nama_function_controller}} ex: admin.user.index
Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {
    Route::resource('/users', UserController::class);
    Route::resource('/lecturers', LecturerController::class);
    Route::resource('/students', StudentController::class);
    Route::resource('/admins', AdminController::class);
});
