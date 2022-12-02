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
Route::get('/ShowUser/{id?}', [UserController::class, 'ShowUser']);


Route::get('/add-feedback-type', [FeedbackController::class, 'addFeedbackType']);
Route::get('/deletefeedbacktype/{id?}/{token?}', [FeedbackController::class, 'DeleteFeedbackType']);
Route::get('/Showfeedback/{id?}', [FeedbackController::class, 'Showfeedback']);
Route::get('/DeleteFeedback/{id?}', [FeedbackController::class, 'DeleteFeedback']);
Route::post('/traloiphanhoi', [FeedbackController::class, 'UpdateFeedback']);



Route::post('/feedbacktypeadd', [FeedbackController::class, 'FeedbackTypeAdd']);
Route::get('/employee-list', [UserController::class, 'employeeList']);
Route::get('/reply-feedback', [FeedbackController::class, 'replyFeedback']);
Route::get('/ShowUser/{id?}', [UserController::class, 'ShowUser']);
Route::get('/information', [UserController::class, 'InfomationUserLogin']);
Route::get('/logout', [LoginController::class, 'Logout']);
Route::post('/addnewuser', [UserController::class, 'Addnewuser']);
Route::get('/AdminUpdatePass/{id?}/{token?}', [UserController::class, 'AdminUpdatePass']);
Route::post('/UpdatePass', [UserController::class, 'UpdatePass']);
Route::post('/UpdateUser', [UserController::class, 'UpdateUser']);
Route::get('/delete/{id?}/{token?}', [UserController::class, 'DeleteUser']);




