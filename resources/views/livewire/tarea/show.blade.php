<div>
    <!-- Título -->
    <div class="fs-1 mb-3">
        Modulo Tarea Show
    </div>
    <!-- Card Tarea -->
    <div class="card">
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
</div>
