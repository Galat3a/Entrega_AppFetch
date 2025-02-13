<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Http\Requests\StoreAlumnoRequest;
use App\Http\Requests\UpdateAlumnoRequest;

class AlumnoController extends Controller
{
    public function apiIndex()
    {
        $alumnos = Alumno::paginate(8);
        return response()->json($alumnos);
    }

    public function apiShow(Alumno $alumno)
    {
        return response()->json($alumno);
    }

    public function apiStore(StoreAlumnoRequest $request)
    {
        $alumno = Alumno::create($request->validated());
        return response()->json([
            'message' => 'Alumno creado exitosamente',
            'alumno' => $alumno
        ], 201);
    }

    public function apiUpdate(UpdateAlumnoRequest $request, Alumno $alumno)
    {
        $alumno->update($request->validated());
        return response()->json([
            'message' => 'Alumno actualizado exitosamente',
            'alumno' => $alumno
        ]);
    }

    public function apiDestroy(Alumno $alumno)
    {
        $alumno->delete();
        return response()->json([
            'message' => 'Alumno eliminado exitosamente'
        ]);
    }
}