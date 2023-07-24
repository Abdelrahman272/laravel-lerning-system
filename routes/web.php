<?php

use App\Http\Controllers\Frontend\AskController;
use App\Http\Controllers\Frontend\ExamController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\SessionsController;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Exams;
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

Route::get('/', [HomeController::class, 'welcome'])->name('welcome');

Route::group(['middleware' => ['auth']], function () {

    // ================================= Before inter code ======================================================
    Route::controller(HomeController::class)->group(function () {
        Route::get('/code', 'showCodeEntryForm')->name('code');
        Route::post('/code', 'submitCode')->name('submitCode');
    });

    // ================================ end inter code ======================================================


    // ================================= After inter code ======================================================
    Route::group(['middleware' => ['code.check']], function () {

        Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');

        Route::get('sessions', [SessionsController::class, 'index'])->name('sessions.index');

        Route::controller(AskController::class)->group(function () {
            Route::get('/ask', 'index')->name('ask.index');
            Route::post('/ask', 'store')->name('ask.store');
            Route::get('/answer', 'showAnswer')->name('answer.showAnswer');
        });


        Route::get('show/exams', [ExamController::class, 'index'])->name('exams');
        Route::get('/exam/{id}/{page?}', [ExamController::class, 'showQuestion'])->name('show-question');
        Route::post('/submit-answers', [ExamController::class, 'submitAnswers'])->name('submit-answers');



    });


});



Route::middleware('auth')->group(function () {
    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::get('/profile/password', 'editPassword')->name('profile.edit.password');
        Route::patch('/profile/password', 'updatePassword')->name('profile.update.password');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });
});

require __DIR__.'/auth.php';
