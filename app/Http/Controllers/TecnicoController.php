<?php

namespace App\Http\Controllers;

use App\Models\Tecnico;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class TecnicoController extends Controller
{
    public function index(): JsonResponse
    {
        $tecnicos = Tecnico::with('equipos')->get();
        return response()->json($tecnicos);
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'nombre' => 'required|string',
            'apellidos' => 'required|string',
            'numero' => 'required|string'
        ]);

        $tecnico = Tecnico::create($request->all());
        return response()->json($tecnico, 201);
    }

    public function show(Tecnico $tecnico): JsonResponse
    {
        return response()->json($tecnico->load('equipos'));
    }

    public function update(Request $request, Tecnico $tecnico): JsonResponse
    {
        $request->validate([
            'nombre' => 'string',
            'apellidos' => 'string',
            'numero' => 'string'
        ]);

        $tecnico->update($request->all());
        return response()->json($tecnico);
    }

    public function destroy(Tecnico $tecnico): JsonResponse
    {
        $tecnico->delete();
        return response()->json(null, 204);
    }

    public function equipos(Tecnico $tecnico): JsonResponse
    {
        return response()->json($tecnico->equipos);
    }

    public function catalogo(): \Illuminate\Http\JsonResponse
    {
        $catalogo = Tecnico::select('id', 'nombre', 'apellidos')->get();
        return response()->json($catalogo);
    }
}