<?php

use App\Http\Controllers\Admin\IndexController as AdminIndexController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Middleware\AdminPanelMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/posts');

Route::group(['namespace' => 'App\Http\Controllers\Post'], function () {
    Route::get('/posts', 'IndexController')->name('posts.index');
    Route::get('/posts/create', 'CreateController')->name('post.create');
    Route::post('/posts/store', 'StoreController')->name('post.store');
    Route::get('/posts/{post}', 'ShowController')->name('post.show');
    Route::get('/posts/{post}/edit', 'EditController')->name('post.edit');
    Route::patch('/posts/{post}', 'UpdateController')->name('post.update');
    Route::delete('/posts/{post}', 'DestroyController')->name('post.destroy');
});

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin'], function () {
    Route::group(['namespace' => 'Post'], function () {
        Route::get('/post', 'IndexController')->name('admin.post.index')->middleware(AdminPanelMiddleware::class);
    });
});

Route::group(['namespace' => 'App\Http\Controllers\Login'], function () {
    Route::get('/login', 'IndexController')->name('login.index');
});

Route::group(['namespace' => 'App\Http\Controllers\Register'], function () {
    Route::get('/register', 'IndexController')->name('register.index');
});

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/categories/store', [CategoryController::class, 'store'])->name('category.store');
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::patch('/categories/{category}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');

Route::get('/tags', [TagController::class, 'index'])->name('tags.index');
Route::get('/tags/create', [TagController::class, 'create'])->name('tag.create');
Route::post('/tags/store', [TagController::class, 'store'])->name('tag.store');
Route::get('/tags/{tag}/edit', [TagController::class, 'edit'])->name('tag.edit');
Route::patch('/tags/{tag}', [TagController::class, 'update'])->name('tag.update');
Route::delete('/tags/{tag}', [TagController::class, 'destroy'])->name('tag.destroy');

Route::get('/admin', AdminIndexController::class)->name('admin.index');
// Route::get('/admin/post', AdminPostController::class)->name('admin.post.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
