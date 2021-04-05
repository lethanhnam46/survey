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


Route::middleware('auth')->group(function(){
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::get('survey', [SurveyController::class, 'index'])->name('survey.index');
    Route::get ('active/{id}',[SurveyController::class,'active'])->name('survey.active');
});

Route::group(['prefix' => '/khaosat'], function() {
    Route::get('', [PagesController::class,'index']);
});




