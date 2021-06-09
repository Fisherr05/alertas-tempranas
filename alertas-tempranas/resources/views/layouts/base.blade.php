<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alertas Tempranas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/materia/bootstrap.min.css"
        integrity="sha384-B4morbeopVCSpzeC1c4nyV0d0cqvlSAfyXVfrPJa25im5p+yEN/YmhlgQP/OyMZD" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        body {
            background: #6441A5;
            /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #2a0845, #6441A5);
            /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #2a0845, #6441A5);
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

        }

    </style>

    @yield('css')

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="/">Alertas Tempranas</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ (request()->is('zonas*')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('zonas.index') }}">Zona</a>
                </li>
                <li class="nav-item {{ (request()->is('variedades*')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('variedades.index') }}">Variedad</a>
                </li>
                <li class="nav-item {{ (request()->is('fincas*')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('fincas.index') }}">Finca</a>
                </li>
                <li class="nav-item {{ (request()->is('estudios*')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('estudios.index') }}">Estudio</a>
                </li>
                <li class="nav-item {{ (request()->is('monitoreos*')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('monitoreos.index') }}">Monitoreo</a>
                </li>
                <li class="nav-item {{ (request()->is('tecnicos*')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('tecnicos.index') }}">Técnico</a>
                </li>
                <li class="nav-item {{ (request()->is('plantas*')) ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('plantas.index') }}">Planta</a>
                </li>
                <li class="nav-item {{ (request()->is('datos*')) ? 'active' : '' }}">
                    <a class="nav-link " href="{{ route('datos.index') }}">Datos</a>
                </li>

            </ul>
        </div>
    </nav>
    <br><br>
    @yield('contenido')
    <div class="container pt-4">
        @yield('contenido-centrado')

    </div>




</body>
<!-- script -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js" ></script>

@yield('js')

</html>
