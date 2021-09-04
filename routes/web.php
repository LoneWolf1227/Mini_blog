<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

Route::get('/posts/tag/{tag}', [PostController::class, 'allByTag'])->name('posts.tag');

Route::get('/post/add',[PostController::class, 'add'])->name('post.add');

Route::post('/post/add', [PostController::class, 'store'])->name('post.store');
