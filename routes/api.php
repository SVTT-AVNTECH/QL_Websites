<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Api\UserController;
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
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
//  });

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
Route::group(['middleware' => 'auth:api'], function () {
    Route::post('details', [UserController::class, 'details']);
});

// Route::middleware('auth:api')->get('/user', function(Request $request) {
//     return $request->user();
// });

// Route::middleware('auth:api')->get('/user', function (Request $request)  {
//     Route::get('/register', [AuthenticatedSessionController::class, 'register']);
//     Route::patch('callback/{driver}', [AuthenticatedSessionController::class, 'login']);
//     Route::delete('/logout', [AuthenticatedSessionController::class, 'logout']);
// });
