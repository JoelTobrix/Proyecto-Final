<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RespuestaConsulta extends Model
{
    protected $table = 'respuestas_consultas';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['consulta_id', 'usuario_id', 'mensaje'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
}

?>