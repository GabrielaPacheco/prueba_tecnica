@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Listado de Alumnos</h1>
        <a href="{{ route('alumnos.create') }}" class="btn btn-primary mb-3">Crear Alumno</a>
        <table class="table" id="alumnosTable">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>N Carnet</th>
                    <th>Grado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($alumnos as $alumno)
                    <tr>
                        <td>{{ $alumno->nombre }}</td>
                        <td>{{ $alumno->apellidos }}</td>
                        <td>{{ $alumno->n_carnet }}</td>
                        <td>{{ $alumno->grado->nombre }}</td>
                        <td>
                            <a href="{{ route('alumnos.show', $alumno->id) }}" class="btn btn-info btn-sm">Ver</a>
                            <a href="{{ route('alumnos.edit', $alumno->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <button class="btn btn-danger btn-sm deleteAlumno" data-id="{{ $alumno->id }}">Borrar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td><a href="{{ route('alumnos.export.general') }}" class="btn btn-success mb-3">Descargar Reporte General</a></td>
                    <td><a href="{{ route('alumnos.export.profesor') }}" class="btn btn-success mb-3">Descargar Reporte por Profesor</a></td>
                    <td><form action="{{ route('alumnos.export.rango_nota') }}" method="GET" class="d-inline">
                        <select name="rango">
                            <option value="1-3">1-3</option>
                            <option value="4-6">4-6</option>
                            <option value="7-10">7-10</option>
                        </select>
                        <button type="submit" class="btn btn-success">Descargar Reporte por Rango de Nota</button>
                    </form>
                    <td><a href="{{ route('alumnos.export.ficha', ['alumnoId' => $alumno->id]) }}" class="btn btn-success mb-3">Descargar Ficha del Alumno</a></td>
                </tr>
            </tfoot>
        </table>
        



    </div>

    <script src="{{ asset('js/alumnos.js') }}"></script>
@endsection