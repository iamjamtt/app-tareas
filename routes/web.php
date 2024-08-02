<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Home\Index as HomeIndex;
use App\Livewire\Tarea\Index as TareaIndex;
use App\Livewire\Tarea\Show as TareaShow;

Route::get('/', HomeIndex::class)->name('home.index');
Route::get('/tareas', TareaIndex::class)->name('tarea.index');
Route::get('/tareas/{id_tarea}', TareaShow::class)->name('tarea.show');

//
