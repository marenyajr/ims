<?php

use App\Models\Inventory;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InventoryController;

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

Route::get('/', [HomeController::class, 'index']);

Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::get('/register', [UserController::class, 'create'])->name('register')->middleware('guest');
Route::post('/users', [UserController::class, 'store'])->middleware('guest');
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');
Route::post('/authenticate', [UserController::class, 'authenticate']);

Route::get('/products', [InventoryController::class, 'index'])->middleware('auth');

Route::get('/products/create', [InventoryController::class, 'create'])->middleware('auth');
Route::get('products/{inventory}', [InventoryController::class, 'show']);
Route::post('/products', [InventoryController::class, 'store'])->middleware('auth');
Route::get('/shopping-cart/{IDs}', [InventoryController::class, 'shoppingCart']);
