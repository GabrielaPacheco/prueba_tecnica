<?php

namespace App\Exports;

use App\Models\Alumno;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AlumnosPorProfesorExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('alumnos')
            ->join('grados', 'alumnos.grado_id', '=', 'grados.id')
            ->join('profesors', 'grados.id', '=', 'profesors.grado_id')
            ->select('alumnos.id', 'alumnos.nombre', 'alumnos.apellidos', 'profesors.nombre as profesor_nombre', 'profesors.apellidos as profesor_apellidos')
            ->get();
    }
    public function headings(): array
    {
        return [
            'ID',
            'Nombre Alumno',
            'Apellidos Alumno',
            'Nombre Profesor',
            'Apellidos Profesor',
        ];
    }
}
