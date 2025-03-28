<?php

namespace App\Exports;

use App\Models\Alumno;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class AlumnosExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Alumno::all();
    }
    public function headings(): array
    {
        return [
            'ID',
            'Nombre',
            'Apellidos',
            'N Carnet',
            'Grado ID',
            'Nombre del Padre',
            'Nombre de la Madre',
            'Edad',
            'Nota Final',
            'Creado el',
            'Actualizado el',
        ];
    }
}
