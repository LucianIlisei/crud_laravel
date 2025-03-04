<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'horas_previstas', 'fecha_comienzo'];

    public function alumnos()
    {
        return $this->hasMany(Alumno::class, 'proyecto_id');
    }
}
