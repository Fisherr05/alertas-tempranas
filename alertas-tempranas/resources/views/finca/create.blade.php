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
            <form class="needs-validation" action="/fincas" method="POST" novalidate>
                @csrf
                @include('finca.form')
            </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(function() {
            $('select').each(function() {
                $(this).select2({
                    theme: 'bootstrap4',
                    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass(
                        'w-100') ? '100%' : 'style',
                    placeholder: $(this).data('placeholder'),
                    allowClear: Boolean($(this).data('allow-clear')),
                    closeOnSelect: !$(this).attr('multiple'),
                    language: "es",
                });
            });
        });

    </script>
    <script>
        $(document).ready(function() {
            $('.idZona').select2({
                theme: 'bootstrap4',
                language: "es",
                placeholder: "Selecione una zona",
            });
            $('.idVariedad').select2({
                theme: 'bootstrap4',
                language: "es",
                placeholder: "Selecione una o varias Variedades",
            });
        });
    </script>
@stop
