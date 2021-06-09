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
            <form class="needs-validation" action="/estudios" method="POST" novalidate>
                @csrf
                @include('estudio.form')
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
            $('#idFinca').on('change', function() {
                $.ajax({
                    url: "{{ route('admin.variedades.byfinca') }}?idFinca=" + $(this).val(),
                    method: 'GET',
                    success: function(result) {
                        console.log(result);
                        var dbSelect = $('#variedades');
                        dbSelect.empty();
                        for (var i = 0; i < result.length; i++) {
                            dbSelect.append($('<option/>', {
                                value: result[i].id,
                                text: result[i].nombre
                            }));
                        }
                        //$('#variedades').html(data.html);
                    }
                });
            });
        });

    </script>
@stop
