        <div class="form-group">
            <label>Seleccione Finca:</label>
            <input id="finca" list="fincas" placeholder="Escriba para buscar..." name="idFinca" required>
            <datalist id="fincas">
                @foreach ($fincas as $finca)
                    <option value="{{ $finca->id }}">{{ $finca->id }} - {{ $finca->nombreFinca }}</option>
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
            <label>Ingrese nombre de zona:</label>
            <input type="text" class="form-control" id="nombreZona" name="nombreZona"
                placeholder="Ingrese el nombre de la zona"
                value="{{ isset($zona->nombreZona) ? $zona->nombreZona : '' }}" required>
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
                <select class="form-control">
                    @php($idParroquia = 0)
                        <option value="0">Selecione un cantón</option>
                        @foreach ($cantones as $canton)
                            <option value="{{ $canton->id }}">{{ $canton->nombre }}</option>
                            @php($idParroquia = $canton->id)
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col">
                        <label>Ingrese Parroquia:</label>
                        <select class="form-control" name="idParroquia">
                            @foreach ($parroquias as $parroquia)
                                @if ($parroquia->id = $idParroquia)
                                    <option value="{{ $parroquia->id }}">{{ $parroquia->nombre }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col">
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
                </div>
                <br>
                <div class="form-group">
                    <label>Coordenadas:</label>
                    <input type="text" class="form-control" id="coZona" name="coZona"
                        placeholder="Ingrese las coordenadas de la zona" value="" required>
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
