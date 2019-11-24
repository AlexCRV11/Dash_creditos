@extends('layouts.theme-admin')

@section('title', $acom->nombre)

@section('more-css')
@endsection

@section('header-card')
    <div class="row">
        <div class="col-9">
            <h4 class="mb-0">ACOM: {{$acom->nombre}}</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('admin.acom.index')}}">ACOMS</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$acom->nombre}}</li>

                </ol>
            </nav>
        </div>
        <div class="col-3 text-right">
            <form class="form-agregar" method="POST" action="{{ route('admin.activity.agregar') }}">
            @csrf
            <button type="submin" class="btn btn-outline-primary">Nueva Actividad</button>
            <a href="{{ route('admin.acom.index')}}" class="btn btn-outline-primary">Regresar</a>
            </form>
        </div>
    </div>
@endsection

@section('title-card', "Listado de Actividades asignadas a ".$acom->nombre)

@section('content')
    
    <form id="form-buscar" method="GET" action="{{ route('admin.acom.show',$acom) }}">
        <div class="row d-flex justify-content-between">
            <div class="col-6">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Buscar" name="buscar" value="{{ $buscar }}">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="submit">Buscar</button>
                    </div>
                </div>
            </div>
            <div class="col-2 text-right">
                <select class="custom-select" id="paginate" name="paginate">
                    <option value="10" @if($porPagina == 10) selected @endif>10</option>
                    <option value="20" @if($porPagina == 20) selected @endif>20</option>
                    <option value="50" @if($porPagina == 50) selected @endif>50</option>
                    <option value="100" @if($porPagina == 100) selected @endif>100</option>
                </select>
            </div>
        </div>
    </form>

    <div class="row mt-4">
        <div class="col-12">
            <table class="table table-bordered table-hover table-sm">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Creditos</th>
                            <th scope="col">Duracion/Periodos</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($activities as $activity)
                            <tr>
                                <th scope="row">{{ $activity->nombre }}</th>
                                <td>{{ $activity->creditos }}</td>
                                <td>{{ $activity->duracion }}</td>
                                <td>{{ $activity->descripcion }}</td>     
                                <td class="text-center" style="width: 150px">
                                        <form class="form-eliminar m-0 p-0" method="POST" action="{{ route('admin.activity.destroy',$activity,$acom) }}">
                                            @csrf
                                            @method('DELETE')

                                            <input type="hidden" name="solicitud" value="departamento">
                                            <input type="hidden" name="acom" value="{{$acom->id}}">
                                            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                                <a href="{{ route('admin.activity.edit', $activity,$acom) }}" class="btn btn-outline-primary">Modificar</a>
                                                <button type="submin" class="btn btn-outline-danger">Eliminar</button>
                                            </div>
                                        </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
            </table>

            <div class="row">
                <div class="col-6">
                    {{ $activities->links() }}
                </div>
                <div class="col-6 text-right">
                    <p class="m-0 mt-2">Página {{ $activities->currentPage() }} de {{ $activities->lastPage() }} </p>
                </div>
            </div>
        </div>
    </div>
    
@endsection

@section('more-script')
    <script>

        $(document).ready(function(e) {

            $("form#form-buscar").find("#paginate").on('change', function() {
                $("form#form-buscar").submit();
            });

            $("form.form-eliminar").on("submit", function(evt) {
                evt.preventDefault();
                Swal.fire({
                    title: 'Confirmación',
                    html:  '¿Desea eliminar el registro?',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Si, eliminar',
                    cancelButtonText: 'No, cancelar',
                    footer: 'SCCAC',
                    showCloseButton: true,
                    reverseButtons: true,
                    focusConfirm: true,
                }).then((result) => {
                    if (result.value) {
                        $(this).off("submit").submit();
                    }
                });
            });

        });
    </script>
@endsection