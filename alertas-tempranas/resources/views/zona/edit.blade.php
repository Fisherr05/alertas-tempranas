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
            <form action="/zonas/{{ $zona->id }}" class="needs-validation" method="POST" novalidate>
                @csrf @method('PATCH')

                <div class="form-group">
                    <label>Ingrese nombre de zona:</label>
                    <input type="text" onkeypress="return soloLetras(event);" class="form-control" id="nombreZona"
                        name="nombreZona" placeholder="Ingrese el nombre de la zona"
                        value="{{ isset($zona->nombreZona) ? $zona->nombreZona : '' }}" required>
                    <div class="valid-feedback">
                        ¡Bien!
                    </div>
                    <div class="invalid-feedback">
                        ¡Rellene este campo!
                    </div>
                </div>
                <br>
                <div class="form-row">
                    <div class="form-group col">
                        <label>Ingrese Canton:</label>
                        <select class="form-control"  id="idCanton">
                            <option value="">Selecione un cantón</option>
                            @foreach ($cantones as $canton)
                                <option value="{{ isset($canton->id) ? $canton->id : '' }}" @foreach ($parroquias as $parroquia) @if ($parroquia->id == $zona->idParroquia && $canton->id == $parroquia->idCanton) selected  @endif @endforeach>
                                    {{ $canton->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col">
                        <label>Ingrese Parroquia:</label>
                        <select class=" form-control" name="idParroquia" id="idParroquia">
                            @foreach ($parroquias as $parroquia)
                                <option value="{{ isset($parroquia->id) ? $parroquia->id : '' }}" @if ($parroquia->id == $zona->idParroquia) selected @endif>
                                    {{ $parroquia->nombre }}</option>

                            @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label>Localidad:</label>
                    <input type="text" onkeypress="return soloLetras(event);" class="form-control" id="localidad"
                        name="localidad" placeholder="Ingrese la localidad de la zona"
                        value="{{ isset($zona->localidad) ? $zona->localidad : '' }}" required>

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
                    <input type="text" class="form-control" id="x" name="x"
                        placeholder="Ingrese las coordenadas de la zona"
                        value="{{ isset($zona->x) ? $zona->x : '' }}" required>
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
                    <input type="text" class="form-control" id="y" name="y"
                        placeholder="Ingrese las coordenadas de la zona"
                        value="{{ isset($zona->y) ? $zona->y : '' }}" required>
                    <div class="valid-feedback">
                        ¡Bien!
                    </div>
                    <div class="invalid-feedback">
                        ¡Rellene este campo!
                    </div>
                </div>
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
                            <a href="/zonas" class="btn btn-danger btn-block"><i class="far fa-arrow-alt-circle-left"> </i> Regresar</a>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary btn-block"><i class="far fa-save"></i> Guardar</button>
                        </div>

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

    <script type="text/javascript">
        $(document).ready(function() {
            $('#idCanton').on("change", function() {
                $.ajax({
                    url: "{{ route('admin.parroquias.bycanton') }}?idCanton=" + $(this).val(),
                    method: 'GET',
                    //console.log(data);
                    //$('#idParroquia').html(data.html);
                    success: function(result) {
                        console.log(result);
                        var markup;
                        var dbSelect = $('#idParroquia');
                        dbSelect.empty();
                        for (var i = 0; i < result.length; i++) {
                            dbSelect.append($('<option/>', {
                                value: result[i].id,
                                text: result[i].nombre
                            }));
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(thrownError);
                    }
                });
            })
        });

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

@stop
