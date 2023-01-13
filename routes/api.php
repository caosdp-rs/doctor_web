<?php

use App\Http\Controllers\AppointmentsController;
use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('/login',[UsersController::class,'login']);
Route::post('/register',[UsersController::class,'register']);
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
//this group mean return user's data if authenticated sucessfully
Route::middleware('auth:sanctum')->group(function(){
    Route::get('/user',[UsersController::class,'index']);
    Route::post('/book',[AppointmentsController::class,'store']);
    Route::get('/appointments',[AppointmentsController::class,'index']);

});
