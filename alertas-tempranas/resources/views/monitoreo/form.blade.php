        <div class="form-group">
            <label>Seleccione Estudio:</label>
            <select class="form-control" name="idEstudio">
                @foreach ($estudios as $estudio)
                    <option value="{{ $estudio->id }}">{{ $estudio->id }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div class="form-group">
            <label>Ingrese fecha planificada:</label>
            <input type="date" id="fechaPlanificada" name="fechaPlanificada"
                value="{{ isset($monitoreo->fechaPlanificada) ? $monitoreo->fechaPlanificada : '' }}">
        </div>
        <br>
        <div class="form-group">
            <label>Ingrese fecha de ejecución:</label>
            <input type="date" id="fechaEjecucion" name="fechaEjecucion"
                value="{{ isset($monitoreo->fechaEjecucion) ? $monitoreo->fechaEjecucion : '' }}">
        </div>
        <br>
        <div class="form-group">
            <label>Observaciones:</label>
            <textarea class="form-control" id="observaciones" name="observaciones"
                value="{{ isset($monitoreo->observaciones) ? $monitoreo->observaciones : '' }}"
                placeholder="Agregue Observacion"></textarea>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <a href="/monitoreos" class="btn btn-danger btn-block">Regresar</a>
            </div>
            <div class="col-md-6">
                <button class="btn btn-primary btn-block">Guardar</button>
            </div>
        </div>
