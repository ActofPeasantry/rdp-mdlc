<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\LecturerController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\Lecturer\StudyMaterialController;
use App\Http\Controllers\Lecturer\ScoreDetailController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ScoreController;
use App\Models\StudyMaterial;

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
Route::resource('/classrooms', ClassroomController::class);
    Route::get('/classroom/{id}/materi', [ClassroomController::class, 'materi'])->name('classrooms.materi');
    Route::get('/classroom/{id}/members', [ClassroomController::class, 'members'])->name('classrooms.members');
    Route::get('/classroom/{id}/task', [ClassroomController::class, 'task'])->name('classrooms.task');
    Route::resource('/tasks', TaskController::class);


//Admin Routes
//Nama route : admin.user.{{nama_function_controller}} ex: admin.user.index
Route::prefix('admin')->middleware(['auth', 'auth.isAdmin'])->name('admin.')->group(function () {
    Route::resource('/users', UserController::class);
    Route::resource('/lecturers', LecturerController::class);
    Route::resource('/students', StudentController::class);
    Route::resource('/admins', AdminController::class);
});

Route::prefix('lecturer')->middleware(['auth', 'auth.isLecturer'])->name('lecturer.')->group(function () {
    // Classroom => lecturer.classrooms.index
    Route::resource('/classrooms', ClassroomController::class);
    Route::patch('/classrooms/update/{id}', [ClassroomController::class, 'update'])->name('classrooms.update');
    Route::get('/classroom/join', [ClassroomController::class, 'join'])->name('classrooms.join');
    Route::get('/classroom/{id}/materi', [ClassroomController::class, 'materi'])->name('classrooms.materi');
    Route::get('/classroom/{id}/members', [ClassroomController::class, 'members'])->name('classrooms.members');
    Route::get('/classroom/{id}/task', [ClassroomController::class, 'task'])->name('classrooms.task');
    Route::post('/classroom/storeJoin', [ClassroomController::class, 'storeJoin'])->name('classrooms.storeJoin');
    // Task lecturer.tasks.index
    Route::resource('/tasks', TaskController::class);
    Route::get('/tasks/{id}/list', [TaskController::class, 'list'])->name('tasks.list');
    // Question lecturer.questions.index
    Route::resource('/questions', QuestionController::class);
    // ScoreDetail lecturer.ScoreDetail.index
    Route::resource('/ScoreDetail', ScoreDetailController::class);
    // Question lecturer.questions.index
    Route::resource('/questions', QuestionController::class);
    // Study Material => lecturer.materials.index
    Route::resource('/materials', StudyMaterialController::class)->except(array('create'));
    Route::get('/materials/{material}/create', [StudyMaterialController::class, 'create'])->name('materials.create');
    Route::resource('/questions', QuestionController::class);
    Route::get('/question/{id}/create', [QuestionController::class, 'create'])->name('questions.create');
    Route::patch('/classrooms/update/{id}', [ClassroomController::class, 'update'])->name('classrooms.update');
});

Route::prefix('student')->middleware(['auth', 'auth.isStudent'])->name('student.')->group(function () {
    Route::get('/classroom/{id}/materi', [ClassroomController::class, 'materi'])->name('classrooms.materi');
    Route::get('/classroom/{id}/members', [ClassroomController::class, 'members'])->name('classrooms.members');
    Route::get('/classroom/join', [ClassroomController::class, 'join'])->name('classrooms.join');
    Route::post('/classroom/storeJoin', [ClassroomController::class, 'storeJoin'])->name('classrooms.storeJoin');
    Route::resource('/scores', ScoreController::class);
});

