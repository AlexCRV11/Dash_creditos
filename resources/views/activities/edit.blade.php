@extends('layouts.theme-admin')

@section('title', 'Modificar Actividad Complementaria')

@section('more-css')
    
@endsection

@section('header-card')
    <div class="row">
        <div class="col-9">
            <h4 class="mb-0">Modificar Actividad Complementaria</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.activity.index') }}">Actividades Complementarias</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Modificar actividad</li>
                </ol>
            </nav>
        </div>
        <div class="col-3 text-right">
            <a href="{{ route('admin.activity.index') }}" class="btn btn-outline-primary">Regresar</a>
        </div>
    </div>
@endsection

@section('title-card', 'Modificar Actividad Complementaria')

@section('content')
    @inject('acoms', 'App\Services\ActivityService')
    <div class="row justify-content-center">
        <div class="col-8">
            <form method="POST" name="activity" action="{{ route('admin.activity.update', $activity) }}">
                @csrf
                @method('PUT')
        
                <div class="form-group row">
                    <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
        
                    <div class="col-md-6">
                        <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre',$activity->nombre) }}" autocomplete="nombre" autofocus>
        
                        @error('nombre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                 <div class="form-group row">
                    <label for="" class="col-md-4 col-form-label text-md-right">{{ __('ACOM a la que pertenece') }}</label>
        
                    <div class="col-md-6">
                        <select id="acom_id" class="form-control @error('acom_id') is-invalid @enderror" name="acom_id">
                    
                            @foreach($acoms->get() as $index => $acom)
                            <option value="{{ $index }}" {{ old('acom_id',$activity->acom_id) == $index ? 'selected' : '' }}>
                                {{ $acom }}
                            </option>
                        
                        @endforeach      
                        </select> 
        
                        @error('acom_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Número de creditos') }}</label>
        
                    <div class="col-md-6">
                        <input id="creditos" type="text" class="form-control @error('creditos') is-invalid @enderror" name="creditos" value="{{ old('creditos',$activity->creditos) }}" autocomplete="creditos" autofocus>
        
                        @error('creditos')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Duracion (en número de períodos)') }}</label>
        
                    <div class="col-md-6">
                        <input id="duracion" type="text" class="form-control @error('duracion') is-invalid @enderror" name="duracion" value="{{ old('duracion',$activity->duracion) }}" autocomplete="duracion" autofocus>
        
                        @error('duracion')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Descripción') }}</label>
        
                    <div class="col-md-6">
                        <textarea id="descripcion" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" value="" autocomplete="descripcion" rows="4">{{ old('descripcion',$activity->descripcion) }}</textarea>
        
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