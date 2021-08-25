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
        <select id="idEstudio" class="form-control" name="idEstudio" required>
            <option hidden value="">Selecione una estudio</option>
            @foreach ($estudios as $estudio)
                <option value="{{ isset($estudio->id) ? $estudio->id : '' }}">{{ $estudio->codigo }} -
                    {{ $estudio->nombreEstudio }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Seleccione Técnico:</label>
        <select id="idTecnico" class="form-control" name="idTecnico" required>
            <option hidden value="">Selecione una técnico</option>
            @foreach ($tecnicos as $tecnico)
                @if ($tecnico->fullacces == 'no')
                    <option value="{{ isset($tecnico->id) ? $tecnico->id : '' }}">
                        {{ $tecnico->name }} </option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Código de Monitoreo:</label>
        <input type="text" maxlength="6" onkeypress="return soloLetras(event);" class="form-control" id="codigo"
            name="codigo" placeholder="Ingrese el código Ej (MT0001) " value="" required>
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
    <input type="date" class="sm-form-control" id="fechaPlanificada" name="fechaPlanificada" value="" required>
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
    <input type="date" class="sm-form-control" id="fechaEjecucion" name="fechaEjecucion" required>
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
    <textarea class="form-control" id="observaciones" name="observaciones" placeholder="Agregue Observacion"
        maxlength="255" required></textarea>
    <div class="valid-feedback">
        ¡Bien!
    </div>
    <div class="invalid-feedback">
        ¡Rellene este campo!
    </div>
</div>
<br>
<input type="text" name="estado" value="no" hidden>

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
        <a href="/monitoreos" class="btn btn-danger btn-block"><i class="far fa-arrow-alt-circle-left"> </i>
            Regresar</a>
    </div>
    <div class="col-md-6">
        <button class="btn btn-primary btn-block"><i class="far fa-save"> </i> Guardar</button>
    </div>
</div>

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
