<?php

use App\Http\Controllers\Admin\SurveyController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Pages\PagesController;
use App\Http\Controllers\Admin\Auth\AdminLoginController;

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

Auth::routes();


Route::middleware('auth')->group(function () {
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::get('survey', [SurveyController::class, 'index'])->name('survey.index');

    Route::get('create', [SurveyController::class, 'create'])->name('survey.create');
    Route::post('create', [SurveyController::class, 'store']);

    Route::get('create', [SurveyController::class, 'create'])->name('survey.create');
    Route::post('create', [SurveyController::class, 'store']);

    Route::get('update/{id}', [SurveyController::class, 'edit'])->name('survey.update');
    Route::post('update/{id}', [SurveyController::class, 'update']);

    Route::get('active/{id}', [SurveyController::class, 'active'])->name('survey.active');
});

Route::group(['prefix' => ''], function () {
    Route::get('/{slug}', [PagesController::class, 'index'])->name('page.index');
    //Route::post('/{slug}', [PagesController::class, 'index'])->name('page.index');
});


Route::post('survey-action',  [SurveyController::class, 'surveyAction'])->name('survey.action');
