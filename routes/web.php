<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdminStudentController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminTeachersController;
use App\Http\Controllers\AdminCoursesController;
use App\Http\Controllers\AdminBatchsController;
use App\Http\Controllers\AdminEnrollmentsController;
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

Route::get('/login/student', [StudentController::class, 'loginStudent'])->name('loginStudent');
Route::resource('students', StudentController::class)->only(['create','store']);
//student@gmail.com //123456
Route::post('/login/student', [StudentController::class, 'loginSubmit'])->name('students.login');

Route::group(['middleware' => 'student'], function () {
    // Routes that require login
    //login
    Route::resource('students', StudentController::class)->only(['edit','update','destroy','index','show']);//register
    //student@gmail.com //123456
    Route::post('/logout/student', [StudentController::class, 'logout'])->name('students.logout');
});

Route::group(['prefix' => 'admin','middleware' => 'admin'],function () {
    Route::get('students', [AdminStudentController::class, 'index'])->name('admin.students.index');
    Route::get('students/create', [AdminStudentController::class, 'create'])->name('admin.students.create');
    Route::post('students', [AdminStudentController::class, 'store'])->name('admin.students.store');
    Route::get('students/{student}', [AdminStudentController::class, 'show'])->name('admin.students.show');
    Route::get('students/{student}/edit', [AdminStudentController::class, 'edit'])->name('admin.students.edit');
    Route::patch('students/{student}', [AdminStudentController::class, 'update'])->name('admin.students.update');
    Route::delete('students/{student}', [AdminStudentController::class, 'destroy'])->name('admin.students.destroy');

    Route::post('/logout/admin', [UserController::class, 'logout'])->name('admin.logout');
    Route::resource('dashboard', UserController::class);
    Route::resource('teachers', AdminTeachersController::class);
    Route::resource('courses', AdminCoursesController::class);
    Route::resource('batches', AdminBatchsController::class);
    Route::resource('enrollments', AdminEnrollmentsController::class);


});
Route::get('/', [FrontendController::class, 'index']);

Route::get('/login/admin', [UserController::class, 'loginAdmin'])->name('loginAdmin');
Route::post('/login/admin', [UserController::class, 'loginSubmit'])->name('admin.login');
//admin@gmail.com //123456

//Route::get('/login/teacher', [TeachersController::class, 'loginTeacher'])->name('loginAdmin');
//Route::post('/login/teacher', [TeachersController::class, 'loginSubmit'])->name('teacher.login');
//teacher@gmail.com //123456




//middelware
//auth//role