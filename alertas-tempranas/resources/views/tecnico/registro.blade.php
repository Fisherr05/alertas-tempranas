@extends('adminlte::page')

@section('title', 'Alertas Tempranas')

@section('content_header')
<h1></h1>
@stop

@section('content')
<div class="card">

    <div class="card-body">
        @csrf
        <!--Mensaje Creado -->
        @if (session('tecnicoGuardado'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('tecnicoGuardado') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <!--Mensaje Modificado-->
        @if (session('tecnicoModificado'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('tecnicoModificado') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <!--Mensaje Eliminado -->
        @if (session('tecnicoEliminado'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('tecnicoEliminado') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="card">
            <div class="justify-content-center">
                <div class="card-header align-items-center">
                    <div class="row align-items-center">
                        <div class="col-md-10">
                        @can('1')
                            <h1>Monitoreos a Registrar</h1>
                        @endcan
                         @can('2')
                            <h1>Sus Monitoreos</h1>
                        @endcan
                        @can('3')
                            <h1>Revisión Monitoreos </h1>
                        @endcan
                        </div>
                        <div class="container col-md-2">
                            <div class="text-center justify-content-center">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table id="table"
                        class="table table-striped table-hover table-bordered table-sm bg-white shadow-lg display nowrap"
                        cellspacing="0" width="100%">
                        @php
                            $count = 1;
                        @endphp
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>MONITOREO</th>
                                <th>ESTUDIO</th>
                                @can('1')
                                    <th>TECNICO</th>
                                @endcan
                                @can('3')
                                    <th>TECNICO</th>
                                @endcan
                                <th>FINCA</th>
                                <th>CANTON</th>
                                <th>PARROQUIA</th>
                                <th>FECHA PLANIFICADA</th>
                                <th>OBSERVACIONES</th>
                                <th>EJECUTADO</th>
                                @can('1')
                                    <th>ACCIÓN</th>
                                @endcan
                                @can('2')
                                    <th>ACCIÓN</th>
                                @endcan

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pendientes as $monitoreo)
                                @if (auth()->user()->fullacces == 'yes')
                                    <tr>
                                        <td>{{ $count++ }}</td>
                                        <td>{{ $monitoreo->codigoMonitoreo }}</td>
                                        <td>{{ $monitoreo->codigo }} - {{ $monitoreo->nombreEstudio }}</td>
                                        <td>{{ $monitoreo->name }}</td>
                                        <td>{{ $monitoreo->nombreFinca }}</td>
                                        <td>{{ $monitoreo->cantonNombre }}</td>
                                        <td>{{ $monitoreo->parroquiaNombre }}</td>
                                        <td>{{ $monitoreo->fechaPlanificada }}</td>
                                        <td>{{ $monitoreo->observaciones }}</td>
                                        <td>
                                        @if($monitoreo->estado == 'si')
                                             <i class="fas fa-user-check bg-success"></i> {{ $monitoreo->estado }}
                                            @else
                                             <i class="fas fa-exclamation-triangle bg-danger"></i> {{ $monitoreo->estado }}</td>
                                        @endif
                                        </td>
                                        <td>
                                            @if($monitoreo->estado == 'no')
                                            <a href="/dato/{{ $monitoreo->id }}" class="btn btn-primary"
                                                onClick="this.disabled='disabled'">Ir <i
                                                    class="far fa-arrow-alt-circle-right">
                                                </i> </a>
                                            @else
                                            Completo <i class="far fa-list-alt"></i>
                                        @endif
                                        </td>
                                    </tr>
                                @elseif(auth()->user()->id == $monitoreo->idTecnico &&
                                    auth()->user()->fullacces == 'no')
                                    <tr>
                                        <td>{{ $count++ }}</td>
                                        <td>{{ $monitoreo->codigoMonitoreo }}</td>
                                        <td>{{ $monitoreo->codigo }} - {{ $monitoreo->nombreEstudio }}</td>
                                        <td>{{ $monitoreo->nombreFinca }}</td>
                                        <td>{{ $monitoreo->cantonNombre }}</td>
                                        <td>{{ $monitoreo->parroquiaNombre }}</td>
                                        <td>{{ $monitoreo->fechaPlanificada }}</td>
                                        <td>{{ $monitoreo->observaciones }}</td>
                                        <td>
                                         @if($monitoreo->estado == 'si')
                                            <i class="fas fa-user-check bg-success"></i> {{$monitoreo->estado}}
                                            @else
                                            <i class="fas fa-exclamation-triangle bg-danger"></i> {{ $monitoreo->estado }}</td>
                                        @endif
                                        <td>
                                        @if($monitoreo->estado == 'no')
                                            <a href="/dato/{{ $monitoreo->id }}" class="btn btn-primary"
                                                onClick="this.disabled='disabled'">Ir <i
                                                    class="far fa-arrow-alt-circle-right">
                                                </i> </a>
                                            @else
                                            Completo <i class="far fa-list-alt"></i>
                                        @endif
                                        </td>
                                    </tr>
                                @endif
                                 @if(auth()->user()->fullacces == 'revisor')
                                        <tr>
                                            <td>{{ $count++ }}</td>
                                            <td>{{ $monitoreo->codigoMonitoreo }}</td>
                                            <td>{{ $monitoreo->codigo }} - {{ $monitoreo->nombreEstudio }}</td>
                                            <td>{{ $monitoreo->name }}</td>
                                            <td>{{ $monitoreo->nombreFinca }}</td>
                                            <td>{{ $monitoreo->cantonNombre }}</td>
                                            <td>{{ $monitoreo->parroquiaNombre }}</td>
                                            <td>{{ $monitoreo->fechaPlanificada }}</td>
                                            <td>{{ $monitoreo->observaciones }}</td>
                                            <td>
                                            @if($monitoreo->estado == 'si')
                                                <i class="fas fa-user-check bg-success"></i> {{ $monitoreo->estado }}
                                                @else
                                                <i class="fas fa-exclamation-triangle bg-danger"></i> {{ $monitoreo->estado }}</td>
                                            @endif
                                            </td>
                                        </tr>
                                    @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.dataTables.min.css" rel="stylesheet"
    type="text/css">
@stop

@section('js')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"
crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"
crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8"
src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        $("#table").DataTable({
            "language": {
                "processing": "Procesando...",
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "emptyTable": "Ningún dato disponible en esta tabla",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "search": "Buscar:",
                "infoThousands": ",",
                "loadingRecords": "Cargando...",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
                "aria": {
                    "sortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                "buttons": {
                    "copy": "Copiar",
                    "colvis": "Visibilidad",
                    "collection": "Colección",
                    "colvisRestore": "Restaurar visibilidad",
                    "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
                    "copySuccess": {
                        "1": "Copiada 1 fila al portapapeles",
                        "_": "Copiadas %d fila al portapapeles"
                    },
                    "copyTitle": "Copiar al portapapeles",
                    "csv": "CSV",
                    "excel": "Excel",
                    "pageLength": {
                        "-1": "Mostrar todas las filas",
                        "1": "Mostrar 1 fila",
                        "_": "Mostrar %d filas"
                    },
                    "pdf": "PDF",
                    "print": "Imprimir"
                },
                "autoFill": {
                    "cancel": "Cancelar",
                    "fill": "Rellene todas las celdas con <i>%d<\/i>",
                    "fillHorizontal": "Rellenar celdas horizontalmente",
                    "fillVertical": "Rellenar celdas verticalmentemente"
                },
                "decimal": ",",
                "searchBuilder": {
                    "add": "Añadir condición",
                    "button": {
                        "0": "Constructor de búsqueda",
                        "_": "Constructor de búsqueda (%d)"
                    },
                    "clearAll": "Borrar todo",
                    "condition": "Condición",
                    "conditions": {
                        "date": {
                            "after": "Despues",
                            "before": "Antes",
                            "between": "Entre",
                            "empty": "Vacío",
                            "equals": "Igual a",
                            "notBetween": "No entre",
                            "notEmpty": "No Vacio",
                            "not": "Diferente de"
                        },
                        "number": {
                            "between": "Entre",
                            "empty": "Vacio",
                            "equals": "Igual a",
                            "gt": "Mayor a",
                            "gte": "Mayor o igual a",
                            "lt": "Menor que",
                            "lte": "Menor o igual que",
                            "notBetween": "No entre",
                            "notEmpty": "No vacío",
                            "not": "Diferente de"
                        },
                        "string": {
                            "contains": "Contiene",
                            "empty": "Vacío",
                            "endsWith": "Termina en",
                            "equals": "Igual a",
                            "notEmpty": "No Vacio",
                            "startsWith": "Empieza con",
                            "not": "Diferente de"
                        },
                        "array": {
                            "not": "Diferente de",
                            "equals": "Igual",
                            "empty": "Vacío",
                            "contains": "Contiene",
                            "notEmpty": "No Vacío",
                            "without": "Sin"
                        }
                    },
                    "data": "Data",
                    "deleteTitle": "Eliminar regla de filtrado",
                    "leftTitle": "Criterios anulados",
                    "logicAnd": "Y",
                    "logicOr": "O",
                    "rightTitle": "Criterios de sangría",
                    "title": {
                        "0": "Constructor de búsqueda",
                        "_": "Constructor de búsqueda (%d)"
                    },
                    "value": "Valor"
                },
                "searchPanes": {
                    "clearMessage": "Borrar todo",
                    "collapse": {
                        "0": "Paneles de búsqueda",
                        "_": "Paneles de búsqueda (%d)"
                    },
                    "count": "{total}",
                    "countFiltered": "{shown} ({total})",
                    "emptyPanes": "Sin paneles de búsqueda",
                    "loadMessage": "Cargando paneles de búsqueda",
                    "title": "Filtros Activos - %d"
                },
                "select": {
                    "1": "%d fila seleccionada",
                    "_": "%d filas seleccionadas",
                    "cells": {
                        "1": "1 celda seleccionada",
                        "_": "$d celdas seleccionadas"
                    },
                    "columns": {
                        "1": "1 columna seleccionada",
                        "_": "%d columnas seleccionadas"
                    }
                },
                "thousands": ".",
                "datetime": {
                    "previous": "Anterior",
                    "next": "Proximo",
                    "hours": "Horas",
                    "minutes": "Minutos",
                    "seconds": "Segundos",
                    "unknown": "-",
                    "amPm": [
                        "am",
                        "pm"
                    ]
                },
                "editor": {
                    "close": "Cerrar",
                    "create": {
                        "button": "Nuevo",
                        "title": "Crear Nuevo Registro",
                        "submit": "Crear"
                    },
                    "edit": {
                        "button": "Editar",
                        "title": "Editar Registro",
                        "submit": "Actualizar"
                    },
                    "remove": {
                        "button": "Eliminar",
                        "title": "Eliminar Registro",
                        "submit": "Eliminar",
                        "confirm": {
                            "_": "¿Está seguro que desea eliminar %d filas?",
                            "1": "¿Está seguro que desea eliminar 1 fila?"
                        }
                    },
                    "error": {
                        "system": "Ha ocurrido un error en el sistema (<a target=\"\\\" rel=\"\\ nofollow\" href=\"\\\">Más información&lt;\\\/a&gt;).<\/a>"
                    },
                    "multi": {
                        "title": "Múltiples Valores",
                        "info": "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, hacer click o tap aquí, de lo contrario conservarán sus valores individuales.",
                        "restore": "Deshacer Cambios",
                        "noMulti": "Este registro puede ser editado individualmente, pero no como parte de un grupo."
                    }
                },
                "info": "Mostrando de _START_ a _END_ de _TOTAL_ entradas"
            },
            "lengthMenu": [
                [5, 10, 50, 100, -1],
                [5, 10, 50, 100, "Todos"]
            ],
            responsive: true
        });
    });
</script>
@stop
