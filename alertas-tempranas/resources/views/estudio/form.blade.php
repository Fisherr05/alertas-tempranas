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
        <select id="idFinca" class="form-control" required>
            <option hidden value="">Selecione una finca</option>
            @foreach ($fincas as $finca)
                <option value="{{ isset($finca->id) ? $finca->id : '' }}">{{ $finca->nombreFinca }}</option>
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
        <a href="/estudios" class="btn btn-danger btn-block"><i class="far fa-arrow-alt-circle-left"> </i> Regresar</a>
    </div>
    <div class="col-md-6">
        <button class="btn btn-primary btn-block"><i class="far fa-save"> </i> Guardar</button>
    </div>
</div>
