<div>
    <!-- Título -->
    <div class="fs-1 mb-3">
        Modulo Tarea Show
    </div>
    <!-- Card Tarea -->
    <div class="card mb-3">
        <div class="card-header">
            <h3 class="card-title">
                {{ $tarea->nombre_tarea }}
            </h3>
        </div>
        <div class="card-body">
            <div class="datagrid">
                <div class="datagrid-item">
                    <div class="datagrid-title">
                        Descripción
                    </div>
                    <div class="datagrid-content">
                        {{ $tarea->descripcion_tarea }}
                    </div>
                </div>
                <div class="datagrid-item">
                    <div class="datagrid-title">
                        Fecha de inicio
                    </div>
                    <div class="datagrid-content">
                        {{ date('d/m/Y', strtotime($tarea->fecha_inicio_tarea)) }}
                    </div>
                </div>
                <div class="datagrid-item">
                    <div class="datagrid-title">
                        Fecha de fin
                    </div>
                    <div class="datagrid-content">
                        {{ date('d/m/Y', strtotime($tarea->fecha_fin_tarea)) }}
                    </div>
                </div>
                <div class="datagrid-item">
                    <div class="datagrid-title">
                        Estado
                    </div>
                    <div class="datagrid-content">
                        @if ($tarea->estado_tarea == 1)
                            <span class="badge bg-green">
                                Activo
                            </span>
                        @else
                            <span class="badge bg-red">
                                Inactivo
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Comentarios -->
    <div class="card">
        <!-- Header -->
        <div class="card-header">
            <h3 class="card-title">
                Comentarios
            </h3>
        </div>
        <!-- Body -->
        <div class="card-body">
            <div class="row">
                <!-- Formulario -->
                <form
                    class="col-md-6"
                    wire:submit="{{ $accion }}"
                >
                    <input
                        type="text"
                        class="form-control @if($errors->has('comentario')) is-invalid @elseif($comentario) is-valid @endif"
                        wire:model.live="comentario"
                        placeholder="Escribe un comentario..."
                    />
                    @error('comentario')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <button
                        type="submit"
                        class="btn btn-pink mt-2 w-full"
                    >
                        Guardar comentario
                    </button>
                </form>
                <!-- Comentarios -->
                <div class="col-md-6">
                    <div class="card" style="height: 28rem">
                        <div class="card-body card-body-scrollable card-body-scrollable-shadow">
                            <div class="divide-y">
                                @forelse ($comentarios as $item)
                                    <div wire:key="{{ $item->id_comentario }}">
                                        <div class="row">
                                            <div class="col-auto">
                                                <span class="avatar">
                                                    {{ $item->usuario->dosPrimerasLetrasNombres() }}
                                                </span>
                                            </div>
                                            <div class="col">
                                                <div class="text-truncate fw-bold">
                                                    {{ $item->contenido_comentario }}
                                                </div>
                                                <div class="text-muted" wire:poll.1000ms>
                                                    {{ $item->usuario->nombre_usuario }}
                                                    -
                                                    {{ $item->created_at->diffForHumans() }}
                                                </div>
                                            </div>
                                            <div class="col-auto align-self-center">
                                                <button
                                                    type="button"
                                                    class="btn btn-icon"
                                                    wire:click="cargar_comentario({{ $item->id_comentario }})"
                                                >
                                                    <svg  xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor"  stroke-width="2"  stroke-linecap="round"
                                                        stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit-circle">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 15l8.385 -8.415a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3z" />
                                                        <path d="M16 5l3 3" />
                                                        <path d="M9 7.07a7 7 0 0 0 1 13.93a7 7 0 0 0 6.929 -6" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="text-center text-muted">
                                        No hay comentarios
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
