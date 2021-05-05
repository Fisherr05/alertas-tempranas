<div class="form-group">
            <label for="nombreFinca" >Nombre de la finca:</label>
            <input type="text" class="form-control" id="nombreFinca" name="nombreFinca" placeholder="Ingrese el nombre de la finca"
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
    <input type="text" class="form-control" id="propietarioFinca" name="propietarioFinca" placeholder="Ingrese el nombre del propietario"
    value="{{ isset($finca->propietarioFinca) ? $finca->propietarioFinca: '' }}" required>
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
