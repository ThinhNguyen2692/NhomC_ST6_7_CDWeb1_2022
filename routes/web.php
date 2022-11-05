<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\LoginController;
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


Route::get('/', [CustomerController::class, 'index']);
Route::post('/guiphanhoiquanan', [CustomerController::class, 'SendFeedback']);
Route::get('/reloadCaptcha', [CustomerController::class, 'reloadCaptcha']);
round::get('/dangnhapcuahang',[LoginController::class, 'index'])->name("index");