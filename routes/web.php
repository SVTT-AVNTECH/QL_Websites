<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can registexcr web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('redirect/{driver}', [AuthenticatedSessionController::class, 'redirectToProvider'])
    ->name('login.redirect');
// ->where('driver', implode('|', config('auth.socialite.drivers')));

Route::get('callback/{driver}', [AuthenticatedSessionController::class, 'handleProviderCallback'])
    ->name('login.callback');

Route::get('callback/{driver}', [AuthenticatedSessionController::class, 'gitCallback'])
    ->name('login.callback');

require __DIR__ . '/auth.php';
