<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CategoryController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

//Route::get('/home', function () {return view('to-do.index');});

Route::get('/tasks', [TaskController::class, 'index'])->name('tasks');

Route::get('/task/{id}', [TaskController::class, 'show'])->name('task-show');

Route::post('/task-save', [TaskController::class, 'store'])->name('task-save');

Route::patch('/task-update/{id}', [TaskController::class, 'update'])->name('task-update');

Route::delete('/task-delete/{id}', [TaskController::class, 'delete'])->name('task-delete');

Route::resource('categories', CategoryController::class);