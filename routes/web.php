<?php

use App\Models\product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;

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

Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/authenticate', [UserController::class, 'authenticate']);


Route::middleware(['auth'])->group(
    function () {

        Route::get('/', [HomeController::class, 'index']);


       
        Route::post('/logout', [UserController::class, 'logout']);
       

        Route::get('products/{product}', [ProductController::class, 'show']);
        Route::get('/shopping-cart/{IDs?}', [ProductController::class, 'shoppingCart']);
        Route::post('/shopping-cart/{IDs?}', [ProductController::class, 'checkout']);
        Route::get('/new-order', [HomeController::class, 'newOrder']);
        Route::get('/add-items', [HomeController::class, 'addItems']);

        Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function () {
            Route::get('/', [AdminController::class, 'index']);
            Route::get('/products', [ProductController::class, 'index']);
            Route::get('/products/create', [ProductController::class, 'create']);
            Route::put('/products/{product}', [ProductController::class, 'update']);
            Route::get('/products/edit/{product}', [ProductController::class, 'edit']);
            Route::post('/products', [ProductController::class, 'store']);
            Route::get('/users', [AdminController::class, 'users']);
            Route::get('/sales', [AdminController::class, 'sales']);
            Route::get('/sales/show/{id}', [AdminController::class, 'sale_products']);

            Route::get('/register', [UserController::class, 'create'])->name('register');
            Route::post('/users', [UserController::class, 'store']);

        });
    }
);