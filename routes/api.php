<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\ReadingIntervalController;
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
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
});

//---------------------------- Auth Routes ---------------------------


//---------------------------- Books Routes ---------------------------
Route::group(['middleware' => ['jwt.verify']], function () {
    Route::get('/books', [BookController::class, 'index']);
    Route::put('/books', [BookController::class, 'store']);
    Route::delete('/books/{book}', [BookController::class, 'destroy']);
    Route::get('/books/{book}', [BookController::class, 'show']);
});

//---------------------------- Books Routes ---------------------------

//---------------------------- Reading Interval Routes ----------------
Route::group(['middleware' => ['jwt.verify']], function () {
    Route::put('/reading-interval', [ReadingIntervalController::class, 'store']);
    Route::post('/calculate-intervals', [ReadingIntervalController::class, 'calculate_intervals']);
});
//---------------------------- Reading Interval Routes ----------------
