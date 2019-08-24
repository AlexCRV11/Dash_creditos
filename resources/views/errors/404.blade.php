@extends('layouts.app')

@section('title', 'Error 404')

@section('content')
    <div class="jumbotron text-center col-12 col-md-6 mx-auto">
        <h1 class="display-4 font-weight-bold text-danger">Error 404</h1>
        <p class="lead">Página no encontrada.</p>
        <hr class="my-4">
        <p>Usa el menú para navegar en el sistema.</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="{{ route('home') }}" role="button">Ir al inicio</a>
        </p>
    </div>
@endsection