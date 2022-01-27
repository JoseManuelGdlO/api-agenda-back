<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\clientsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TreatsController;

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

Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [RegisterController::class, 'login']);

Route::post('client', [clientsController::class, 'registerCient']);
Route::post('event', [clientsController::class, 'registerEvent']);

Route::get('getTreats', [TreatsController::class, 'getAll']);
     
Route::middleware('auth:api')->group( function () {
   
});