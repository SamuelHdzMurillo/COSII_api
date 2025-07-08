<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NegocioController;
use App\Http\Controllers\TecnicoController;
use App\Http\Controllers\EquipoController;

// Rutas públicas de autenticación
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Rutas protegidas
//Route::middleware('auth:sanctum')->group(function () {
    // Rutas de autenticación
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);

    // Rutas de Negocio
    Route::apiResource('negocios', NegocioController::class);

    // Rutas de Técnico
    Route::apiResource('tecnicos', TecnicoController::class);
    Route::get('/tecnicos/{tecnico}/equipos', [TecnicoController::class, 'equipos']);

    // Rutas de Equipo
    Route::apiResource('equipos', EquipoController::class);

    // Rutas de actualizaciones de equipos
    Route::get('equipos/{equipo}/actualizaciones', [App\Http\Controllers\ActualizacionController::class, 'index']);
    Route::post('equipos/{equipo}/actualizaciones', [App\Http\Controllers\ActualizacionController::class, 'store']);
    Route::get('equipos/{equipo}/actualizaciones/{actualizacion}', [App\Http\Controllers\ActualizacionController::class, 'show']);

    // Catálogos simples
    Route::get('/catalogo-negocios', [NegocioController::class, 'catalogo']);
    Route::get('/catalogo-tecnicos', [TecnicoController::class, 'catalogo']);
//});
