<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agente extends Model
{
    use HasFactory;

    protected $table = 'usuarios';  // tabla agentes
    protected $primaryKey = 'idUsuario'; // clave primaria
    public $timestamps = false; 

    protected $fillable = [
        'nombre',
        'apellido',
        'direccion',
        'telefono',
        'correo',
        'rol_id',
    ];
}
?>