<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cita;

class Propiedad extends Model
{
    use HasFactory;

    protected $table = 'propiedades';
    protected $primaryKey = 'idPropiedad';
    public $timestamps = false;

    protected $fillable = [
        'titulo',
        'ubicacion',
        'precio',
        'descripcion',
        'imagen',
        'estado',
        'disponible'
    ];
    // Relación con Cita
    public function citas()
    {
        return $this->hasMany(Cita::class, 'propiedad_id', 'idPropiedad');
    }
}
