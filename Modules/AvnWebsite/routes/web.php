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
    Route::get('edit/{id}', [AvnWebsiteController::class, 'edit'])->name('AvnWebsite.edit');
    Route::put('update/{id}', [AvnWebsiteController::class, 'update'])->name('AvnWebsite.update');
    Route::delete('/delete', [AvnWebsiteController::class, 'delete'])->name('AvnWebsite.delete');
});
