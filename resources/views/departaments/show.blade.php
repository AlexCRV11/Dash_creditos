@extends('layouts.theme-admin')

@section('title', 'Departamento')

@section('more-css')
@endsection

@section('header-card')
    <div class="row">
        <div class="col-9">
            <h4 class="mb-0">Departamento: {{$departament->departamento}}</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('admin.departament.index')}}">Departamentos</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{$departament->departamento}}</li>

                </ol>
            </nav>
        </div>
        <div class="col-3 text-right">
            <a href="{{ route('admin.departament.index')}}" class="btn btn-outline-primary">Regresar</a>
        </div>
    </div>
@endsection

@section('title-card', "Listado de ACOMS asignadas al departamento ".$departament->departamento)

@section('content')
    
    <form id="form-buscar" method="GET" action="{{ route('admin.departament.show',$departament) }}">
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
                            <th scope="col">Descripción</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($acoms as $acom)
                            <tr>
                                <th scope="row">{{ $acom->nombre }}</th>
                                <td>{{ $acom->descripcion }}</td>     
                                <td class="text-center" style="width: 150px">
                                        <form class="form-eliminar m-0 p-0" method="POST" action="{{ route('admin.departament.desasignation') }}">
                                            @csrf
                                            
                                            <input type="hidden" name="depa" value="{{$departament->id}}">
                                            <input type="hidden" name="acom" value="{{$acom->id}}">

                                            <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
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
                    {{ $acoms->links() }}
                </div>
                <div class="col-6 text-right">
                    <p class="m-0 mt-2">Página {{ $acoms->currentPage() }} de {{ $acoms->lastPage() }} </p>
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