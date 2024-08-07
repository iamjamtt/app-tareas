<?php

namespace App\Livewire\Tarea;

use App\Models\Comentario;
use App\Models\Tarea;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('components.layouts.app')]
#[Title('Show Tareas - SGT')]
class Show extends Component
{
    // Variable para almacenar la tarea
    public $tarea;

    // Variable para el formulario de comentarios
    #[Validate('required|max:255')]
    public string $comentario = '';

    // Variable para almacenar el id del comentario
    public $id_comentario;

    // Variable para almacenar la acción a realizar en el formulario | crear_comentario - editar_comentario
    public $accion = 'crear_comentario';

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

    // Método para crear el comentario
    public function crear_comentario(): void
    {
        // Validamos el formulario
        $this->validate();

        // Guardamos el comentario
        $comentario = new Comentario();
        $comentario->contenido_comentario = $this->comentario;
        $comentario->id_tarea = $this->tarea->id_tarea;
        $comentario->id_usuario = 1; // Aqui deberiamos obtener el ID del usuario logueado
        $comentario->save();

        // Limpiamos el campo
        $this->reset('comentario');
    }

    // Metodo para cargar el comentario a editar
    public function cargar_comentario($id_comentario): void
    {
        // Buscamos el comentario por el ID
        $comentario = Comentario::find($id_comentario);

        // Validamos si el comentario existe
        if ($comentario) {
            $this->id_comentario = $comentario->id_comentario;
            $this->comentario = $comentario->contenido_comentario;
            $this->accion = 'editar_comentario';
        }
    }

    // Método para editar el comentario
    public function editar_comentario(): void
    {
        // Validamos el formulario
        $this->validate();

        // Guardamos el comentario
        $comentario = Comentario::find($this->id_comentario);
        $comentario->contenido_comentario = $this->comentario;
        $comentario->save();

        // Limpiamos el campo
        $this->reset('comentario', 'id_comentario', 'accion');
    }

    public function render()
    {
        // Obtenemos los comentarios de la tarea
        $comentarios = Comentario::query()
            ->where('id_tarea', $this->tarea->id_tarea)
            ->with('usuario')
            ->orderBy('id_comentario', 'desc')
            ->get();

        return view('livewire.tarea.show', [
            'comentarios' => $comentarios
        ]);
    }
}
