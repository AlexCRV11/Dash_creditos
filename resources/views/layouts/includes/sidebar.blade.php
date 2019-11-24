
<div class="list-group position-fixed w-100" style="max-width: calc(16.6666666667% - 30px )">
    <a href="{{ url('/') }}" class="list-group-item list-group-item-action @if(Request::path() == 'home') active @endif">Inicio</a>

    @if (Auth::user()->showMenu('administrador'))
    <a href="{{ route('user.index') }}" class="list-group-item list-group-item-action @if(Request::path() == 'user') active @endif">Usuarios</a>
    @endif

    @if (Auth::user()->showMenu('Superadministrador'))
    <a href="{{ route('admin.role.index') }}" class="list-group-item list-group-item-action @if(Request::path() == 'role') active @endif">Roles</a>
    @endif
    
    @if (Auth::user()->showMenu('administrador'))
    <a href="{{ route('admin.period.index') }}" class="list-group-item list-group-item-action @if(Request::path() == 'period') active @endif">Periodos</a>
    @endif

    @if (Auth::user()->showMenu('administrador'))
    <a href="{{ route('admin.career.index') }}" class="list-group-item list-group-item-action @if(Request::path() == 'career') active @endif">Carreras</a>
    @endif

    @if (Auth::user()->showMenu('administrador'))
    <a href="{{ route('admin.personal.index') }}" class="list-group-item list-group-item-action @if(Request::path() == 'personal') active @endif">Profesores</a>
    @endif

    @if (Auth::user()->showMenu('administrador'))
    <a href="{{ route('admin.departament.index') }}" class="list-group-item list-group-item-action @if(Request::path() == 'departament') active @endif">Departamentos</a>
    @endif

    @if (Auth::user()->showMenu(['administrador','departamento']))
    <a href="{{ route('admin.acom.index') }}" class="list-group-item list-group-item-action @if(Request::path() == 'acom') active @endif">ACOMS </a> 
    @endif

    @if (Auth::user()->showMenu(['administrador','departamento','responsable-acom']))
    <a href="{{ route('admin.activity.index') }}" class="list-group-item list-group-item-action @if(Request::path() == 'activity') active @endif">Actividades</a> 
    @endif
    
    @if (Auth::user()->showMenu('administrador'))
    <a href="{{ route('admin.student.index') }}" class="list-group-item list-group-item-action @if(Request::path() == 'student') active @endif">Alumnos</a>
    @endif

    @if (Auth::user()->showMenu(['administrador','departamento','responsable-acom']))
    <a href="{{ route('admin.group.index') }}" class="list-group-item list-group-item-action @if(Request::path() == 'group') active @endif">Grupos</a>
    @endif

    @if (Auth::user()->showMenu(['administrador','estudiante']))
     <a href="#" class="list-group-item list-group-item-action disabled">Calificaciones</a>
    @endif

 
</div>