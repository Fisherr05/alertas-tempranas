@section('css')
    <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">

    <link href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.dataTables.min.css" rel="stylesheet"
        type="text/css">
    <link href="https://cdn.datatables.net/select/1.3.3/css/select.dataTables.min.css" rel="stylesheet"
        type="text/css">
@endsection
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

<div class="form-group">
    <label>Seleccione Monitoreo:</label>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        <i class="fas fa-search"></i>
    </button>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Seleccione Monitoreo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table id="table"
                        class="display table table-striped table-hover table-bordered table-sm bg-white shadow-lg display nowrap"
                        cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>CODIGO</th>
                                <th>ESTUDIO</th>
                                <th>FECHA PLANIFICADA</th>
                                <th>FECHA DE EJECUCION</th>
                                <th>OBSERVACIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($monitoreos as $monitoreo)
                                <tr>
                                    <td>{{ $monitoreo->codigo }}</td>
                                    @foreach ($estudios as $estudio)
                                        @if ($monitoreo->idEstudio == $estudio->id)
                                            <td>{{ $estudio->codigo }}</td>
                                        @endif
                                    @endforeach
                                    <td>{{ $monitoreo->fechaPlanificada }}</td>
                                    <td>{{ $monitoreo->fechaEjecucion }}</td>
                                    <td>{{ $monitoreo->observaciones }}</td>
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
<br>
<div class="form-group">
    <label>Seleccione Planta:</label>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1">
        <i class="fas fa-search"></i>
    </button>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Seleccione Planta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body ">
                    <table id="table1"
                        class="display table table-striped table-hover table-bordered table-sm bg-white shadow-lg display nowrap"
                        cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>CÓDIGO</th>
                                <th>MONITOREO</>
                                <th>COORDENADAS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($plantas as $planta)
                                <tr>
                                    <td>{{ $planta->codigo }}</td>
                                    @foreach ($monitoreos as $monitoreo)
                                        @if ($planta->idMonitoreo == $monitoreo->id)
                                            <td>{{ $monitoreo->codigo }}</td>
                                        @endif
                                    @endforeach
                                    <td>{{ $planta->coPlanta }}</td>
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
<br>
<div class="form-group">
    <label>Fruto:</label>
    <input type="number" min="1" max="10" maxlength="2" onkeypress="return soloNum(event);" class="form-control" id="fruto"
        name="fruto" placeholder="Ingrese el número del fruto" value="{{ isset($dato->fruto) ? $dato->fruto : '' }}"
        required>
    <div class="valid-feedback">
        ¡Bien!
    </div>
    <div class="invalid-feedback">
        ¡Rellene este campo!
    </div>
</div>
<br>
<div class="form-group">
    <label>Incidencia:</label>
    <input type="text" min="0" max="100" onkeypress="return soloNum(event);" maxlength="3" class="form-control"
        id="incidencia" name="incidencia" placeholder="Ingrese la incidencia"
        value="{{ isset($dato->incidencia) ? $dato->incidencia : '' }}" required>
    <div class="valid-feedback">
        ¡Bien!
    </div>
    <div class="invalid-feedback">
        ¡Rellene este campo!
    </div>
</div>
<br>
<div class="form-group">
    <label>Severidad:</label>
    <input type="text" min="0" max="100" onkeypress="return soloNum(event);" maxlength="3" class="form-control"
        id="severidad" name="severidad" placeholder="Ingrese la severidad"
        value="{{ isset($dato->severidad) ? $dato->severidad : '' }}" required>
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
        <a href="/datos" class="btn btn-danger btn-block">Regresar</a>
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
