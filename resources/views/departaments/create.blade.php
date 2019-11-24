@extends('layouts.theme-admin')

@section('title', 'Crear Departamento')

@section('more-css')
    
@endsection

@section('header-card')
    <div class="row">
        <div class="col-9">
            <h4 class="mb-0">Nuevo Departamento</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.departament.index') }}">Departamentos</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Nuevo departamento</li>
                </ol>
            </nav>
        </div>
        <div class="col-3 text-right">
            <a href="{{ route('admin.departament.index') }}" class="btn btn-outline-primary">Regresar</a>
        </div>
    </div>
@endsection

@section('title-card', 'Crear Departamento')

@section('content')
    @inject('departaments', 'App\Services\DepartamentService')
    <div class="row justify-content-center">
        <div class="col-8">
            <form method="POST" name="departament" action="{{ route('admin.departament.store') }}">
                @csrf
        
                <div class="form-group row">
                    <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
        
                    <div class="col-md-6">
                        <input id="departamento" type="text" class="form-control @error('departamento') is-invalid @enderror" name="departamento" value="{{ old('departamento') }}" autocomplete="departamento" autofocus>
        
                        @error('departamento')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Personal a cargo') }}</label>
        
                    <div class="col-md-6">
                        <select id="personal_id" class="form-control @error('personal_id') is-invalid @enderror" name="personal_id">
                    
                            @foreach($departaments->getPersonal() as $index => $personal)
                            <option value="{{ $index }}" {{ old('personal_id') == $index ? 'selected' : '' }}>
                                {{ $personal }}
                            </option>
                        
                        @endforeach      
                        </select> 
        
                        @error('personal_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Rol del Personal') }}</label>
        
                    <div class="col-md-6">
                        <select id="cargo" class="form-control @error('cargo') is-invalid @enderror" name="cargo">
                    
                            @foreach($departaments->getCargo() as $index => $cargo)
                            <option value="{{ $index }}" {{ old('cargo') == $index ? 'selected' : '' }}>
                                {{ $cargo }}
                            </option>
                        
                        @endforeach      
                        </select> 
        
                        @error('cargo')
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