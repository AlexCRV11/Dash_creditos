@extends('layouts.theme-admin')

@section('title', 'Modificar ACOM')

@section('more-css')
    
@endsection

@section('header-card')
    <div class="row">
        <div class="col-9">
            <h4 class="mb-0">Modificar ACOM</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.acom.index') }}">ACOMS</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Modificar ACOM</li>
                </ol>
            </nav>
        </div>
        <div class="col-3 text-right">
            <a href="{{ route('admin.acom.index') }}" class="btn btn-outline-primary">Regresar</a>
        </div>
    </div>
@endsection

@section('title-card', 'Modificar ACOM')

@section('content')
    <div class="row justify-content-center">
        <div class="col-8">
            <form method="POST" name="acom" action="{{ route('admin.acom.update',$acom) }}">
                @csrf
        		@method("PUT")
                <div class="form-group row">
                    <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
        
                    <div class="col-md-6">
                        <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre',$acom->nombre) }}" autocomplete="nombre" autofocus>
        
                        @error('nombre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Descripción') }}</label>
        
                    <div class="col-md-6">
                        <textarea id="descripcion" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" value="" autocomplete="descripcion" rows="4">{{ old('descripcion',$acom->descripcion) }}</textarea>
        
                        @error('descripcion')
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