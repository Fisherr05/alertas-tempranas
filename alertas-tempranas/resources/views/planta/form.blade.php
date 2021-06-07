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
    <label>Seleccione Monitoreo:</label>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        <i class="fas fa-search"></i>
    </button>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Seleccione Monitoreo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="table"
                    class="table table-striped table-hover table-bordered table-sm bg-white shadow-lg display nowrap"
                    cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>CODIGO</th>
                            <th>ESTUDIO</th>
                            <th>FECHA PLANIFICADA</th>
                            <th>FECHA DE EJECUCION</th>
                            <th>OBSERVACIONES</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($monitoreos as $monitoreo)
                            <tr>
                                <td>{{ $monitoreo->codigo }}</td>
                                @foreach ($estudios as $estudio)
                                    @if ($monitoreo->idEstudio == $estudio->id)
                                        <td>{{ $estudio->codigo }}</td>
                                    @endif
                                @endforeach
                                <td>{{ $monitoreo->fechaPlanificada }}</td>
                                <td>{{ $monitoreo->fechaEjecucion }}</td>
                                <td>{{ $monitoreo->observaciones }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Selecionar</button>
            </div>
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    <label>Código Planta:</label>
    <input type="text" maxlength="6" onkeypress="return soloLetras(event);" class="form-control" id="codigo" name="codigo"
        placeholder="Ingrese código de la planta"
        value="{{ isset($planta->codigo) ? $planta->codigo : '' }}" required>
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
    <input type="text"  class="form-control" id="" name="coPlanta"
        placeholder="Ingrese las coordenadas de la planta"
        value="{{ isset($planta->coPlanta) ? $planta->coPlanta : '' }}" required>
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
        <a href="/plantas" class="btn btn-danger btn-block">Regresar</a>
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
