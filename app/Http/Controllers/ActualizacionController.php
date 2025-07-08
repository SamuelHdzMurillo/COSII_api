<?php

namespace App\Http\Controllers;

use App\Models\Actualizacion;
use App\Models\Equipo;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ActualizacionController extends Controller
{
    // Listar todas las actualizaciones de un equipo
    public function index($equipo_id): JsonResponse
    {
        $actualizaciones = Actualizacion::where('equipo_id', $equipo_id)->get();
        return response()->json($actualizaciones);
    }

    // Crear una nueva actualización para un equipo
    public function store(Request $request, $equipo_id): JsonResponse
    {
        $request->validate([
            'titulo' => 'required|string',
            'descripcion' => 'required|string',
        ]);
        $actualizacion = Actualizacion::create([
            'equipo_id' => $equipo_id,
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
        ]);
        return response()->json($actualizacion, 201);
    }

    // Mostrar una actualización específica
    public function show($equipo_id, $id): JsonResponse
    {
        $actualizacion = Actualizacion::where('equipo_id', $equipo_id)->findOrFail($id);
        return response()->json($actualizacion);
    }
} 