@extends('layouts.theme-admin')

@section('title', 'Crear Profesor')

@section('more-css')
    
@endsection

@section('header-card')
    <div class="row">
        <div class="col-9">
            <h4 class="mb-0">Nuevo Profesor</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.personal.index') }}">Profesores</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Nuevo profesor</li>
                </ol>
            </nav>
        </div>
        <div class="col-3 text-right">
            <a href="{{ route('admin.personal.index') }}" class="btn btn-outline-primary">Regresar</a>
        </div>
    </div>
@endsection

@section('title-card', 'Crear Profesor')

@section('content')
    @inject('professions', 'App\Services\ProfessionService')
    <div class="row justify-content-center">
        <div class="col-8">
            <form method="POST" action="{{ route('admin.personal.store') }}">
                @csrf
        
                <div class="form-group row">
                    <label for="" class="col-md-4 col-form-label text-md-right">{{ __('RFC') }}</label>
        
                    <div class="col-md-6">
                        <input id="RFC" type="text" class="form-control @error('RFC') is-invalid @enderror" name="RFC" value="{{ old('RFC') }}" autocomplete="RFC" maxlength="13" autofocus onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()">
        
                        @error('RFC')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
        
                    <div class="col-md-6">
                        <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" autocomplete="nombre" autofocus >
                        
        
                        @error('nombre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Apellido paterno') }}</label>
        
                    <div class="col-md-6">
                        <input id="paterno" type="text" class="form-control @error('paterno') is-invalid @enderror" name="paterno" value="{{ old('paterno') }}" autocomplete="paterno" autofocus>
        
                        @error('paterno')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Apellido materno') }}</label>
        
                    <div class="col-md-6">
                        <input id="materno" type="text" class="form-control @error('materno') is-invalid @enderror" name="materno" value="{{ old('materno') }}" autocomplete="materno" autofocus>
        
                        @error('materno')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Telefono') }}</label>
        
                    <div class="col-md-6">
                        <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" autocomplete="telefono" maxlength="10" autofocus>
        
                        @error('telefono')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Correo') }}</label>
        
                    <div class="col-md-6">
                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
        
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Especialidad') }}</label>
        
                    <div class="col-md-6">
                        <input id="especialidad" type="text" class="form-control @error('especialidad') is-invalid @enderror" name="especialidad" value="{{ old('especialidad') }}" autocomplete="especialidad" autofocus>
        
                        @error('especialidad')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row">
                    <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Profesion') }}</label>
        
                    <div class="col-md-6">
                        <select id="profession" name="profession_id" class="form-control @error('profession_id') is-invalid @enderror" >

                        @foreach($professions->get() as $index => $profession)
                            <option value="{{ $index }}" {{ old('profession_id') == $index ? 'selected' : '' }}>
                                {{ $profession }}
                            </option>
                        @endforeach    
                        
                        </select> 
                        @error('profession_id')
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