@extends('adminlte::page')

@section('title', 'Alertas Tempranas')

@section('content_header')

@stop

@section('content')
<!--Mensaje Creado -->
@if (session('datoGuardado'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('datoGuardado') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<!--Mensaje Modificado-->
@if (session('datoModificado'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('datoModificado') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<!--Mensaje Eliminado -->
@if (session('datoEliminado'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('datoEliminado') }}
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
                    <h1>Datos</h1>
                </div>
                <div class="container col-md-2">
                    <div class="text-center justify-content-center">
                        <a href="/tecnico" class="btn btn-danger btn-block "><i
                                class="far fa-arrow-alt-circle-left"></i> Regresar</a>
                    </div>
                </div>

            </div>
        </div>


        <form class="needs-validation" action="/dato/guardar" method="POST" novalidate>
            @csrf
            @php
                $contadorLineas = 0;
            @endphp
            @php
                $contadorFilas = 0;
            @endphp
            <div class="container"><br>
                    <Label>Observaciones:</Label>
                    <input class="form-control" type="text" name="observaciones" placeholder="Ingrese Observaciones" value="{{ isset($monitoreo->observaciones) ? $monitoreo->observaciones : '' }}">
                    <input type="hidden" name="estado" value="si">
                <table
                    class="table table-striped table-hover table-bordered table-sm bg-white shadow-lg display nowrap">
                    <thead>
                        <br>
                        <tr>
                            <th>Planta</th>
                            <th>Frutos</th>
                            <th>Insidencia (%)</th>
                            <th>Severidad</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($plantas as $planta)
                            @for ($i = 1; $i <= 10; $i++)
                                <tr class="@if ($contadorLineas % 2==0) table-success
                            @else
                                table-warning @endif">
                                    <input class="form-control" type="hidden" name="idMonitoreo[]"
                                        value="{{ $monitoreo->id }}">
                                    <input class="form-control" type="hidden" name="idPlanta[]"
                                        value="{{ $planta->id }}">
                                    <td><input readonly value="{{ $planta->codigo }}" class="form-control text"
                                            name="" id=""></td>
                                    <td><input readonly value="{{ $i }}" class="form-control text"
                                            name="fruto[]" id=""></td>
                                    <td><input value="" min="0" max="99" minlength="1" maxlength="2"
                                            onkeypress="return soloNum(event);"
                                            onchange="sumar(this.value,{{ $contadorFilas }});"
                                            class="form-control text" name="incidencia[]" id="" required>
                                    </td>
                                    <td><input type="text" class="form-control" name="severidad[]"
                                            id="spTotal-{{ $contadorFilas }}" value="" readonly>
                                    </td>
                                    <td><button type="button" class="btn btn-primary" id="remove"><i
                                                class="far fa-times-circle"></i></button></td>
                                </tr>
                                @php
                                    $contadorFilas = $contadorFilas + 1;
                                @endphp
                            @endfor
                            @php
                                $contadorLineas = $contadorLineas + 1;
                            @endphp

                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="container col-md-2">
                <button class="btn btn-primary btn-block" @if ($contadorLineas == 0) disabled @endif><i class="far fa-save"> </i> Guardar</button>
            </div>
            <br>
        </form>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
<script>
    function sumar(valor, codigoId) {
        var total = 0;
        valor = parseInt(valor); // Convertir el valor a un entero (número).

        total = document.getElementById('spTotal-' + codigoId).value;

        // Aquí valido si hay un valor previo, si no hay datos, le pongo un cero "0".
        total = (total == null || total == undefined || total == "") ? 0 : total;

        /* Esta es el calculo severidad. */
        total = (parseInt(valor));
        if (total > 0) {
            document.getElementById('spTotal-' + codigoId).value = 1;
        } else {
            // Colocar el resultado en el control "input".

            document.getElementById('spTotal-' + codigoId).value = total;
        }
    }

    function soloNum(ev) {
        if (window.event) {
            keynum = ev.keyCode;
        } else {
            keynum = ev.which;
        }
        if ((keynum > 47 && keynum < 58) || keynum == 8 || keynum == 13) {
            return true;
        } else {
            alert("Ingresar solo números");
            return false;
        }
    }
</script>
<script type="text/javascript">
    $(document).on('click', '#remove', function() {
        $(this).closest('tr').remove();
    });
</script>
@stop
