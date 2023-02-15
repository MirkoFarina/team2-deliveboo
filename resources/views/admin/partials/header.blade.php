<header id="admin-header">
    <nav class="navbar h-100 shadow px-3">

        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
            <div class="logo_laravel">
                LOGO
            </div>
        </a>
        <ul class="navbar-nav me-auto">
            <li>
                <!-- Left Side Of Navbar -->
                <a href="{{ route('home') }}"> Sito Pubblico </a>
            </li>
        </ul>

        <div class="d-flex" id="navbarSupportedContent">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto d-flex flex-row">
                <!-- Authentication Links -->
                @guest
                    <li>
                        <a href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="ms-3">
                            <a href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                            LOGOUT
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                @endguest
            </ul>
        </div>

    </nav>
</header>
