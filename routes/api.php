<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\BasicController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('user/{id}',[BasicController::class,'user']);
Route::get('users',[BasicController::class,'users']);

Route::get('index',[BasicController::class,'index']);
Route::post('index',[BasicController::class,'store']);
Route::put('index/{id}',[BasicController::class,'edit']);
Route::delete('index/{id}',[BasicController::class,'delete']);
