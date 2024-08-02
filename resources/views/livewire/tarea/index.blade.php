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
    <div class="table-responsive">
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
                        <td>
                            {{ $item->id_tarea }}
                        </td>
                        <td>
                            {{ $item->nombre_tarea }}
                        </td>
                        <td class="text-secondary">
                            {{ date('d/m/Y', strtotime($item->fecha_inicio_tarea)) }}
                            a
                            {{ date('d/m/Y', strtotime($item->fecha_fin_tarea)) }}
                        </td>
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
                        <td>
                            <a href="#">Editar</a>
                            <a href="#" class="text-danger">Eliminar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
