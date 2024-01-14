<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AgremiadoController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('auth', [AuthController::class, 'login']);
Route::post('registerUser', [AuthController::class, 'register']);

Route::get('agremiados', [AgremiadoController::class, 'getAgremiados']);
Route::post('nuevoAgremiado', [AgremiadoController::class, 'postAgremiado']);