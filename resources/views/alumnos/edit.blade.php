@extends('layouts.app')

@section('title', 'Editar Alumno')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Editar Alumno: {{ $alumno->nombre }}</h2>
        </div>
        <div class="card-body">
            <form id="editAlumnoForm" action="{{ route('alumnos.update', $alumno) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label for="nombre" class="form-label custom-label">Nombre</label>
                    <input type="text" class="form-control @error('nombre') is-invalid @enderror" 
                           id="editAlumnoName" name="nombre" value="{{ old('nombre', $alumno->nombre) }}">
                    @error('nombre')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    Email
                    <label for="email" class="form-label custom-label"></label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                           id="editAlumnoEmail" name="email" value="{{ old('email', $alumno->email) }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="edad" class="form-label custom-label">Edad</label>
                    <input type="number" class="form-control @error('edad') is-invalid @enderror" 
                           id="editAlumnoAge" name="edad" value="{{ old('edad', $alumno->edad) }}">
                    @error('edad')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Actualizar Alumno</button>
                <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@endsection