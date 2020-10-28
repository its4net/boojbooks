<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Models\Book;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/books',function(){
    return Book::all();
});
    Route::get('books/{id}',function(Request $request){
        return Book::find($request->id);
    });
Route::resource('books', BookController::class)->only([
    'store', 'destroy'
]);
