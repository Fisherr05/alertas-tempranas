@extends('layouts.base')

@section('contenido-centrado')
<div class="card">
    <div class="card-header">
        <h1>Nuevo Registro</h1>
    </div>
    <div class="card-body">
      <form class="needs-validation" action="/datos" method="POST" novalidate>
      @csrf
        @include('dato.form')
      </form>
    </div>
</div>
@section('js')
        <script type = "text/javascript" >
            $(document).ready(function() {
                $('#idMonitoreo').on('change', function() {
                    $.ajax({
                        url: "{{ route('admin.plantas.bymonitoreo') }}?idMonitoreo=" + $(this).val(),
                        method: 'GET',
                        success: function(data) {
                            $('#plantas').html(data.html);
                        }
                    });
                });
            });
    </script>
@endsection
@endsection
