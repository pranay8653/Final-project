<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;




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


// login section
Route::view('/', 'pages.login' )->name('login');
Route::post('/login_user', [SessionController::class, 'login'] )->name('login_user');
// Admin
Route::post('/admin_register', [AdminController::class, 'store'])->name('admin.register');
Route::view('/admin','pages.admin_register');
Route::view('/create_user','pages.create_user');

//forgot
Route::post('/forgot_password',[ForgotPasswordController::class,'forgot'])->name('student_forgot_password');
Route::view('/forgot','pages.forgot_password.forgot-password')->name('forgot_password');
Route::view('/recovary','pages.forgot_password.reset_password')->name('recovery_password');
Route::post('/reset_password',[ForgotPasswordController::class,'reset'])->name('reset_password');


// Student create, Password create & view
Route::post('/student_register',[StudentController::class,'store'])->name('student.register');
Route::get('/student',[StudentController::class, 'create'])->name('register');
Route::view('/create_password','pages.create_password')->name('create_password.token');
Route::post('/save_password',[UserController::class,'password_store'])->name('create_password');



//admin middleware
Route::middleware('auth:web')->group(function() {
    // Route::get('/profile',[SessionController::class, 'profile'])->name('profile');
    Route::get('/logout',[SessionController::class, 'logout'])->name('logout');
    //admin Accessable route
    Route::group(['middleware'=>['loginuser:Admin']], function(){
        Route::get('/department/create',[DepartmentController::class,'create'])->name('department.create');
        Route::post('/department',[DepartmentController::class,'store'])->name('department.store');
        Route::view('/a_dashboard', 'pages.admin_dashboard.dashboard')->name('admin.dashboard');

        Route::get('/department/list',[DepartmentController::class,'index'])->name('list.department');
        Route::get('/student/list',[StudentController::class,'index'])->name('list.student');
        Route::get('/department/{id}/students',[DepartmentController::class,'student_index'])->name('department.student_index');
        Route::get('/student/trash',[StudentController::class,'trash'])->name('student.trash');
        Route::get('/student/{id}/delete',[StudentController::class, 'delete'])->name('student.delete');
        Route::get('/student/{id}/edit',[StudentController::class, 'edit'])->name('student.edit');

        Route::get('/student/{id}/edit/marks',[StudentController::class, 'edit_marks'])->name('student.edit.marks');
        Route::patch('/student/{id}/update/marks',[StudentController::class, 'update_marks'])->name('student.update.marks');

        Route::get('/student/{id}/restore',[StudentController::class, 'restore'])->name('student.restore');
        Route::get('/student/{id}/permanent/delete',[StudentController::class, 'forceDelete'])->name('student.permanent.delete');
        Route::put('/student/{id}/update',[StudentController::class, 'update'])->name('student.update');
        // admin profile
        Route::get('/admin_profile', [SessionController::class, 'admin_profile'])->name('admin.profile');
        Route::get('/admin_edit_profile', [UserController::class, 'admin_edit'])->name('admin_edit.profile');
        Route::put('/update_profile', [UserController::class, 'admin_update_profile'])->name('admin_update.profile');
        Route::put('/update_profile_photo', [UserController::class, 'admin_update_profile_photo'])->name('admin.update.profile.photo');
    });

    //student Accessable route
    Route::group(['middleware'=>['loginuser:student']], function(){
        Route::view('/dashboard', 'pages.student_dashboard.dashboard' )->name('dashboard');
     // student profile
     Route::get('/student_profile', [SessionController::class, 'student_profile'])->name('student.profile');
     Route::get('/student_edit_profile', [UserController::class, 'student_edit_profile'])->name('student.edit.profile');
     Route::put('/student_update_profile', [UserController::class, 'student_update_profile'])->name('student.update.profile');
    });
});




