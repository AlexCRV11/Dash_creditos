<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                @if (Auth::check())
                    @if (Auth::user()->showMenu('administrador','departamento','responsable-acom'))
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actividad complementaria</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('admin.acom.index') }}">Listado de ACOMS</a>
                            <a class="dropdown-item" href="{{ route('admin.activity.index') }}">Listado de Actividades</a>
                            <a class="dropdown-item" href="#">Grupos</a>
                        </div>
                    </li>
                    @endif
                    @if (Auth::user()->showMenu('administrador'))
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Profesores</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('admin.personal.index') }}">Lista de profesores</a>
                            <a class="dropdown-item" href="{{ route('admin.personal.create') }}">Agregar profesor</a>
                        </div>
                    </li>
                    @endif
                    @if (Auth::user()->showMenu('administrador','departamento'))
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Departamentos</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('admin.personal.index') }}">Lista de Departamentos</a>
                            <a class="dropdown-item" href="{{ route('admin.departament.create') }}">Agregar Departamento</a>
                            <a class="dropdown-item" href="#">Reportes</a>
                        </div>
                    </li>
                    @endif
                    @if (Auth::user()->showMenu('administrador','departamento'))
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Alumnos</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('admin.student.index') }}">Lista de alumnos</a>
                            <a class="dropdown-item" href="#">Kardex</a>
                        </div>
                    </li>
                    @endif

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         @if (Auth::user()->showMenu('administrador')) Usuarios @endif
                         @if (Auth::user()->showMenu(['docente','estudiante','responsable-acom'])) Usuario @endif
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @if (Auth::user()->showMenu('administrador'))
                            <a class="dropdown-item" href="{{ route('user.index') }}">Lista de Usuarios</a>
                            @endif
                            <a class="dropdown-item" href="#">Modificar datos de usuario</a>
                        </div>
                    </li>


                @endif
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar sesión') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Registro') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name}} (USUARIO) <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Cerrar sesión') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>