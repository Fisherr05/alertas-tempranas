@extends('layouts.base')

@section('contenido-centrado')
<div class="card">
    <div class="card-header">
        <h1>Editar Registro</h1>
    </div>
    <div class="card-body">
      <form class="needs-validation" action="/estudios/{{ $estudio->id }}" method="POST" novalidate>
      @csrf @method('PATCH')
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
    <label for="fenologia">Fenologia:</label>
    <input type="text" class="form-control" id="fenologia" name="fenologia" placeholder="Ingrese la fenologia"
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
        <a href="/estudios" class="btn btn-danger btn-block">Regresar</a>
    </div>
    <div class="col-md-6">
        <button class="btn btn-primary btn-block">Guardar</button>
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
