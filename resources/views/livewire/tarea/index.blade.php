<div>
    <div class="fs-1 mb-3">
        Modulo Tarea
    </div>
    <!-- Formulario de la tarea -->
    <div class="row g-3">
        <!-- Alerta de éxito -->
        @if ($mostrar_alerta)
            <div class="col-md-12">
                <div class="alert alert-success alert-dismissible mb-0" role="alert">
                    <div class="d-flex">
                        <div class="alert-title">
                            {{ $texto_alerta }}
                        </div>
                    </div>
                    <a
                        class="btn-close"
                        wire:click="alerta('', false)"
                    ></a>
                </div>
            </div>
        @endif
        <!-- Grupo de inputs de la tarea -->
        <div class="col-md-6">
            <div class="row g-3">
                <!-- Tarea -->
                <div class="col-md-12">
                    <label class="form-label required" for="tarea">
                        Tarea
                    </label>
                    <input
                        type="text"
                        class="form-control @if($errors->has('tarea')) is-invalid @elseif($tarea) is-valid @endif"
                        id="tarea"
                        wire:model.live="tarea"
                        placeholder="Ingrese la tarea"
                    />
                    @error('tarea')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <!-- Descripción -->
                <div class="col-md-12">
                    <label class="form-label required" for="descripcion">
                        Descripción
                    </label>
                    <textarea
                        class="form-control @if($errors->has('descripcion')) is-invalid @elseif($descripcion) is-valid @endif"
                        id="descripcion"
                        wire:model.live="descripcion"
                        rows="3"
                    >
                    </textarea>
                    @error('descripcion')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <!-- Grupo de inputs de la fecha -->
        <div class="col-md-6">
            <div class="row g-3">
                <!-- Fecha Inicio -->
                <div class="col-md-12">
                    <label class="form-label required" for="fecha_inicio">
                        Fecha Inicio
                    </label>
                    <input
                        type="date"
                        class="form-control @if($errors->has('fecha_inicio')) is-invalid @elseif($fecha_inicio) is-valid @endif"
                        id="fecha_inicio"
                        wire:model.live="fecha_inicio"
                    />
                    @error('fecha_inicio')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <!-- Fecha Fin -->
                <div class="col-md-12">
                    <label class="form-label required" for="fecha_fin">
                        Fecha Fin
                    </label>
                    <input
                        type="date"
                        class="form-control @if($errors->has('fecha_fin')) is-invalid @elseif($fecha_fin) is-valid @endif"
                        id="fecha_fin"
                        wire:model.live="fecha_fin"
                    />
                    @error('fecha_fin')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <!-- Botón de guardar -->
        <div class="col-md-12">
            <div class="d-flex justify-content-end">
                <button
                    type="button"
                    class="btn btn-indigo btn-pill"
                    wire:click="guardar_tarea"
                >
                    Guardar
                </button>
            </div>
        </div>
    </div>
    <hr>
    <!-- Tabla de tareas -->
    <div class="card">
        <div class="card-table table-responsive">
            <table class="table table-vcenter">
                <thead>
                    <tr>
                        <th class="w-1">Nro.</th>
                        <th>Tarea</th>
                        <th>Fechas</th>
                        <th>Estado</th>
                        <th>F. Creación</th>
                        <th class="w-1"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tareas as $item)
                        <tr>
                            <!-- Nro. -->
                            <td>
                                {{ $item->id_tarea }}
                            </td>
                            <!-- Tarea -->
                            <td>
                                {{ $item->nombre_tarea }}
                            </td>
                            <!-- Fechas -->
                            <td class="text-secondary">
                                {{ date('d/m/Y', strtotime($item->fecha_inicio_tarea)) }}
                                a
                                {{ date('d/m/Y', strtotime($item->fecha_fin_tarea)) }}
                            </td>
                            <!-- Estado -->
                            <td>
                                @if ($item->estado_tarea == 1)
                                    <span class="badge bg-green">
                                        Activo
                                    </span>
                                @else
                                    <span class="badge bg-red">
                                        Inactivo
                                    </span>
                                @endif
                            </td>
                            <!-- F. Creación -->
                            <td>
                                {{ date('h:i a d/m/Y', strtotime($item->created_at)) }}
                            </td>
                            <!-- Acciones -->
                            <td>
                                <div class="dropdown">
                                    <a href="#" class="btn dropdown-toggle" data-bs-toggle="dropdown">
                                        Acciones
                                    </a>
                                    <div class="dropdown-menu">
                                        <!-- Accion Ver -->
                                        <a
                                            class="dropdown-item"
                                            href="#"
                                        >
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-eye"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>
                                            Ver
                                        </a>
                                        <!-- Accion Editar -->
                                        <a
                                            class="dropdown-item"
                                            style="cursor: pointer;"
                                            wire:click="cargar_tarea({{ $item->id_tarea }})"
                                        >
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                                            Editar
                                        </a>
                                        <!-- Accion Eliminar -->
                                        <a
                                            class="dropdown-item"
                                            href="#"
                                        >
                                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                            Eliminar
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
