<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\SiteController;
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

Route::get('/', [SiteController::class, 'index'])
    ->name('index');
Route::get('/grazie', function () {
    return view('grazie');
})->name('grazie');

/*Middleware Sanifica i doppi tag*/
Route::middleware('XSS')->group(function () {
    Route::post('/post', [PostController::class, 'store'])->name('post');
});

