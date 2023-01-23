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

    Route::get('/admin/test1', [AdminIndexController::class, 'test1'])
        ->name('admin.test1');

    Route::get('/admin/test2', [AdminIndexController::class, 'test2'])
        ->name('admin.test2');
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
