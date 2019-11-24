@extends('layouts.theme-admin')

@section('title', 'Asignar ACOM')

@section('more-css')
    
@endsection

@section('header-card')
    <div class="row">
        <div class="col-9">
            <h4 class="mb-0">Asignar ACOM</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.departament.index') }}">Departamentos</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Asignar ACOM </li>
                </ol>
            </nav>
        </div>
        <div class="col-3 text-right">
            <a href="{{ route('admin.departament.index') }}" class="btn btn-outline-primary">Regresar</a>

        </div>
    </div>
@endsection

@section('title-card', 'Asignar ACOM')

@section('content')
    @inject('departaments', 'App\Services\DepartamentService')
    <div class="row justify-content-center">
        <div class="col-8">
            <form method="POST" name="asignation" action="{{ route('admin.departament.relacion') }}">
                @csrf

                <div class="form-group row">
                    <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Departamento') }}</label>
        
                    <div class="col-md-6">
                        <select id="id" class="form-control @error('id') is-invalid @enderror" name="id">
                    
                            @foreach($departaments->getdepartament() as $index => $personal)
                            <option value="{{ $index }}" {{ old('id',$depa) == $index ? 'selected' : '' }}>
                                {{ $personal }}
                            </option>
                        
                        @endforeach      
                        </select> 
                            
                        @error('id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror                                                
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-md-4 col-form-label text-md-right">{{ __('ACOM') }}</label>
        
                    <div class="col-md-6">
                        <select id="acom_id" class="form-control @error('acom_id') is-invalid @enderror" name="acom_id">
                    
                            @foreach($departaments->getacom() as $index => $personal)
                            <option value="{{ $index }}" {{ old('acom_id',$acom) == $index ? 'selected' : '' }}>
                                {{ $personal }}
                            </option>
                        
                        @endforeach      
                        </select> 
        
                        @error('acom_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <label for="" class="text-danger">{{ __($mensaje) }}</label>
                    </div>
                </div>

                
        
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-outline-primary">
                            Asignar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('more-script')

@endsection