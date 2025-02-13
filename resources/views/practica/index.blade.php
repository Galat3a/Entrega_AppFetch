@extends('layouts.app')

@section('title', 'Lista de Prácticas')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Prácticas Registradas</h1>
        <a href="{{ route('practicas.create') }}" class="btn btn-success">Nueva Práctica</a>
    </div>

    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <form action="{{ route('practicas.index') }}" method="GET" class="row g-3">
                <div class="col-md-4">
                    <label for="fecha_inicio" class="form-label">Filtrar por fecha de inicio</label>
                    <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" value="{{ request('fecha_inicio') }}">
                </div>
                <div class="col-md-4">
                    <label for="alumno_id" class="form-label">Filtrar por alumno</label>
                    <select name="alumno_id" id="alumno_id" class="form-select">
                        <option value="">Todos los alumnos</option>
                        @foreach($alumnos as $alumno)
                            <option value="{{ $alumno->id }}" {{ request('alumno_id') == $alumno->id ? 'selected' : '' }}>
                                {{ $alumno->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label">&nbsp;</label>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Filtrar</button>
                        @if(request()->has('fecha_inicio') || request()->has('alumno_id'))
                            <a href="{{ route('practicas.index') }}" class="btn btn-secondary">Limpiar filtros</a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>

    @if($practicas->isEmpty())
        <div class="alert alert-info">
            @if($filtroAplicado)
                No se encontraron prácticas con los filtros seleccionados.
            @else
                No hay prácticas registradas aún.
            @endif
        </div>
    @else
        <div class="row">
            @foreach($practicas as $practica)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $practica->nombre }}</h5>
                            <p class="card-text">
                                <strong>Descripción:</strong> {{ $practica->descripcion }}<br>
                                <strong>Fecha de inicio:</strong> {{ $practica->fecha_inicio }}<br>
                                <strong>Fecha de fin:</strong> {{ $practica->fecha_fin }}<br>
                                <strong>Alumno:</strong> {{ $practica->alumno->nombre }}
                            </p>
                            <div class="btn-group">
                                <a href="{{ route('practicas.edit', $practica) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('practicas.destroy', $practica) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $practicas->withQueryString()->links() }}
        </div>
    @endif
@endsection