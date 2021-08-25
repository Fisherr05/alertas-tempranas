@extends('adminlte::page')

@section('title', 'Alertas Tempranas')

@section('content_header')

@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Editar Registro</h1>
    </div>
    <div class="card-body">
        <form action="/monitoreos/{{ $monitoreo->id }}" class="needs-validation" method="POST" novalidate>
            @csrf @method('PATCH')
            @can('1')
                <div class="form-group">
                    <label>Código de Monitoreo:</label>
                    <input type="text" maxlength="6" onkeypress="return soloLetras(event);" class="form-control" id="codigo"
                        name="codigo" placeholder="Ingrese el código de monitoreo"
                        value="{{ isset($monitoreo->codigo) ? $monitoreo->codigo : '' }}" required>
                    <div class="valid-feedback">
                        ¡Bien!
                    </div>
                    <div class="invalid-feedback">
                        ¡Rellene este campo!
                    </div>
                </div>
                <div class="form-group">
                    <label>Seleccione Estudio:</label>
                    <select disabled id="idEstudio" class="form-control" name="idEstudio" required>
                        @foreach ($estudios as $estudio)
                            <option value="{{ isset($estudio->id) ? $estudio->id : '' }}">{{ $estudio->nombreEstudio }}
                            </option>
                        @endforeach
                    </select>
                    <div class="valid-feedback">
                        ¡Bien!
                    </div>
                    <div class="invalid-feedback">
                        ¡Rellene este campo!
                    </div>
                </div>
                <div class="form-group">
                    <label>Seleccione Técnico:</label>
                    <select id="idTecnico" class="form-control" name="idTecnico" required>
                        @foreach ($tecnicos as $tecnico)
                            @if ($tecnico->fullacces == 'no')
                                <option value="{{ isset($tecnico->id) ? $tecnico->id : '' }}" @if ($tecnico->id == $monitoreo->idTecnico) selected @endif>{{ $tecnico->name }} </option>
                            @endif
                        @endforeach
                    </select>
                    <div class="valid-feedback">
                        ¡Bien!
                    </div>
                    <div class="invalid-feedback">
                        ¡Rellene este campo!
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label>Ingrese fecha planificada:</label>
                    <input type="date" id="fechaPlanificada" name="fechaPlanificada"
                        value="{{ isset($monitoreo->fechaPlanificada) ? $monitoreo->fechaPlanificada : '' }}" required>
                    <div class="valid-feedback">
                        ¡Bien!
                    </div>
                    <div class="invalid-feedback">
                        ¡Rellene este campo!
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label>Ingrese fecha de ejecución:</label>
                    <input type="date" id="fechaEjecucion" name="fechaEjecucion"
                        value="{{ isset($monitoreo->fechaEjecucion) ? $monitoreo->fechaEjecucion : '' }}" required>
                    <div class="valid-feedback">
                        ¡Bien!
                    </div>
                    <div class="invalid-feedback">
                        ¡Rellene este campo!
                    </div>
                </div>
                <br>
            @endcan
            @can('2')
                <div class="form-group">
                    <label>Código de Monitoreo:</label>
                    <input disabled type="text" maxlength="6" onkeypress="return soloLetras(event);" class="form-control"
                        id="codigo" name="codigo" placeholder="Ingrese el código de monitoreo"
                        value="{{ isset($monitoreo->codigo) ? $monitoreo->codigo : '' }}" required>
                    <div class="valid-feedback">
                        ¡Bien!
                    </div>
                    <div class="invalid-feedback">
                        ¡Rellene este campo!
                    </div>
                </div>
                <div class="form-group">
                    <label>Código de Estudio:</label>
                    <select disabled id="idEstudio" class="form-control" name="idEstudio" required>
                        @foreach ($estudios as $estudio)
                            <option value="{{ isset($estudio->id) ? $estudio->id : '' }}">{{ $estudio->nombreEstudio }}
                            </option>
                        @endforeach
                    </select>
                    <div class="valid-feedback">
                        ¡Bien!
                    </div>
                    <div class="invalid-feedback">
                        ¡Rellene este campo!
                    </div>
                </div>
            @endcan
            <div class="form-group">
                <label>Observaciones:</label>
                <textarea class="form-control" id="observaciones" name="observaciones"
                    value="{{ isset($monitoreo->observaciones) ? $monitoreo->observaciones : '' }}"
                    placeholder="Agregue Observacion" required>{{ $monitoreo->observaciones }}</textarea>
                <div class="valid-feedback">
                    ¡Bien!
                </div>
                <div class="invalid-feedback">
                    ¡Rellene este campo!
                </div>
            </div>
            <br>
            <!-- Validacion errores-->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <br>
            <div class="row">
                <div class="col-md-6">
                    <div class="d-grid gap-2">
                        <a href="/monitoreos" class="btn btn-danger btn-block"><i class="far fa-arrow-alt-circle-left">
                            </i> Regresar</a>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary btn-block"><i class="far fa-save"> </i> Guardar</button>
                    </div>

                </div>
            </div>

        </form>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    function soloLetras(e) {
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toString();
        letras = "ABECDEFGHIJKLMNÑOPQRSTUVWXYZÁÉÍÓÚabcdefghijklmnñopqrstuvwxyzáéíóú0123456789";

        especiales = [8, 13];
        tecla_especial = false;
        for (var i in especiales) {
            if (key == especiales[i]) {
                tecla_especial = true;
                break;
            }
        }
        if (letras.indexOf(tecla) == -1 && !tecla_especial) {
            alert("Ingresar datos correspondientes");
            return false;
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
<script type="text/javascript">
    $(document).ready(function() {
        $("#fechaEjecucion").change(function() {
            var startDate = document.getElementById("fechaPlanificada").value;
            var endDate = document.getElementById("fechaEjecucion").value;

            if ((Date.parse(startDate) >= Date.parse(endDate))) {
                alert("La fecha de ejecución debe ser mayor que la fecha planificada");
                document.getElementById("fechaEjecucion").value = "";
            }
        });
    });
</script>
@stop
