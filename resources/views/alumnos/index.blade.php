@extends('layouts.app')

@section('title', 'Lista de Alumnos')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Alumnos Registrados</h1>
        <a href="{{ route('alumnos.create') }}" class="btn btn-primary">Nuevo Alumno</a>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('alumnos.index') }}" method="GET" class="row g-3">
                <div class="col-md-4">
                    <label for="edad" class="form-label">Filtrar por edad</label>
                    <input type="number" name="edad" id="edad" class="form-control" value="{{ request('edad') }}">
                </div>
                <div class="col-md-4">
                    <label class="form-label">&nbsp;</label>
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Filtrar</button>
                        @if(request()->has('edad'))
                            <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">Limpiar filtro</a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>

    @if($alumnos->isEmpty())
        <div class="alert alert-info">
            @if($filtroAplicado)
                No se encontraron alumnos con la edad seleccionada.
            @else
                No hay alumnos registrados aún.
            @endif
        </div>
    @else
        <div class="row">
            @foreach($alumnos as $alumno)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $alumno->nombre }}</h5>
                            <p class="card-text">
                                <strong>Email:</strong> {{ $alumno->email }}<br>
                                <strong>Edad:</strong> {{ $alumno->edad }}<br>
                                <strong>Prácticas:</strong> {{ $alumno->practicas->count() }}
                            </p>
                            <div class="btn-group">
                                <a href="{{ route('alumnos.edit', $alumno) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('alumnos.destroy', $alumno) }}" method="POST" class="d-inline">
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
            {{ $alumnos->links() }}
        </div>
    @endif
@endsection