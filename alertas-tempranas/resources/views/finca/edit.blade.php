@extends('layouts.base')

@section('contenido-centrado')
<div class="card">
    <div class="card-header">
        <h1>Editar Registro</h1>
    </div>
    <div class="card-body">
      <form class="needs-validation" action="/fincas/{{ $finca->id }}" method="POST" novalidate>
      @csrf @method('PATCH')
        @include('finca.form')
      </form>
    </div>
</div>
@endsection
