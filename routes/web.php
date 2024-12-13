<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\RatingController;

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

Route::get('/books', [BookController::class, 'index'])->name('books.index');

Route::get('/top-authors', [AuthorController::class, 'topAuthors'])->name('authors');


Route::get('/ratings', [RatingController::class, 'showRatings'])->name('ratings.index');
Route::post('/ratings/rate', [RatingController::class, 'rateBook'])->name('ratings.rate');