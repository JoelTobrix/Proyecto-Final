<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'RollId';
    public $timestamps = false;

     protected $fillable = ['RoleNombre'];

    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'rol_id', 'RollId');
    }
}
