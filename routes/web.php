<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Home\Index as HomeIndex;
use App\Livewire\Tarea\Index as TareaIndex;

Route::get('/', HomeIndex::class)->name('home.index');
Route::get('/tareas', TareaIndex::class)->name('tarea.index');

//
