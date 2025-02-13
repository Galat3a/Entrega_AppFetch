<?php

namespace App\Http\Controllers;

use App\Models\Practica;
use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Http\Requests\StorePracticaRequest;
use App\Http\Requests\UpdatePracticaRequest;

class PracticasController extends Controller
{
    public function apiIndex()
    {
        $practicas = Practica::with('alumno')->paginate(8);
        return response()->json($practicas);
    }

    public function apiShow(Practica $practica)
    {
        return response()->json($practica->load('alumno'));
    }

    public function apiStore(StorePracticaRequest $request)
    {
        $practica = Practica::create($request->validated());
        return response()->json([
            'message' => 'Práctica creada exitosamente',
            'practica' => $practica->load('alumno')
        ], 201);
    }

    public function apiUpdate(UpdatePracticaRequest $request, Practica $practica)
    {
        $practica->update($request->validated());
        return response()->json([
            'message' => 'Práctica actualizada exitosamente',
            'practica' => $practica->load('alumno')
        ]);
    }

    public function apiDestroy(Practica $practica)
    {
        $practica->delete();
        return response()->json([
            'message' => 'Práctica eliminada exitosamente'
        ]);
    }
}