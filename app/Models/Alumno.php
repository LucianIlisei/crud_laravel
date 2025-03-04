<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    /** @use HasFactory<\Database\Factories\AlumnoFactory> */
    use HasFactory;

    protected $table = 'alumnos';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = ["nombre", "email", "edad", "proyecto_id"]; // Agregamos "proyecto_id"

    public function idiomas()
    {
        return $this->hasMany(Idioma::class);
    }

    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class, 'proyecto_id');
    }
}
