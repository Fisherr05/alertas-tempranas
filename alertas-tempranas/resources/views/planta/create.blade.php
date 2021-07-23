@extends('adminlte::page')

@section('title', 'Alertas Tempranas')

@section('content_header')

@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h1>Nuevo Registro</h1>
        </div>
        <div class="card-body">
            <form class="needs-validation" action="/plantas" method="POST" novalidate>
                @csrf
                @include('planta.form')
            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $(document).on('click', '#add_btn', function() {
                var html = '';
                html += '<tr>';
                html +=
                    '<td><input type = "text" maxlength = "6" onkeypress = "return soloLetras(event);" class = "form-control"id = "codigo" name = "codigo[]" placeholder = "Ingrese código de la planta" value = "{{ isset($planta->codigo) ? $planta->codigo : '' }}" required></td>';
                html +=
                    '<td><input type = "text" class = "form-control" name = "x[]" placeholder = "Ingrese las coordenadas de la planta" value = "{{ isset($planta->x) ? $planta->x : '' }}" required ></td>';
                html +=
                    '<td><input type = "text" class = "form-control" name = "y[]"    placeholder = "Ingrese las coordenadas de la planta"    value = "{{ isset($planta->y) ? $planta->y : '' }}" required ></td>';
                html +=
                    '<td><button type="button" class="btn btn-primary" id="remove"><i class="far fa-times-circle"></i></button></td>';
                html += '</tr>';
                $('tbody').append(html);

            })
            $(document).on('click', '#remove', function() {
                $(this).closest('tr').remove();
            });
        })
    </script>
@stop
