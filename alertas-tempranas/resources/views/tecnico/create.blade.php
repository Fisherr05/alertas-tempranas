@extends('adminlte::page')

@section('title', 'Alertas Tempranas')

@section('content_header')

@stop

@section('content')
  <div class="card">
    <div class="card-header">
        <h1>Nuevo Registro</h1>
    </div>
    <div class="card-body">
      <form class="needs-validation" action="/tecnicos" method="POST" novalidate>
      @csrf
        @include('tecnico.form')
      </form>
    </div>
  </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

@stop

@section('js')
@stop
