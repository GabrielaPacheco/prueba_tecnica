@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Nuevo Alumno</h1>

        <form action="{{ route('alumnos.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="apellidos">Apellidos:</label>
                <input type="text" name="apellidos" id="apellidos" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="n_carnet">N Carnet:</label>
                <input type="text" name="n_carnet" id="n_carnet" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="grado_id">Grado:</label>
                <select name="grado_id" id="grado_id" class="form-control" required>
                    @foreach($grados as $grado)
                        <option value="{{ $grado->id }}">{{ $grado->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="nombre_padre">Nombre del Padre:</label>
                <input type="text" name="nombre_padre" id="nombre_padre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nombre_madre">Nombre de la Madre:</label>
                <input type="text" name="nombre_madre" id="nombre_madre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="edad">Edad:</label>
                <input type="number" name="edad" id="edad" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nota_final">Nota Final:</label>
                <input type="number" name="nota_final" id="nota_final" class="form-control" step="0.01" required>
            </div>
            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection