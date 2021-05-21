@extends('layouts.base')

@section('contenido-centrado')
<div class="card">
    <div class="card-header">
        <h1>Editar Registro</h1>
    </div>
    <div class="card-body">
      <form class="needs-validation" action="/variedades/{{ $variedad->id }}" method="POST" novalidate>
      @csrf @method('PATCH')
        @include('variedad.form')
      </form>
    </div>
</div>
@endsection
