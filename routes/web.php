<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
// use App\Http\Controllers\ClassesController;
use App\Http\Controllers\Teacher\ClassesController;
use App\Http\Controllers\Teacher\PostsController;
use App\Http\Controllers\Teacher\TasksController;
use App\Http\Controllers\Teacher\ResultTasksController;
use App\Http\Controllers\Teacher\ResultScoresController;
use App\Http\Controllers\Student\StudentsController;
use App\Http\Controllers\DownloadsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\Auth;

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
//     return view('layout/mainlayout');
// });

Route::get('welcome', function () {
    return view('welcome');
});

// Route::get('/', function () {
//     return view('login');
// });

Route::get('about', function () {
    return view('about');
});

Route::get('services', function () {
    return view('teachers.tasks.show');
});
// Route::get('teachers/dashboard', function () {
//     return view('teachers.dashboard');
// });

// Route::get('register', function () {
//     return view('register');
// });

// Route::get('/', function () {
//     return view('dashboard');
// });

// Route::get('register', [UsersController::class, 'register'])->name('register');
// Route::post('register', [UsersController::class, 'register_action'])->name('register.action');

// Route::get('/login', [UsersController::class, 'index'])->name('login');
// Route::post('/authenticate', [UsersController::class, 'authenticate'])->name('authenticate');
// Route::get('/logout', [UsersController::class, 'logout'])->name('logout');

Route::get('/', [LoginController::class, 'preLogin'])->name('login');
Route::post('/post_login', [LoginController::class, 'postLogin'])->name('post_login');
Route::get('/register', [LoginController::class, 'preRegister'])->name('register');
Route::post('/post_register', [LoginController::class, 'postRegister'])->name('post_register');
Route::get('/logout', [LoginController::class, 'Logout'])->name('logout');

Route::middleware(['auth'])->group(function() {

    // Beranda
    Route::get('/beranda', [HomeController::class, 'index'])->name('beranda');
    
    // Teacher Dashboard
    Route::get('teacher/class/show/{id}', [ClassesController::class, 'show'])->name('teacher.classes.show');

    // Teacher Posts
    Route::post('teacher/post/store/{id}', [PostsController::class, 'store'])->name('teacher.post.store');

    // Teacher Tasks
    Route::get('teacher/task/index/{id}', [TasksController::class, 'index'])->name('teacher.task.index');
    Route::post('teacher/task/store/{id}', [TasksController::class, 'store'])->name('teacher.task.store');
    Route::get('teacher/task/show/{id}/{id_task}', [TasksController::class, 'show'])->name('teacher.task.show');
    Route::post('teacher/task/update/{id}/{id_task}', [TasksController::class, 'update'])->name('teacher.task.update');

    // Teacher Result Tasks
    Route::get('teacher/resulttask/show/{id_user}/{id_task}', [ResultTasksController::class, 'show'])->name('teacher.resulttask.show');
    
    // Teacher Result Scores
    Route::get('teacher/resultscore/show/{id_user}/{id_task}', [ResultScoresController::class, 'show'])->name('teacher.resultscore.show');
    Route::post('teacher/resultscore/store/{id_user}/{id_task}', [ResultScoresController::class, 'store'])->name('teacher.resultscore.store');

    // Teacher Orang
    Route::get('teacher/orang/{id}', [ClassesController::class, 'orang'])->name('teacher.orang');
    
    // Student Dashboard
    Route::get('students/dashboard/{id}', [StudentsController::class, 'show'])->name('students.dashboard');

    // Student Posts
    Route::post('students/dashboard/{id}', [StudentsController::class, 'store'])->name('students.insertposts');

    //  Student Tasks
    Route::get('students/tugaskelas/{id}', [StudentsController::class, 'tugasKelas'])->name('students.tugaskelas');

    // Student Task Details
    Route::get('students/detailtugas/{id_task}', [StudentsController::class, 'detailTugas'])->name('students.detailtugas');
    Route::get('students/detailtugas/{id}', [StudentsController::class, 'detailTugas'])->name('students.detailtugas');
    Route::post('students/addresult/{id}', [StudentsController::class, 'uploadResults'])->name('add.result');

    // Student Orang
    Route::get('students/orang/{id}', [StudentsController::class, 'orang'])->name('students.orang');

    // Download
    Route::get('{filepath}', [DownloadsController::class, 'download'])->name('download');
    
    // Gabung Kelas
    Route::post('gabungkelas', [HomeController::class, 'gabungKelas'])->name('gabungkelas');

    // Edit Kelas
    Route::post('editkelas/{id}', [HomeController::class, 'editKelas'])->name('editkelas');

    // Buat Kelas
    Route::post('buatkelas', [HomeController::class, 'buatKelas'])->name('buatkelas');

});
