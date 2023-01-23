<?php

use App\Http\Controllers\Admin\IndexController as AdminIndexController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
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

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::group(['prefix' => ''], static function () {

    Route::get('/admin', [AdminIndexController::class, 'index'])
        ->name('admin');

    Route::get('/admin/home', [AdminIndexController::class, 'home'])
        ->name('admin.home');

    Route::get('/admin/categories', [AdminIndexController::class, 'categories'])
        ->name('admin.categories');

    Route::get('/admin/news', [AdminIndexController::class, 'news'])
        ->name('admin.news');

    Route::get('/admin/users', [AdminIndexController::class, 'users'])
        ->name('admin.users');

    Route::get('/admin/about', [AdminIndexController::class, 'about'])
        ->name('admin.about');
});

Route::view('about', 'about')
    ->name('about');


Route::group(['prefix' => ''], static function () {

    Route::get('/news', [NewsController::class, 'index'])
        ->name('news');

    Route::get('/news/one/{id}', [NewsController::class, 'show'])
        ->where(name: 'id', expression: '\d+')->name("newsId");
});

Route::group(['prefix' => ''], static function () {

    Route::get('/categories', [CategoryController::class, 'index'])
        ->name('category.index');

    Route::get('/category/{slug}', [CategoryController::class, 'show'])
        ->where(name: 'category_id', expression: '\d+')->name("category.show");
});
