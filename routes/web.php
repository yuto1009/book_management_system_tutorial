<?php

use Illuminate\Support\Facades\Route;
use App\Models\Book;
use Illuminate\Http\Request;


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

/**
 * 本の一覧表示 (books.blade.php)
 */
Route::get('/', function () {
    return view('books');
});

/**
 * 本を追加
 */
Route::post('/books', function (Request $request){
    // dd($request);

    // バリデーション
    $validator = Validator::make($request->all(), ['item_name' => 'required|max:255',]);

    // Eloquentモデル（登録処理）
    $books = new Book;
    $books->item_name = $request->item_name;
    $books->item_number = '1';
    $books->item_amount = '1000';
    $books->published = '2017-03-07 00:00:00';
    $books->save();
    return redirect('/');

});

/**
 * 本を削除
 */
Route::delete('/book/{book}', function (Book $book){
    //
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
