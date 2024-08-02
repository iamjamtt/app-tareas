<?php

namespace App\Livewire\Tarea;

use App\Models\Tarea;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('components.layouts.app')]
#[Title('Tareas - SGT')]
class Index extends Component
{
    // Aqui se almacena el ID de la tarea para las diferentes acciones
    public $id_tarea;

    // Variable para saber si se va a crear o actualizar una tarea
    public string $modo = 'crear';

    // Variables para el formulario
    #[Validate('required|min:6')]
    public string $tarea = '';
    #[Validate('required|min:6|max:255')]
    public string $descripcion = '';
    #[Validate('required|date')]
    public string $fecha_inicio = '';
    #[Validate('required|date|after:fecha_inicio')]
    public string $fecha_fin = '';

    // Variables para la alerta
    public string $texto_alerta = '';
    public bool $mostrar_alerta = false;

    // Método para mostrar/ocultar la alerta
    public function alerta(string $texto = '', bool $estado): void
    {
        $this->texto_alerta = $texto;
        $this->mostrar_alerta = $estado;
    }

    // Método para cargar los datos de la tarea
    public function cargar_tarea($id_tarea): void
    {
        // Aqui buscamos la tarea por el ID
        $tarea = Tarea::find($id_tarea);

        // Aqui rellenamos los campos del formulario
        $this->id_tarea = $tarea->id_tarea;
        $this->tarea = $tarea->nombre_tarea;
        $this->descripcion = $tarea->descripcion_tarea;
        $this->fecha_inicio = $tarea->fecha_inicio_tarea;
        $this->fecha_fin = $tarea->fecha_fin_tarea;

        // Cambiamos el modo a actualizar
        $this->modo = 'editar';
    }

    // Método para guardar la tarea
    public function guardar_tarea(): void
    {
        // Validar los campos
        $this->validate([
            'tarea' => 'required|min:6',
            'descripcion' => 'required|min:6|max:255',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after:fecha_inicio',
        ]);

        // Aquí iría la lógica para guardar la tarea
        if ($this->modo === 'crear') {
            $tarea = new Tarea(); // Crear una nueva instancia de la tarea
        } else {
            $tarea = Tarea::find($this->id_tarea); // Buscar la tarea por el ID
        }
        $tarea->nombre_tarea = $this->tarea;
        $tarea->descripcion_tarea = $this->descripcion;
        $tarea->estado_tarea = 1;
        $tarea->fecha_inicio_tarea = $this->fecha_inicio;
        $tarea->fecha_fin_tarea = $this->fecha_fin;
        $tarea->id_usuario = 1; // id del usuario logueado
        $tarea->save();

        // Limpiar los campos
        $this->reset([
            'id_tarea',
            'tarea',
            'descripcion',
            'fecha_inicio',
            'fecha_fin',
            'modo',
        ]);

        // Mostrar la alerta
        $this->alerta('Tarea guardada correctamente', true);
    }

    public function render()
    {
        // ID del usuario logueado
        $id_usuario = 1; // id del usuario logueado -> auth()->user()->id_usuario;

        // Obtener las tareas del usuario logueado
        $tareas = Tarea::query()
            ->where('id_usuario', $id_usuario)
            ->orderBy('id_tarea', 'desc')
            ->get();

        return view('livewire.tarea.index', [
            'tareas' => $tareas,
        ]);
    }
}
