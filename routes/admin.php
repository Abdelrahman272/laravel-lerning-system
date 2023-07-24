<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CodeController;
use App\Http\Controllers\Admin\ExamController;
use App\Http\Controllers\Admin\LevelController;
use App\Http\Controllers\Admin\QusetionController;
use App\Http\Controllers\Admin\SessionController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\StudentAskController;
use Illuminate\Support\Facades\Route;

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

Route::group(['as' => 'admin.'], function () {

    Route::group(['middleware' => 'auth:admin'], function () {

        // ============================ Home =========================================//
        Route::get('home', [AuthController::class, 'home'])->name('home');

        // ============================ End Home =========================================//

        // ======================= Profile =====================================================//

        Route::controller(ProfileController::class)->group(function () {
            Route::get('profile', 'index')->name('profile.index');
            Route::post('profile/update', 'update')->name('profile.update');
            Route::post('profile/update/password', 'updatePassword')->name('profile.update.password');
        });

        // ======================= End Profile =====================================================//


        // ====================== Levels =====================================================//

        Route::resource('levels', LevelController::class)->except(['show']);

        // ====================== End Levels =====================================================//

        // ======================= Students =====================================================//

        Route::controller(StudentController::class)->group(function () {
            Route::get('students', 'index')->name('students.index');
            Route::get('students/list', 'getStudents')->name('students.list');
            Route::get('students/create', 'create')->name('students.create');
            Route::post('students/store', 'store')->name('students.store');
            Route::get('students/edit/{id}', 'edit')->name('students.edit');
            Route::post('students/update', 'update')->name('students.update');
            Route::get('students/delete/{id}', 'delete')->name('students.delete');
        });
        // ====================== End Students =====================================================//


        // ======================= Sessions =====================================================//

        Route::resource('sessions', SessionController::class)->except(['show']);

        // ====================== End Sessions =====================================================//


        // ======================= Codes =====================================================//

        Route::controller(CodeController::class)->group(function () {
            Route::get('codes', 'index')->name('codes.index');
            Route::post('codes/store', 'store')->name('codes.store');
            Route::delete('codes/destroy/{id}', 'destroy')->name('codes.destroy');
        });

        // ======================= End Codes =====================================================//


        // ======================= Exams =====================================================//

        Route::resource('exams', ExamController::class)->except(['update', 'edit']);


        // ======================= End Exams =====================================================//


        // ======================= Questions =====================================================//

        Route::resource('questions', QusetionController::class)->except(['show']);

        // ====================== End Questions =====================================================//

        // ====================== Start Students Asks =====================================================//

        Route::controller(StudentAskController::class)->group(function () {
            Route::get('student-asks', 'index')->name('student-asks.index');
            Route::get('answer/{id}', 'answer')->name('student-asks.answer');
            Route::post('student-asks/store/{id}', 'updateOrCreateAnswer')->name('student-asks.store');
            Route::delete('student-asks/destroy/{id}', 'destroy')->name('student-asks.destroy');
        });

        // ====================== End Students Asks =====================================================//

        // ======================= Logout =====================================================//

        Route::get('logout', [AuthController::class, 'logout'])->name('logout');

        // ===================== End Logout =====================================================//
    });



    // ====================== Login =====================================================//

    Route::group(['middleware' => 'guest:admin'], function () {
        Route::get('login', [AuthController::class, 'showLoginForm'])->name('login.form');
        Route::post('login', [AuthController::class, 'login'])->name('login.submit');
    });

});
