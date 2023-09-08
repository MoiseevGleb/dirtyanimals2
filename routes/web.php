<?php

use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RouletteController;
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

Route::get('/', HomeController::class)->name('home');

Route::group([
    'controller' => 'App\Http\Controllers\AuthController',
    'middleware' => 'guest',
], function () {
    Route::get('/login', 'showLoginPage')->name('login.index');
    Route::get('/register', 'showRegisterPage')->name('register.index');
    Route::post('/login', 'login')->name('login');
    Route::post('/logout', 'logout')->withoutMiddleware('guest')->middleware('auth')->name('logout');
    Route::post('/register', 'register')->name('register');
});

Route::group([
    'controller' => 'App\Http\Controllers\MarketController',
    'prefix' => 'market',
    'as' => 'market.'
], function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{product}', 'show')->name('show');
});

Route::group([
    'namespace' => 'App\Http\Controllers\Admin',
    'middleware' => 'auth',
    'prefix' => 'admin',
    'as' => 'admin.'
], function () {
    Route::get('/', IndexController::class)->name('index');

    Route::group([
        'controller' => 'SliderController',
        'prefix' => 'slider',
        'as' => 'slider.'
    ], function () {
        Route::get('/create', 'create')->name('create');
        Route::get('/edit', 'edit')->name('edit');
        Route::post('/{slide}/delete', 'destroy')->name('destroy');
        Route::post('/{slide}/update', 'update')->name('update');
        Route::post('/', 'store')->name('store');
    });

    Route::group([
        'controller' => 'NewsController',
        'prefix' => 'news',
        'as' => 'news.'
    ], function () {

        Route::get('/', 'index')->name('index');

        Route::get('/create', 'create')->name('create');
        Route::post('/create', 'store')->name('store');

        Route::get('/{news}/edit', 'edit')->name('edit');
        Route::patch('/{news}/edit', 'update')->name('update');

        Route::delete('/{news}', 'destroy')->name('destroy');
    });
});

Route::group([
    'middleware' => 'auth',
    'controller' => 'App\Http\Controllers\UserPrivateController',
    'prefix' => 'user/private/',
    'as' => 'user.private.'
], function () {
    Route::get('/', 'index')->name('index');
    Route::get('/edit', 'edit')->name('edit');
    Route::patch('/', 'update')->name('update');
});

Route::group([
    'middleware' => 'auth',
    'controller' => 'App\Http\Controllers\NewsController',
    'prefix' => 'news',
    'as' => 'news.'
], function () {
    Route::get('/', 'index')->name('index');
    Route::get('/get-news', 'getNews')->name('get-news');
    Route::post('/comments', 'storeComment')->middleware('auth')->name('comment.store');
});

Route::get('/roulette', [RouletteController::class, 'index'])->name('roulette.index');
