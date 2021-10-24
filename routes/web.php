<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BestCommentController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostRateController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('post/{post:slug}', [PostController::class, 'show'])->name('post.show');
Route::get('posts/{tag:slug}', [TagController::class, 'index'])->name('posts.tag');
Route::post('search', [PostController::class, 'search'])->name('post.search');
Route::get('rate-post/{post}/{star}', [PostRateController::class, 'store'])->name('rate-post');
Route::post('newsletter', [NewsletterController::class, 'store'])->name('newsletter');

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'create'])->name('login.create');
    Route::post('login', [AuthController::class, 'store'])->name('login.store');
    Route::get('register', [RegisterController::class, 'create'])->name('register.create');
    Route::post('register', [RegisterController::class, 'store'])->name('register.store');
});

Route::middleware('auth')->group(function (){
    Route::get('profile', [UserController::class, 'index'])->name('profile.index');
    Route::post('logout', [AuthController::class, 'destroy'])->name('logout');

    Route::post('post/{post}/comment', [CommentController::class, 'store'])->name('comment.store');

    Route::post('best-comment/{comment}', [BestCommentController::class, 'store'])->name('best-comment');

    Route::get('bookmarks', [BookmarkController::class, 'index'])->name('bookmark.index');
    Route::post('bookmark/{post:slug}',[BookmarkController::class, 'store'])->name('bookmark.store');

    Route::middleware('can:admin')->group(function (){
        Route::get('settings/posts', [SettingsController::class, 'index'])->name('settings.index');
        Route::get('settings/post/create', [SettingsController::class, 'create'])->name('settings.post.create');
        Route::post('settings/post/', [SettingsController::class, 'store'])->name('settings.post.store');
        Route::get('settings/{post:slug}/edit', [SettingsController::class, 'edit'])->name('settings.post.edit');
        Route::patch('settings/{post:slug}', [SettingsController::class, 'update'])->name('settings.post.update');
        Route::delete('settings/{post:slug}', [SettingsController::class, 'destroy'])->name('settings.post.destroy');

        Route::post('settings/tag', [TagController::class, 'create'])->name('settings.tag.create');
    });
});
