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
            <form class="needs-validation" action="/estudios/{{ $estudio->id }}" method="POST" novalidate>
                @csrf @method('PATCH')
                <div class="form-group">
                    <label>Seleccione Finca:</label>
                    <select id="idFinca" class="form-control" required>
                        <option hidden value="">Selecione una finca</option>
                        @foreach ($fincas as $finca)
                            <option value="{{ isset($finca->id) ? $finca->id : '' }}" @if ($fincaSelected->id == $finca->id) selected @endif>
                                {{ $finca->nombreFinca }}</option>
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
                    <label>Seleccione Variedad:</label>
                    <select id="idVariedad" class="form-control" name="idFv" required>
                        <option hidden value=""> Seleccione una variedad</option>
                        @foreach ($fvs as $fv)
                            <option value="{{ isset($fv->id) ? $fv->id : '' }}" @if ($variedadSelected->id == $fv->variedad_id) selected @endif>{{ $fv->descripcion }}</option>
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
                    <label>Código de Estudio:</label>
                    <input type="text" disabled maxlength="6" onkeypress="return soloLetras(event);" class="form-control"
                        id="codigo" name="codigo" placeholder="Ingrese el código de estudio"
                        value="{{ isset($estudio->codigo) ? $estudio->codigo : '' }}" required>
                    <div class="valid-feedback">
                        ¡Bien!
                    </div>
                    <div class="invalid-feedback">
                        ¡Rellene este campo!
                    </div>
                </div>

                <div class="form-group">
                    <label for="fenologia">Nombre de Estudio:</label>
                    <input type="text" onkeypress="return soloLetras(event);" class="form-control" id="fenologia"
                        name="nombreEstudio" placeholder="Ingrese el nombre de estudio"
                        value="{{ isset($estudio->nombreEstudio) ? $estudio->nombreEstudio : '' }}" required>
                    <div class="valid-feedback">
                        ¡Bien!
                    </div>
                    <div class="invalid-feedback">
                        ¡Rellene este campo!
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label for="fenologia">Fenologia:</label>
                    <input type="text" onkeypress="return soloNum(event);" minlength="1" maxlength="3" class="form-control"
                        id="fenologia" name="fenologia" placeholder="Ingrese la fenologia"
                        value="{{ isset($estudio->fenologia) ? $estudio->fenologia : '' }}" required>
                    <div class="valid-feedback">
                        ¡Bien!
                    </div>
                    <div class="invalid-feedback">
                        ¡Rellene este campo!
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label for="densidad">Densidad:</label>
                    <input type="text" class="form-control" id="densidad" name="densidad" placeholder="Ingrese la densidad"
                        value="{{ isset($estudio->densidad) ? $estudio->densidad : '' }}" required>
                    <div class="valid-feedback">
                        ¡Bien!
                    </div>
                    <div class="invalid-feedback">
                        ¡Rellene este campo!
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label>Ingrese fecha inicio:</label>
                    <input type="date" class="sm-form-control" id="fechaInicio" name="fechaInicio"
                        value="{{ isset($estudio->fechaInicio) ? $estudio->fechaInicio : '' }}" required>
                    <div class="valid-feedback">
                        ¡Bien!
                    </div>
                    <div class="invalid-feedback">
                        ¡Rellene este campo!
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label>Ingrese fecha fin:</label>
                    <input type="date" class="sm-form-control" id="fechaFin" name="fechaFin"
                        value="{{ isset($estudio->fechaFin) ? $estudio->fechaFin : '' }}" required>
                    <div class="valid-feedback">
                        ¡Bien!
                    </div>
                    <div class="invalid-feedback">
                        ¡Rellene este campo!
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label>Activo:</label>
                    <input type="text" class="form-control" id="activo" name="activo" placeholder="Ingrese activo"
                        value="{{ isset($estudio->activo) ? $estudio->activo : '' }}" required>
                    <div class="valid-feedback">
                        ¡Bien!
                    </div>
                    <div class="invalid-feedback">
                        ¡Rellene este campo!
                    </div>
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
                <a href="/estudios" class="btn btn-danger btn-block"><i class="far fa-arrow-alt-circle-left"> </i>
                    Regresar</a>
            </div>
            <div class="col-md-6">
                <button class="btn btn-primary btn-block"><i class="far fa-save"> </i> Guardar</button>
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
            letras = "ABECDEFGHIJKLMNÑOPQRSTUVWXYZÁÉÍÓÚabcdefghijklmnñopqrstuvwxyzáéíóú";

            especiales = [8, 13];
            tecla_especial = false;
            for (var i in especiales) {
                if (key == especiales[i]) {
                    tecla_especial = true;
                    break;
                }
            }
            if (letras.indexOf(tecla) == -1 && !tecla_especial) {
                alert("Ingresar solo letras");
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
            $('#idFinca').on('change', function() {
                $.ajax({
                    url: "{{ route('admin.variedades.byfinca') }}?idFinca=" + $(this).val(),
                    method: 'GET',
                    success: function(result) {
                        console.log(result);
                        var dbSelect = $('#idVariedad');
                        dbSelect.empty();
                        for (var i = 0; i < result.length; i++) {
                            dbSelect.append($('<option/>', {
                                value: result[i].id,
                                text: result[i].descripcion
                            }));
                        }
                        //$('#variedades').html(data.html);
                    }
                });
            });
        });
    </script>
    <script>
        $(function() {
            $('select').each(function() {
                $(this).select2({
                    theme: 'bootstrap4',
                    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass(
                        'w-100') ? '100%' : 'style',
                    placeholder: $(this).data('placeholder'),
                    allowClear: Boolean($(this).data('allow-clear')),
                    closeOnSelect: !$(this).attr('multiple'),
                    language: "es",
                });
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#fechaFin").change(function() {
                var startDate = document.getElementById("fechaInicio").value;
                var endDate = document.getElementById("fechaFin").value;

                if ((Date.parse(startDate) >= Date.parse(endDate))) {
                    alert("La fecha de fin debe ser mayor que la fecha de inicio");
                    document.getElementById("fechaFin").value = "";
                }
            });
        });
    </script>

@stop
