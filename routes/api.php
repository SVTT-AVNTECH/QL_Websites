<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
 });
 Route::post('login', 'API\PassportController@login');
 Route::post('register', 'API\PassportController@register');
 Route::group(['middleware' => 'auth:api'], function(){
 Route::post('get-details', 'API\PassportController@getDetails');
 });
// Route::middleware('auth:api')->get('/user', function(Request $request) {
//     return $request->user();
// });
