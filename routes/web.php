<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstructorsController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\CourseController;


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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


/********** INSTRUCTORS ROUTES **********/

Route::get('/instructors', [InstructorsController::class, 'index'])->middleware('auth');
Route::get('/instructors/create', [InstructorsController::class, 'create']);
Route::post('/instructors/store', [InstructorsController::class, 'store'])->name('instructors.store');
Route::get('/instructors/{id}', [InstructorsController::class, 'show']);
Route::get('/instructors/{id}/edit', [InstructorsController::class, 'edit']);
Route::patch('/instructors/{id}', [InstructorsController::class, 'update'])->name('instructors.update');
Route::delete('/instructors/{id}', [InstructorsController::class, 'destroy'])->name('instructors.destroy');
Route::get('/instructorssearch', [InstructorsController::class, 'search']);

Route::get('/delete-blank-instructors', [InstructorsController::class, 'deleteBlank']);
Route::get('/instructors/{id}/restore', [InstructorsController::class, 'restore'])->name('instructors.restore');


/********** STUDENTS ROUTES **********/

Route::get('/students', [StudentsController::class, 'index'])->middleware('auth');
Route::get('/students/create', [StudentsController::class, 'create']);
Route::post('/students/store', [StudentsController::class, 'store'])->name('students.store');
Route::get('/students/{id}', [StudentsController::class, 'show']);
Route::get('/students/{id}/edit', [StudentsController::class, 'edit']);
Route::patch('/students/{id}', [StudentsController::class, 'update'])->name('students.update');
Route::delete('/students/{id}', [StudentsController::class, 'destroy'])->name('students.destroy');
Route::get('/studentssearch', [StudentsController::class, 'search']);

Route::get('/delete-blank-students', [StudentsController::class, 'deleteBlank']);
Route::get('/students/{id}/restore', [StudentsController::class, 'restore'])->name('students.restore');


/********** COURSE ROUTES **********/

Route::get('/course', [CourseController::class, 'index'])->middleware('auth');
Route::get('/course/create', [CourseController::class, 'create']);
Route::post('/course/store', [CourseController::class, 'store'])->name('course.store');
Route::get('/course/{id}', [CourseController::class, 'show']);
Route::get('/course/{id}/edit', [CourseController::class, 'edit']);
Route::patch('/course/{id}', [CourseController::class, 'update'])->name('course.update');
Route::delete('/course/{id}', [CourseController::class, 'destroy'])->name('course.destroy');
Route::get('/coursesearch', [CourseController::class, 'search']);

Route::get('/delete-blank-course', [CourseController::class, 'deleteBlank']);
Route::get('/course/{id}/restore', [CourseController::class, 'restore'])->name('course.restore');
