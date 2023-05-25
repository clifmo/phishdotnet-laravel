<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\NewsController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::controller(NewsController::class)->group(function () {
        Route::get('/news', 'index')->name('news.index');
        Route::get('/news/{id}', 'show')->name('news.show');
    });

    Route::controller(BlogController::class)->group(function () {
        Route::get('/blog', 'index')->name('blog.index');
        Route::get('/blog/{id}', 'show')->name('blog.show');
    });

    Route::get('/shows', function () {
        return view('dashboard');
    })->name('shows');

    Route::get('/community', function () {
        return view('dashboard');
    })->name('community');

    Route::get('/music', function () {
        return view('dashboard');
    })->name('music');

    Route::get('/phishdotnet', function () {
        return view('dashboard');
    })->name('phishdotnet');


    // Route::get('/register', function () {
    //     return view('register');
    // })->name('register');

    Route::get('/store', function () {
        return view('dashboard');
    })->name('store');
});
