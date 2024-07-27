<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Adjuntos extends Model
{
    use HasFactory;

    protected $table = 'tb_adjuntos';
    protected $primaryKey = 'id_adjuntos';
    protected $fillable = [
        'id_adjuntos',
        'nombre_adjuntos',
        'ruta_adjuntos',
        'id_tarea'
    ];

    // relaciones
    public function tarea(): BelongsTo
    {
        return $this->belongsTo(Tarea::class, 'id_tarea', 'id_tarea');
    }
}
