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
        <label>Seleccione Estudio:</label>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            <i class="fas fa-search"></i>
        </button>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Seleccione Estudio</h5>
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
                                    <th>CODIGO</th>
                                    <th>ESTUDIO</th>
                                    <th>FINCA</th>
                                    <th>FENOLOGIA</th>
                                    <th>DENSIDAD</th>
                                    <th>FECHA INICIO</th>
                                    <th>FECHA FIN</th>
                                    <th>ACTIVO</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($estudios as $estudio)
                                    <tr>
                                        <td>{{ $estudio->codigo }}</td>
                                        <td>{{ $estudio->nombreEstudio }}</td>
                                        @foreach ($fincas as $finca)
                                            @if ($estudio->idFinca == $finca->id)
                                                <td>{{ $finca->nombreFinca }}</td>
                                            @endif
                                        @endforeach
                                        <td>{{ $estudio->fenologia }}</td>
                                        <td>{{ $estudio->densidad }}</td>
                                        <td>{{ $estudio->fechaInicio }}</td>
                                        <td>{{ $estudio->fechaFin }}</td>
                                        <td>{{ $estudio->activo }}</td>
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
        <label>Código de Monitoreo:</label>
        <input type="text" maxlength="6" onkeypress="return soloLetras(event);" class="form-control" id="codigo"
            name="codigo" placeholder="Ingrese el código Ej (MT0001) "
            value="{{ isset($monitoreo->codigo) ? $monitoreo->codigo : '' }}" required>
        <div class="valid-feedback">
            ¡Bien!
        </div>
        <div class="invalid-feedback">
            ¡Rellene este campo!
        </div>
    </div>
</div>
<div class="form-group">
    <label>Ingrese fecha planificada:</label>
    <input type="date" class="sm-form-control" id="fechaPlanificada" name="fechaPlanificada"
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
    <input type="date" class="sm-form-control" id="fechaEjecucion" name="fechaEjecucion"
        value="{{ isset($monitoreo->fechaEjecucion) ? $monitoreo->fechaEjecucion : '' }}" required>
    <div class="valid-feedback">
        ¡Bien!
    </div>
    <div class="invalid-feedback">
        ¡Rellene este campo!
    </div>
</div>
<br>
<div class="form-group">
    <label>Observaciones:</label>
    <textarea class="form-control" id="observaciones" name="observaciones"
        value="{{ isset($monitoreo->observaciones) ? $monitoreo->observaciones : '' }}"
        placeholder="Agregue Observacion" maxlength="255" required></textarea>
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
        <a href="/monitoreos" class="btn btn-danger btn-block">Regresar</a>
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
