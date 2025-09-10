<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $table = 'consultas';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'cliente_id', 'agente_id', 'propiedad_id',
        'nombre', 'email', 'telefono', 'mensaje',
        'estado', 'fecha_creacion'
    ];

    public function respuestas()
    {
        return $this->hasMany(RespuestaConsulta::class, 'consulta_id');
    }

    public function propiedad()
    {
         return $this->belongsTo(Propiedad::class, 'propiedad_id', 'idPropiedad');
    }

    public function agente()
    {
       
        return $this->belongsTo(Usuario::class, 'agente_id', 'idUsuario');
    }
}
