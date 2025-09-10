<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'idUsuario';

    protected $fillable = [
        'nombre',
        'apellido',
        'direccion',
        'telefono',
        'correo',
        'contrasena',
        'rol_id'
    ];

    public $timestamps = false;

    // Relación con roles
    public function rol()
    {
        return $this->belongsTo(Rol::class, 'rol_id', 'idRol');
    }

    // Relación con notificaciones
    public function notificaciones()
    {
        return $this->hasMany(Notificacion::class, 'usuario_id', 'idUsuario');
    }
}
