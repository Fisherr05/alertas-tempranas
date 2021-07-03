@extends('layouts.base')

@section('contenido-centrado')
<script>
    function soloLetras(e){
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toString();
        letras = "ABECDEFGHIJKLMNÑOPQRSTUVWXYZÁÉÍÓÚabcdefghijklmnñopqrstuvwxyzáéíóú";

        especiales=[8,32];
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

    function soloLetrayNumero(e){
        key = e.keyCode || e.which;
        tecla = String.fromCharCode(key).toString();
        letras = "ABECDEFGHIJKLMNÑOPQRSTUVWXYZÁÉÍÓÚabcdefghijklmnñopqrstuvwxyzáéíóú1234567890-_";

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
<div class="card">
    <div class="card-header">
        <h1>Editar Registro</h1>
    </div>
    <div class="card-body">
      <form class="needs-validation" action="/tecnicos/{{ $tecnico->id }}" method="POST" novalidate>
      @csrf @method('PATCH')
        <div class="form-group">
            <label>Seleccione Monitoreo:</label>
            <select id="idMonitoreo" class="form-control" name="idMonitoreo" required>
            @foreach ($monitoreos as $monitoreo)
                <option value="{{ isset($monitoreo->id) ? $monitoreo->id : '' }}">{{ $monitoreo->codigo }}</option>
            @endforeach
            </select>
            <div class="valid-feedback">
                ¡Bien!
            </div>
            <div class="invalid-feedback">
                ¡Rellene este campo!
            </div>
        </div>
        <br>
        <div class="form-group">
                <label for="fenologia">Nombre de Técnico:</label>
                <input type="text"  onkeypress="return soloLetras(event);" class="form-control" id="nombreTecnico" name="nombreTecnico" placeholder="Ingrese el nombre del técnico"
                    value="{{ isset($tecnico->nombreTecnico) ? $tecnico->nombreTecnico : '' }}" required>
                <div class="valid-feedback">
                    ¡Bien!
                </div>
                <div class="invalid-feedback">
                    ¡Rellene este campo!
                </div>
        </div>
        <br>
        <div class="form-group">
            <label>Institución:</label>
            <input type="text" onkeypress="return soloLetrayNumero(event);" class="form-control" id="institucion" name="institucion" placeholder="Ingrese la institución"
                value="{{ isset($tecnico->institucion) ? $tecnico->institucion : '' }}" required>
            <div class="valid-feedback">
                ¡Bien!
            </div>
            <div class="invalid-feedback">
                ¡Rellene este campo!
            </div>
        </div>
        <br>

        <div class="form-group">
            <label>Teléfono:</label>
            <input type="text" onkeypress="return soloNum(event);" minlength="7" maxlength="10" class="form-control" id="telefono" name="telefono" placeholder="Ingrese número de teléfono"
                value="{{ isset($tecnico->telefeno) ? $tecnico->telefeno : '' }}" required="">
            <div class="valid-feedback">
                ¡Bien!
            </div>
            <div class="invalid-feedback">
                ¡Rellene este campo!
            </div>
        </div>
        <br>
        <div class="form-group">
            <label>Email:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese email"
                value="{{ isset($tecnico->email) ? $tecnico->email : '' }}" required>
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
            <input type="text" onkeypress="return soloLetras(event);" class="form-control" id="activo" name="activo" placeholder="Ingrese activo"
                value="{{ isset($tecnico->activo) ? $tecnico->activo : '' }}" required>
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
                <a href="/tecnicos" class="btn btn-danger btn-block">Regresar</a>
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
