        <div class="form-group">
            <label>Seleccione Estudio:</label>
            <select class="form-control" name="idFinca">
                @foreach ($fincas as $finca)
                    <option value="{{ $finca->id }}">{{ $finca->id }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div class="form-group">
            <label>Ingrese nombre de zona:</label>
            <input type="text" id="nombreZona" name="nombreZona"
                value="{{ isset($zona->nombreZona) ? $zona->nombreZona : '' }}" required>
                <div class="valid-feedback">
                    ¡Bien!
                </div>
                <div class="invalid-feedback">
                    ¡Rellene este campo!
                </div>
        </div>
        <br>
        <div class="row">
            <div class="form-group">
            <label>Ingrese Canton:</label>
            <select class="form-control" name="canton">
                @foreach ($zonas as $zona)
                    <option value="{{ isset($zona->canton) ? $zona->canton }}"></option>
                @endforeach
            </select>
            <label>Ingrese Parroquia:</label>
            <select class="form-control" name="canton">
                @foreach ($zonas as $zona)
                    <option value="{{ isset($zona->parroquia) ? $zona->parroquia }}"></option>
                @endforeach
            </select>

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
            <label>Observaciones:</label>
            <textarea class="form-control" id="observaciones" name="observaciones"
                value="{{ isset($zona->observaciones) ? $zona->observaciones : '' }}"
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
                <a href="/zonas" class="btn btn-danger btn-block">Regresar</a>
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
