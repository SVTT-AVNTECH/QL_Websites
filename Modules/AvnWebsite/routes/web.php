<?php

use Illuminate\Support\Facades\Route;
use Modules\AvnWebsite\App\Http\Controllers\AvnWebsiteController;

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

// Route::group([], function () {
//     Route::resource('avnwebsite', AvnWebsiteController::class)->names('avnwebsite');
// });

// Route::get('/g', function () {
//     return view('avnwebsite::index');
// });
Route::prefix('website')->middleware('auth')->group(function () {
    Route::get('/', [AvnWebsiteController::class, 'index'])->name('AvnWebsite.index');
    Route::get('/create', [AvnWebsiteController::class, 'create'])->name('AvnWebsite.create');
    Route::post('/insert', [AvnWebsiteController::class, 'insert'])->name('AvnWebsite.insert');
    Route::get('/edit/{id}', [AvnWebsiteController::class, 'edit'])->name('AvnWebsite.edit');
    Route::put('update/{id}', [AvnWebsiteController::class, 'update'])->name('AvnWebsite.update');
    Route::delete('/delete/{id}', [AvnWebsiteController::class, 'delete'])->name('AvnWebsite.delete');
    Route::get('/view/{id}', [AvnWebsiteController::class, 'view'])->name('AvnWebsite.view');
    Route::get('create_price/{id}', [AvnWebsiteController::class, 'create_price'])->name('AvnWebsite.create_price');
    Route::post('/insert_price/{id}', [AvnWebsiteController::class, 'insert_price'])->name('AvnWebsite.insert_price');
    // Mail::raw('Internal Server Error', function ($message) {
    //     $message->to('pxtruong02@gmail.com')->subject('Error Notification');
    // });
});
