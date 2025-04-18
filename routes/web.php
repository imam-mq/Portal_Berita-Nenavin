<?php

use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;


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

Route::get('/', [FrontController::class, 'index'])->name('front.index');

Route::get('/', [FrontController::class, 'index'])->name('home');

Route::get('/details/{article_news:slug}', [FrontController::class, 'details'])->name('front.details');

Route::get('/category/{category:slug}', [FrontController::class, 'category'])->name('front.category');

Route::get('/author/{author:slug}', [FrontController::class, 'author'])->name('front.author');

Route::get('/search', [FrontController::class, 'search'])->name('front.search');

Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('category.show');

Route::get('/shop', [FrontController::class, 'shop'])->name('front.shop');

Route::get('/seller', [FrontController::class, 'seller'])->name('front.seller');



