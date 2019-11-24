@extends('layouts.theme-admin')

@section('title', 'Detalle del Rol')

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
                    <li class="breadcrumb-item active" aria-current="page">Detalle del rol</li>
                </ol>
            </nav>
        </div>
        <div class="col-3 text-right">
            <a href="{{ route('admin.role.index') }}" class="btn btn-outline-primary">Regresar</a>
        </div>
    </div>
@endsection

@section('title-card', 'Detalle del Rol')

@section('content')
    <div class="row justify-content-center">
        <div class="col-8">
            <form class="form-eliminar" method="POST" action="{{ route('admin.role.destroy', $role) }}">
                @csrf
                @method('DELETE')
        
                <div class="form-group row">
                    <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
        
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $role->name }}" autocomplete="name" disabled>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-md-4 col-form-label text-md-right">{{ __('Descripción') }}</label>
        
                    <div class="col-md-6">
                        <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" value="" autocomplete="description" rows="4" disabled>{{ $role->description }}</textarea>
                    </div>
                </div>
        
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        {{-- <a href="{{ route('admin.role.edit', $role) }}" class="btn btn-outline-primary">
                            Modificar
                        </a> --}}
                        <button type="submit" class="btn btn-outline-danger">
                            Eliminar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('more-script')
    <script>

        $(document).ready(function(e) {

            $("form.form-eliminar").on("submit", function(evt) {
                evt.preventDefault();
                Swal.fire({
                    title: 'Confirmación',
                    html:  '¿Desea eliminar el rol?',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Si, eliminar',
                    cancelButtonText: 'No, cancelar',
                    footer: 'SCCAC',
                    showCloseButton: true,
                    reverseButtons: true,
                    focusConfirm: true
                }).then((result) => {
                    if (result.value) {
                        $(this).off("submit").submit();
                    }
                });
            });
            
        });
    </script>
@endsection