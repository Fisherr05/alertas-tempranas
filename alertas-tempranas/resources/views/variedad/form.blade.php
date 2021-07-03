<script>
    function soloLetras(e){
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toString();
        letras = "ABECDEFGHIJKLMNÑOPQRSTUVWXYZÁÉÍÓÚabcdefghijklmnñopqrstuvwxyzáéíóú0123456789-_";

        especiales=[8,32];
        tecla_especial= false;
        for(var i in especiales){
            if(key == especiales[i]){
            tecla_especial=true;
            break;
            }
        }
        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            alert("Ingresar datos correspondientes");
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
    <label>Código Variedad:</label>
    <input type="text" maxlength="6" onkeypress="return soloLetras(event);" class="form-control" id="codigo" name="codigo"
        placeholder="Ingrese código Ej(VA0001)"
        value="{{ isset($variedad->codigo) ? $variedad->codigo : '' }}" required>
    <div class="valid-feedback">
        ¡Bien!
    </div>
    <div class="invalid-feedback">
        ¡Rellene este campo!
    </div>
</div>
<br>
<div class="form-group">
    <label>Descripción:</label>
    <input type="text"  class="form-control" id="" name="descripcion"
        placeholder="Ingrese descripción"
        value="{{ isset($variedad->descripcion) ? $variedad->descripcion : '' }}" required>
    <div class="valid-feedback">
        ¡Bien!
    </div>
    <div class="invalid-feedback">
        ¡Rellene este campo!
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-6">
        <a href="/variedades" class="btn btn-danger btn-block"><i class="far fa-arrow-alt-circle-left"> </i> Regresar</a>
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
