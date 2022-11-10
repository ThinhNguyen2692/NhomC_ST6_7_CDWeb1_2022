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
Route::get('/dangnhapcuahang', [LoginController::class, 'Index']);
Route::post('/login', [LoginController::class, 'Login']);
Route::get('/feedback-list', [FeedbackController::class, 'feedbackList'])->name('feedback');
Route::get('/feedback-list-history', [FeedbackController::class, 'feedbackListhistory'])->name('feedbackListhistory');
Route::get('/user-password', [UserController::class, 'userPassword']);
Route::get('/add-user', [UserController::class, 'addUser']);
Route::get('/add-feedback-type', [FeedbackController::class, 'addFeedbackType']);
Route::get('/employee-list', [UserController::class, 'employeeList']);
Route::get('/reply-feedback', [FeedbackController::class, 'replyFeedback']);
Route::get('/Logout', [LoginController::class, 'Logout']);
Route::post('/addnewuser', [UserController::class, 'Addnewuser']);

