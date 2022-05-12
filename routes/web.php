<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AssignTaskContoller;


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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/task', TaskController::class);

Route::get('/togglestatus/{id}',[App\Http\Controllers\HomeController::class, 'toggleStatus'])->name('togglestatus');
Route::post('/comment', [CommentController::class, 'save'])->name('comment');
Route::get('/assign-task/{id}', [AssignTaskContoller::class, 'getForm'])->name('assign');
Route::post('/assign-task', [AssignTaskContoller::class, 'save'])->name('save-task');

Route::get('mark-as-read/{id}',[App\Http\Controllers\HomeController::class, 'markAsRead'])->name('read');










