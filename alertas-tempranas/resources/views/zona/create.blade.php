@extends('layouts.base')

@section('contenido-centrado')
<div class="card">
    <div class="card-header">
        <h1>Nuevo Registro</h1>
    </div>
    <div class="card-body">
      <form class="needs-validation" action="/zonas" method="POST" novalidate>
      @csrf
        @include('zona.form')
      </form>
    </div>
</div>
@section('js')
        <script type = "text/javascript" >
            $(document).ready(function() {
                $('#idCanton').on('change', function() {
                    $.ajax({
                        url: "{{ route('admin.parroquias.bycanton') }}?idCanton=" + $(this).val(),
                        method: 'GET',
                        success: function(data) {
                            $('#idParroquia').html(data.html);
                        }
                    });
                });
            });

    </script>
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
@endsection
