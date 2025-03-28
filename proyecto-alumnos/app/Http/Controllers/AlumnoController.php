<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Grado;
use Illuminate\Http\Request;
use App\Exports\AlumnosExport;
use App\Exports\AlumnosPorProfesorExport;
use App\Exports\AlumnosPorRangoNotaExport;
use App\Exports\FichaAlumnoExport;
use Maatwebsite\Excel\Facades\Excel;

class AlumnoController extends Controller
{
    public function index()
    {
        $alumnos = Alumno::with('grado')->get();
        return view('alumnos.index', compact('alumnos'));
    }

    public function create()
    {
        $grados = Grado::all();
        return view('alumnos.create', compact('grados'));
    }

    public function store(Request $request)
    {
        Alumno::create($request->all());
        return redirect()->route('alumnos.index');
    }

    public function show(Alumno $alumno)
    {
        return view('alumnos.show', compact('alumno'));
    }

    public function edit(Alumno $alumno)
    {
        $grados = Grado::all();
        return view('alumnos.edit', compact('alumno', 'grados'));
    }

    public function update(Request $request, Alumno $alumno)
    {
        $alumno->update($request->all());
        return redirect()->route('alumnos.index');
    }

    public function destroy(Alumno $alumno)
    {
        try {
            $alumno->delete();
            return response()->json(['success' => true, 'message' => 'Alumno eliminado correctamente']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error al eliminar el alumno', 'error' => $e->getMessage()], 500);
        }
    }
    public function export()
{
    return Excel::download(new AlumnosExport, 'alumnos.xlsx');
}

public function exportPorProfesor()
{
    return Excel::download(new AlumnosPorProfesorExport, 'alumnos_por_profesor.xlsx');
}

public function exportPorRangoNota(Request $request)
{
    $rango = $request->input('rango', '1-3');
    return Excel::download(new AlumnosPorRangoNotaExport($rango), 'alumnos_por_rango_nota.xlsx');
}

public function exportFichaAlumno($alumnoId)
{
    return Excel::download(new FichaAlumnoExport($alumnoId), 'ficha_alumno.xlsx');
}
}
