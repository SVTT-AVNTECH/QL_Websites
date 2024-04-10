<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Models\User;
use App\Http\Controllers\Auth\RegisteredUserController;


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
