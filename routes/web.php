<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Models\User;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

Route::get('/',[UsersController::class,'welcome']);

Route::get('/single-product', function () {
    return view('single-product');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/about', function () {
    return view('about');
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

// Route::prefix('editor')->middleware('auth')->group(function () {
//     Route::get('/', [UsersController::class, 'index'])->name('index');
//     Route::get('/products/list', [UsersController::class, 'list'])->name('list');
//     Route::get('/products/order', [UsersController::class, 'order'])->name('order');

//     Route::get('/create_category', [UsersController::class, 'create_category'])->name('create_category');
//     Route::post('/insert_category', [UsersController::class, 'insert_category'])->name('insert_category');
//     Route::get('/create_product', [UsersController::class, 'create_product'])->name('create_product');
//     Route::post('/store', [UsersController::class, 'store'])->name('store');

//     Route::get('/edit/{id}', [UsersController::class, 'edit'])->name('edit');
//     Route::put('update/{id}', [UsersController::class, 'update'])->name('update');
    // Route::delete('/delete/{id}', [UsersController::class, 'delete'])->name('AvnWebsite.delete');
    // Route::get('/view/{id}', [UsersController::class, 'view'])->name('AvnWebsite.view');
    // Route::get('create_price/{id}', [UsersController::class, 'create_price'])->name('AvnWebsite.create_price');
    // Route::post('/insert_price/{id}', [UsersController::class, 'insert_price'])->name('AvnWebsite.insert_price');
// });



Route::get('redirect/{driver}', [AuthenticatedSessionController::class, 'redirectToProvider'])
    ->name('login.redirect');

Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/products/paginate', [ProductController::class, 'paginate'])->name('paginate');
// Route::get('/single-product/{id}', [ProductController::class, 'show'])->name('single-product');
Route::get('/product/{id}/detail', [ProductController::class, 'getProductDetail'])->name('product.detail');

// Route::middleware(['auth', 'verified'])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
//     Route::get('/some-route', [ProfileController::class, 'someAction'])->name('profile.someAction');
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//     Route::post('/insert_tele', [ProfileController::class, 'insert_tele'])->name('profile.insert_tele');
//     Route::post('/delete_tele', [ProfileController::class, 'delete_tele'])->name('profile.delete_tele');
// });

Route::middleware(['auth'])->group(function () {
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

Route::get('/search', [ProductController::class, 'search'])->name('products.search');
Route::get('/products/sort', [ProductController::class, 'sort'])->name('products.sort');

Route::prefix('editor')->middleware('auth')->group(function () {
    Route::get('/', [UsersController::class, 'index'])->name('index');
    Route::get('/products/list', [ProductController::class, 'list'])->name('list');
    Route::get('/products/order', [UsersController::class, 'order'])->name('order');
    Route::get('/category/list', [CategoryController::class, 'list'])->name('category/list');

    Route::get('category/create_category', [CategoryController::class, 'create_category'])->name('create_category');
    Route::post('category/insert_category', [CategoryController::class, 'insert_category'])->name('insert_category');
    Route::get('/create_product', [ProductController::class, 'create_product'])->name('create_product');
    Route::post('/store', [ProductController::class, 'store'])->name('store');

    Route::get('/edit_category/{id}', [CategoryController::class, 'edit_category'])->name('edit_category');
    Route::put('update_category/{id}', [CategoryController::class, 'update_category'])->name('update_category');
    Route::get('/edit/{id}', [UsersController::class, 'edit'])->name('edit');
    Route::put('update/{id}', [UsersController::class, 'update'])->name('update');
    Route::get('/edit_product/{id}', [ProductController::class, 'edit_product'])->name('edit_product');
    Route::put('update_product/{id}', [ProductController::class, 'update_product'])->name('update_product');

    Route::delete('/category/delete_category/{id}', [CategoryController::class, 'delete_category'])->name('delete_category');
    Route::delete('/delete/{id}', [UsersController::class, 'delete_user'])->name('delete');
    Route::delete('/products/delete/{id}', [ProductController::class, 'delete_product'])->name('products.delete');
});

Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
});

// Route::get('redirect/{driver}', [AuthenticatedSessionController::class, 'redirectToProvider'])
//     ->name('login.redirect');

// Route::get('callback/{driver}', [AuthenticatedSessionController::class, 'handleProviderCallback'])
//     ->name('login.callback');


// Route::get('/email/verify', function () {
//     return view('auth.verify-email');
// })->middleware('auth')->name('verification.notice');

// Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//     $request->fulfill();
//     return redirect('/home');
// })->middleware(['auth', 'signed'])->name('verification.verify');

// Route::post('/email/verification-notification', function (Request $request) {
//     $request->user()->sendEmailVerificationNotification();
//     return back()->with('message', 'Verification link sent!');
// })->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// Route::get('/register', [RegisteredUserController::class, 'create'])->middleware('guest')->name('register');

// Route::post('/register', [RegisteredUserController::class, 'store'])->middleware(['guest', 'verified'])->name('register.store');

require __DIR__ . '/auth.php';
