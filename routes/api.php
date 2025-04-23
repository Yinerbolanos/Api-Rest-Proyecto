<?php

use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\SuscripcionController;
use App\Http\Controllers\UsuariosController;
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


Route::post('/crear/usuario', [UsuariosController::class, 'CrearUsuario']);

Route::get('/obtener/usuarios', [UsuariosController::class, 'ObtenerUsuarios']);

Route::get('/obtener/usuario/{id_usuario}', [UsuariosController::class, 'ObtenerUsuarioPorID']);

Route::put('/actualizar/usuario/{id_usuario}', [UsuariosController::class, 'ActualizarUsuario']);

Route::delete('/eliminar/usuario/{id_usuario}', [UsuariosController::class, 'EliminarUsuario']);

Route::post('/crear/suscripcion/gratuita/{id_usuario}', [SuscripcionController::class, 'CrearSuscripcionGratuita']);

Route::post('/crear/suscripcion/premium/{id_usuario}', [SuscripcionController::class, 'CrearSuscripcionPremium']);

Route::get('/obtener/suscripciones', [SuscripcionController::class, 'ObtenerSuscripciones']);

Route::get('/obtener/suscripcion/{id_usuario}', [SuscripcionController::class, 'ObtenerSuscripcionPorID']);

Route::put('/actualizar/suscripcion/{id_usuario}', [SuscripcionController::class, 'ActualizarSuscripcion']);

Route::delete('/eliminar/suscripcion/{id_usuario}', [SuscripcionController::class, 'EliminarSuscripcionPorUsuario']);

Route::post('/crear/playlist', [PlaylistController::class, 'CrearPlaylist']);

Route::get('/obtener/playlist/{id_usuario}', [PlaylistController::class, 'ObtenerPlaylistsPorUsuario']);

Route::get('/obtener/playlists', [PlaylistController::class, 'ObtenerPlaylists']);
