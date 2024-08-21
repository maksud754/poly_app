<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Lecturer\LecturerController;
use App\Http\Controllers\Admin\Student\StudentController;
use App\Http\Controllers\Admin\Programs\ProgramController;
use App\Http\Controllers\Admin\Courses\CourseController;

Route::get('/', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'AuthLogin']);
Route::get('logout', [AuthController::class, 'logout']);
Route::get('forgot-password', [AuthController::class, 'forgotPassword']);
Route::post('forgot-password', [AuthController::class, 'postForgotPassword']);
Route::get('reset/{token}', [AuthController::class, 'reset']);
Route::post('reset/{token}', [AuthController::class, 'postPasswordReset']);

Route::group(['middleware' => 'admin'], function() {
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('admin/profile', [AdminController::class, 'viewProfile']);
    Route::get('admin/edit/{id}', [AdminController::class, 'editProfile']);
    Route::post('admin/edit/{id}', [AdminController::class, 'updateProfile']);
    Route::get('admin/admin/list', [AdminController::class, 'list']);
    Route::get('admin/admin/add', [AdminController::class, 'add']);
    Route::post('admin/admin/add', [AdminController::class, 'insert']);
    Route::get('admin/admin/delete/{id}', [AdminController::class, 'delete']);
    Route::get('admin/lecturer/list', [LecturerController::class, 'list']);
    Route::get('admin/lecturer/add', [LecturerController::class, 'add']);
    Route::post('admin/lecturer/add', [LecturerController::class, 'insert']);
    Route::get('admin/lecturer/edit/{id}', [LecturerController::class, 'edit']);
    Route::post('admin/lecturer/edit/{id}', [LecturerController::class, 'update']);
    Route::get('admin/lecturer/delete/{id}', [LecturerController::class, 'delete']);
    Route::get('admin/student/list', [StudentController::class, 'list']);
    Route::get('admin/student/add', [StudentController::class, 'add']);
    Route::post('admin/student/add', [StudentController::class, 'insert']);
    Route::get('admin/student/edit/{id}', [StudentController::class, 'edit']);
    Route::post('admin/student/edit/{id}', [StudentController::class, 'update']);
    Route::get('admin/student/delete/{id}', [StudentController::class, 'delete']);
    Route::get('admin/programs/list', [ProgramController::class, 'list']);
    Route::get('admin/programs/viewDetail/{id}', [ProgramController::class, 'viewDetail']);
    Route::get('admin/programs/add', [ProgramController::class, 'add']);
    Route::post('admin/programs/add', [ProgramController::class, 'insert']);
    Route::get('admin/programs/edit/{id}', [ProgramController::class, 'edit']);
    Route::post('admin/programs/edit/{id}', [ProgramController::class, 'update']);
    Route::get('admin/programs/delete/{id}', [ProgramController::class, 'delete']);
    Route::get('admin/courses/list', [CourseController::class, 'list']);
    Route::get('admin/courses/view/{id}', [CourseController::class, 'view']);
    Route::get('admin/courses/add', [CourseController::class, 'add']);
    Route::post('admin/courses/add', [CourseController::class, 'insert']);
    Route::get('admin/courses/edit/{id}', [CourseController::class, 'edit']);
    Route::post('admin/courses/edit/{id}', [CourseController::class, 'update']);
    Route::get('admin/courses/delete/{id}', [CourseController::class, 'delete']);
});

Route::group(['middleware' => 'student'], function () {
    Route::get('student/dashboard', [DashboardController::class, 'dashboard']);
});