<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\documentController;

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

Route::get('/',[documentController::class,'index']);
Route::post('/upload',[documentController::class,'store']);
Route::get('/signup',[userController::class,'signup']);
Route::post('/register',[userController::class,'register']);