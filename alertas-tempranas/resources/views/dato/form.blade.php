<script>
    function soloLetras(e){
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toString();
        letras = "ABECDEFGHIJKLMNÑOPQRSTUVWXYZÁÉÍÓÚabcdefghijklmñopqrstuvwxyzáéíóú";

        especiales=[8,13];
        tecla_especial= false;
        for(var i in especiales){
            if(key == especiales[i]){
            tecla_especial=true;
            break;
            }
        }
        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            alert("Ingresar solo letras");
            return false;
        }
    }

    function soloNum(ev){
        if(window.event){
            keynum = ev.keyCode;
        }else{
            keynum = ev.which;
        }
        if((keynum > 47 && keynum < 58 ) || keynum == 8 || keynum == 13){
            return true;
        }else{
            alert("Ingresar solo números");
            return false;
        }
    }
</script>

<div class="form-group">
    <label>Seleccione Monitoreo:</label>
    <input id="monitoreo" list="monitoreos" placeholder="Escriba para buscar..." name="idMonitoreo" value="{{ isset($monitoreo->id) ? $monitoreo->id : '' }}" required>
    <datalist id="monitoreos">
        @foreach ($monitoreos as $monitoreo)
            <option value="{{ $monitoreo->id }}">{{ $monitoreo->codigo }}</option>
        @endforeach
    </datalist>
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
    <input type="text" min="0" max="100" onkeypress="return soloNum(event);" maxlength="3" class="form-control" id="incidencia" name="incidencia"
        placeholder="Ingrese la incidencia"
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
    <input type="text" min="0" max="100" onkeypress="return soloNum(event);" maxlength="3"  class="form-control" id="severidad" name="severidad" placeholder="Ingrese la severidad"
        value="{{ isset($dato->severidad) ? $dato->severidad : '' }}" required>
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
        <label>Planta:</label>
        <input id="planta"  list="plantas" placeholder="Escriba para buscar..." name="" value="{{ isset($planta->id) ? $planta->id : '' }}" required>
        <datalist id="plantas">
            @foreach ($plantas as $planta)
                <option value="{{ $planta->id }}">{{ $planta->codigo }}</option>
            @endforeach
        </datalist>
        <div class="valid-feedback">
            ¡Bien!
        </div>
        <div class="invalid-feedback">
            ¡Rellene este campo!
        </div>
    </div>
    <div class="container col-md-2">
        <div class="text-center justify-content-center">
            <a href="" class="btn btn-success">Nuevo Registro</a>
        </div>
    </div>
</div>

<br>
<div class="form-group">
    <label>Fruto:</label>
    <input type="number" min="1" max="10" onkeypress="return soloNum(event);"  class="form-control" id="fruto" name="fruto" placeholder="Ingrese el número del fruto"
        value="{{ isset($dato->fruto) ? $dato->fruto : '' }}" required>
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
