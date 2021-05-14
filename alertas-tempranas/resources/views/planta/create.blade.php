@extends('layouts.base')

@section('contenido-centrado')
<div class="card">
    <div class="card-header">
        <h1>Nuevo Registro</h1>
    </div>
    <div class="card-body">
      <form class="needs-validation" action="/plantas" method="POST" novalidate>
      @csrf
        @include('planta.form')
      </form>
    </div>
</div>
@endsection
