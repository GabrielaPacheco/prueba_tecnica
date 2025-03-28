@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles del Alumno</h1>

        <p><strong>Nombre:</strong> {{ $alumno->nombre }}</p>
        <p><strong>Apellidos:</strong> {{ $alumno->apellidos }}</p>
        <p><strong>N Carnet:</strong> {{ $alumno->n_carnet }}</p>
        <p><strong>Grado:</strong> {{ $alumno->grado->nombre }}</p>
        <p><strong>Nombre del Padre:</strong> {{ $alumno->nombre_padre }}</p>
        <p><strong>Nombre de la Madre:</strong> {{ $alumno->nombre_madre }}</p>
        <p><strong>Edad:</strong> {{ $alumno->edad }}</p>
        <p><strong>Nota Final:</strong> {{ $alumno->nota_final }}</p>

        <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">Volver</a>
    </div>
@endsection