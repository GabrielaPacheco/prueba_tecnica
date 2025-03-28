<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    use HasFactory;
    public function profesores()
    {
        return $this->hasMany(Profesor::class);
    }

    public function alumnos()
    {
        return $this->hasMany(Alumno::class);
    }
}
