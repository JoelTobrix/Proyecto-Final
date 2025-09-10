<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $table = 'citas';
    protected $primaryKey = 'idCita';
    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'correo',
        'fecha',
        'hora',
        'estado',
        'propiedad_id'
    ];

    // Relación con Propiedad
    public function propiedad()
    {
        return $this->belongsTo(Propiedad::class, 'propiedad_id', 'idPropiedad');
    }
}
