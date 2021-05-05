@extends('layouts.base')

@section('contenido')
    <!--Mensaje Creado -->
    @if (session('fincaGuardado'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('monitoreoGuardado') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <!--Mensaje Modificado-->
    @if (session('fincaModificado'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('fincaModificado') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <!--Mensaje Eliminado -->
    @if (session('fincaEliminado'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('fincaEliminado') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="card">
        <div class="justify-content-center">
            <div class="card-header align-items-center">
                <div class="row align-items-center">
                    <div class="col-md-10">
                        <h1>Finca</h1>
                    </div>
                    <div class="container col-md-2">
                        <div class="text-center justify-content-center">
                            <a href="fincas/create" class="btn btn-success">Nuevo Registro</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table id="table" class="table table-striped table-hover table-bordered table-sm bg-white">
                    <thead>
                        <tr>
                            <th>ID FINCA</th>
                            <th>NOMBRE FINCA</th>
                            <th>PROPIETARIO</th>
                            <th>COORDENADAS</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fincas as $finca)
                            <tr>
                                <td>{{ $finca->id }}</td>
                                <td>{{ $finca->nombreFinca }}</td>
                                <td>{{ $finca->propietarioFinca }}</td>
                                <td>{{ $finca->coFinca }}</td>
                                <td>
                                    <form action="{{ route('fincas.destroy', $finca->id) }}" method="POST">
                                        <a href="/fincas/{{ $finca->id }}/edit" class="btn btn-secondary"><i class="fas fa-pencil-alt"></i></a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('¿Desea eliminar esto?')"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
