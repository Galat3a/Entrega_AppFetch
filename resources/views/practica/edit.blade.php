@extends('layouts.app')

@section('title', 'Editar Práctica')

@section('content')
    <div class="card mb-4">
        <div class="card-body">
            <form id="editPracticaForm" action="{{ route('practicas.update', $practica) }}" method="POST" class="row g-3">
                @csrf
                @method('PUT')
                <div class="col-md-6">
                    <label for="nombre" class="form-label custom-label">Nombre</label>
                    <input type="text" name="nombre" id="editPracticaName" class="form-control" value="{{ old('nombre', $practica->nombre) }}" required>
                </div>
                <div class="col-md-6">
                    <label for="descripcion" class="form-label custom-label">Descripción</label>
                    <input type="text" name="descripcion" id="editPracticaDescription" class="form-control" value="{{ old('descripcion', $practica->descripcion) }}" required>
                </div>
                <div class="col-md-6">
                    <label for="fecha_inicio" class="form-label custom-label">Fecha de Inicio</label>
                    <input type="date" name="fecha_inicio" id="editPracticaStartDate" class="form-control" value="{{ old('fecha_inicio', $practica->fecha_inicio) }}" required>
                </div>
                <div class="col-md-6">
                    <label for="fecha_fin" class="form-label custom-label">Fecha de Fin</label>
                    <input type="date" name="fecha_fin" id="editPracticaEndDate" class="form-control" value="{{ old('fecha_fin', $practica->fecha_fin) }}" required>
                </div>
                <div class="col-md-6">
                    <label for="alumno_id" class="form-label custom-label">Alumno</label>
                    <select name="alumno_id" id="editPracticaAlumno" class="form-select" required>
                        @foreach($alumnos as $alumno)
                            <option value="{{ $alumno->id }}" {{ old('alumno_id', $practica->alumno_id) == $alumno->id ? 'selected' : '' }}>
                                {{ $alumno->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
@endsection