@section('css')
    <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">

    <link href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.dataTables.min.css" rel="stylesheet"
        type="text/css">
    <link href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" rel="stylesheet" type="text/css">
@endsection
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

<div class="form-group">
    <div class="form-group">
        <label>Seleccione Finca:</label>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            <i class="fas fa-search"></i>
        </button>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Seleccione Finca</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table id="table"
                            class="table table-striped table-hover table-bordered table-sm bg-white shadow-lg display nowrap"
                            cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>NOMBRE ZONA</th>
                                    <th>NOMBRE FINCA</th>
                                    <th>CÉDULA</th>
                                    <th>PROPIETARIO</th>
                                    <th>TELÉFONO</th>
                                    <th>COORDENADAS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fincas as $finca)
                                    <tr>
                                        <td>{{ $finca->id }}</td>
                                        @foreach ($zonas as $zona)
                                            @if ($finca->idZona == $zona->id)
                                                <td>{{ $zona->nombreZona }}</td>
                                            @endif
                                        @endforeach
                                        <td>{{ $finca->nombreFinca }}</td>
                                        <td>{{ $finca->cedula }}</td>
                                        <td>{{ $finca->propietarioFinca }}</td>
                                        <td>{{ $finca->telefono }}</td>
                                        <td>{{ $finca->coFinca }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary">Seleccionar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label>Seleccione Variedad:</label>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1">
            <i class="fas fa-search"></i>
        </button>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Seleccione Variedad</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-dialog modal-lg">
                        <table id="table1"
                            class="table table-striped table-hover table-bordered table-sm bg-white shadow-lg display nowrap"
                            cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>CÓDIGO</th>
                                    <th>DESCRIPCIÓN</>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($variedades as $variedad)
                                    <tr>
                                        <td>{{ $variedad->codigo }}</td>
                                        <td>{{ $variedad->descripcion }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary">Seleccionar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label>Código de Estudio:</label>
        <input type="text" maxlength="6" onkeypress="return soloLetras(event);" class="form-control" id="codigo"
            name="codigo" placeholder="Ingrese el código Ej (EST001)"
            value="{{ isset($estudio->codigo) ? $estudio->codigo : '' }}" required>
        <div class="valid-feedback">
            ¡Bien!
        </div>
        <div class="invalid-feedback">
            ¡Rellene este campo!
        </div>
    </div>
    <div class="form-group">
        <label>Nombre de Estudio:</label>
        <input type="text" onkeypress="return soloNombre(event);" class="form-control" name="nombreEstudio"
            placeholder="Ingrese el nombre de estudio"
            value="{{ isset($estudio->nombreEstudio) ? $estudio->nombreEstudio : '' }}" required>
        <div class="valid-feedback">
            ¡Bien!
        </div>
        <div class="invalid-feedback">
            ¡Rellene este campo!
        </div>
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
        <a href="/estudios" class="btn btn-danger btn-block">Regresar</a>
    </div>
    <div class="col-md-6">
        <button class="btn btn-primary btn-block">Guardar</button>
    </div>
</div>
@section('js')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"
        crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"
        crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/select/1.3.3/js/dataTables.select.min.js"
        crossorigin="anonymous"></script>
    <script src="{{ asset('/js/datatable-modal.js') }}"></script>
@endsection
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
