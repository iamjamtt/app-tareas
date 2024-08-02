<?php

namespace App\Livewire\Tarea;

use App\Models\Tarea;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.app')]
#[Title('Show Tareas - SGT')]
class Show extends Component
{
    // Variable para almacenar la tarea
    public $tarea;

    // Método para cargar e inicializar la tarea
    public function mount($id_tarea): void
    {
        // Aqui buscamos la tarea por el ID
        $this->tarea = Tarea::find($id_tarea);

        // Validamos si la tarea existe
        if (!$this->tarea) {
            abort(404);
        }
    }

    public function render()
    {
        return view('livewire.tarea.show');
    }
}
