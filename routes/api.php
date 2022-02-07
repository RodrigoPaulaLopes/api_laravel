<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('usuarios', [UsuarioController::class, 'index']);

// List single artigo
Route::get('usuario/{id}', [UsuarioController::class, 'show']);

// Create new artigo
Route::post('usuario', [UsuarioController::class, 'store']);

// Update artigo
Route::put('usuario/{id}', [UsuarioController::class, 'update']);

// Delete artigo
Route::delete('usuario/{id}', [UsuarioController::class,'destroy']);
