<?php

namespace App\Exports;

use App\Models\Alumno;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AlumnosPorRangoNotaExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $rango;

    public function __construct($rango)
    {
        $this->rango = $rango;
    }

    public function collection()
    {
        $rangos = [
            '1-3' => [1, 3],
            '4-6' => [4, 6],
            '7-10' => [7, 10],
        ];

        $rangoNotas = $rangos[$this->rango];

        return Alumno::whereBetween('nota_final', $rangoNotas)->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nombre',
            'Apellidos',
            'Nota Final',
        ];
    }
}
