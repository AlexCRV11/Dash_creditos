<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>

    @include('layouts.includes.head')
</head>
<body>
    @include('sweetalert::alert')
    <div id="app">
        @include('layouts.includes.navbar')
        <main class="container-fluid py-4 mt-5 mb-3">
            <div class="row">
                <div class="col-12">
                    <div class="card-body">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
        @include('layouts.includes.footer')
    </div>
    @include('layouts.includes.scripts')
</body>
</html>