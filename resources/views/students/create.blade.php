@extends('layouts.theme-admin')

@section('title', 'Crear Estudiante')

@section('more-css')
    
@endsection

@section('header-card')
    <div class="row">
        <div class="col-9">
            <h4 class="mb-0">Nuevo Estudiante</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.student.index') }}">Estudiantes</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Nuevo estudiente</li>
                </ol>
            </nav>
        </div>
        <div class="col-3 text-right">
            <a href="{{ route('admin.student.index') }}" class="btn btn-outline-primary">Regresar</a>
        </div>
    </div>
@endsection

@section('title-card', 'Crear Estudiante')

@section('content')
    @inject('students', 'App\Services\StudentService')
    <div class="row justify-content-center">
        <div class="col-8">
            <form method="POST" name="student" action="{{ route('admin.student.store') }}">
                @csrf

                <div class="form-group row">
                    <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Matricula') }}</label>
        
                    <div class="col-md-6">
                        <input id="matricula" type="text" class="form-control @error('matricula') is-invalid @enderror" name="matricula" value="{{ old('matricula') }}" autocomplete="matricula" autofocus
                        maxlength="9">
        
                        @error('matricula')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-md-4 col-form-label text-md-right">{{ __('CURP') }}</label>
        
                    <div class="col-md-6">
                        <input id="curp" type="text" class="form-control @error('curp') is-invalid @enderror" name="curp" value="{{ old('curp') }}" autocomplete="curp" autofocus 
                        maxlength="18" onKeyUp="document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()">
        
                        @error('curp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
        
                <div class="form-group row">
                    <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
        
                    <div class="col-md-6">
                        <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" autocomplete="nombre" autofocus>
        
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
                        <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" autocomplete="telefono" autofocus
                        maxlength="10">
        
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
                    <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Carrera') }}</label>
        
                    <div class="col-md-6">
                        <select id="career_id" class="form-control @error('career_id') is-invalid @enderror" name="career_id">
                    
                            @foreach($students->getCarrera() as $index => $carrera)
                            <option value="{{ $index }}" {{ old('career_id') == $index ? 'selected' : '' }}>
                                {{ $carrera }}
                            </option>
                        
                        @endforeach      
                        </select> 
        
                        @error('career_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Periodo de ingreso') }}</label>
        
                    <div class="col-md-6">
                        <select id="period_id" class="form-control @error('period_id') is-invalid @enderror" name="period_id">
                    
                            @foreach($students->getPeriodo() as $index => $periodo)
                            <option value="{{ $index }}" {{ old('period_id') == $index ? 'selected' : '' }}>
                                {{ $periodo }}
                            </option>
                        
                        @endforeach      
                        </select> 
        
                        @error('period_id')
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