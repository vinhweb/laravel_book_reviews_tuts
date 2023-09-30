<?php

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
Route::get('/', function(){
	return redirect()->route('books.index');
});
Route::resource('books', \App\Http\Controllers\BookController::class)
	->only(['index', 'show']);
Route::resource('books.reviews', \App\Http\Controllers\ReviewController::class)
	->scoped(['review' => 'book'])
	->only(['create', 'store']);