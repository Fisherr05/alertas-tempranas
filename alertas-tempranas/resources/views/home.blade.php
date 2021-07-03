@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are Admin!') }}
                    <div class="col-md-6">
                        <a href="/zonas" class="btn btn-danger btn-block"><i class="far fa-arrow-alt-circle-left"></i> Regresar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
