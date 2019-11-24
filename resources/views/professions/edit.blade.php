@extends('layouts.theme-admin')

@section('title', 'Modificar Profesión')

@section('more-css')
    
@endsection

@section('header-card')
    <div class="row">
        <div class="col-9">
            <h4 class="mb-0">Modificar Profesión</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.personal.index') }}">Profesores</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.profession.index') }}">Profesiones</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Modificar profesión</li>
                </ol>
            </nav>
        </div>
        <div class="col-3 text-right">
            <a href="{{ route('admin.profession.index') }}" class="btn btn-outline-primary">Regresar</a>
        </div>
    </div>
@endsection

@section('title-card', 'Modificar Profesión')

@section('content')
    <div class="row justify-content-center">
        <div class="col-8">
            <form method="POST" name="profession" action="{{ route('admin.profession.update',$profession) }}">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
        
                    <div class="col-md-6">
                        <input id="profesion" type="text" class="form-control @error('profesion') is-invalid @enderror" name="profesion" value="{{ old('profesion',$profession->profesion) }}" autocomplete="profesion" autofocus>
        
                        @error('profesion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Abreviatura') }}</label>
        
                    <div class="col-md-6">
                        <input id="abreviatura" type="text" class="form-control @error('abreviatura') is-invalid @enderror" name="abreviatura" value="{{ old('abreviatura',$profession->abreviatura) }}" autocomplete="abreviatura" autofocus>
        
                        @error('abreviatura')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-outline-primary">
                            Modificar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('more-script')

@endsection