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
@endsection
