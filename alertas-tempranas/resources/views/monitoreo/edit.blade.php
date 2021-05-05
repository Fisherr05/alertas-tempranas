@extends('layouts.base ')

<div class="card">
    <div class="card-header">
        <h1>Editar Registro</h1>
    </div>
    <div class="card-body">
      <form action="/monitoreos/{{$monitoreo->id}}" method="POST">
        @csrf @method('PATCH')
         <div class="form-goup">
            <label>Seleccione Estudio:</label>
            <select class="form-control" name="idEstudio">
                <option value="{{$monitoreo->idEstudio}}">{{$monitoreo->idEstudio}}</option>
            </select>
        </div>
        <br>
        <div class="form-group">
            <label>Ingrese fecha planificada:</label>
            <input type="date" id="fechaPlanificada" name="fechaPlanificada" value="{{ isset($monitoreo->fechaPlanificada)?$monitoreo->fechaPlanificada:'' }}">
        </div>
        <br>
        <div class="form-group">
            <label>Ingrese fecha de ejecución:</label>
            <input type="date" id="fechaEjecucion" name="fechaEjecucion" value="{{isset($monitoreo->fechaEjecucion)?$monitoreo->fechaEjecucion:'' }}">
        </div>
        <br>
        <div class="form-group">
          <label>Observaciones:</label>
          <textarea class="form-control" id="observaciones"  name="observaciones" value="{{ isset($monitoreo->observaciones)?$monitoreo->observaciones:'' }}" placeholder="Agregue Observacion"
          >{{$monitoreo->observaciones}}</textarea>
        </div>
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
