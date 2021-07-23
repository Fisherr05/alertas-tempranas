<script>
    function soloLetras(e) {
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
    <label>Ingrese nombre de zona:</label>
    <input type="text" onkeypress="return soloLetras(event);" class="form-control" id="nombreZona" name="nombreZona"
        placeholder="Ingrese el nombre de la zona" value="{{ isset($zona->nombreZona) ? $zona->nombreZona : '' }}"
        required>
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
        <select  id="idCanton" class="form-control" required>
            <option hidden value="">Selecione un cantón</option>
            @foreach ($cantones as $canton)
                <option value="{{ $canton->id }}">{{ $canton->nombre }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col">
        <label>Ingrese Parroquia:</label>
        <select  name="idParroquia" id="idParroquia" class="form-control" required>
            <option hidden value="">Seleccione una parroquia</option>
        </select>
    </div>
</div>
<div class="form-group">
        <label>Localidad:</label>
        <input type="text" class="form-control" id="localidad" name="localidad"
            placeholder="Ingrese la localidad de la zona" value="" required>

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
    <input type="text" class="form-control" id="x" name="x" placeholder="Ingrese las coordenadas de la zona"
        value="" required>
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
    <input type="text" class="form-control" id="y" name="y" placeholder="Ingrese las coordenadas de la zona"
        value="" required>
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
        <a href="/zonas" class="btn btn-danger btn-block"><i class="far fa-arrow-alt-circle-left"></i> Regresar</a>
    </div>
    <div class="col-md-6">
        <button class="btn btn-primary btn-block"><i class="far fa-save"></i> Guardar</button>
    </div>
</div>
