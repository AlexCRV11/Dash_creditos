@extends('layouts.theme-admin')

@section('title', 'Crear Rol')

@section('more-css')
    
@endsection

@section('header-card')
    <div class="row">
        <div class="col-9">
            <h4 class="mb-0">Nuevo Rol</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.role.index') }}">Roles</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Nuevo rol</li>
                </ol>
            </nav>
        </div>
        <div class="col-3 text-right">
            <a href="{{ route('admin.role.index') }}" class="btn btn-outline-primary">Regresar</a>
        </div>
    </div>
@endsection

@section('title-card', 'Crear Rol')

@section('content')
    <div class="row justify-content-center">
        <div class="col-8">
            <form method="POST" action="{{ route('admin.role.store') }}">
                @csrf
        
                <div class="form-group row">
                    <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
        
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
        
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Descripción') }}</label>
        
                    <div class="col-md-6">
                        <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" value="" autocomplete="description" rows="4">{{ old('description') }}</textarea>
        
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
        
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-outline-primary">
                            Agregar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('more-script')
@endsection