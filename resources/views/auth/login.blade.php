@extends('layouts.theme-page')

@section('title', 'Iniciar sesión')

@section('more-css')
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-light text-center">{{ __('Inicio de sesión') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        

                        <div class="form-group row">
                            <label for="identity" class="col-md-4 col-form-label text-md-right">{{ __('Usuario') }}</label>

                            <div class="col-md-6">
                                <input id="identity" type="identity" class="form-control @error('identity') is-invalid @enderror" name="identity" value="{{ old('identity') }}" required autocomplete="identity" autofocus>

                                @error('identity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!--///////////////////////////////// -->
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Rol de usuario') }}</label>

                            <div class="col-md-6">
                                <select id="roles" type="roles" class="form-control @error('roles') is-invalid @enderror" name="roles">

                                </select>
                                

                                
                            </div>
                        </div>
                        
                        <!--//////////////////////////////// -->



                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check float-left">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Recuérdame') }}
                                    </label>
                                </div>

                                <div class="float-right">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link p-0" href="{{ route('password.request') }}">
                                            {{ __('¿Olvidaste tu contraseña?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-outline-primary btn-block">
                                    {{ __('Iniciar sesión') }}
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('more-script')

@endsection
