@extends('layouts.base ')

@section('contenido-centrado')
    <div class="card">
        <div class="card-header">
            <h1>Editar Registro</h1>
        </div>
        <div class="card-body">
            <form action="/monitoreos/{{ $monitoreo->id }}" class="needs-validation" method="POST" novalidate>
                @csrf @method('PATCH')
                <div class="form-group">
                <label>Código de Monitoreo:</label>
                <input type="text" disabled maxlength="6" onkeypress="return soloLetras(event);" class="form-control" id="codigo" name="codigo" placeholder="Ingrese el código de monitoreo"
                    value="{{ isset($monitoreo->codigo) ? $monitoreo->codigo : '' }}" required>
                <div class="valid-feedback">
                    ¡Bien!
                </div>
                <div class="invalid-feedback">
                    ¡Rellene este campo!
                </div>
            </div>
                <div class="form-goup">
                    <label>Seleccione Estudio:</label>
                    <select class="form-control" name="idEstudio">
                        <option value="{{ $monitoreo->idEstudio }}">{{ $monitoreo->idEstudio }}</option>
                    </select>
                </div>
                <br>
                <div class="form-group">
                    <label>Ingrese fecha planificada:</label>
                    <input type="date" id="fechaPlanificada" name="fechaPlanificada"
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
                    <input type="date" id="fechaEjecucion" name="fechaEjecucion"
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
                        placeholder="Agregue Observacion" required>{{ $monitoreo->observaciones }}</textarea>
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
                        <div class="d-grid gap-2">
                            <a href="/monitoreos" class="btn btn-danger btn-block">Regresar</a>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary btn-block">Guardar</button>
                        </div>

                    </div>
                </div>

            </form>
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
@endsection
