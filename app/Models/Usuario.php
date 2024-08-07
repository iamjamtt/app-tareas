<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usuario extends Authenticatable
{
    use HasFactory;

    protected $table = 'tb_usuario';
    protected $primaryKey = 'id_usuario';
    protected $fillable = [
        'id_usuario',
        'nombre_usuario',
        'email_usuario',
        'contrasenia_usuario',
        'foto_usuario',
        'estado_usuario'
    ];

    // sirve para que no guarde los campos created_at y updated_at
    // en la base de datos
    // public $timestamps = false;

    // relaciones
    public function tareas(): HasMany
    {
        return $this->hasMany(Tarea::class, 'id_usuario', 'id_usuario');
    }

    public function dosPrimerasLetrasNombres(): string
    {
        $iniciales = substr($this->nombre_usuario, 0, 2);
        $iniciales = strtoupper($iniciales);
        return $iniciales;
    }
}
