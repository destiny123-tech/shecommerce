<?php

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

/* Start Tests */

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/test', function () {
    return view('test');
});

Route::get('/element', function() {
    return view('layouts.elements');
})->name('element');

Route::get('/blog', function(){
    return view('blog');
})->name('blog');

/* End Tests */

Auth::routes();

Route::middleware(['auth' ,'is_admin'])->prefix('admin')->group(function() {
	Route::resource('pictures', App\Http\Controllers\ImagesController::class);
    Route::resource('videos', App\Http\Controllers\VideosController::class);
    Route::get('/panel', function () {
        return view('admin-panel');
    })->name('panel');
});


Route::get('/pictures', [App\Http\Controllers\ImagesController::class, 'index'])->name('picture');
Route::get('/videos', [App\Http\Controllers\VideosController::class, 'index'])->name('video');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


