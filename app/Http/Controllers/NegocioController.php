<?php

namespace App\Http\Controllers;

use App\Models\Negocio;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class NegocioController extends Controller
{
    public function index(): JsonResponse
    {
        $negocios = Negocio::all();
        return response()->json($negocios);
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'nombreNegocio' => 'required|string',
            'numeroNegocio' => 'required|string',
            'correoNegocio' => 'required|email'
        ]);

        $negocio = Negocio::create($request->all());
        return response()->json($negocio, 201);
    }

    public function show(Negocio $negocio): JsonResponse
    {
        return response()->json($negocio);
    }

    public function update(Request $request, Negocio $negocio): JsonResponse
    {
        $request->validate([
            'nombreNegocio' => 'string',
            'numeroNegocio' => 'string',
            'correoNegocio' => 'email'
        ]);

        $negocio->update($request->all());
        return response()->json($negocio);
    }

    public function destroy(Negocio $negocio): JsonResponse
    {
        $negocio->delete();
        return response()->json(null, 204);
    }

    public function catalogo(): \Illuminate\Http\JsonResponse
    {
        $catalogo = Negocio::select('id', 'nombreNegocio')->get();
        return response()->json($catalogo);
    }
}