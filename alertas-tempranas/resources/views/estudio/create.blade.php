@extends('layouts.base')

@section('contenido-centrado')
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
@section('js')
        <script type = "text/javascript" >
            $(document).ready(function() {
                $('#idFinca').on('change', function() {
                    $.ajax({
                        url: "{{ route('admin.variedades.byfinca') }}?idFinca=" + $(this).val(),
                        method: 'GET',
                        success: function(data) {
                            $('#variedades').html(data.html);
                        }
                    });
                });
            });
    </script>
@endsection
@endsection
