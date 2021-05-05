@extends('layouts.base')
<!--Mensaje Creado -->
  @if (session('monitoreoGuardado'))
    <div class="alert alert-success alert-dismissible fade show">
      {{ session('monitoreoGuardado') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif
<!--Mensaje Modificado-->
  @if (session('monitoreoModificado'))
    <div class="alert alert-success alert-dismissible fade show">
      {{ session('monitoreoModificado') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>
  @endif
<!--Mensaje Eliminado -->
    @if (session('monitoreoEliminado'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('monitoreoEliminado') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
<div class="card">
    <div class="justify-content-center">
        <div class="card-header align-items-center">
            <div class="row align-items-center">
                <div class="col-md-10">
                    <h1>Monitoreo</h1>
                </div>
                <div class="container col-md-2">
                    <div class="text-center justify-content-center">
                        <a href="monitoreos/create" class="btn btn-success">Nuevo Registro</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body table-responsive">
            <table id="table" class="table table-striped table-hover table-bordered table-sm bg-white">
                <thead>
                    <tr>
                        <th>ID MONITOREO</th>
                        <th>ID ESTUDIO</th>
                        <th>FECHA PLANIFICADA</th>
                        <th>FECHA DE EJECUCION</th>
                        <th>OBSERVACIONES</th>
                        <th>ACCIONES</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($monitoreos as $monitoreo)
                    <tr>
                        <td>{{ $monitoreo->id }}</td>
                        <td>{{ $monitoreo->idEstudio }}</td>
                        <td>{{ $monitoreo->fechaPlanificada }}</td>
                        <td>{{ $monitoreo->fechaEjecucion }}</td>
                        <td>{{ $monitoreo->observaciones }}</td>
                        <td>
                            <form action="{{ route('monitoreos.destroy',$monitoreo->id)}}" method="POST">
                                <a href="/monitoreos/{{$monitoreo->id}}/edit" class="btn btn-secondary">Editar</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Desea eliminar esto?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
