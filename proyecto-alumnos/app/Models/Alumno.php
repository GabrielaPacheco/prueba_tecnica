<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;
    protected $table = 'alumnos'; 
    protected $fillable = [
        'nombre',
        'apellidos',
        'n_carnet',
        'grado_id',
        'nombre_padre',
        'nombre_madre',
        'edad',
        'nota_final',
       
    ];
    public function grado()
    {
        return $this->belongsTo(Grado::class);
    }
}
