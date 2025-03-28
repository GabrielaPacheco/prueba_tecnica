<?php

namespace App\Exports;

use App\Models\Alumno;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FichaAlumnoExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $alumnoId;

    public function __construct($alumnoId)
    {
        $this->alumnoId = $alumnoId;
    }

    public function collection()
    {
        return Alumno::where('id', $this->alumnoId)->get();
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
        ];
    }
}
