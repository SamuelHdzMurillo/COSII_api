<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class EquipoController extends Controller
{
    public function index(): JsonResponse
    {
        $equipos = Equipo::with('tecnico')->get();
        return response()->json($equipos);
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'tecnico_id' => 'required|exists:tecnicos,id',
            'estadoEquipo' => 'required|string',
            'tipoDeEquipo' => 'required|string',
            'marcaEquipo' => 'required|string',
            'danioEquipo' => 'required|string',
            'accesoriosEquipo' => 'required|string',
            'imagenesEquipo' => 'required|string',
            'modeloEquipo' => 'required|string',
            'observacionesEquipo' => 'required|string',
            'numeroDeSerieEquipo' => 'required|string',
            'fechaLlegada' => 'required|date',
            'fechaSalida' => 'nullable|date|after:fechaLlegada'
        ]);

        $equipo = Equipo::create($request->all());
        return response()->json($equipo, 201);
    }

    public function show(Equipo $equipo): JsonResponse
    {
        return response()->json($equipo->load('tecnico'));
    }

    public function update(Request $request, Equipo $equipo): JsonResponse
    {
        $request->validate([
            'tecnico_id' => 'exists:tecnicos,id',
            'estadoEquipo' => 'string',
            'tipoDeEquipo' => 'string',
            'marcaEquipo' => 'string',
            'danioEquipo' => 'string',
            'accesoriosEquipo' => 'string',
            'imagenesEquipo' => 'string',
            'modeloEquipo' => 'string',
            'observacionesEquipo' => 'string',
            'numeroDeSerieEquipo' => 'string',
            'fechaLlegada' => 'date',
            'fechaSalida' => 'nullable|date|after:fechaLlegada'
        ]);

        $equipo->update($request->all());
        return response()->json($equipo);
    }

    public function destroy(Equipo $equipo): JsonResponse
    {
        $equipo->delete();
        return response()->json(null, 204);
    }
}