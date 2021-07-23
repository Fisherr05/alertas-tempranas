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
            <form class="needs-validation" action="/fincas/{{ $finca->id }}" method="POST" novalidate>
                @csrf @method('PATCH')
                <div class="form-goup">
                    <label>Seleccione Zona:</label>
                    <select class="form-control" name="idZona" required>
                        @foreach ($zonas as $zona)
                            <option value="{{ $zona->id }}">{{ $zona->nombreZona }}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <div class="form-group">
                    <i class="glyphicon glyphicon-search"> </i>
                    <label for="nombreFinca">Nombre de la finca:</label>
                    <input type="text" onkeypress="return soloLetras(event);" class="form-control" id="nombreFinca"
                        name="nombreFinca" placeholder="Ingrese el nombre de la finca"
                        value="{{ isset($finca->nombreFinca) ? $finca->nombreFinca : '' }}" required>
                    <div class="valid-feedback">
                        ¡Bien!
                    </div>
                    <div class="invalid-feedback">
                        ¡Rellene este campo!
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label for="propietarioFinca">Nombre del propietario:</label>
                    <input type="text" onkeypress="return soloNombre(event);" class="form-control" id="propietarioFinca"
                        name="propietarioFinca" placeholder="Ingrese el nombre del propietario"
                        value="{{ isset($finca->propietarioFinca) ? $finca->propietarioFinca : '' }}" required>
                    <div class="valid-feedback">
                        ¡Bien!
                    </div>
                    <div class="invalid-feedback">
                        ¡Rellene este campo!
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label>Cédula del propietario:</label>
                    <input type="text" onkeypress="return soloNum(event);" maxlength="10" class="form-control" id="cedula"
                        name="cedula" placeholder="Ingrese cédula del propietario"
                        value="{{ isset($finca->cedula) ? $finca->cedula : '' }}" required>
                    <div class="valid-feedback">
                        ¡Bien!
                    </div>
                    <div class="invalid-feedback">
                        ¡Rellene este campo!
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label>Teléfono:</label>
                    <input type="text" onkeypress="return soloNum(event);" maxlength="10" class="form-control" id="telefono"
                        name="telefono" placeholder="Ingrese número de teléfono"
                        value="{{ isset($finca->telefono) ? $finca->telefono : '' }}" required>
                    <div class="valid-feedback">
                        ¡Bien!
                    </div>
                    <div class="invalid-feedback">
                        ¡Rellene este campo!
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label>Coordenada X:</label>
                    <input type="text" class="form-control" id="x" name="coordenadaX" placeholder="Ingrese las coordenadas"
                        value="{{ isset($finca->coordenadaX) ? $finca->coordenadaX: '' }}" required>
                    <div class="valid-feedback">
                        ¡Bien!
                    </div>
                    <div class="invalid-feedback">
                        ¡Rellene este campo!
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label>Coordenada Y:</label>
                    <input type="text" class="form-control" id="y" name="coordenadaY" placeholder="Ingrese las coordenadas"
                        value="{{ isset($finca->coordenadaY) ? $finca->coordenadaY : '' }}" required>
                    <div class="valid-feedback">
                        ¡Bien!
                    </div>
                    <div class="invalid-feedback">
                        ¡Rellene este campo!
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label>Densidad:</label>
                    <input type="text" class="form-control" id="densidad" name="densidad" placeholder="Ingrese la densidad"
                        value="{{ isset($finca->densidad) ? $finca->densidad : '' }}" required>
                    <div class="valid-feedback">
                        ¡Bien!
                    </div>
                    <div class="invalid-feedback">
                        ¡Rellene este campo!
                    </div>
                    <br>


                </div>
                <div class="form-group">
                    <label>Variedad:</label>
                    <select name="idVariedad[]" id="idVariedad" multiple class="form-control" required>
                        @foreach ($variedades as $variedad)
                            <option value="{{ $variedad->id }}" required>{{ $variedad->descripcion }}</option>
                        @endforeach
                    </select>
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
                        <a href="/fincas" class="btn btn-danger btn-block"><i class="far fa-arrow-alt-circle-left"> </i>
                            Regresar</a>
                    </div>
                    <div class="col-md-6">
                        <button id="btnSave" class="btn btn-primary btn-block"><i class="far fa-save"> </i> Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">


@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        function soloLetras(e) {
            key = e.keyCode || e.which;
            tecla = String.fromCharCode(key).toString();
            letras = "ABECDEFGHIJKLMNÑOPQRSTUVWXYZÁÉÍÓÚabcdefghijklmnñopqrstuvwxyzáéíóú1234567890-_";

            especiales = [8, 32];
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

        function soloNombre(e) {
            key = e.keyCode || e.which;
            tecla = String.fromCharCode(key).toString();
            letras = "ABECDEFGHIJKLMNÑOPQRSTUVWXYZÁÉÍÓÚabcdefghijklmnñopqrstuvwxyzáéíóú";

            especiales = [8, 32];
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
    <script>
        /* $(document).ready(function() {
                $("#btnSave").click(function() {
                    document.getElementsByName("#table_lenght").attr('disabled', 'disabled');
                });
            });
            */
    </script>

    @php
    $variedad_ids = [];
    @endphp
    @foreach ($finca->variedades as $variedad)
        @php
            array_push($variedad_ids, $variedad->id);
        @endphp
    @endforeach
    @php
    $variedadJson = json_encode($variedad_ids);
    @endphp
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
    <script>
        $(document).ready(function() {
            $('#idVariedad').select2();
            theme: 'bootstrap4',
                data = [];
            data = <?php echo $variedadJson; ?>;
            $('#idVariedad').val(data).trigger('change');
        });
    </script>


@stop
