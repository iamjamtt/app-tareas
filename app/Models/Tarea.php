<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tarea extends Model
{
    use HasFactory;

    protected $table = 'tb_tarea';
    protected $primaryKey = 'id_tarea';
    protected $fillable = [
        'id_tarea',
        'nombre_tarea',
        'descripcion_tarea',
        'estado_tarea',
        'fecha_inicio_tarea',
        'fecha_fin_tarea',
        'id_usuario' // referencia a la tabla tb_usuario
    ];

    // relaciones
    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'id_usuario', 'id_usuario');
    }

    public function comentarios(): HasMany
    {
        return $this->hasMany(Comentario::class, 'id_tarea', 'id_tarea');
    }

    public function adjuntos(): HasMany
    {
        return $this->hasMany(Adjuntos::class, 'id_tarea', 'id_tarea');
    }
}
