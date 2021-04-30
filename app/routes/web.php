<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloWorldController;
use App\Http\Controllers\ThrowProcessor;
use App\Http\Controllers\DiceGame;
use App\Http\Controllers\DiceProcessor;
use App\Http\Controllers\YatzyGame;
use App\Http\Controllers\YatzyProcessor;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\ScoresController;

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

Route::get('/', function () {
    return view('home');
});


// Added for mos example code
Route::get('/hello-world', function () {
    echo "Hello World";
});
Route::get('/hello-world-view', function () {
    return view('message', [
        'message' => "Hello World from within a view"
    ]);
});
Route::get('/hello', [HelloWorldController::class, 'hello']);
Route::get('/hello/{message}', [HelloWorldController::class, 'hello']);


Route::get('/session', function () {
    return view('session');
});

Route::get('/throw', [ThrowProcessor::class, '__invoke']);
Route::post('/throw', [ThrowProcessor::class, '__invoke']);


// Game 21
Route::get('/dice', [DiceGame::class, '__invoke']);
Route::post('/diceProcessor', [DiceProcessor::class, '__invoke']);


// Yatzy
Route::get('/yatzy', [YatzyGame::class, '__invoke']);
Route::post('/yatzyProcessor', [YatzyProcessor::class, '__invoke']);

// Books
Route::get('/books', [BooksController::class, 'showBooks']);

// Highscores
Route::get('/highscores', [ScoresController::class, 'yatzyScores']);
