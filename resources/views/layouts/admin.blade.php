<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>DASHBOARD</title>

    <!-- FONT AWESOME -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css' integrity='sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==' crossorigin='anonymous'/>

    <!-- ION ICONS  -->

    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    @include('admin.partials.header')

        <div class="container">
            <div class="row">
                @auth()
                    <div class="d-none d-lg-block col col-lg-3 p-0">
                        @include('admin.partials.aside')
                    </div>
                @endauth

                <div @auth class="col col-lg-9" @endauth>
                    <main id="main-admin">
                        @yield('content')
                    </main>
                </div>
            </div>
    </div>
</body>

</html>
