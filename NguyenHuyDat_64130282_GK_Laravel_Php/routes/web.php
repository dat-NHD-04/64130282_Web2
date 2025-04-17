<?php

use App\Http\Controllers\homeController\HomeController;
use App\Http\Controllers\controller\PageController;
use App\Http\Controllers\controller\PostController;
use Illuminate\Support\Facades\Route;

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

// Dashboard Route
Route::get('/', [HomeController::class, 'index'])->name('dashboard');

// Page Route
Route::get('/page/all', [PageController::class, 'index'])->name('pages.index');
Route::get('/page/new', [PageController::class, 'create'])->name('pages.create');
Route::post('/page', [PageController::class, 'store'])->name('pages.store');
Route::get('/page/view/{page}', [PageController::class, 'view'])->name('pages.view');
Route::get('/page/edit/{page}', [PageController::class, 'edit'])->name('pages.edit');
Route::put('/page/{page}', [PageController::class, 'update'])->name('pages.update');
Route::delete('/page/{page}', [PageController::class, 'destroy'])->name('pages.destroy');

// Post Route
Route::get('/post/all', [PostController::class, 'index'])->name('posts.index');
Route::get('/post/new', [PostController::class, 'create'])->name('posts.create');
Route::post('/post', [PostController::class, 'store'])->name('posts.store');
Route::get('/post/view/{post}', [PostController::class, 'view'])->name('posts.view');
Route::get('/post/edit/{post}', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/post/{post}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/post/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
