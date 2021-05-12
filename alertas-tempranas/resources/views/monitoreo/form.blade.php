        <div class="form-group">
            <label>Seleccione Estudio:</label>
            <input id="estudio" list="estudios" placeholder="Escriba para buscar..." required name="idEstudio">
            <datalist id="estudios">
                @foreach ($estudios as $estudio)
                    <option value="{{ $estudio->id }}">{{ $estudio->nombreEstudio}}</option>
                @endforeach
            </datalist>
            <div class="valid-feedback">
                ¡Bien!
            </div>
            <div class="invalid-feedback">
                ¡Rellene este campo!
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
