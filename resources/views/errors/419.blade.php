@extends('layouts.theme-page')

@section('title', 'Error 401')

@section('content')
    <div class="jumbotron text-center col-12 col-md-6 mx-auto">
        <h1 class="display-4 font-weight-bold text-danger">Error 419</h1>
        <p class="lead">La página ha expirado.</p>
        <hr class="my-4">
        <p>Usa el menú para navegar en el sistema.</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="{{ route('home') }}" role="button">Ir al inicio</a>
        </p>
        </div>
@endsection