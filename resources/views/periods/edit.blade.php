@extends('layouts.theme-admin')

@section('title', 'Modificar Periodo')

@section('more-css')
    
@endsection

@section('header-card')
    <div class="row">
        <div class="col-9">
            <h4 class="mb-0">Modificar Periodo</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.period.index') }}">Periodos</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Modificar periodo</li>
                </ol>
            </nav>
        </div>
        <div class="col-3 text-right">
            <a href="{{ route('admin.period.index') }}" class="btn btn-outline-primary">Regresar</a>
        </div>
    </div>
@endsection

@section('title-card', 'Modificar Periodo')

@section('content')
@inject('periods', 'App\Services\PeriodService')
    <div class="row justify-content-center">
        <div class="col-8">
            <form method="POST" name="period" action="{{ route('admin.period.update', $period) }}">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Periodo') }}</label>
        
                    <div class="col-md-6">
                        <select id="nombre" name="nombre" class="form-control @error('nombre') is-invalid @enderror" >

                        @foreach($periods->get() as $index => $nombre)
                            <option value="{{ $index }}" {{ old('nombre',$period->nombre) == $nombre ? 'selected' : '' }} 
                            @if( old('nombre') == $index)
                                {{'selected'}}
                            @endif     >
                                {{ $nombre }}
                            </option>
                        @endforeach    
                        </select> 
                        
                       
                        @error('nombre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Año') }}</label>
        
                    <div class="col-md-6">
                        <input id="año" type="text" class="form-control @error('año') is-invalid @enderror" name="año" value="{{ old('año', $period->año) }}" autocomplete="año" maxlength="4" autofocus>

                        <input id="slug" type="hidden" class="form-control @error('slug') is-invalid @enderror" name="slug" value="" autocomplete="slug" autofocus>
        
                        @error('slug')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
        
                        @error('año')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
        
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-outline-primary" onClick="javascript:procesar();">
                            Modificar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('more-script')

<script type="text/javascript">

function procesar() {

    nombre=document.getElementById('nombre').value;
    año=document.getElementById('año').value;

    slug=año+'-'+nombre;

    document.getElementById('slug').value=slug;

    document.forms.period.submit();

}

</script>

@endsection