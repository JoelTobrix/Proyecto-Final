<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';

    protected $fillable = [
        'nombre', 'apellido', 'direccion', 'telefono', 'correo', 'contrasena', 'rol_id'
    ];

    public $timestamps = false; // si no usas created_at y updated_at

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'rol_id', 'RollId');
    }
}

