@extends('layouts.base')

<div class="card">
    <div class="card-header">
        <h1>Nuevo Registro</h1>
    </div>
    <div class="card-body">
      <form action="/monitoreos" method="POST">
      @csrf
        @include('monitoreo.form')
      </form>
    </div>
</div>
