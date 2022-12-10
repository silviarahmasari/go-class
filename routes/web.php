<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
// use App\Http\Controllers\ClassesController;
use App\Http\Controllers\Teacher\ClassesController;
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
    return view('services');
});
Route::get('teachers/dashboard', function () {
    return view('teachers.dashboard');
});

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
Route::get('/login', [LoginController::class, 'preLogin'])->name('login');
Route::post('/post_login', [LoginController::class, 'postLogin'])->name('post_login');
Route::get('/register', [LoginController::class, 'preRegister'])->name('register');
Route::post('/post_register', [LoginController::class, 'postRegister'])->name('post_register');
Route::get('/logout', [LoginController::class, 'Logout'])->name('logout');


// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function() {
    // Teacher
    Route::get('class/index', [ClassesController::class, 'index'])->name('classes.index');
    Route::get('class/create', [ClassesController::class, 'create'])->name('classes.create');
    Route::post('class/store', [ClassesController::class, 'store'])->name('classes.store');
    Route::get('teacher/class/show/{id}', [ClassesController::class, 'show'])->name('teacher.classes.show');
    Route::get('class/edit/{id}', [ClassesController::class, 'edit'])->name('classes.edit');
    Route::post('class/update/{id}', [ClassesController::class, 'update'])->name('classes.update');
    Route::get('class/destroy/{id}', [ClassesController::class, 'destroy'])->name('classes.destroy');
});

Route::middleware(['auth'])->group(function() {
});
Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');
