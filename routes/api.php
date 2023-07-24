<?php

use App\Http\Controllers\InteraccionController;
use App\Http\Controllers\PerroController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/perro')->group(function () use ($router) {
    $router->post('guardar', [PerroController::class, 'guardarPerro']);
    $router->get('listar',[PerroController::class, 'listarPerro']);
    $router->post('actualizar', [PerroController::class, 'actualizarPerro']);
    $router->post('eliminar', [PerroController::class, 'eliminarPerro']);

});

Route::prefix('/interaccion')->group(function () use ($router) {
    $router->post('guardar', [InteraccionController::class, 'guardarInteraccion']);
    $router->get('listar', [InteraccionController::class, 'listarInteraccion']);
});
