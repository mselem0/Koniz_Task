<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});


//---------------------------- Auth Routes ---------------------------
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
});
//---------------------------- Auth Routes ---------------------------


//---------------------------- Books Routes ---------------------------
Route::get('books', [BookController::class, 'index']);
Route::put('books', [BookController::class, 'store']);
Route::delete('/books/{book}', [BookController::class, 'destroy']);
Route::get('/books/{book}', [BookController::class, 'show']);
//---------------------------- Books Routes ---------------------------

Route::put('reading-interval', [BookController::class, 'storeReadingInterval']);
