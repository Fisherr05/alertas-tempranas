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
    <input type="text" onkeypress="return soloLetras(event);" class="form-control" id="nombreFinca" name="nombreFinca"
        placeholder="Ingrese el nombre de la finca"
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
    <input type="text" onkeypress="return soloNum(event);" maxlength="10" class="form-control" id="cedula" name="cedula"
        placeholder="Ingrese cédula del propietario" value="{{ isset($finca->cedula) ? $finca->cedula : '' }}"
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
    <label>Coordenadas:</label>
    <input type="text" class="form-control" id="coFinca" name="coFinca" placeholder="Ingrese las coordenadas"
        value="{{ isset($finca->coFinca) ? $finca->coFinca : '' }}" required>
    <div class="valid-feedback">
        ¡Bien!
    </div>
    <div class="invalid-feedback">
        ¡Rellene este campo!
    </div>
</div>
<br>
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
<label>Variedad:</label>
    <select name="idVariedad[]" id="idVariedad" multiple data-live-search="true"  class="form-control">
        <option selected> Seleccione Variedad
             @foreach ($variedades as $variedad)
                <option value="{{ $variedad->id }}">{{ $variedad->descripcion }}</option>
            @endforeach
        </option>
    </select>
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
        <a href="/fincas" class="btn btn-danger btn-block">Regresar</a>
    </div>
    <div class="col-md-6">
        <button id="btnSave" class="btn btn-primary btn-block">Guardar</button>
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
<script>
   /* $(document).ready(function() {
        $("#btnSave").click(function() {
            document.getElementsByName("#table_lenght").attr('disabled', 'disabled');
        });
    });
    */
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js" ></script>

<script type="text/javascript">
    $(document).ready(function(){
        $('select').selectpicker();
    });
</script>
