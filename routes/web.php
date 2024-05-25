<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Models\User;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\UsersController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/single-product', function () {
    return view('single-product');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/products', function () {
    return view('products');
});
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/some-route', [ProfileController::class, 'someAction'])->name('profile.someAction');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/insert_tele', [ProfileController::class, 'insert_tele'])->name('profile.insert_tele');
    Route::post('/delete_tele', [ProfileController::class, 'delete_tele'])->name('profile.delete_tele');
});

Route::prefix('editor')->middleware('auth')->group(function () {
    Route::get('/', [UsersController::class, 'index'])->name('index');
    Route::get('/products/list', [UsersController::class, 'list'])->name('list');
    Route::get('/products/order', [UsersController::class, 'order'])->name('order');

    Route::get('/create_category', [UsersController::class, 'create_category'])->name('create_category');
    Route::post('/insert_category', [UsersController::class, 'insert_category'])->name('insert_category');
    Route::get('/create_product', [UsersController::class, 'create_product'])->name('create_product');
    Route::post('/store', [UsersController::class, 'store'])->name('store');

    Route::get('/edit/{id}', [UsersController::class, 'edit'])->name('edit');
    Route::put('update/{id}', [UsersController::class, 'update'])->name('update');
    // Route::delete('/delete/{id}', [UsersController::class, 'delete'])->name('AvnWebsite.delete');
    // Route::get('/view/{id}', [UsersController::class, 'view'])->name('AvnWebsite.view');
    // Route::get('create_price/{id}', [UsersController::class, 'create_price'])->name('AvnWebsite.create_price');
    // Route::post('/insert_price/{id}', [UsersController::class, 'insert_price'])->name('AvnWebsite.insert_price');
});



Route::get('redirect/{driver}', [AuthenticatedSessionController::class, 'redirectToProvider'])
    ->name('login.redirect');

Route::get('callback/{driver}', [AuthenticatedSessionController::class, 'handleProviderCallback'])
    ->name('login.callback');

Route::get('callback/{driver}', [AuthenticatedSessionController::class, 'gitCallback'])
    ->name('login.callback');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/register', [RegisteredUserController::class, 'create'])->middleware('guest')->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])->middleware(['guest', 'verified'])->name('register.store');

require __DIR__ . '/auth.php';
