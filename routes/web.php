<?php

use App\Models\Tarea;
use App\Models\Usuario;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // obtener todos los usuarios con sus tareas
    $usuarios = Usuario::query()
        ->with('tareas')
        ->get();

    return $usuarios;
});
