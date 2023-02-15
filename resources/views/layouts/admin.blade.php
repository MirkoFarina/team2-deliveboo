<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>DASHBOARD</title>


    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    @include('admin.partials.header')

        <div class="container-fluid">
            <div class="row">
                @auth()
                    <div class="col-1 p-0">
                        @include('admin.partials.aside')
                    </div>
                @endauth

                <div @auth class="col-11 p-0" @endauth>
                    <main id="main-admin">
                        @yield('content')
                    </main>
                </div>
            </div>
    </div>
</body>

</html>
