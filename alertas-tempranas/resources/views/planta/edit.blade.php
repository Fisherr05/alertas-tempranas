@extends('adminlte::page')

@section('title', 'Alertas Tempranas')

@section('content_header')

@stop

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Editar Registro</h1>
    </div>
    <div class="card-body">
        <form class="needs-validation" action="/plantas/{{ $planta->id }}" method="POST" novalidate>
            @csrf @method('PATCH')
            <div class="form-group">
                <label>Seleccione Estudio:</label>
                <select id="idEstudio" class="form-control" name="idEstudio" required>
                    @foreach ($estudios as $estudio)
                        <option value="{{ isset($estudio->id) ? $estudio->id : '' }}">{{ $estudio->codigo }} -
                            {{ $estudio->nombreEstudio }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Código Planta:</label>
                <input type="text" maxlength="6" onkeypress="return soloLetras(event);" class="form-control" id="codigo"
                    name="codigo" placeholder="Ingrese código de la planta"
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
                <label>Coordenada X:</label>
                <input type="text" class="form-control" id="" name="x"
                    placeholder="Ingrese las coordenadas de la planta"
                    value="{{ isset($planta->x) ? $planta->x : '' }}" required>
                <div class="valid-feedback">
                    ¡Bien!
                </div>
                <div class="invalid-feedback">
                    ¡Rellene este campo!
                </div>
            </div>
            <br>
            <div class="form-group">
                <label>Coordenada Y:</label>
                <input type="text" class="form-control" id="" name="y"
                    placeholder="Ingrese las coordenadas de la planta"
                    value="{{ isset($planta->y) ? $planta->y : '' }}" required>
                <div class="valid-feedback">
                    ¡Bien!
                </div>
                <div class="invalid-feedback">
                    ¡Rellene este campo!
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <a href="/plantas" class="btn btn-danger btn-block"><i
                            class="far fa-arrow-alt-circle-left"></i>Regresar</a>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-primary btn-block"><i class="far fa-save"></i> Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
