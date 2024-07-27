<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comentario extends Model
{
    use HasFactory;

    protected $table = 'tb_comentario';
    protected $primaryKey = 'id_comentario';
    protected $fillable = [
        'id_comentario',
        'contenido_comentario',
        'id_tarea',
        'id_usuario'
    ];

    // relaciones
    public function tarea(): BelongsTo
    {
        return $this->belongsTo(Tarea::class, 'id_tarea', 'id_tarea');
    }

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, 'id_usuario', 'id_usuario');
    }
}
