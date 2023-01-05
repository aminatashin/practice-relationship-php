<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\documentController;
use App\Models\documentModel;

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
Route::get('/',[userController::class,'index']);
Route::post('/upload',[documentController::class,'store']);
Route::get('/download/{title}',[documentController::class,'download']);
Route::delete('/download/{title}',[documentController::class,'destroy']);

Route::get('/view/{id}',[documentController::class,'show']);
Route::post('/date',[documentController::class,'date']);


Route::get('/login',[documentController::class,'login']);
Route::post('/user/login',[userController::class,'userLogin']);
Route::get('/signup',[userController::class,'signup']);
Route::post('/register',[userController::class,'register']);
Route::post('/logout',[userController::class,'logout']);

