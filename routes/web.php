<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
<<<<<<< HEAD
=======
use App\Http\Controllers\ClassesController;
>>>>>>> 2f6d77e9c994f75a606bd53e29e1d3f939ff399f

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

// Route::get('login', function () {
//     return view('login');
// });

Route::get('about', function () {
    return view('about');
});

Route::get('services', function () {
    return view('services');
});

Route::get('register', function () {
    return view('register');
});

Route::get('/', function () {
    return view('dashboard');
});

<<<<<<< HEAD
Route::get('/users', [UsersController::class, 'index'])->name('users.index');
Route::get('/users/create', [UsersController::class, 'create'])->name('users.create');
Route::post('/users/store', [UsersController::class, 'store'])->name('users.store');
Route::get('/users/show', [UsersController::class, 'show'])->name('users.show');
Route::get('/users/update', [UsersController::class, 'update'])->name('users.update');
=======
Route::get('/login', [UsersController::class, 'index'])->name('login');
Route::post('/authenticate', [UsersController::class, 'authenticate'])->name('authenticate');
Route::get('/logout', [UsersController::class, 'logout'])->name('logout');


Route::get('class/index', [ClassesController::class, 'index'])->name('classes.index');
Route::get('class/create', [ClassesController::class, 'create'])->name('classes.create');
Route::post('class/store', [ClassesController::class, 'store'])->name('classes.store');
Route::get('class/show/{id}', [ClassesController::class, 'show'])->name('classes.show');
Route::get('class/edit/{id}', [ClassesController::class, 'edit'])->name('classes.edit');
Route::post('class/update/{id}', [ClassesController::class, 'update'])->name('classes.update');
Route::get('class/destroy/{id}', [ClassesController::class, 'destroy'])->name('classes.destroy');
>>>>>>> 2f6d77e9c994f75a606bd53e29e1d3f939ff399f
