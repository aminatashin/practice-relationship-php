<?php


use App\Models\User;
use App\Models\ProjectModel;
use App\Models\documentModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\projectController;
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
// PROJECTS
Route::get('/',[projectController::class,'index']);


Route::get('/form',[projectController::class,'form']);
 Route::post('/projectname',[projectController::class,'storeForm']);
// USERS

Route::post('/user/login',[userController::class,'userLogin']);
Route::get('/signup',[userController::class,'signup']);
Route::post('/register',[userController::class,'register']);
Route::post('/logout',[userController::class,'logout']);
// Route::get('/',[userController::class,'index']);


// DOCUMENTS


Route::post('/upload',[documentController::class,'store']);
Route::get('/project',[documentController::class,'indexProject']);
Route::get('/download/{title}',[documentController::class,'download']);
Route::delete('/download/{title}',[documentController::class,'destroy']);
Route::post('/date',[documentController::class,'date']);
Route::get('/login',[documentController::class,'login']);


Route::get('/example',function(){
  $project = ProjectModel::find(1);
  return $project->documents;

});




Route::get('/view/{id}',[documentController::class,'show']);


