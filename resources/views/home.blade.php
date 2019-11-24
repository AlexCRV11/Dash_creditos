@extends('layouts.theme-admin')

@section('title', 'Home')

@section('more-css')
@endsection

@section('header-card')
@endsection

@section('title-card', 'Inicio')

@section('content')
    <div class="row">
        <div class="col-12 text-center">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <section class="jumbotron text-center">
                <div class="container">
                  <h1 class="jumbotron-heading">- SCCAC -</h1>
                  <p class="lead text-muted">Sistema de Control de Créditos de las Actividades Complementarias</p>
                </div>
              </section>
        </div>
    </div>
@endsection

@section('more-script')
@endsection