<?php
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\productController;
use App\Http\Controllers\welcomeController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\checkoutController;
use App\Http\Controllers\orderController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [welcomeController::class, 'index'])->name('welcome.index');
Route::get('/welcome', [welcomeController::class, 'search'])->name('welcome.search');

Route::get('/product/{post:slug}', [productController::class, 'show'])->name('product.show');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/add-to-cart', [cartController::class, 'addProduct']);
Route::post('/delete-cart-item', [cartController::class, 'deleteCart']);
Route::post('/update-cart', [cartController::class, 'updateCart']);

Route::middleware(['auth'])->group(function () {

    Route::get('/cart', [cartController::class,'view'])->name('cart.view');

    Route::get('/checkout', [checkoutController::class,'index'])->name('checkout.index');
    Route::post('/checkout', [checkoutController::class,'store'])->name('checkout.store');
    
    Route::get('/my-order', [userController::class,'index'])->name('myOrder.index');
    Route::get('/view-order/{id}', [userController::class,'view'])->name('viewOrder.view');

});

Route::group(['middleware' => ['auth','isAdmin']], function () {

    Route::get('/product', [productController::class, 'index'])->name('product.index');
    Route::get('/product/create', [productController::class, 'create'])->name('product.create');
    Route::get('/product/{post}/edit', [productController::class, 'edit'])->name('product.edit');
    Route::put('/product/{post}', [productController::class, 'update'])->name('product.update');
    Route::delete('/product/{post}', [productController::class, 'destroy'])->name('product.destroy');
    Route::post('/product', [productController::class, 'store'])->name('product.store');

    Route::resource('/categories', categoryController::class);

    Route::get('/dashboard', [welcomeController::class, 'admin'])->name('dashboard.admin');

    Route::get('/order', [orderController::class, 'index'])->name('order.index');
    Route::get('/order/{order}', [orderController::class, 'view'])->name('order.view');
    Route::put('/order/{order}', [orderController::class, 'update'])->name('order.update');
    Route::get('/order-histroy', [orderController::class, 'history'])->name('order.history');

    Route::get('/user', [homeController::class, 'index'])->name('user.index');
    Route::get('/user/{user}', [homeController::class, 'view'])->name('user.view');

 });
